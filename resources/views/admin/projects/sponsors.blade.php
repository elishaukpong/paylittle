@extends('layouts.dashboardclean')

    @section('content')
     <div class="jumbotron text-center bg-primary">
        <div class="jumbotron-cover py-4">
            <h1 class="font-weight-bold text-white ">{{$projectSponsors->first()->project->name}}'s Project Sponsors </h1>
        </div>
    </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        @foreach($projectSponsors as $project)
                            <div class="col-md-6 col-12 my-2">
                                <div class="card">
                                    <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <img src="{{asset($project->user->photo->useravatar)}}" class="img-fluid show-user-image img-thumbnail" alt="">
                                        </div>
                                        <div class="col-md-8 col-12 text-dark">
                                            <h3 class="mb-3">{{$project->user->first_name}} {{$project->user->last_name}}</h3>
                                            <p class="mb-0"><span class="font-weight-bold">Amount:</span> {{$project->formattedamount}}</p>
                                            <p class="mb-0"><span class="font-weight-bold">Returns: </span> {{$project->formattedreturns}}</p>
                                            <p class="mb-0"><span class="font-weight-bold">Payout Day: </span> {{$project->due_date->toFormattedDateString()}}</p>
                                            <a href="#" class="btn btn-sm btn-success px-5 mt-3">Pay Out</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="row my-4 text-center">
                        <div class="col-md-3 col-12 mx-auto ">
                            {{$projectSponsors->links()}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endsection
