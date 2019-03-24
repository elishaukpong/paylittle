@extends('layouts.auth.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-12">
            <div class="text-center mt-5 pt-5 font-weight-light text-white">
                <h1 class="login-header"> Reset Password</h1>
            </div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="mt-5">
                @csrf

                <div class="form-group row">
                    <div class="col-md-6 col-12 mx-auto mt-5 mb-4">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} auth-input" name="email"
                            value="{{ old('email') }}" required placeholder="Email">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>


                <div class="form-group row mb-0">
                    <div class="col-md-6 col-12 mx-auto">
                        <button type="submit" class="btn btn-primary form-control rounded auth-button">
                            {{ __('Send Password Reset Link') }}
                        </button>
                        <a class="btn btn-link home-link py-3 text-white px-4 form-control" href="{{ route('/') }} ">
                            Go Back Home
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
