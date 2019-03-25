@extends('layouts.dashboardclean')

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


                <form action="{{route('user.update', $user->id)}}" method="POST" enctype="multipart/form-data"!>
                    @csrf
                    @method('put')

                    <div class="row text-left">
                        <div class="col-md-5 offset-md-1 col-12">

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
                                <select class="form-control {{ $errors->has('gender') ? ' is-invalid' : '' }}" id="gender" name="gender">
                                    <option {{($user->gender =="null") ? 'selected' :  " "}} value=" ">Not Set</option>
                                    <option {{($user->gender =="Male") ? 'selected' :  " "}} value="male">Male</option>
                                    <option {{($user->gender =="Female") ? 'selected' :  " "}} value="female">Female</option>
                                    <option {{($user->gender =="Others") ? 'selected' :  " "}} value="others">Others</option>
                                </select>
                                @if ($errors->has('gender'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                                @endif
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
                                <div>
                                    <label for="dob">Date of Birth</label>
                                    <input id="dob" type="date"
                                           class="form-control {{ $errors->has('dob') ? ' is-invalid' : '' }}"
                                           name="dob" value="{{ $user->dob ?? '' }}">
                                        @if ($errors->has('dob'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('dob') }}</strong>
                                            </span>
                                        @endif

                                </div>
                            </div>


                            <div class="form-group py-2">
                                <div>
                                    <label for="details"> Bio:</label>
                                    <textarea name="details" id="details" cols="30" rows="5" style="resize:none"
                                              class="form-control {{ $errors->has('details') ? ' is-invalid' : '' }}">{{$user->details ?? ''}} </textarea>
                                    @if ($errors->has('details'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('details') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>



                        </div>



                        <div class="col-md-5 col-12 mx-auto">
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


                            <div class="form-group">
                                <label for="gender">Organization</label>
                                <select class="form-control {{ $errors->has('gender') ? ' is-invalid' : '' }}" id="gender" name="gender">

                                </select>
                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                                @endif
                            </div>


                            <div class="form-group py-3">
                                <div >
                                    <label for="occupation">Occupation</label>
                                    <input id="occupation" type="text"
                                           class="form-control {{ $errors->has('occupation') ? ' is-invalid' : '' }}"
                                           name="occupation" value="{{ $user->occupation }}" required>
                                    @if ($errors->has('occupation'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('occupation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group btn-file">
                                <span class="btn btn-primary btn-file">
                                    <i class="fa fa-camera" aria-hidden="true"></i>
                                    Update Avatar <input type="file" name="avatarobject">
                                </span> <br>
                                @if ($errors->has('avatarobject'))
                                    <small class="invalid-files" role="alert">{{$errors->first('avatarobject')}}</small>
                                @endif
                            </div>
                                <small class="py-3 text-secondary text-center">Image must be jpeg,png,jpg and less than 1MB</small>

                            <div >
                                <input type="submit" value="Update Information" class="btn btn-primary form-control float-right">
                            </div>
                        </div>
                    </div>


                </form>

            </div>
        </div>
    </div>
@endsection
