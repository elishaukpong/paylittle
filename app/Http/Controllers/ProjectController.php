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
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function filterBy(User $user){
        $data['user'] = $user;
        $data['projects'] = Project::whereUserId($user->id)->paginate(10);
        return view('dashboard.userprojects', $data);
    }
}
