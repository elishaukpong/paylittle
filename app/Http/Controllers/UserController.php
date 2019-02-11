<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Photo;
use App\Models\Project;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller {
    protected $newImageName;
    protected $previousImageName;

    public function __construct()
    {
        $this->middleware([ 'auth', 'verified' ]);
    }

    public function show( User $user )
    {
        $data['user'] = $user;
        $data['projects'] = Project::whereUserId($user->id)->orderBy('created_at', 'desc')->take(3)->get();
        return view('dashboard.userprofile', $data);
    }


    public function edit( User $user )
    {
        $data['user'] = $user;
        return view('dashboard.edituser', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update( UpdateUserRequest $request, User $user )
    {

        if ($request->hasFile('avatarobject'))
        {
            $this->replaceImage($request, $user);
        }

        if (!$user->update($request->except([ '_token', '_method' ])))
        {
            return redirect()->back()->with('error', 'couldn\'t update user');
        };
        return redirect()->route('user.show', $user->id)->with('success', 'Updated User Successfully');
    }

    public function replaceImage( $request, $user )
    {
        $this->previousImageName = $user->avatar !== null ? $user->avatar : 'nothing';

        if (Storage::disk('image')->exists($this->previousImageName) && !Storage::delete($this->previousImageName))
        {
            return redirect()->back()->with('error', 'Can\'t Process the file at the moment');
        }

        $this->newImageName = $user->id . "_" . $user->first_name . "_" . time() . "." . $request->avatarobject->getClientOriginalExtension();

        if (!$request->avatarobject->storeAs('public/avatars/users', $this->newImageName))
        {
            return redirect()->back()->with('error', 'Can\'t save image');
        }
        if (!$this->previousImageName)
        {
            $request['avatar'] = $this->newImageName;
            $request['imageable_type'] = $user->model;
            $request['imageable_id'] = $user->id;
            $photo = Photo::create($request->except([ '_token' ]));
        }
        $request['avatar'] = $this->newImageName;
        $user->photo()->update([ 'avatar' => $request['avatar'] ]);
    }

   
    public function destroy( $id )
    {
        //
    }

    public function continuereg( )
    {
//        Using API to retrieve state content
        $url = 'http://locationsng-api.herokuapp.com/api/v1/states';
//        Initiate Curl
        $ch = curl_init();
//        Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        Set the URL
        curl_setopt($ch, CURLOPT_URL, $url);
//        Execute
        $result=curl_exec($ch);
//        Closing Curl Session
        curl_close($ch);

        $states = json_decode($result, true);
        foreach($states as $key => $state){
            $data['states'][] = $state['name'];
        }
        $data['user'] = Auth::user();
        return view('auth.register-second', $data);
    }
}
