@extends('layouts.dashboardclean')


@section('content')
    <div class="jumbotron text-center payment-details-jumbotron ">
        <div class="jumbotron-cover py-4">
            <h1 class="font-weight-bold text-white ">Sponsored Projects</h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    @foreach($projectsubscriptions as $project)
                    <div class="col-md-6 col-12 my-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <img src="{{asset($project->project->photo->projectavatar)}}" class="img-fluid show-user-image img-thumbnail" alt="">
                                    </div>
                                    <div class="col-md-8 col-12 text-dark">
                                        <h3 class="mb-3 mt-3 mt-md-0">{{$project->project->name}}</h3>
                                        <p class="mb-0"><span class="font-weight-bold">Amount:</span> {{$project->formattedamount}}</p>
                                        <p class="mb-0"><span class="font-weight-bold">Returns: </span> {{$project->formattedreturns}}</p>
                                        <p class="mb-0"><span class="font-weight-bold">Payout Day: </span> {{$project->due_date->toFormattedDateString()}}</p>
                                    <a class="btn btn-sm text-white px-5 mt-3 btn-{{$project->status->name == 'Accepted' ? 'success' : ($project->status->name == 'Pending' ? 'secondary' : 'danger')}}">{{ $project->status->name}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

                <div class="row my-4 text-center">
                    <div class="col-md-3 col-12 mx-auto ">
                        {{$projectsubscriptions->links()}}
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection
