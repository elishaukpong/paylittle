@extends('layouts.dashboardclean')

@section('content')
    <div class="jumbotron text-center project-jumbotron ">
        <div class="jumbotron-cover py-4">
            <h1 class="font-weight-bold text-white ">{{$users->first_name}}'s Projects</h1>
        </div>
    </div>

    <div class="container my-4">
        <div class="row">
            @forelse ($projects as $project)
                <div class="col-md-4 col-12 mt-3">
                    <div class="card">
                        <div class="text-content-block">
                            <img class="card-img-top img-fluid project-image-size" src="{{asset($project->photo->projectavatar)}}"
                            alt="Card image cap">
                            <div class="text-content p-3">
                                <p class="card-title font-weight-bold text-white">{{$project->name}}</p>
                                <p class="card-text text-white">{{$project->shortDetails}}</p>
                            </div>
                        </div>
                        <div class="card-body mt-3">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar"
                                     style="width: {{$project->projectsponsorshippercentage}}" aria-valuenow="25"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <br>
                            <p class="float-lg-left text-primary">{{$project->formattedamountsponsored}}
                                <small class="font-weight-bold ">Raised</small>
                            </p>
                            <p class="float-lg-right text-primary">
                                <small class="font-weight-bold text-primary">Total</small> {{$project->formattedamount}}</p>

                            <a href="{{route('project.show', $project->slug)}}"
                               class="btn btn-primary form-control text-white">View Project</a>

                        </div>

                    </div>

                </div>

            @empty
                <div class="col-md-4 col-12 mt-3">
                    <div class="card border border-primary">
                        <div class="card-body text-center">
                            <p class="card-title font-weight-bold p-c">No Project Yet</p>
                            <hr class="dahsboard-border">
                            @auth
                                <a href="" class="btn btn-primary text-white form-control">Create Project</a>
                            @endauth
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
