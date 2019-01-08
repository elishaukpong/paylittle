@extends('layouts.dashboard')
    @section('notifications')
        <div class="container my-4">
            <div class="row justify-content-center">
                <div class="col-md-8 mx-auto text-center">
                    @if ($user->email_verified_at == null)
                        <script>
                            swal("Your account is not verified!","", "info",{
                                buttons: ["Verify", "Cancel"],
                            });
                        </script>
                    @endif

                    @if (\Session::has('success'))
                        <script>
                            swal("{{ \Session::get('success') }}","", "success");
                        </script>
                    @endif
                    @if (\Session::has('error'))
                        <script>
                            swal("{{ \Session::get('error') }}","", "error");

                        </script>
                    @endif
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
                   <div class="card add-project-card">
                        <div class="card-body">
                            <h5 class="card-title display-1 font-weight-bold p-c text-center pt-4">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </h5>
                            {{--<p class="card-text h5 p-c">Projects History</p>--}}
                            <hr class="dahsboard-border">                            
                            <a href="{{route('project.create')}}" class="btn btn-primary text-white form-control">Create Project</a>
                        </div>
                    </div>
                </div>

               
        </div>
    </div>
@endsection
