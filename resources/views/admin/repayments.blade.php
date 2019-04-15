@extends('layouts.dashboardclean')
@section('content')
<div class="jumbotron text-center bg-primary duration-jumbotron-cover">
    <div class="jumbotron-cover py-4">
        <h1 class="font-weight-bold text-white ">Repayment Plans</h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('repaymentplans.store')}}" METHOD="POST">
                        @csrf
                        <div class="form-group py-2">
                            <input id="timeline" type="text" class="form-control {{ $errors->has('timeline') ? ' is-invalid' : '' }}" name="timeline"
                                 required autofocus placeholder="Enter Plan"> @if ($errors->has('timeline'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('timeline') }}</strong>
                            </span> @endif
                        </div>

                        <input type="submit" value="Create Repayment Plan" class="btn btn-primary form-control">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <ul class="list-group">
                @foreach($repaymentplans as $duration)
                <li class="list-group-item">
                    <span class="text-primary duration">
                        {{$duration->timeline}}
                    </span>
                    <span class="float-right">
                        <a href="#" class="btn btn-info text-white">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <a href="#" class="btn btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
