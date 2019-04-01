@extends('layouts.dashboardclean')

    @section('content')
     <div class="jumbotron text-center bg-primary">
        <div class="jumbotron-cover py-4">
            <h1 class="font-weight-bold text-white ">Users </h1>
        </div>
    </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        @foreach($users as $key => $user)
                            <div class="col-md-6 col-12 my-2">
                                <div class="card">
                                    <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <img src="{{asset($user->photo->useravatar)}}" class="img-fluid show-user-image img-thumbnail" alt="">
                                        </div>
                                        <div class="col-md-8 col-12">
                                            <h3>{{$user->first_name}} {{$user->last_name}}</h3>
                                            <h5>{{$user->email}}</h5>
                                            <p>{{$user->gender}}</p>
                                            <a href="{{route('admin.showuser', $user->slug)}}" class="btn btn-sm btn-outline-success">View {{$user->first_name}}'s profile</a>
                                            <a href="{{route('admin.show.userprojects', $user->slug)}}" class="btn btn-sm btn-outline-success">View projects</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="row my-4 text-center">
                        <div class="col-md-3 col-12 mx-auto ">
                            {{$users->links()}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endsection
