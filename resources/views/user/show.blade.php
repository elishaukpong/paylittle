@extends('layouts.dashboardclean')

@section('content')
<div class="jumbotron text-center view-user-jumbotron" id="user">
    <div class="jumbotron-cover py-5">
    </div>
</div>

<div class="profile-img">
    <div class="row mb-5">
        <div class="col-12 text-center pb-5">

            <img src="{{asset($users->photo->useravatar)}}" alt="selected Image" class="img-fluid user-profile-image">

        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="font-weight-bold p-c">
                {{$users->first_name}} {{$users->last_name}}
            </h1>
            <div class="text-secondary">

                <p>{{$users->email}}</p>
                <p>{{$users->phone}}</p>
                <p class="btn btn-sm btn-outline-{{$users->email_verified_at  == null ? 'danger' :'success'}}">
                    {{$users->email_verified_at == null ? 'Not Verified' :'Verified'}}
                </p>
                @if(Auth::user()->id == $users->id)
                    <p class="btn btn-sm"><a class="btn btn-sm border border-primary" href="{{route('user.edit', $users->slug)}}">Edit Profile</a></p>
                @endif
            </div>
        </div>

        <div class="col-md-8 col-12 my-md-3 mx-auto">

            <h5 class="mt-4 font-weight-bold p-c">About: </h5>
            <p class="mr-md-5 pr-md-5 text-justify text-secondary"> {{$users->details}}</p>


            <div class="row text-secondary">
                <div class="col-6">
                    <h5 class="mt-4 font-weight-bold p-c">Gender: </h5>
                    <p> {{$users->gender}}</p>
                </div>
                <div class="col-6">
                    <h5 class="mt-4 font-weight-bold p-c">Date of Birth: </h5>
                    <p> {{$users->dob}}</p>
                </div>

            </div>
            <div class="row text-secondary">

                <div class="col-6">
                    <h5 class="mt-4 font-weight-bold p-c">Address: </h5>
                    <p> {{$users->address}}</p>
                </div>

                <div class="col-6">
                    @if(Auth::user()->id == $users->id || Auth::user()->is_admin)
                    <h5 class="mt-4 font-weight-bold p-c">BVN: </h5>
                    <p> {{$users->bvn->number}}
                        @if($users->bvn->status->id == 2)
                            <i class="fa fa-check-circle text-success" aria-hidden="true"></i></p>
                        @elseif($users->bvn->status->id == 3)
                            <i class="fa fa-close text-danger" aria-hidden="true"></i></p>
                        @endif
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <h1 class="p-c font-weight-bold">Recent Projects</h1>
            <hr>
        </div>
    </div>
</div>

<div class="container my-4">
    <div class="row">

       @forelse ($projects as $project)
            <div class="col-md-4 col-12 mt-3">
                <div class="card">
                    <div class="text-content-block">
                        <img class="card-img-top img-fluid project-image-size" src="{{asset($project->photo->projectavatar)}}" alt="Card image cap">
                        <div class="text-content p-3">
                            <p class="card-title font-weight-bold text-white">{{$project->name}}</p>
                            <p class="card-text text-white">{{$project->shortDetails}}</p>
                        </div>
                    </div>
                    <div class="card-body mt-3">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{$project->projectsponsorshippercentage}}" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <br>
                        <p class="float-lg-left text-primary">{{$project->formattedamountsponsored}}
                            <small class="font-weight-bold ">Raised</small>
                        </p>
                        <p class="float-lg-right text-primary">
                            <small class="font-weight-bold text-primary">Total</small> {{$project->formattedamount}}</p>

                        <a href="{{route('project.show', $project->id)}}" class="btn btn-primary form-control text-white">View Project</a>

                    </div>

                </div>

            </div>

        @empty
            <div class="col-md-4 col-12 mt-3">
                <div class="card border border-primary">
                    <div class="card-body text-center">
                        <p class="card-title font-weight-bold p-c">No Project Yet</p>
                        <hr class="dahsboard-border"> @auth
                        <a href="" class="btn btn-primary text-white form-control">Create Project</a> @endauth
                    </div>
                </div>
            </div>
        @endforelse




    </div>
    @if($projects->count() > 0)
        <div class="row my-5">
            <div class="col-12 text-center">
                @if($users->id == Auth::id())
                <a href="{{route('user.projects.show')}}" class="btn btn-outline-primary btn-lg pl-md-5 pr-md-4 boo">
                    See More <i class="fa fa-long-arrow-right pl-3" aria-hidden="true"></i>
                </a>
                @else
                <a href="{{route('admin.show.userprojects', $users->slug)}}" class="btn btn-outline-primary btn-lg pl-md-5 pr-md-4 boo">
                    See More <i class="fa fa-long-arrow-right pl-3" aria-hidden="true"></i>
                </a>
                @endif
            </div>
        </div>

    @endif

</div>

@endsection



