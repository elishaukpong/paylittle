@extends('layouts.dashboardclean')
@section('content')
  <div class="jumbotron text-center create-project-jumbotron ">
        <div class="jumbotron-cover py-4">
            <h1 class="font-weight-bold text-white ">Edit Project</h1>
        </div>
    </div>
    <div class="container">

    <div class="row">
        <div class="col-md-5 col-12 p-0 create-project-left d-none d-md-block">

        </div>
        <div class="col-md-7 col-12">
            <form action="{{route('project.update', $project->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                        <div class="row">
                            <div class="col-4 col-lg-3 mx-auto links">
                                <img src="{{asset($project->photo->projectavatar)}}" alt="selected Image" id="target" class="img-fluid add-book border border-secondary {{ $errors->has('book_avatar') ? ' is-invalid' : '' }}">
                                @if ($errors->has('book_avatar'))
                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $errors->first('book_avatar') }}</strong>
                                    </span>
                                @endif
                                <a href="" class="img-select text-white" id="img-select">
                                    <i class="fa fa-camera bg-secondary p-2"></i>
                                </a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group  col-12 py-2 px-5">
                                {{-- <label for="project_details">Project Name</label> --}}
                                <div class="input-group" data-toggle="tooltip" data-placement="top" title="Name of project you want sponsorship!">
                                    <input id="name" type="text"
                                            class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            name="name" value="{{ $project->name }}" placeholder="Project Name" required
                                            autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 col-12 py-2 px-5">
                                {{-- <label for="project_details">Project Location</label> --}}
                                <div class="input-group" data-toggle="tooltip" data-placement="top" title="Location of project you want sponsorship!">
                                    <input id="location" type="text"
                                            class="form-control {{ $errors->has('location') ? ' is-invalid' : '' }}"
                                            name="location" value="{{ $project->location }}" placeholder="Project Location">

                                    @if ($errors->has('location'))
                                        <span class="invalid-feedback" role="alert">
                                             <strong>{{ $errors->first('location') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6 col-12 py-2 px-5">
                                {{-- <label for="project_details">Project Amount</label> --}}
                                <div class="input-group" data-toggle="tooltip" data-placement="top" title="Sponsorship amount needed!">
                                    <input id="amount" type="number"
                                            class="form-control {{ $errors->has('amount') ? ' is-invalid' : '' }}"
                                            name="amount" value="{{ $project->amount }}" placeholder="Project Amount"
                                            required>

                                    @if ($errors->has('amount'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('amount') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 col-12 py-2 px-5">
                                {{-- <label for="project_details">Select Project Duration</label> --}}
                                <div class="input-group" data-toggle="tooltip" data-placement="top" title="Project completion duration">

                                    <select class="form-control {{ $errors->has('duration_id') ? ' is-invalid' : '' }}"
                                            id="duration" name="duration_id">
                                        <option>Select Project Duration</option>
                                       @foreach($durations as $duration)
                                        <option value="{{$duration->id}}" {{$duration->id == $project->duration_id ? 'selected' :''}}>{{$duration->formattedtimeline}}</option>
                                        @endforeach
                                    </select>


                                    @if ($errors->has('duration_id'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('duration_id') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6 col-12 py-2 px-5">
                                {{-- <label for="project_details">Select Repayment Plan</label> --}}
                                <div class="input-group" data-toggle="tooltip" data-placement="top" title="Repayment plan for sponsorship!">
                                    <select class="form-control {{ $errors->has('repayment_id') ? ' is-invalid' : '' }}"
                                            id="gender" name="repayment_id" value="">
                                        <option>Select Repayment Plan</option>
                                        @foreach($repaymentPlans as $repaymentPlan)
                                        <option value="{{$repaymentPlan->id}}" {{$repaymentPlan->id == $project->repayment_id ? 'selected' :''}} >{{$repaymentPlan->timeline}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('repayment_id'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('repayment_id') }}</strong>
                                </span>
                                    @endif

                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="form-group col-12 py-2 px-5  text-left">
                                <label for="project_details">Project Details</label>
                                <textarea style="resize: none;"
                                            class="form-control {{$errors->has('details') ? ' is-invalid' : ''}}"
                                            id="project_details" rows="6"
                                            name="details">{{ $project->details }}</textarea>
                                @if ($errors->has('details'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('details') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="file" name="avatarobject" id="project_avatar">
                        </div>

                        <div class="row">
                            <div class="form-group col-12 py-2 px-5">
                                <div>
                                    <input type="submit" value="Update Project"
                                            class="btn btn-primary float-right form-control">
                                </div>
                            </div>
                        </div>
                    </form>

        </div>

    </div>
    </div>
@endsection
