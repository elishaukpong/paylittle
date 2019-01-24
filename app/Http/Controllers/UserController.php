<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\User;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use App\Models\Photo;

class UserController extends Controller
{
    protected $newImageName;
    protected $previousImageName;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $data['user'] = $user;
        $data['projects'] = Project::whereUserId($user->id)
                            ->orderBy('created_at', 'desc')
                            ->take(3)
                            ->get();
        return view('dashboard.userprofile',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data['user'] = $user;
        return view('dashboard.edituser',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if($request->hasFile('avatarobject')){
            $this->replaceImage($request, $user);
        }
        if(!$user->update($request->except(['_token','_method']))){
            return redirect()->back()->with('error', 'couldn\'t update user');
        };
        return redirect()->route('user.show', $user->id)->with('success', 'Updated User Successfully');
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

    public function replaceImage($request, $user)
    {
        $this->previousImageName = $user->avatar !== null ? $user->avatar :'nothing';

        if(Storage::disk('image')->exists($this->previousImageName) && !Storage::delete($this->previousImageName)){
            return redirect()->back()->with('error', 'Can\'t Process the file at the moment');
        }
        $this->newImageName = $user->id . "_" . $user->first_name . "_" . time() . "." . $request->avatarobject->getClientOriginalExtension();
        $request['avatar'] = $this->newImageName;
        $request['imageable_type'] = $user->model;
        $request['imageable_id'] = $user->id;
        $photo = Photo::create($request->except(['_token']));
        if(!$request->avatarobject->storeAs('public/avatars/users', $this->newImageName)){
            return redirect()->back()->with('error', 'Can\'t save image');
        }
    }
}
