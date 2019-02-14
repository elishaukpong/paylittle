@extends('layouts.dashboard')
    @section('notifications')
        @include('inc.alerts')
    @endsection
    
    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
            <h1 class="p-c font-weight-light"> Welcome, {{$user->first_name}}</h1>
            <hr>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="row">


            <div class="col-md-4 col-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title display-1 font-weight-bold p-c">{{$user->projects->count() ?? 0}}</h5>
                        <p class="card-text h5 p-c">Created Projects</p>
                        <hr class="dahsboard-border">
                        <a href="{{route('userProjects.view', $user->id)}}" class="btn btn-primary text-white form-control">View Details</a>
                    </div>
                </div>
            </div>
                
                <div class="col-md-4 col-12 mt-3">
                   <div class="card">
                        <div class="card-body">
                            <h5 class="card-title display-1 font-weight-bold  p-c">{{$user->sponsoredProjects->count() ?? 0}}</h5>
                            <p class="card-text h5 p-c">Sponsored Projects</p>
                            <hr class="dahsboard-border">                            
                            <a class="btn btn-primary text-white form-control" href="{{route('view.sponsor', $user->id)}}">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12 mt-3">
                   <div class="card">
                        <div class="card-body">
                            <h5 class="card-title display-1 font-weight-bold  p-c">{{$user->totalcount ?? 0}}</h5>
                            <p class="card-text h5 p-c">Sponsorship History</p>
                            <hr class="dahsboard-border">
                            <a class="btn btn-primary text-white form-control">View Details</a>
                        </div>
                    </div>
                </div>

            <div class="col-md-4 col-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <h5 class="card-title display-1 font-weight-bold p-c text-center">
                            <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                        </h5>
                        <hr class="dahsboard-border">
                        <a href="{{route('userProjects.all')}}" class="btn btn-primary text-white form-control">Sponsor Projects</a>
                    </div>
                </div>
            </div>

                <div class="col-md-4 col-12 mt-3">
                   <div class="card">
                        <div class="card-body">
                            <br>
                            <h5 class="card-title display-1 font-weight-bold p-c text-center">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </h5>
                            <hr class="dahsboard-border">
                            <a href="{{route('project.create')}}" class="btn btn-primary text-white form-control">Create Project</a>
                        </div>
                    </div>
                </div>

               
        </div>
    </div>
@endsection
