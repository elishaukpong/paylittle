@extends('layouts.dashboardclean')

@section('content')
<div class="jumbotron text-center project-jumbotron ">
    <div class="jumbotron-cover py-4">
        <h1 class="font-weight-bold text-white ">Project Details</h1>
    </div>
</div>

<div class="mt-5 pt-4"></div>
<div class="container my-4">
    <div class="row">
        <div class="col-md-6 col-12">
            <img class="card-img-top img-fluid img-thumbnail" src="{{asset($project->photo->projectavatar)}}" alt="Card image cap">
        </div>

       <div class="col-md-5 col-12 offset-md-1 text-secondary mt-lg-4">
           <div class="row my-4">
                <div class="col-6">
                    <h5 class="text-primary font-weight-bold">Project Name: </h5>
                    <p class="projectname"> {{$project->name}}</p>
                </div>

                <div class="col-6">
                    <h5 class="text-primary font-weight-bold">Project Amount: </h5>
                    <p> {{$project->formattedamount}}</p>
                </div>
            </div>

           <div class="row my-4">
                <div class="col-6">
                    <h5 class="text-primary font-weight-bold">Project Duration: </h5>
                    <p>{{$project->duration->formattedTimeline}}</p>
                </div>

                <div class="col-6">
                    <h5 class="text-primary font-weight-bold">Project Returns: </h5>
                    <p class="mr-5 pr-5 text-justify"> {{$project->formattedreturnspercentage}}<p>
                </div>
            </div>

            <div class="row my-4">
                <div class="col-12">
                    <h5 class="text-primary font-weight-bold">Project Details: </h5>
                    <p class=" text-justify" style="word-break: break-word"> {{$project->details}}
                        <p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <a href="#" class="px-5 pb-0 mb-0 status form-control btn btn-outline-{{$project->status->name == "Accepted" ? 'success' : 'danger'}}"><small>Project {{$project->status->name}}</small></a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-12">
                    <a  use="{{$project->id}}" class="form-control btn btn-success project-status text-white" id="accepted">Approved Project</a>
                </div>
                <div class="col-md-6 col-12">
                    <a  use="{{$project->id}}" class="form-control btn btn-danger project-status text-white" id="rejected">Reject Project</a>
                </div>
            </div>


        </div>
    </div>
</div>

@endsection
