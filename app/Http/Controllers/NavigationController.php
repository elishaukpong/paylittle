<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function index()
    {
        $data['projectcount'] = Project::all()->count();
        $data['projects'] = Project::limit(6)->get();
        return view('welcome', $data);
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function blog()
    {
        return view('layouts.app');
    }

}
