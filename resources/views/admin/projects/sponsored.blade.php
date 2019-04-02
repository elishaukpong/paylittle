@extends('layouts.dashboardclean')

    @section('content')
     <div class="jumbotron text-center bg-primary">
        <div class="jumbotron-cover py-4">
            <h1 class="font-weight-bold text-white ">Subscribed Projects </h1>
        </div>
    </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        @foreach($projects as $project)
                            <div class="col-md-6 col-12 my-2">
                                <div class="card">
                                    <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <img src="{{asset($project->photo->projectavatar)}}" class="img-fluid show-user-image img-thumbnail" alt="">
                                        </div>
                                        <div class="col-md-8 col-12 text-dark">
                                            <h3>{{$project->name}}</h3>
                                            <h5>{{$project->formattedamount}}</h5>
                                            <h5><i class="fa fa-calendar mr-2" aria-hidden="true"></i> {{$project->duration->formattedtimeline}}</h5>
                                            <p ><i class="fa fa-users mr-2" aria-hidden="true"></i> {{$project->subscription_count}} Sponsors</p>
                                            <a href="{{route('admin.show.subscribers', $project->id)}}" class="btn btn-sm btn-outline-success">View Subscribers</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="row my-4 text-center">
                        <div class="col-md-3 col-12 mx-auto ">
                            {{$projects->links()}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endsection
