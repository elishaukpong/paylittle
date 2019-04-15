<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\User;
use App\Models\Hits;
use App\Models\Photo;
use Ramsey\Uuid\Uuid;
use App\Models\Project;
use App\Models\Duration;
use App\Models\Guarantor;
use App\Models\RepaymentPlan;
use App\Models\sponsorshipAmount;
use App\Models\ProjectSubscription;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;


class ProjectController extends Controller
{
    protected $previousImageName;
    protected $amountSubscribed;

    public function __construct()
    {
        $this->middleware([ 'auth', 'verified', 'checkbvn' ])->except([ 'index', 'show' ]);
    }


    public function index()
    {
        $count    = Project::whereStatusId(2)->count();
        $projects = Project::where('user_id', '!=', Auth::id())->whereStatusId(2)->paginate(12);

        if(Auth::user() && $count == 0){
            Session::flash('info', 'No sponsorable project yet!');
            return redirect()->back();
        }

        // preparing data for passing into view
        $data['projects'] = $projects;
        $data['count'] = $count;

        return view('projects.index', $data);
    }


    public function create()
    {
        $durations = Duration::all();
        $guarantors = Guarantor::whereUserId(Auth::id())->get();
        $repaymentPlans = RepaymentPlan::all();

        if($guarantors->count() == 0){
            Session::flash('info', 'Create at least one Guarantor first!');
            return redirect()->back();
        }

        // preparing data for passing into view
        $data['durations'] = $durations;
        $data['guarantors'] = $guarantors;
        $data['repaymentPlans'] = $repaymentPlans;

        return view('projects.create', $data);
    }

    public function store( CreateProjectRequest $request )
    {
        // Create New Project
        $newProject = new Project;
        $newProject->id = Uuid::uuid1();
        $newProject->name = $request->name;
        $newProject->slug = $this->generateSlug($request->name);
        $newProject->amount = $request->amount;
        $newProject->details = $request->details;
        $newProject->location = $request->location;
        $newProject->duration_id = $request->duration_id;
        $newProject->repayment_id = $request->repayment_id;
        $newProject->guarantor_id = $request->guarantor_id;

        if (!Auth::user()->projects()->save($newProject))
        {
            Session::flash('error', 'Could not create project');
            return redirect()->back()->withInput();
        }

        // Image Upload
        $image = $request->file('avatarobject');
        $imageName = str_slug($request->name) . '.' . time() . '.' . $image->getClientOriginalExtension();

        $newProjectImage = new Photo;
        $newProjectImage->avatar = $imageName;
        $newProjectImage->imageable_id = $newProject->id;
        $newProjectImage->imageable_type = $newProject->model;

        $request->avatarobject->storeAs('public/avatars/projects', $imageName);
        $newProjectImage->save();

        Session::flash('success', 'Project Created Successfully');
        return redirect()->route('clientarea');
    }

    public function generateSlug($projectName){
        do {
            //generate a random slug using Laravel's str_slug and str_random helper
            $slug = str_slug($projectName) . '_' . str_random(4);
        } //check if the slug already exists and if it does, try again
        while (Project::where('slug', $slug)->first());

        return $slug;
    }

    public function show( $projectSlug )
    {
        $data['project'] = Project::whereSlug($projectSlug)->first();
        $data['durations'] = Duration::all();
        $data['repaymentPlans'] = RepaymentPlan::all();
        $data['amountremaining']  = $this->checkSponsorshipAmountRemaining($data['project']);
        $data['sponsorshipAmounts'] = sponsorshipAmount::all();

        return view('projects.show', $data);
    }




    public function edit( Project $project )
    {
        $data['project']        = $project;
        $data['durations']      = Duration::all();
        $data['repaymentPlans'] = RepaymentPlan::all();

        return view('projects.edit', $data);
    }

    public function update( UpdateProjectRequest $request, $id )
    {
        $project = Project::findOrFail($id);
        $project->update($request->except([ '_token' ]));

        //Image Upload
        if($request->hasFile('avatarobject')){

            $previousImage = public_path() . $project->photo->projectavatar;

            $image = $request->file('avatarobject');
            $imageName = str_slug($request->name) . '.' . time() . '.' . $image->getClientOriginalExtension();
            $request->avatarobject->storeAs('public/avatars/projects', $imageName);

            if(file_exists($previousImage)){
                unlink($previousImage);
            }

            $project->photo()->update([
                'avatar' => $imageName
            ]);

        }

        if (!$project){
            Session::flash('error', 'Could not update project');
            return redirect()->route('project.show', $project->id);
        }

        Session::flash('success', 'Project Updated');
        return redirect()->route('project.show', $project->id);
    }

    public function delete( Project $project )
    {
        //implement a feature that checks if project has sponsorship already, if it does, it can't be deleted
        $project->delete();

        Session::flash('success', 'Project Thrashed Successfully');
        return redirect()->back();
    }

    public function filterByUser()
    {

        $allUserProjects = Auth::user()->projects()->paginate(9);
        $thrashedUserProjects =  Project::onlyTrashed()->whereUserId(Auth::id())->paginate(9);
        $pendingUserProjects = Auth::user()->projects()->whereStatusId(1)->paginate(9);
        $approvedUserProjects = Auth::user()->projects()->whereStatusId(2)->paginate(9);
        $rejectedUserProjects = Auth::user()->projects()->whereStatusId(3)->paginate(9);

        if($allUserProjects->count() == 0){
            Session::flash('info', 'You have not created any project yet!');
            return redirect()->back();
        }

        $data['allUserProjects'] = $allUserProjects;
        $data['thrashedUserProjects'] = $thrashedUserProjects;
        $data['pendingUserProjects'] = $pendingUserProjects;
        $data['approvedUserProjects'] = $approvedUserProjects;
        $data['rejectedUserProjects'] = $rejectedUserProjects;

        return view('projects.user.created', $data);
    }

    public function restoreProject($project){
        Project::onlyTrashed()->find($project)->restore();

        Session::flash('success', 'Project Restored Successfully');
        return redirect()->back();
    }

    public function destroy( $project ){
        Project::onlyTrashed()->find($project)->forceDelete();

        Session::flash('success', 'Project Deleted Permanently');
        return redirect()->back();
    }

    public function trashedProjects(){
        $data['projects'] = Project::onlyTrashed()->whereUserId(Auth::id())->paginate(9);
        return view('projects.trashed',$data);
    }



    public function increaseProjectHit( Project $project )
    {
        $hits = Hits::whereProjectId($project->id)->get();

        if (count($hits) != 1)
        {
            $data['project_id'] = $project->id;
            $data['count']      = 1;
            Hits::create($data);
            return;
        }

        $updatedHit = $hits->first()->count += 1;

        $hits->first()->update([
            'count' => $updatedHit,
        ]);
        return;

    }

    public function checkSponsorshipAmountRemaining( $project )
    {
        // $project   = Project::findOrfail($project);
        $projectSubscriptionAmount = ProjectSubscription::whereProjectId($project)->pluck('amount');
        $projectSubscriptionAmount->each(function ( $amount ) {
            $this->amountSubscribed += $amount;
        });

        return $project->amount - $this->amountSubscribed;
    }

    public function ProjectsHistory( ){
        $projects = Project::whereUserId(Auth::id())->get();
        $subscriptions = ProjectSubscription::whereUserId(Auth::id())->get();

        if($projects->count() == 0){
            Session::flash('info', 'You must have atleast one project.');
            return redirect()->back();
        }

        $data['allProjects'] = $projects->merge($subscriptions)->sortByDesc('created_at');
        return view('projects.history', $data);
    }


}
