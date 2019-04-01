@extends('layouts.dashboardclean')
@section('content')
  <div class="jumbotron text-center create-project-jumbotron ">
        <div class="jumbotron-cover py-4">
            <h1 class="font-weight-bold text-white ">Create Project</h1>
        </div>
    </div>
    <div class="container">

    <div class="row">
        <div class="col-md-5 col-12 p-0 create-project-left d-none d-md-block">

        </div>
        <div class="col-md-7 col-12">
             <form action="{{route('project.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-6 col-lg-3 mx-auto links">
                                <img src="{{asset('img/book.jpg')}}" alt="selected Image" id="target" class="img-fluid add-book border border-secondary {{ $errors->has('book_avatar') ? ' is-invalid' : '' }}">
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
                            <div class="form-group col-md-6 col-12 py-2 px-5">
                                {{-- <label for="project_details">Project Name</label> --}}
                                <div class="input-group" data-toggle="tooltip" data-placement="top" title="Name of project you want sponsorship!">
                                    <input id="name" type="text"
                                            class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                            name="name" value="{{ old('name') }}" placeholder="Project Name" required
                                            autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6 col-12 py-2 px-5">
                                {{-- <label for="project_details">Project Location</label> --}}
                                <div class="input-group" data-toggle="tooltip" data-placement="top" title="Location of project you want sponsorship!">
                                    <input id="location" type="text"
                                            class="form-control {{ $errors->has('location') ? ' is-invalid' : '' }}"
                                            name="location" value="{{ old('location') }}" placeholder="Project Location">

                                    @if ($errors->has('location'))
                                        <span class="invalid-feedback" role="alert">
                                             <strong>{{ $errors->first('location') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 col-12 py-2 px-5">
                                {{-- <label for="project_details">Project Amount</label> --}}
                                <div class="input-group" data-toggle="tooltip" data-placement="top" title="Sponsorship amount needed!">
                                    <input id="amount" type="number"
                                            class="form-control {{ $errors->has('amount') ? ' is-invalid' : '' }}"
                                            name="amount" value="{{ old('amount') }}" placeholder="Project Amount"
                                            required>

                                    @if ($errors->has('amount'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('amount') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6 col-12 py-2 px-5">
                                {{-- <label for="project_details">Select Project Duration</label> --}}
                                <div class="input-group" data-toggle="tooltip" data-placement="top" title="Project completion duration">

                                    <select class="form-control {{ $errors->has('duration_id') ? ' is-invalid' : '' }}"
                                            id="duration" name="duration_id">
                                        <option>Select Project Duration</option>
                                        @foreach($durations as $duration)
                                            <option value="{{$duration->id}}">{{$duration->formattedtimeline}}</option>
                                        @endforeach
                                    </select>


                                    @if ($errors->has('duration_id'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('duration_id') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 col-12 py-2 px-5">
                                {{-- <label for="project_details">Select Repayment Plan</label> --}}
                                <div class="input-group" data-toggle="tooltip" data-placement="top" title="Repayment plan for sponsorship!">
                                    <select class="form-control {{ $errors->has('repayment_id') ? ' is-invalid' : '' }}"
                                            id="gender" name="repayment_id" value="">
                                        <option>Select Repayment Plan</option>
                                        @foreach($repaymentPlans as $repaymentPlan)
                                            <option value="{{$repaymentPlan->id}}"
                                            @if($repaymentPlan->id == old('repayment_id'))
                                            selected
                                            @endif
                                            >{{$repaymentPlan->timeline}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('repayment_id'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('repayment_id') }}</strong>
                                </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group col-md-6 py-2 px-5">
                                {{-- <label for="project_details">Select Guarantor</label> --}}
                                <div class="input-group" data-toggle="tooltip" data-placement="top" title="Guarantor for the project!">
                                    <select class="form-control {{ $errors->has('guarantor_id') ? ' is-invalid' : '' }}" id="guarantor" name="guarantor_id">
                                        <option>Select Guarantor</option>
                                        @foreach($guarantors as $guarantor)
                                            <option value="{{$guarantor->id}}">{{$guarantor->name}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('guarantor_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('guarantor_id') }}</strong>
                                    </span> @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-12 py-2 px-5  text-left">
                                <label for="project_details">Project Details</label>
                                <textarea style="resize: none;"
                                            class="form-control {{$errors->has('details') ? ' is-invalid' : ''}}"
                                            id="project_details" rows="6"
                                            name="details">{{ old('details') }}</textarea>
                                @if ($errors->has('details'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('details') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        {{-- <div class="form-group btn-file text-right pr-5 ">
                            <span class="btn btn-primary btn-file">
                                <i class="fa fa-camera" aria-hidden="true"></i>
                                Select Avatar <input type="file" name="avatarobject">
                            </span><br>
                            @if ($errors->has('avatarobject'))
                                <small class="invalid-files" role="alert">{{$errors->first('avatarobject')}}</small>
                            @endif
                            <small class="py-3 text-secondary text-center">Image must be jpeg,png,jpg and less than
                                1MB
                            </small> --}}

                            <div class="form-group">
                                <input type="file" name="avatarobject" id="project_avatar">
                            </div>
                        <div class="row">
                            <div class="form-group col-12 py-2 px-5">
                                <div>
                                    <input type="submit" value="Create Project"
                                            class="btn btn-primary float-right form-control">
                                </div>
                            </div>
                        </div>
                    </form>

        </div>
        {{-- <div class="col-md-8 col-12 mx-auto text-center">

            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="font-weight-light text-white" style="margin: 0">Create Project</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('project.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <br>
                        <div class="form-group py-2 px-5">
                            <div class="input-group">
                                <input id="name" type="text"
                                        class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                        name="name" value="{{ old('name') }}" placeholder="Project Name" required
                                        autofocus>
                                <div class="input-group-append">
                                    <div class="input-group-text" data-toggle="tooltip" data-placement="top"
                                            title="This is the name of the project you're embarking on">
                                        <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                                    </div>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group py-2 px-5">
                            <div class="input-group">
                                <input id="location" type="text"
                                        class="form-control {{ $errors->has('location') ? ' is-invalid' : '' }}"
                                        name="location" value="{{ old('location') }}" placeholder="Project Location">
                                <div class="input-group-append">
                                    <div class="input-group-text" data-toggle="tooltip" data-placement="top"
                                            title="This is the location of the project you're embarking on">
                                        <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                                    </div>
                                </div>
                                @if ($errors->has('location'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('location') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group py-2 px-5">
                            <div class="input-group">
                                <input id="amount" type="number"
                                        class="form-control {{ $errors->has('amount') ? ' is-invalid' : '' }}"
                                        name="amount" value="{{ old('amount') }}" placeholder="Project Amount"
                                        required>
                                <div class="input-group-append">
                                    <div class="input-group-text" data-toggle="tooltip" data-placement="top"
                                            title="This is amount required to run the project you're embarking on">
                                        <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                                    </div>
                                </div>
                                @if ($errors->has('amount'))
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('amount') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group py-2 px-5">
                            <div class="input-group">

                                <select class="form-control {{ $errors->has('duration_id') ? ' is-invalid' : '' }}"
                                        id="duration" name="duration_id">
                                    <option>Select Project Duration</option>
                                    @foreach($durations as $duration)
                                        <option value="{{$duration->id}}">{{$duration->formattedtimeline}}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <div class="input-group-text" data-toggle="tooltip" data-placement="top"
                                            title="How long it will take you to complete this project">
                                        <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                                    </div>
                                </div>

                                @if ($errors->has('duration_id'))
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('duration_id') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group py-2 px-5">
                            <div class="input-group">
                                <select class="form-control {{ $errors->has('repayment_id') ? ' is-invalid' : '' }}"
                                        id="gender" name="repayment_id">
                                    <option>Select Repayment Plan</option>
                                    @foreach($repaymentPlans as $repaymentPlan)
                                        <option value="{{$repaymentPlan->id}}">{{$repaymentPlan->timeline}}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <div class="input-group-text" data-toggle="tooltip" data-placement="top"
                                            title="This is plan you wish to use to repay for the project sponsorship you're on">
                                        <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                                    </div>
                                </div>
                                @if ($errors->has('repayment_id'))
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('repayment_id') }}</strong>
                            </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group py-2 px-5">
                            <div class="input-group">

                                <select class="form-control {{ $errors->has('guarantor_id') ? ' is-invalid' : '' }}" id="guarantor" name="guarantor_id">
                                                                <option>Select Guarantor</option>
                                                                @foreach($guarantors as $guarantor)
                                                                    <option value="{{$guarantor->id}}">{{$guarantor->name}}</option>
                                                                @endforeach
                                                            </select>
                                <div class="input-group-append">
                                    <div class="input-group-text" data-toggle="tooltip" data-placement="top" title="Project Guarantor">
                                        <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                                    </div>
                                </div>

                                @if ($errors->has('guarantor_id'))
                                <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('guarantor_id') }}</strong>
                                                        </span> @endif
                            </div>
                        </div>

                        <div class="form-group py-2 px-5  text-left">
                            <label for="project_details">Project Details</label>
                            <textarea style="resize: none;"
                                        class="form-control {{$errors->has('details') ? ' is-invalid' : ''}}"
                                        id="project_details" rows="6"
                                        name="details">{{ old('details') }}</textarea>
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
                                <input type="submit" value="Create Project"
                                        class="btn btn-primary float-right form-control">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> --}}
    </div>
    </div>
@endsection
