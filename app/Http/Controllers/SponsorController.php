<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use App\Models\Sponsor;
use App\Models\Project;
use App\Models\ProjectSubscription;
use Illuminate\Support\Facades\Auth;
use App\Models\Status;
use App\Http\Requests\SponsorshipRequest;
use Illuminate\Http\Request;


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
            return redirect()->back()->with('error', "Can only take sponsorship upto NGN " . number_format($sponsorshipAmountRemaining) . " at this time!");
        }
      
        $projectDuration =  $project->duration->timeline + 1; //add one month for the money raising phase
        $request['id'] = Uuid::uuid1();
        $request['user_id'] = Auth::user()->id;
        $request['project_id'] = $project->id;
        $request['due_date'] = Carbon::now()->addMonth($projectDuration);
        if(!ProjectSubscription::create($request->except(['_token']))){
            return redirect()->route('view.sponsor', Auth::user()->id)->with('error', 'Project Not Sponsored');
        };
        $data['amount'] = $request->amount;
        return view('bankdetails', $data);
    }

    public function sponsoredProjects(User $user)
    {
        $data['user'] = $user;
        $data['projectsubscriptions'] =  ProjectSubscription::whereUserId($user->id)->paginate(10);

        return view('dashboard.showsponsored', $data);
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
