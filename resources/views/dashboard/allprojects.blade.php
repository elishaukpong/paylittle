@extends('layouts.dashboardclean')
@section('notifications')
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="p-c font-weight-light"> All Projects <small class="badge badge-pill badge-primary h6">{{$count}}</small></h1>
            <hr>
        </div>
    </div>
</div>

<div class="container my-4">
    <div class="row">
        @forelse ($projects as $project)
            {{--<div class="col-md-4 col-12 mt-3">--}}
                {{--<img class="card-img-top" src="{{asset($project->photo->projectavatar)}}" alt="Card image cap">--}}
                {{--<div class="card border border-primary">--}}
                    {{--<div class="card-body">--}}
                        {{--<p class="card-title font-weight-bold p-c">{{$project->name}}</p>--}}
                        {{--<p class="card-text">{{$project->shortDetails}}</p>--}}
                        {{--<hr class="dahsboard-border">--}}
                        {{--<p>Created by: <a href="{{route('admin.showuser', $project->user->id)}}" class="">{{$project->user->first_name}}</a></p>--}}
                        {{--<a href="{{route('userProjects.show', $project->id)}}" class="btn btn-primary text-white form-control">View Project</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            <div class="col-md-4 col-12 mt-3">
                <div class="card">
                    <img class="card-img-top img-fluid" src="{{asset($project->photo->projectavatar)}}" alt="Card image cap">
                    <div class="card-body mt-3">
                        <p class="card-title font-weight-bold text-secondary">{{$project->name}}</p>
                        <p class="card-text">{{$project->shortDetails}}</p>
                        <p class="text-right text-primary">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            {{ $project->subscription->count() ? $project->subscription->count(): 0}} Sponsors
                        </p>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{$project->projectsponsorshippercentage}}" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <br>
                        <p class="float-left text-secondary">{{$project->formattedamountsponsored}} <small>Raised</small></p>
                        <p class="float-right text-secondary"><small>Total</small> {{$project->formattedamount}}</p>
                        <br><br>
                        <a href="{{route('userProjects.show', $project->id)}}" class="btn btn-primary form-control text-white">View Project</a>

                    </div>

                </div>

            </div>

        @empty
            <div class="col-md-4 col-12 mt-3">
                <div class="card border border-primary">
                    <div class="card-body text-center">
                        <p class="card-title font-weight-bold p-c">No Project Yet</p>
                        <hr class="dahsboard-border">
                        <a href="" class="btn btn-primary text-white form-control">Create Project</a>
                    </div>
                </div>
            </div>
        @endforelse

    </div>
    <div class="row my-4 text-center">
        <div class="col-md-5 col-12 mx-auto">
            {{$projects->links()}}
        </div>
    </div>
</div>
@endsection
