@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="p-c font-weight-light">View Project</h1>
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
                <p> {{$project->name}}</p>
            <h5>Project Amount: </h5>
                <p> {{$project->amount}}</p>
            <h5>Project Details: </h5>
                <p class="mr-5 pr-5 text-justify"> {{$project->details}}<p>
            <h5>Tags</h5>
            <a href="#" class="btn btn-sm btn-outline-primary"><small>Real Estate</small></a>
            <a href="#" class="btn btn-sm btn-outline-secondary"><small></small>PayLittle</a>
            <a href="#" class="btn btn-sm btn-outline-danger "><small>Personal</small></a>

            <h5 class="mt-3">Status:</h5>
            <a href="#" class="btn btn-sm btn-outline-{{$project->status->status == "accepted" ? 'success' : ($project->status->status == "pending" ? 'secondary':'danger')}}"><small>Project {{$project->status->status}}</small></a>

        </div>
    </div>
    <hr class="mt-4">

   
</div>
@endsection
