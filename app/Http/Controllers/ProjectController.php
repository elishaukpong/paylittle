<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Duration;
use App\Models\RepaymentPlan;
use App\Http\Requests\CreateProjectRequest;
use App\Models\Project;
use Ramsey\Uuid\Uuid;
use App\User;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function filterBy(User $user){
        $data['user'] = $user;
        $data['projects'] = Project::whereUserId($user->id)->paginate(10);
        return view('dashboard.userprojects', $data);
    }
}
