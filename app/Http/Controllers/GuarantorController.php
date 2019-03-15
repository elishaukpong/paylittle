<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Guarantor;
use Illuminate\Http\Request;

class GuarantorController extends Controller
{
    /**
     * GuarantorController constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['guarantors'] = Guarantor::paginate(9);
        return view('dashboard.guarantor.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.guarantor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required | string',
            'email' => 'required | email',
        ];
        $this->validate($request, $rules);

        Guarantor::create($request->except('_token'));

        Session::flash('success', 'Guarantor Created Successfully');
        return redirect()->route('guarantor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guarantor  $guarantor
     * @return \Illuminate\Http\Response
     */
    public function show(Guarantor $guarantor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guarantor  $guarantor
     * @return \Illuminate\Http\Response
     */
    public function edit(Guarantor $guarantor)
    {
        $data['guarantor'] = $guarantor;
        return view('dashboard.guarantor.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guarantor  $guarantor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guarantor $guarantor)
    {
        $rules = [
            'name' => 'required | string',
            'email' => 'required | email',
        ];
        $this->validate($request, $rules);
        $guarantor->update($request->except(['_token','_method']));
        return redirect()->route('guarantor.index')->with('success', 'Guarantor Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guarantor  $guarantor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guarantor $guarantor)
    {
        $guranteedProjects = $guarantor->projects;

        foreach($guranteedProjects as $guranteedProject){
            if($guranteedProject->status == 2 ){
                Session::flash('error', 'You cannot delete a gurantor when the projects he is guranteeing is not completed.');
                return redirect()->back();
            }
        }
        $guarantor->delete();
        Session::flash('success', 'Guarantor Deleted');
        return redirect()->back();
    }
}
