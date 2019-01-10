@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="p-c font-weight-light">Edit Project</h1>
            <hr>
        </div>
    </div>
</div>

<div class="container my-4">
    <div class="row">
        <div class="col-12 text-center">


            <form action="{{route('userProjects.update', $project->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                {{--<img src="" id="blah" class="img-fluid">--}}

                <div class="row text-left mt-4">
                    <div class="col-md-4 offset-md-1 col-12">

                        <div class="form-group py-2">
                            <div>
                                <label for="name">Project Name</label>
                                <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       name="name"  value="{{$project->name}}" required autofocus>
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group py-2">
                            <div>
                                <label for="amount">Proposed Amount</label>
                                <input id="amount" type="number" class="form-control {{ $errors->has('amount') ? ' is-invalid' : '' }}"
                                       name="amount" value="{{$project->amount}}" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="project_details">Project Details</label>
                            <textarea class="form-control" id="project_details" rows="6" name="details">{{$project->details}}</textarea>
                        </div>
                    </div>



                    <div class="col-md-4 col-12 mx-auto">
                        <div class="form-group py-2">
                            <div >
                                <label for="duration">Project Duration</label>
                                <input id="duration" type="text" class="form-control {{ $errors->has('duration') ? ' is-invalid' : '' }}"
                                       name="duration"  value="{{$project->duration}}" required>
                                @if ($errors->has('duration'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('duration') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group py-2">
                            <div >
                                <label for="loction">Project Location</label>
                                <input id="location" type="text" class="form-control {{ $errors->has('location') ? ' is-invalid' : '' }}"
                                       name="location" value="{{ $project->location ?? "Change to project type" }}">
                                @if ($errors->has('location'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('location') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group py-2">
                            <div >
                                <label for="address">Address</label>
                                <input id="address" type="text" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}"
                                       name="address" value="{{ $project->address ?? "" }}" placeholder="Enter Address">
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
                                {{--<img src="#" id="blah" alt="">--}}
                            </span>
                            {{--<p class="btn btn-primary form-control">Select Avatar</p>--}}
                        </div>
                        <div class="form-group py-2">
                            <div>
                                <input type="submit" value="Update Project" class="btn btn-primary float-right form-control">
                            </div>
                        </div>
                    </div>
                </div>


            </form>

        </div>
    </div>
</div>
@endsection
