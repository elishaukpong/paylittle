<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function index()
    {
        return view('welcome');
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
