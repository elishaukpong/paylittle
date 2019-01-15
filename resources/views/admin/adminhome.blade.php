@extends('layouts.admindashboard')
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
                    <h1 class="p-c font-weight-light"> {{$user->first_name}}, Welcome to the Admin Area</h1>
                    <hr>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-12 mt-3">
                    <div class="card border border-primary">
                        <div class="card-body">
                            <h5 class="card-title display-1 font-weight-bold p-c">{{$user->projects->count()}}</h5>
                            <p class="card-text h5 p-c">Users</p>
                            <hr class="dahsboard-border">
                            <a href="{{route('admin.showallusers')}}" class="btn btn-primary text-white form-control">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12 mt-3">
                    <div class="card border border-primary">
                        <div class="card-body">
                            <h5 class="card-title display-1 font-weight-bold p-c">{{$count}}</h5>
                            <p class="card-text h5 p-c">Projects</p>
                            <hr class="dahsboard-border">
                            <a href="{{route('admin.showallprojects')}}" class="btn btn-primary text-white form-control">View Projects</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12 mt-3">
                    <div class="card border border-primary">
                        <div class="card-body">
                            <h5 class="card-title display-1 font-weight-bold p-c">{{$user->projects->count()}}</h5>
                            <p class="card-text h5 p-c">Benefactors</p>
                            <hr class="dahsboard-border">
                            <a href="{{route('userProjects.view', $user->id)}}" class="btn btn-primary text-white form-control">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection