@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class="p-c font-weight-light"> Account Information</h1>
                <hr>
            </div>
        </div>
    </div>

    <div class="container my-4">
        <div class="row">
            <div class="col-12 text-center">


                <form action="{{route('user.update')}}" method="POST">
                    @csrf
                    @method('put')
                    <img src="{{file_exists(asset('storage/avatars/users'. $user->avatar)) ? : asset('storage/avatars/users/defaultuser.png')}}" alt="" class="profile-img p-1">
                    <br>
                    <button class="btn btn-outline-primary my-4">Update Avatar</button>
                    <hr class="mx-5">

                    <div class="row text-left mt-4">
                        <div class="col-md-4 offset-md-1 col-12">

                            <div class="form-group py-2">
                                <div>
                                    <label for="first_name">First Name</label>
                                    <input id="first_name" type="text" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                           name="first_name" value="{{ $user->first_name }}"  required autofocus>
                                    @if ($errors->has('first_name'))
                                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group py-2">
                                <div>
                                    <label for="email">Email</label>
                                    <input id="email" type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ $user->email }}"  disabled>
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender" name="gender">
                                    <option {{($user->gender =="null") ? 'selected' :  " "}} value="null">Not Set</option>
                                    <option {{($user->gender =="Male") ? 'selected' :  " "}} value="Male">Male</option>
                                    <option {{($user->gender =="Female") ? 'selected' :  " "}} value="Female">Female</option>
                                    <option {{($user->gender =="Others") ? 'selected' :  " "}} value="Others">Others</option>
                                </select>
                            </div>
                            
                        </div>



                        <div class="col-md-4 col-12 mx-auto">
                            <div class="form-group py-2">
                                <div >
                                    <label for="last_name">Last Name</label>
                                    <input id="last_name" type="text" class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                           name="last_name" value="{{ $user->last_name }}" required>
                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group py-2">
                                <div >
                                    <label for="phone">Phone</label>
                                    <input id="phone" type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                           name="phone" value="{{ $user->phone }}">
                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group py-2">
                                <div >
                                    <label for="address">Address</label>
                                    <input id="address" type="text" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}"
                                           name="address" value="{{ $user->address ?? "" }}" placeholder="Enter Address">
                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group btn-file">
                            <span class="btn btn-primary btn-file">
                                <i class="fa fa-camera" aria-hidden="true"></i>
                                &nbsp; &nbsp;
                                Select Avatar <input type="file" name="avatarobject" >
                            </span>
                            </div>
                            <div class="form-group py-2">
                                <div >
                                    <input type="submit" value="Update" class="btn btn-primary float-right">
                                   
                                </div>
                            </div>
                        </div>
                    </div>


                </form>

            </div>
        </div>
    </div>
@endsection
