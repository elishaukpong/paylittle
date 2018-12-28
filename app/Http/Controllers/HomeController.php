<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
// use Ramsey\Uuid\Uuid;
// use Ramsey\Uuid\UuidInterface;
// return Uuid::uuid1();
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
