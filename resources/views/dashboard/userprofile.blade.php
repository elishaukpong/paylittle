@extends('layouts.admindashboard')
@section('notifications')
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class=" col-12">
            <h1 class="p-c font-weight-light">{{$user->first_name}}'s Profile</h1>
        </div>
            <div class="col-md-10">
                @if(Auth::user()->id == $user->id)
                    <a href="{{route('user.edit', $user->id)}}" class="float-right btn btn-xl badge-pill badge-primary">Edit</a>
                @endif
                <hr>
            </div>

</div>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-12 my-5 my-md-3">
            <img class="card-img-top img-fluid" src="{{asset('storage/avatars/users/'. $user->avatar)}}" alt="Card image cap">
        </div>
        <div class="col-md-8 col-12 my-md-3">
          
            <div class="row">
                <div class="col-6">
                    <h5>Full Name: </h5>
                    <p> {{$user->first_name}} {{$user->last_name}}</p>
                    <h5 class="mt-4">About: </h5>
                    <p class="mr-5 pr-5 text-justify"> {{$user->details}}</p>
                    <h5 class="mt-4">Account Status:</h5>
                    <p class="btn btn-sm btn-outline-{{$user->email_verified_at  == null ? 'danger' :'success'}}">{{$user->email_verified_at  == null ? 'Not Verified' :'Verified'}}</small></p>
                </div>
                <div class="col-6">
                    <h5>Phone Number: </h5>
                    <p class="mr-5 pr-5 text-justify"> {{$user->phone}}<p>
                    <h5 class="mt-4">Gender: </h5>
                    <p> {{$user->gender}}</p>
                    <h5 class="mt-5 pt-5">Joined:</h5>
                    <p> {{$user->created_at->diffForHumans()}}</p>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="p-c font-weight-light">Recent Projects</h1>
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
    <div class="row my-5 text-center">
        <div class="col-md-3 col-12 mx-auto py-3">
            @if(Auth::user()->id == $user->id)
                <a href="{{route('userProjects.view', $user->id)}}" class="btn btn-outline-primary form-control">Show More</a>
            @endif
        </div>
    </div>
</div>
@endsection
