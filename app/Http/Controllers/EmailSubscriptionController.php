<?php

namespace App\Http\Controllers;

use App\Models\EmailSubscription;
use Illuminate\Http\Request;

class EmailSubscriptionController extends Controller
{

    public function subscribe(Request $request)
    {
        if (!EmailSubscription::create($request->except('token'))) {
            $request->session()->flash('error', 'Can\'t Subscribe at the moment');
            return redirect()->back() ;
        };
        $request->session()->flash('success', 'Email Subscribed Successfully');
        return redirect()->back();
    }
}
