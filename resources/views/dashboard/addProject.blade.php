@extends('layouts.dashboard')
@section('notifications')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-8 mx-auto text-center">
            {{--@if ($user->email_verified_at == null)--}}
            {{--<script>--}}
                {{--swal("Your account is not verified!","", "info",{--}}
                    {{--buttons: ["Verify", "Cancel"],--}}
                {{--});--}}
            {{--</script>--}}
            {{--@endif--}}

            {{--@if (\Session::has('success'))--}}
            {{--<script>--}}
                {{--swal("{{ \Session::get('success') }}","", "success");--}}
            {{--</script>--}}
            {{--@endif--}}
            {{--@if (\Session::has('error'))--}}
            {{--<script>--}}
                {{--swal("{{ \Session::get('error') }}","", "error");--}}

            {{--</script>--}}
            {{--@endif--}}
        </div>
    </div>
</div>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="p-c font-weight-light">Create Project</h1>
            <hr>
        </div>
    </div>
</div>

<div class="container my-4">
    <div class="row">
        <div class="col-12 text-center">


            <form action="{{route('project.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                        {{--<img src="" id="blah" class="img-fluid">--}}

                <div class="row text-left mt-4">
                    <div class="col-md-4 offset-md-1 col-12">

                        <div class="form-group py-2">
                            <div>
                                <label for="name">Project Name</label>
                                <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       name="name"  required autofocus>
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
                                       name="amount" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="project_details">Project Details</label>
                            <textarea class="form-control" id="project_details" rows="6" name="details"></textarea>
                        </div>
                    </div>



                    <div class="col-md-4 col-12 mx-auto">
                        <div class="form-group py-2">
                            <div >
                                <label for="duration">Project Duration</label>
                                <input id="duration" type="text" class="form-control {{ $errors->has('duration') ? ' is-invalid' : '' }}"
                                       name="duration"  required>
                                @if ($errors->has('duration'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('duration') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group py-2">
                            <div >
                                <label for="phone">Project Location</label>
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
                                {{--<img src="#" id="blah" alt="">--}}
                            </span>
                            {{--<p class="btn btn-primary form-control">Select Avatar</p>--}}
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
