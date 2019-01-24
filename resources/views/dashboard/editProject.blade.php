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
                {{--
                <img src="" id="blah" class="img-fluid">--}}

                <div class="row text-left mt-4">
                    <div class="col-md-4 offset-md-1 col-12">

                        <div class="form-group py-2">
                            <div>
                                <label for="name">Project Name</label>
                                <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $project->name }}"
                                    required autofocus> @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span> @endif
                            </div>
                        </div>

                        <div class="form-group py-2">
                            <div>
                                <label for="amount">Proposed Amount</label>
                                <input id="amount" type="number" class="form-control {{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount" value="{{$project->amount }}"
                                    required>
                                    @if ($errors->has('amount'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('amount') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="repayment_id">Repayment Plans</label>
                            <select class="form-control {{ $errors->has('repayment_id') ? ' is-invalid' : '' }}" id="gender" name="repayment_id">
                                            <option>Select Plan</option>
                                            @foreach($repaymentPlans as $repaymentPlan)
                                                @if($project->repayment_id == $repaymentPlan->id)
                                                    <option value="{{$repaymentPlan->id}}" selected>{{$repaymentPlan->timeline}}</option>
                                                @endif
                                                <option value="{{$repaymentPlan->id}}">{{$repaymentPlan->timeline}}</option>
                                            @endforeach
                                        </select> @if ($errors->has('repayment_id'))
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('repayment_id') }}</strong>
                                            </span> @endif
                        </div>

                        <div class="form-group">
                            <label for="project_details">Project Details</label>
                            <textarea style="resize: none;" class="form-control {{$errors->has('details') ? ' is-invalid' : ''}}" id="project_details"
                                rows="6" name="details">{{ $project->details }}</textarea>
                                @if ($errors->has('details'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('details') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>


                    <div class="col-md-4 col-12 mx-auto mt-2">
                        <div class="form-group">
                            <label for="duration_id">Project Duration</label>
                            <select class="form-control {{ $errors->has('duration_id') ? ' is-invalid' : '' }}" id="duration" name="duration_id">
                                            <option>Select Duration</option>
                                            @foreach($durations as $duration)
                                                @if($project->duration_id == $duration->id)
                                                    <option value="{{$duration->id}}" selected>{{$duration->timeline}}</option>
                                                @endif
                                                <option value="{{$duration->id}}">{{$duration->timeline}}</option>
                                            @endforeach

                                        </select> @if ($errors->has('duration_id'))
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('duration_id') }}</strong>
                                            </span> @endif
                        </div>

                        <div class="form-group py-2">
                            <div>
                                <label for="location">Project Location</label>
                                <input id="location" type="text" class="form-control {{ $errors->has('location') ? ' is-invalid' : '' }}" name="location"
                                    value="{{ $project->location }}"> @if ($errors->has('location'))
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('location') }}</strong>
                                        </span> @endif
                            </div>
                        </div>

                        <div class="form-group py-2 mb-5">
                            <div>
                                <label for="address">Address</label>
                                <input id="address" type="text" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $project->address }}"
                                    placeholder="Enter Address"> @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span> @endif
                            </div>
                        </div>

                        <div class="form-group btn-file">
                            <span class="btn btn-primary btn-file">
                                            <i class="fa fa-camera" aria-hidden="true"></i>
                                            &nbsp; &nbsp;
                                            Select Avatar <input type="file" name="avatarobject">
                                            {{--<img src="#" id="blah" alt="">--}}
                                        </span> {{--

                            <p class="btn btn-primary form-control">Select Avatar</p>--}}
                        </div>
                        <div class="form-group py-2">
                            <div>
                                <input type="submit" value="Create Project" class="btn btn-primary float-right form-control">
                            </div>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
