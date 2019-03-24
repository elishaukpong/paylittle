@extends('layouts.auth.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-12">
            <div class="text-center mt-5 font-weight-light text-white">
                <h1 class="login-header"> Login</h1>
            </div>

                    <form method="POST" action="{{ route('login') }}" class="mt-5">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-6 col-12 mx-auto">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} auth-input" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row my-5">

                            <div class="col-md-6 col-12 mx-auto">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} auth-input" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row ">
                            <div class="col-md-6 col-12 mx-auto text-center">
                                <button type="submit" class="btn btn-primary form-control rounded auth-button">
                                    {{ __('LOG IN') }}
                                </button>
                                                           </div>
                        </div>
                        <div class="form-group row ">
                            <div class="col-md-6 col-12 mx-auto text-center">
                                <a class=" home-link mt-4 text-white px-4" href="/register">
                                    No account yet? Click Here
                                </a>
                            </div>
                        </div>
                        <div class="form-group row my-4">
                            <div class="col-md-12">
                                <hr>
                            </div>
                        </div>
                        <div class="form-group row  my-4 py-1">
                            <div class="col-md-6 col-12  mx-auto">

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link rounded border btn-hover text-white px-4 py-2 form-control" href="{{ route('password.request') }} ">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif

                            </div>
                        </div>
                    </form>
        </div>
    </div>
</div>
@endsection
