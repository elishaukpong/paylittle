<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Models\Hits;
use App\Models\Photo;
use Ramsey\Uuid\Uuid;
use App\Models\Project;
use App\Models\Duration;
use App\Models\RepaymentPlan;
use App\Models\sponsorshipAmount;
use App\Models\ProjectSubscription;
use \Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateProjectRequest;



class ProjectController extends Controller
{
    protected $newImageName;
    protected $previousImageName;
    protected $amountSubscribed;

    public function __construct()
    {
        $this->middleware(['auth','verified', 'checkbvn'])->except(['index', 'show']);
    }


    public function index()
    {
        $data['projects'] = Project::whereStatusId(2)->paginate(12);
        $data['count'] = Project::whereStatusId(2)->count();
        $data['user'] = Auth::user();
        return view('dashboard.allprojects', $data);
    }


    public function create()
    {
        $data['user'] = Auth::user();
        $data['durations'] = Duration::all();
        $data['repaymentPlans'] = RepaymentPlan::all();
        return view('dashboard.addProject', $data);
    }

    public function store(CreateProjectRequest $request)
    {

        $request['id'] = Uuid::uuid1();
        $request['user_id'] = Auth::user()->id;
        $project = Project::create($request->except(['_token']));
        $this->storeOrReplaceImage($request, $project);
        if(!$project){
            return redirect()->route('project.create')->with('error','Could not create project');
        }
        return redirect()->route('clientarea')->with('success','Project Created Successfully');
    }


    public function show(Project $project)
    {
        $data['project'] = $project;
        $data['user'] = Auth::user();
        $data['durations'] = Duration::all();
        $data['repaymentPlans'] = RepaymentPlan::all();
        $data['sponsorshipAmounts'] = sponsorshipAmount::all();
        $data['amountremaining'] = $this->checkSponsorshipAmountRemaining($project->id);
//        return $data;
       return view('dashboard.viewProject', $data);
    }


    public function edit(Project $project)
    {
        $data['user'] = Auth::user();
        $data['durations'] = Duration::all();
        $data['repaymentPlans'] = RepaymentPlan::all();
        $data['project'] = $project;
        return view('dashboard.editProject', $data);
    }


    public function update(CreateProjectRequest $request, $id)
    {

        $project = Project::findOrFail($id);
        $project->update($request->except(['_token']));
         if($request->hasFile('avatarobject')){
             $this->storeOrReplaceImage($request, $project,"replace");
        }
        if(!$project){
            $request->session()->flash('error','Could not Update project');
            return redirect()->route('userProjects.show', $project->id);
        }
        return redirect()->route('userProjects.show', $project->id);
    }


    public function destroy(Project $project )
    {
         if(!$project->delete()){
            session()->flash('error','Could not Delete Project');
            return redirect()->route('userProjects.view', Auth::user()->id);
        }
        session()->flash('success','Project Deleted Successfully');
        return redirect()->route('userProjects.view', Auth::user()->id);
    }

    public function filterBy(User $user)
    {
        $data['user'] = $user;
        $data['projects'] = Project::whereUserId($user->id)
                            ->paginate(9);
        return view('dashboard.userprojects', $data);
    }

    // Don't mess around here
    public function storeOrReplaceImage($request, $project, $storeOrReplace = "store" )
    {
        if($storeOrReplace != "store"){
            return $this->replaceImage($request, $project);
        }
        return $this->storeImage($request, $project);
    }

    public function storeImage($request, $project)
    {
        $this->newImageName = Auth::user()->id . "_" . Auth::user()->first_name . "_" . time() . "." . $request->avatarobject->getClientOriginalExtension();
        $request['avatar'] = $this->newImageName;
        $request['imageable_type'] = $project->model;
        $request['imageable_id'] = $project->id;
        if(!$request->avatarobject->storeAs('public/avatars/projects', $this->newImageName)){
            return redirect()->back()->with('error', 'Can\'t save image');
        }
        $photo = Photo::create($request->except(['_token']));
    }

    public function replaceImage($request, $project)
    {
        $this->previousImageName = $project->photo->avatar ?? 'nothing';
        if(Storage::disk('public')->exists("avatars/projects/".$this->previousImageName) && !Storage::disk('public')->delete('avatars/projects/'.$this->previousImageName)){
            return redirect()->back()->with('error', 'Can\'t Process the file at the moment');
        }
        $this->newImageName = Auth::user()->id . "_" . Auth::user()->first_name . "_" . time() . "." . $request->avatarobject->getClientOriginalExtension();
        if(!$request->avatarobject->storeAs('public/avatars/projects', $this->newImageName)){
            return redirect()->back()->with('error', 'Can\'t save image');
        }
        $request['avatar'] = $this->newImageName;
        $project->photo()->update([
            'avatar' => $request['avatar']
        ]);

    }

    public function increaseProjectHit(Project $project)
    {
        $hits = Hits::whereProjectId($project->id)->get();


        if(count($hits) != 1){
            $data['project_id'] = $project->id;
            $data['count'] = 1;
            Hits::create($data);
            return ;
        }

        $updatedHit = $hits->first()->count +=1;

        $hits->first()->update([
            'count' => $updatedHit,
        ]);
        return;

    }

    public function checkSponsorshipAmountRemaining($project)
    {
            $project = Project::findOrfail($project);
            $projectSubscriptionAmount = ProjectSubscription::whereProjectId($project->id)->pluck('amount');
            $projectSubscriptionAmount->each(function($amount){
               $this->amountSubscribed += $amount;
            });
            return $project->amount - $this->amountSubscribed;
    }
}
