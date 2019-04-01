<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use App\Models\Photo;
use App\Models\States;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware([ 'auth', 'verified' ]);
    }

    public function show($userId = null)
    {
        $data['users'] = Auth::user();
        $data['projects'] = Project::whereUserId(Auth::id())->orderBy('created_at', 'desc')->take(3)->get();
        return view('user.show', $data);
    }


    public function edit($userSlug)
    {
        return view('user.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update( UpdateUserRequest $request)
    {
        $user = Auth::user();
         //Image Upload
        if($request->hasFile('avatarobject')){

            $previousImage = public_path() . $user->photo->useravatar;

            $image = $request->file('avatarobject');
            $imageName = str_slug($request->name) . '.' . time() . '.' . $image->getClientOriginalExtension();
            $request->avatarobject->storeAs('public/avatars/users', $imageName);

            if(file_exists($previousImage)){
                unlink($previousImage);
            }

            $user->photo()->update([
                'avatar' => $imageName
            ]);

        }


        if (!$user->update($request->except([ '_token', '_method' ])))
        {
            Session::flash('error', 'Could not Update User!');
            return redirect()->back()->with('error', 'couldn\'t update user');
        };

        Session::flash('success', 'Updated User Successfully!');
        return redirect()->route('user.show');
    }

    public function destroy( $id )
    {
        //
    }

    public function continuereg()
    {
        $data['states'] = States::all();
        return view('auth.register-second', $data);
    }

    public function continueregSave( Request $request )
    {
        $this->validate($request, [
            'state_id' => 'required|integer',
            'localgovernmentarea_id' => 'required | integer',
            'city' => 'required | string | min:5',
            'address' => 'required | string'
        ]);

        $user = Auth::user();
        $user->update($request->except('token'));
        return redirect()->route('projects.index');
    }

    public function getLgaByState( States $state )
    {
        return $state->lga;
    }
}
