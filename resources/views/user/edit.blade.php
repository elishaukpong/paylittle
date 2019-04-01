@extends('layouts.dashboardclean')

@section('content')
    <div class="jumbotron text-center view-user-jumbotron" id="user">
        <div class="jumbotron-cover py-5">
        </div>
    </div>
    <div class="profile-img">
        <div class="row mb-5">
            <div class="col-12 text-center pb-5">
                <img src="{{asset($user->photo->useravatar)}}" id="target" alt="selected Image" class="img-fluid user-profile-image {{ $errors->has('avatarobject') ? ' is-invalid' : '' }}">

                <div class="error-text {{ $errors->has('avatarobject') ? ' collapse' : '' }}">
                    <p class="text-primary">Image size must not exceed 1Mb</p>
                </div>

                @if ($errors->has('avatarobject'))
                    <div class="error-text text-center">
                        {{-- <span class="invalid-feedback text-center" role="alert">
                            <strong>{{ $errors->first('avatarobject') }}</strong>
                        </span> --}}
                        <p class="text-danger"> {{$errors->first('avatarobject') }}</p>
                    </div>
                @endif

                <div class="content">
                    <a href="" class="img-select text-white" id="img-select">
                        <i class="fa fa-camera bg-primary p-2"></i>
                    </a>

                </div>
            </div>
        </div>
    </div>

    <div class="container my-4">
        <div class="row">
            <div class="col-md-8 col-12 mx-auto">

                <form action="{{route('user.update')}}" method="POST" enctype="multipart/form-data"!>
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-12 col-md-6">
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
                        </div>
                        <div class="col-12 col-md-6">
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
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
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
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group py-2">
                                <div>
                                    <label for="phone">Phone</label>
                                    <input id="phone" type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $user->phone }}">        @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('phone') }}</strong>
                                                                    </span> @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group py-2">
                                <div>
                                    <label for="details"> Bio:</label>
                                    <textarea name="details" id="details" cols="30" rows="5" style="resize:none" class="form-control {{ $errors->has('details') ? ' is-invalid' : '' }}">{{$user->details ?? ''}} </textarea>        @if ($errors->has('details'))
                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('details') }}</strong>
                                                                    </span> @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <input type="file" name="avatarobject" class="collapse" id="project_avatar">
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-12 mx-auto">
                            <input type="submit" value="Update Information" class="btn btn-primary form-control float-right">
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
