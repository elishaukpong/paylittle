@extends('layouts.auth.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 mt-5 pt-5">
            <div class="text-center mt-5 pt-3 font-weight-light text-white my-3">
                <h3 class="login-header"> Verify Your Email Address </h3>
            </div>
            <br>
            <div class="card verification-card">
                <div class="card-body verification-card-body text-center">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    <p class="text-white">
                    {{ __('Before proceeding, please check your email for a verification link.') }}

                        {{ __('If you did not receive the email') }},
                    </p>
                        <a href="{{route('verification.resend')}}" class="btn btn-primary">{{ __('Click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
