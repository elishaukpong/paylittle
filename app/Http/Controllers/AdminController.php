<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectSubscription;
use App\Models\Status;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin','verified']);
    }

    public function index()
    {
        $data['usercount'] = User::all()->count();
        $data['projectcount'] = Project::all()->count();
        $data['subscriptioncount'] = ProjectSubscription::all()->count();
        return view('admin.index', $data);
    }

    public function showUsers()
    {
        $data['users'] = User::where('id', '!=', Auth::id())->paginate(9);
        return view('admin.users', $data);
    }

    public function filterByUser($userSlug)
    {
        $user = User::whereSlug($userSlug)->get()->first();
        $data['projects'] = Project::whereUserId($user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(3);

        $data['users'] = $user;
        return view('user.show', $data);
    }

    public function filterByUserProjects($userSlug)
    {
        $user = User::whereSlug($userSlug)->get()->first();
        $data['projects'] = Project::whereUserId($user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        $data['users'] = $user;

        return view('admin.userprojects', $data);
    }

    public function filterByProject(Project $project)
    {
        $data['project'] = $project;
        return view('admin.projects.show', $data);
    }

    public function updateStatus(Project $project, $status)
    {
        if ($status != "accepted") {
            $project->update([
                'status_id' => 3,
            ]);
            return 'Project was rejected successfully!';
        }

        $project->update([
            'status_id' => 2,
        ]);

        return 'Project was accepted successfully!';
    }

    public function showProjects()
    {
        $allUserProjects = Project::paginate(9);
        $thrashedUserProjects =  Project::onlyTrashed()->paginate(9);
        $pendingUserProjects = Project::whereStatusId(1)->paginate(9);
        $approvedUserProjects = Project::whereStatusId(2)->paginate(9);
        $completedUserProjects = Project::whereStatusId(4)->paginate(9);

        $rAndFUserProjects  = Project::whereStatusId(3)->orWhere('status_id','5')->paginate(9);

        if($allUserProjects->count() == 0){
            Session::flash('info', 'No user created project yet!');
            return redirect()->back();
        }

        $data['allUserProjects'] = $allUserProjects;
        $data['thrashedUserProjects'] = $thrashedUserProjects;
        $data['pendingUserProjects'] = $pendingUserProjects;
        $data['approvedUserProjects'] = $approvedUserProjects;
        $data['completedUserProjects'] = $completedUserProjects;
        $data['rAndFUserProjects'] =  $rAndFUserProjects;

        return view('admin.projects.index', $data);
    }

    public function subscriptions()
    {
        $data['projects'] = Project::has('subscription')->withCount('subscription')->paginate(8);
        $data['statuses'] = Status::all();
        // return $data;
        return view('admin.projects.sponsored', $data);
    }
}
