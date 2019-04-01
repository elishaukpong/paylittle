@extends('layouts.dashboardclean')

    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h1 class="p-c font-weight-light"> {{$user->first_name}}, Welcome to the Admin Area</h1>
                    <hr>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-12 mt-3">
                    <div class="card border border-primary">
                        <div class="card-body">
                            <h5 class="card-title display-1 font-weight-bold p-c">{{$usercount}}</h5>
                            <p class="card-text h5 p-c">Users</p>
                            <hr class="dahsboard-border">
                            <a href="{{route('admin.show.users')}}" class="btn btn-primary text-white form-control">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12 mt-3">
                    <div class="card border border-primary">
                        <div class="card-body">
                            <h5 class="card-title display-1 font-weight-bold p-c">{{$projectcount}}</h5>
                            <p class="card-text h5 p-c">Projects</p>
                            <hr class="dahsboard-border">
                            <a href="{{route('admin.showallprojects')}}" class="btn btn-primary text-white form-control">View Projects</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12 mt-3">
                    <div class="card border border-primary">
                        <div class="card-body">
                            <h5 class="card-title display-1 font-weight-bold p-c">{{$subscriptioncount}}</h5>
                            <p class="card-text h5 p-c">Project Subscriptions</p>
                            <hr class="dahsboard-border">
                            <a href="{{route('admin.projectsubscriptions')}}" class="btn btn-primary text-white form-control">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
