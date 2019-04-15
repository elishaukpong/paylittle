<?php

namespace App\Http\Controllers;

use App\Models\Hits;
use App\Models\Project;
use App\Models\ProjectSubscription;

class NavigationController extends Controller
{
    public function index()
    {
        $data['projects'] = Project::whereStatusId(2)->has('hits')->limit(6)->get();
        return view('navigation.index', $data);
    }

    public function about()
    {
        return view('navigation.about');
    }

    public function contact()
    {
        return view('navigation.contact');
    }

    public function blog()
    {
        return view('layouts.app');
    }

    public function clientarea()
    {
        return view('dashboard.index');
    }

    public function getTotalSponsoredAmount()
    {
        $projectSubscriptions = ProjectSubscription::all();
        $totalSponsoredAmount = 0;
        $totalRaisedAmount = 0;
        foreach ($projectSubscriptions as $key => $project){
            $totalRaisedAmount += $project->amount;
            $totalSponsoredAmount += $project->returns;
        }
        return [
            'sponsored' => number_format($totalSponsoredAmount),
            'raised' => number_format($totalRaisedAmount)
        ];
    }
}
