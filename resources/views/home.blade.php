@extends('layouts.dashboard')
    @section('notifications')
     <div class="container my-4">
            <div class="row justify-content-center">
                @if ($user->email_verified_at == null)
                <div class="col-md-7">
                   {{-- <p class="notification text-center p-c">
                       ALERT: Please check your email and follow the link to verify your email address.
                    </p> --}}
                </div>
                {{-- <div class="col-md-5">
                    <a href="#" class="btn btn-primary">Resend Email</a>
                </div> --}}
                @endif
                
            </div>
        </div>
    @endsection

    @section('left-bar')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h3>Side Bar</h3>
            </div>
        </div>
    </div>
    @endsection
    
    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
            <h1 class="p-c font-weight-light"> Welcome Back, {{$user->first_name}}</h1>
            <hr>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
                <div class="col-md-4 col-12 mt-3">
                    <div class="card border border-primary">
                        <div class="card-body">
                            <h5 class="card-title display-1 font-weight-bold p-c">10</h5>
                            <p class="card-text h5 p-c">Sponsored Projects</p>
                            <hr class="dahsboard-border">
                            <a class="btn btn-primary text-white form-control">View Details</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 col-12 mt-3">
                   <div class="card border border-primary">
                        <div class="card-body">
                            <h5 class="card-title display-1 font-weight-bold  p-c">23</h5>
                            <p class="card-text h5 p-c">Projects History</p>
                            <hr class="dahsboard-border">                            
                            <a class="btn btn-primary text-white form-control">View Details</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-12 mt-3">
                   <div class="card border border-primary">
                        <div class="card-body">
                            <h5 class="card-title display-1 font-weight-bold  p-c">23</h5>
                            <p class="card-text h5 p-c">Projects History</p>
                            <hr class="dahsboard-border">                            
                            <a class="btn btn-primary text-white form-control">View Details</a>
                        </div>
                    </div>
                </div>

               
        </div>
    </div>
@endsection
