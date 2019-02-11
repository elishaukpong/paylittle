@extends('layouts.dashboardclean')
@section('notifications')
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class=" col-12">
            <h1 class="p-c font-weight-light">{{$user->first_name}}'s Profile</h1>
        </div>
            <div class="col-md-10">
                @if(Auth::user()->id ==
                 $user->id)
                    <a href="{{route('user.edit', $user->id)}}" class="float-right btn btn-xl badge-pill badge-primary text-white">Edit</a>
                    {{-- <a class="float-right btn btn-xl badge-pill badge-primary text-white" data-toggle="modal" data-target="#editModal">Edit</a> --}}
                @endif
                <hr>
            </div>

</div>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-12 my-5 my-md-3">
            <img class="card-img-top img-fluid" src="{{asset( $user->photo->useravatar ?? $user->defaultAvatar)}}" alt="Card image cap">
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
                    @if(Auth::user()->id == $user->id)
                    <h5 class="mt-4">BVN: </h5>
                    <p> {{$user->bvn->number}}</p>
                    @endif
                    <h5 class="mt-3 pt-3">Joined:</h5>
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
                <img class="card-img-top" src="{{asset($project->photo->projectavatar ?? $user->defaultAvatar) }}" alt="Card image cap">
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
    @if($projects->count() > 0)
        <div class="row my-5">
            <div class="col-12 text-right">
                <a href="{{route('userProjects.view', $user->id)}}" class="btn btn-outline-primary btn-lg pl-md-5 pr-md-4 boo">
                    See More <i class="fa fa-long-arrow-right pl-3" aria-hidden="true"></i>
                </a>
            </div>
        </div>

    @endif

</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit {{$user->name}}'s Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


          <form action="{{route('user.update', $user->id)}}" method="POST" enctype="multipart/form-data" !>
                @csrf @method('put')

                <div class="row text-left">
                    <div class="offset-1 col-10">

                        <div class="form-group py-2">
                            <div>
                                <label for="first_name">First Name</label>
                                <input id="first_name" type="text" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name"
                                    value="{{ $user->first_name }}" required autofocus> @if ($errors->has('first_name'))
                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('first_name') }}</strong>
                                                        </span> @endif
                            </div>
                        </div>

                        <div class="form-group py-1">
                            <div>
                                <label for="last_name">Last Name</label>
                                <input id="last_name" type="text" class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name"
                                    value="{{ $user->last_name }}" required> @if ($errors->has('last_name'))
                                <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('last_name') }}</strong>
                                                                            </span> @endif
                            </div>
                        </div>

                        <div class="form-group py-3">
                            <div>
                                <label for="last_name">Occupation</label>
                                <input id="last_name" type="text" class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name"
                                    value="{{ $user->last_name }}" required> @if ($errors->has('last_name'))
                                <span class="invalid-feedback" role="alert">
                                                                                                    <strong>{{ $errors->first('last_name') }}</strong>
                                                                                                </span> @endif
                            </div>
                        </div>

                        <div class="form-group py-2">
                            <div>
                                <label for="phone">Phone</label>
                                <input id="phone" type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $user->phone }}">        @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                                </span> @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender">
                                                <option {{($user->gender =="null") ? 'selected' :  " "}} value="null">Not Set</option>
                                                <option {{($user->gender =="male") ? 'selected' :  " "}} value="male">Male</option>
                                                <option {{($user->gender =="female") ? 'selected' :  " "}} value="female">Female</option>
                                                <option {{($user->gender =="others") ? 'selected' :  " "}} value="others">Others</option>
                                            </select>
                        </div>

                        <div class="form-group py-2">
                            <div>
                                <label for="dob">Date of Birth</label>
                                <input id="dob" type="date" class="form-control {{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" value="{{ $user->dob ?? '' }}">                    @if ($errors->has('dob'))
                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('dob') }}</strong>
                                                        </span> @endif

                            </div>
                        </div>
                        <div class="form-group py-2">
                            <div>
                                <label for="address">Address</label>
                                <input id="address" type="text" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $user->address ?? "
                                    " }}" placeholder="Enter Address"> @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('address') }}</strong>
                                                                            </span> @endif
                            </div>
                        </div>



                        <div class="form-group py-2">
                            <div>
                                <label for="details"> Bio:</label>
                                <textarea name="details" id="details" cols="30" rows="5" style="resize:none" class="form-control {{ $errors->has('details') ? ' is-invalid' : '' }}">{{$user->details ?? ''}} </textarea>                    @if ($errors->has('details'))
                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('details') }}</strong>
                                                    </span> @endif
                            </div>
                        </div>



                        <div class="form-group btn-file">
                            <span class="btn btn-primary btn-file">
                                                <i class="fa fa-camera" aria-hidden="true"></i>
                                                &nbsp; &nbsp;
                                                Update Avatar <input type="file" name="avatarobject">
                                            </span> <br> @if ($errors->has('avatarobject'))
                            <small class="invalid-files" role="alert">{{$errors->first('avatarobject')}}</small> @endif
                        </div>
                        <small class="py-3 text-secondary text-center">Image must be jpeg,png,jpg and less than 1MB</small>

                        <div class="float-right my-3">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" value="Update Information" class="btn btn-primary ml-3">
                        </div>
                    </div>

                </div>


            </form>

        </div>
    </div>
</div>
@endsection
