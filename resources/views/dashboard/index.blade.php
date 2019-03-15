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
                @if(!$user->hasVerifiedEmail())
                    <div class="alert alert-danger py-3">
                        <p style="margin:0"> Your account is not verified!
                            <a href="{{route('verification.resend')}}"
                               class="btn btn-success btn-sm float-md-right float-none">Resend Verification Link</a>
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="container">

        <div class="row">


            <div class="col-md-4 col-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('userProjects.view')}}" class="project-link">
                            <h5 class="card-title display-1 font-weight-bold p-c">{{$user->projects->count() ?? 0}}</h5>
                            <p class="card-text h5 p-c">Created Projects</p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12 mt-3">
                <div class="card">
                    <a href="{{route('view.sponsor', $user->id)}}" class="project-link">
                        <div class="card-body">
                            <h5 class="card-title display-1 font-weight-bold  p-c">{{$user->sponsoredProjects->count() ?? 0}}</h5>
                            <p class="card-text h5 p-c">Sponsored Projects</p>
                            {{--<hr class="dahsboard-border">--}}
                            {{--<a class="btn btn-primary text-white form-control"--}}
                            {{--                                   href="{{route('view.sponsor', $user->id)}}">View Details</a>--}}

                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-12 mt-3">
                <div class="card">
                <a href="{{route('projects.history')}}" class="project-link">
                        <div class="card-body">
                            <h5 class="card-title display-1 font-weight-bold  p-c">{{$user->totalcount ?? 0}}</h5>
                            <p class="card-text h5 p-c">Project History</p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4 col-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <a href="{{route('guarantor.index', $user->id)}}" class="project-link">
                            <h5 class="card-title display-1 font-weight-bold p-c text-center">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </h5>
                            <hr class="dahsboard-border">
                            <a href="{{route('guarantor.index')}}" class="btn btn-primary text-white form-control">
                                My Guarantors
                            </a>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <a href="{{route('userProjects.all')}}" class="project-link">
                            <h5 class="card-title display-1 font-weight-bold p-c text-center">
                                <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                            </h5>
                            <hr class="dahsboard-border">
                            <a href="{{route('userProjects.all')}}" class="btn btn-primary text-white form-control">Sponsor
                                Projects</a>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <a href="{{route('project.create')}}">
                            <h5 class="card-title display-1 font-weight-bold p-c text-center">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </h5>
                            <hr class="dahsboard-border">
                            <a href="{{route('project.create')}}" class="btn btn-primary text-white form-control">Create
                                Project</a>
                        </a>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
