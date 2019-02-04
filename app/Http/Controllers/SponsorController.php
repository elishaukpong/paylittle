<?php

namespace App\Http\Controllers;

use App\User;
use Ramsey\Uuid\Uuid;
use App\Models\Sponsor;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\ProjectSubscription;
use Illuminate\Support\Facades\Auth;
use App\Models\Status;
use App\Http\Requests\SponsorshipRequest;




class SponsorController extends Controller
{

    public function __construct()
    {
//        $this->middleware(['auth']);
    }

//    public function sponsorProject(SponsorshipRequest $request, Project $project)
//    {
//        return $request;
//        $request['id'] = Uuid::uuid1();
//        $request['user_id'] = Auth::user()->id;
//        $request['project_id'] = $project->id;
//
//        if(!ProjectSubscription::create($request->except(['_token']))){
//            return redirect()->route('view.sponsor', Auth::user()->id)->with('error', 'Project Not Sponsored');
//        };
//        return redirect()->route('view.sponsor', Auth::user()->id)->with('success', 'Project Sponsored');
//    }

    public function sponsorProject(Request $request, Project $project)
    {
        $request['id'] = Uuid::uuid1();
        $request['user_id'] = Auth::user()->id;
        $request['project_id'] = $project->id;
//        $request['returns'] =

        if(!ProjectSubscription::create($request->except(['_token']))){
            return redirect()->route('view.sponsor', Auth::user()->id)->with('error', 'Project Not Sponsored');
        };
        return redirect()->route('view.sponsor', Auth::user()->id)->with('success', 'Project Sponsored');
    }
    public function sponsoredProjects(User $user)
    {
        $data['user'] = $user;
        $data['projectsubscriptions'] =  ProjectSubscription::whereUserId($user->id)->get();

        return view('dashboard.showsponsored', $data);
    }

    public function sponsorReturns(Project $project, $amount)
    {
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
}
