<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\Duration;
use App\Models\RepaymentPlan;
use App\Http\Requests\CreateProjectRequest;
use App\Models\Project;
use App\Models\Photo;
use Ramsey\Uuid\Uuid;
use \Illuminate\Support\Facades\Storage;


class ProjectController extends Controller
{
    protected $newImageName;
    protected $previousImageName;

    public function __construct()
    {
        $this->middleware(['auth','verified'])->except(['index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['projects'] = Project::paginate(12);
        $data['count'] = Project::all()->count();
        $data['user'] = Auth::user();
        return view('dashboard.allprojects', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['user'] = Auth::user();
        $data['durations'] = Duration::all();
        $data['repaymentPlans'] = RepaymentPlan::all();
        return view('dashboard.addProject', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $data['project'] = $project;
        $data['user'] = Auth::user();
        $data['durations'] = Duration::all();
        $data['repaymentPlans'] = RepaymentPlan::all();
       return view('dashboard.viewProject', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $data['user'] = Auth::user();
        $data['durations'] = Duration::all();
        $data['repaymentPlans'] = RepaymentPlan::all();
        $data['project'] = $project;
        return view('dashboard.editProject', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $request->session()->flash('success','Project Updated Successfully');
        return redirect()->route('userProjects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
}
