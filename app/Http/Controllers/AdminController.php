<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectSubscription;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $data['usercount'] = User::all()->count();
        $data['user'] = Auth::user();
        $data['projectcount'] = Project::all()->count();
        $data['subscriptioncount'] = ProjectSubscription::all()->count();
        return view('admin.adminhome', $data);
    }

    public function showUsers()
    {
        $data['users'] = User::paginate(9);
        return view('admin.showusers', $data);
    }

    public function filterByUser(User $user)
    {
        $data['user'] = $user;
        $data['projects'] = Project::whereUserId($user->id)
                            ->orderBy('created_at', 'desc')
                            ->paginate(3);
        return view('admin.userprojects', $data);
    }

    public function filterByUserProjects(User $user)
    {
        $data['user'] = $user;
        $data['projects'] = Project::whereUserId($user->id)
                            ->orderBy('created_at', 'desc')
                            ->paginate(9);

        return view('admin.viewuserprojects', $data);
    }

    public function filterByProject(Project $project)
    {
        $data['project'] = $project;
        return view('admin.viewproject', $data);
    }

    public function updateStatus(Project $project, $status)
    {
        if($status != "accepted"){
            $project->update([
                'status_id' => 3,
            ]);
        return 'Project was rejected successfully!';
        }

        $project->update([
            'status_id' => 2,
        ]);

        return 'Project was accepted Successfully!';
    }

    public function showProjects()
    {
        $data['allprojects'] = Project::paginate(9);
        $data['allprojectscount'] = Project::all()->count();
        return view('admin.allprojects', $data);
    }

    public function subscriptions()
    {
        $data['projectsubscriptions'] = ProjectSubscription::paginate(9);
        $data['statuses'] = Status::all();
        return view('admin.subscribedprojects', $data);
    }
}
