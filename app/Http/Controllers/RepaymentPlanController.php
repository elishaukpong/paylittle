<?php

namespace App\Http\Controllers;

use Session;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use App\Models\RepaymentPlan;

class RepaymentPlanController extends Controller
{
    public function index(){
        $data['repaymentplans'] = RepaymentPlan::all();
        return view('admin.repayments', $data);
    }

    public function store(Request $request)
    {
        $rules = [
            'timeline' => 'string'
        ];
        $this->validate($request, $rules);
        $request['id'] = Uuid::uuid1();

        RepaymentPlan::create($request->except('_token'));
        Session::flash('success', 'Duration Created!');
        return redirect()->back();
    }

}
