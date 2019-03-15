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
        $this->middleware(['auth'])->except(['sponsorReturns']);
    }

    public function sponsorProject(Request $request, Project $project)
    {
        $request['amount'] = filter_var($request['amount'], FILTER_SANITIZE_NUMBER_INT);

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
        $request['id'] = Uuid::uuid1();
        $request['user_id'] = Auth::user()->id;
        $request['project_id'] = $project->id;
        $request['due_date'] = Carbon::now()->addMonth($projectDuration);

        if(!ProjectSubscription::create($request->except(['_token']))){
            Session::flash('error', 'Project Not Sponsored');
            return redirect()->route('view.sponsor', Auth::user()->id);
        };

        $data['amount'] = $request->amount;
        return view('bankdetails', $data);
    }

    public function sponsoredProjects(User $user)
    {
        $data['user'] = $user;
        $data['projectsubscriptions'] =  ProjectSubscription::whereUserId($user->id)->paginate(10);
        if($data['projectsubscriptions']->count() == 0){
            Session::flash('info', 'You have not sponsored a project yet!');
            return redirect()->back();
        }
        return view('dashboard.projects.showsponsored', $data);
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
}
