<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function index()
    {
        $data['projects'] = Project::limit(6)->get();
        return view('welcome', $data);
    }
    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return 3;
    }

    public function sponsor()
    {
        return view('benefactor');
    }
    public function paylittler()
    {
        return view('paylittler');
    }
    public function createBenefactor(Request $request)
    {
        return $request;
    }
}
