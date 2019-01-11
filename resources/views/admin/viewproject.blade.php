@extends('layouts.admindashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="p-c font-weight-light">Review {{$project->name}} Project</h1>
            <snmall class="text-secondary"> Created by:  {{$project->user->first_name}} {{$project->user->last_name}}</snmall>
            <hr>
        </div>
    </div>
</div>

<div class="container my-4">
    <div class="row">
        <div class="col-4">
            <img class="card-img-top img-fluid" src="{{asset('storage/avatars/projects/'. $project->avatar)}}" alt="Card image cap">
        </div>
        <div class="col-8">
            <h5>Project Name: </h5>
                <p class="projectname"> {{$project->name}}</p>
            <h5>Project Amount: </h5>
                <p> {{$project->amount}}</p>
            <h5>Project Details: </h5>
                <p class="mr-5 pr-5 text-justify"> {{$project->details}}<p>
            <h5>Tags</h5>
            <a href="#" class="btn btn-sm btn-outline-primary"><small>Real Estate</small></a>
            <a href="#" class="btn btn-sm btn-outline-secondary"><small></small>PayLittle</a>
            <a href="#" class="btn btn-sm btn-outline-danger "><small>Personal</small></a>

            <h5 class="mt-3">Status:</h5>
            <a href="#" class="status btn btn-sm btn-outline-{{$project->status->status == "accepted" ? 'success' : 'danger'}}"><small>Project {{$project->status->status}}</small></a>

        </div>
    </div>
    <hr class="mt-4">

    <div class="container">
        <div class="row">
            <div class="col-8 offset-md-4">
                <a href="#" use="{{$project->id}}" class="btn btn-success btn-sm project-status" id="accepted">Approved Project</a>
                <a href="#" use="{{$project->id}}" class="btn btn-danger btn-sm project-status" id="rejected">Reject Project</a>
                <a href="#" class="btn btn-info btn-sm">Edit Project</a>
                <a href="#" class="btn btn-danger btn-sm">Delete Project</a>
            </div>
        </div>
    </div>



   
</div>

@endsection
