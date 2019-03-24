@extends('layouts.dashboardclean')

@section('content')

    <div class="container my-4">
        <div class="row">
            <div class="col-md-8 col-12 mx-auto text-center">

                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="font-weight-light text-white" style="margin: 0">Edit Project</h3>
                    </div>
                    <div class="card-body text-left">
                        <form action="{{route('userProjects.update', $project->id)}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <br>
                            <div class="form-group py-2 px-5">
                                <label for="name">Project Name</label>
                                <div class="input-group">
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

                            <div class="form-group py-2 px-5">
                                <label for="location">Project Location</label>
                                <div class="input-group">
                                    <input id="location" type="text"
                                           class="form-control {{ $errors->has('location') ? ' is-invalid' : '' }}"
                                           name="location" value="{{ $project->location }}"
                                           placeholder="Project Location">

                                    @if ($errors->has('location'))
                                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('location') }}</strong>
                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group py-2 px-5">
                                <label for="amount">Project Amount</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            NGN
                                        </div>
                                    </div>
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

                            <div class="form-group py-2 px-5">
                                <label for="duration_id">Project Duration</label>
                                <div class="input-group">
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

                            <div class="form-group py-2 px-5">
                                <label for="repayment_id">Repayment Plans</label>
                                <div class="input-group">
                                    <select class="form-control {{ $errors->has('repayment_id') ? ' is-invalid' : '' }}"
                                            id="gender" name="repayment_id">
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

                            <div class="form-group py-2 px-5  text-left">
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

                            <div class="form-group btn-file text-right pr-5 ">
                                <span class="btn btn-primary btn-file">
                                    <i class="fa fa-camera" aria-hidden="true"></i>
                                    Select Avatar <input type="file" name="avatarobject">
                                </span><br>
                                @if ($errors->has('avatarobject'))
                                    <small class="invalid-files" role="alert">{{$errors->first('avatarobject')}}</small>
                                @endif
                                <small class="py-3 text-secondary text-center">Image must be jpeg,png,jpg and less than
                                    1MB
                                </small>
                            </div>

                            <div class="form-group py-2 px-5">
                                <div>
                                    <input type="submit" value="Update Project"
                                           class="btn btn-primary float-right form-control">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
