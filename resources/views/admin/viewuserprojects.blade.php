@extends('layouts.admindashboard')
@section('notifications')
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="p-c font-weight-light">{{$user->first_name}}'s Projects <span class="badge badge-pill badge-primary">{{$count}}</span></h1>
            {{--<h1 class="p-c font-weight-light">{{$user->first_name}}'s Projects <small class="badge badge-dark h6">{{$user->projects->count()}}</small></h1>--}}
            <hr>
        </div>
    </div>
</div>



<div class="container my-4">
    <div class="row">
        @forelse ($projects as $project)
            <div class="col-md-4 col-12 mt-3">
                <img class="card-img-top" src="{{asset('storage/avatars/projects/'. $project->avatar)}}" alt="Card image cap">
                <div class="card border border-primary">
                    <div class="card-body">                    
                        <p class="card-title font-weight-bold p-c">{{$project->name}}</p>
                        <p class="card-text">{{$project->shortDetails}}</p>
                        <hr class="dahsboard-border">
                        {{--<a href="{{route('userProjects.edit', $project->id)}}" class="btn btn-danger text-white">Edit Project</a>--}}
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
        <div class="col-md-4 col-12 mx-auto">
            {{$projects->links()}}
        </div>
    </div>
</div>
@endsection
