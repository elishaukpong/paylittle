@extends('layouts.admindashboard')
@section('notifications')
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="p-c font-weight-light"> All Projects <small class="badge badge-pill badge-primary h6">{{$allprojectscount}}</small></h1>
            <hr>
        </div>
    </div>
</div>

<div class="container my-4">
    <div class="row">
        @forelse ($allprojects as $project)
            <div class="col-md-4 col-12 mt-3">
                <div class="card">
                    <img class="card-img-top" src="{{asset($project->photo->projectavatar)}}" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-title font-weight-bold p-c">{{$project->name}}</p>
                        <p class="card-text">{{$project->shortDetails}}</p>
                        <hr class="dahsboard-border">
                        <p>Created by: <a href="{{route('admin.showuser', $project->user->id)}}" class="">{{$project->user->first_name}}</a></p>
                        <a href="{{route('admin.showproject', $project->id)}}" class="btn btn-primary text-white form-control">View Project</a>
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
            {{$allprojects->links()}}
        </div>
    </div>
</div>
@endsection
