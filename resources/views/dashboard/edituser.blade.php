@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class="p-c font-weight-light"> Edit Personal Information</h1>
                <hr>
            </div>
        </div>
    </div>

    <div class="container my-4">
        <div class="row">
            <div class="col-12 text-center">


                <form action="{{route('user.update')}}" method="POST" enctype="multipart/form-data"!>
                    @csrf
                    @method('put')
                   
                    <div class="row text-left">
                        <div class="col-md-4 offset-md-1 col-12">

                            <div class="form-group py-2">
                                <div>
                                    <label for="first_name">First Name</label>
                                    <input id="first_name" type="text"
                                           class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                           name="first_name" value="{{ $user->first_name }}" required autofocus>
                                    @if ($errors->has('first_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
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
                                    <input id="dob" type="date"
                                           class="form-control {{ $errors->has('dob') ? ' is-invalid' : '' }}"
                                           name="dob" value="{{ $user->dob ?? '' }}">

                                </div>
                            </div>

                            <div class="form-group py-2">
                                <div>
                                    <label for="dob">About:</label>
                                    <textarea name="details" id="details" cols="30" rows="5" style="resize:none"
                                              class="form-control {{ $errors->has('details') ? ' is-invalid' : '' }}">{{$user->details ?? ''}} </textarea>
                                </div>
                            </div>


                        </div>



                        <div class="col-md-4 col-12 mx-auto">
                            <div class="form-group py-1">
                                <div >
                                    <label for="last_name">Last Name</label>
                                    <input id="last_name" type="text"
                                           class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}"
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
                                Select Avatar <input type="file" name="avatarobject">
                            </span>
                            </div>
                            <div class="form-group py-2">
                                <div >
                                    <input type="submit" value="Update Information" class="btn btn-primary form-control">
                                   
                                </div>
                            </div>
                        </div>
                    </div>


                </form>

            </div>
        </div>
    </div>
@endsection
