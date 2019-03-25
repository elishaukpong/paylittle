<?php

namespace App\Http\Controllers;

use App\Models\EmailSubscription;
use Illuminate\Http\Request;

class EmailSubscriptionController extends Controller
{

    public function subscribe(Request $request)
    {

       $this->validate($request, [
           'emails' => 'required | email'
       ]);

        if (!EmailSubscription::create($request->except('token'))) {
            return redirect()->back()->with('error', 'Can\'t Subscribe at the moment');
        };

        return redirect()->back()->with('success', 'Email Subscribed Successfully');

    }
}
