<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsor;
use App\User;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;


class SponsorController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function createSponsor(Request $request)
    {
        $request['id'] = Uuid::uuid1();
        $request['password'] = 'secret';
        $string = 'qwertyuiopasdfghjklzxcvbnm1234567890';
        $request['verification_string'] = str_shuffle($string);
        $validRequest = $request->except(['_token']);

        $validator = Validator::make($validRequest, [
            'name' => 'required|max:255|min:6',
            'email' => 'required|unique:users,email|max:255',
            'phone' => 'required|min:11|max:13',
            'amount' => 'required',
            'duration' => 'required'
        ]);
      
        if ($validator->fails()) {
            return redirect('sponsor')
                ->withErrors($validator)
                ->withInput();
        }
        User::create($validRequest);
        return redirect()->back();
    }

}
