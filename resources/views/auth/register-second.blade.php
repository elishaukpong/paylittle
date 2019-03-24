@extends('layouts.auth.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-12">
                <div class="text-center mt-5 pt-3 font-weight-light text-white">
                    <h1 class="login-header mt-5"> Register</h1>
                    <small>Residential Details</small>
                </div>
                <form method="POST" action="{{ route('save.regphase') }}" class="mt-5">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6 col-12 mx-auto">
                            <select class="form-control {{ $errors->has('state') ? ' is-invalid' : '' }} auth-inputs "
                                    id="state_id" name="state_id">
                                <option>Select State</option>
                                @foreach($states as $state)
                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('state'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 col-12 mx-auto ">
                            <select class="form-control {{ $errors->has('lga') ? ' is-invalid' : '' }} auth-inputs"
                                    id="lga" name="localgovernmentarea_id">
                                <option>Select LGA</option>

                            </select>
                            @if ($errors->has('lga'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lga') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 col-12 mx-auto ">
                            <input id="city" type="text"
                                   class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }} auth-inputs"
                                   name="city" value="{{ old('city') }}" placeholder="City"
                                   required>
                            @if ($errors->has('city'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 col-12 mx-auto ">
                            <input id="address" type="text"
                                   class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }} auth-input"
                                   name="address" value="{{ old('address') }}" placeholder="Address"
                                   required>
                            @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row mt-5">
                        <div class="col-md-6 col-12 mx-auto">
                            <button type="submit" class="btn btn-primary form-control rounded auth-button">
                                {{ __('PROCEED') }}
                            </button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection
