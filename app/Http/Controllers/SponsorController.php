<?php

namespace App\Http\Controllers;

use App\User;
use Ramsey\Uuid\Uuid;
use App\Models\Sponsor;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\ProjectSubscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;




class SponsorController extends Controller
{


    public function sponsorProject(Request $request, Project $project)
    {
        $userId = Auth::user()->id;
        $data['id'] = Uuid::uuid1();
        $data['amount'] = $request['amount'];       //validate this bro!
        $data['user_id'] = $userId;
        $data['project_id'] = $project->id;

        ProjectSubscription::create($data);
        return redirect()->route('view.sponsor', $userId)->with('success', 'Project Sponsored');
    }

    public function sponsoredProjects(User $user)
    {
        $data['user'] = $user;
        $data['projectsubscriptions'] =  ProjectSubscription::whereUserId($user->id)->get();

        return view('dashboard.showsponsored', $data);
    }

}
