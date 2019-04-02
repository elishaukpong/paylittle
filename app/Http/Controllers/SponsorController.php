<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use App\Models\Status;
use App\Models\Sponsor;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\ProjectSubscription;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SponsorshipRequest;


class SponsorController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified'])->except(['sponsorReturns']);
    }

    public function sponsorProject(Request $request, Project $project)
    {
        $request['amount'] = filter_var($request['amount'], FILTER_SANITIZE_NUMBER_INT);
        $request['returns'] = ($request['amount'] * $project->returnsPercentage) + $request['amount'];

        $rules = [
            'amount' => 'required|integer',
            'returns' => 'required|integer',
        ];

        $this->validate($request, $rules);

        $sponsorshipAmountRemaining = $this->checkSponsorshipAmountRemaining($project);

        if($request['amount'] > $sponsorshipAmountRemaining){
            Session::flash('error', "Can only take sponsorship upto NGN " . number_format($sponsorshipAmountRemaining) . " at this time!");
            return redirect()->back();
        }

        $projectDuration =  $project->duration->timeline + 1; //add one month for the money raising phase

        $projectSponsorship = new ProjectSubscription;
        $projectSponsorship->id = Uuid::uuid1();
        $projectSponsorship->amount = $request['amount'];
        $projectSponsorship->returns =  $request['returns'];
        $projectSponsorship->project_id = $project->id;
        $projectSponsorship->due_date = Carbon::now()->addMonth($projectDuration);

        if(!Auth::user()->sponsoredProjects()->save( $projectSponsorship)){
            Session::flash('error', 'Project Not Sponsored');
            return redirect()->back();
        };

        $data['amount'] = $request->amount;
        return view('projects.sponsorship_payment', $data);
    }

    public function sponsoredProjects(User $user)
    {
        $projectsubscriptions =  ProjectSubscription::whereUserId(Auth::id())->paginate(10);

        if($projectsubscriptions->count() == 0){
            Session::flash('info', 'You have not sponsored any project yet!');
            return redirect()->back();
        }
        $data['projectsubscriptions'] = $projectsubscriptions;
        return view('projects.user.sponsored', $data);
    }

    public function sponsorReturns(Project $project, $amount)
    {
        $amount = filter_var($amount, FILTER_SANITIZE_NUMBER_INT);
        $percentageReturns = ($amount * $project->returnsPercentage) + $amount;

        return $percentageReturns;
    }

    public function subscriptionStatus(ProjectSubscription $subscription, $status)
    {
        if($subscription->status_id != $status){
            $subscription->update([
                'status_id' => $status
            ]);
            return "Project status updated";
        }

        return "Project status already updated with that value";
    }

    public function increaseProjectHit($project)
    {
        return $project;
    }

    public function checkSponsorshipAmountRemaining( $project )
    {
        $projectAmountSubscribed = ProjectSubscription::whereProjectId($project->id)->pluck('amount')->all();
        $projectAmountSubscribed = array_sum($projectAmountSubscribed);

        return $project->amount - $projectAmountSubscribed;
    }

    public function filterByProjectSubscribers($project){
        $data['projectSponsors'] = ProjectSubscription::whereProjectId($project)->paginate(9);
        // return $data;
        return view('admin.projects.sponsors', $data);

    }
}
