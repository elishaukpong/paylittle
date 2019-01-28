@extends('layouts.admindashboard')
    @section('notifications')
        {{--<div class="container my-4">--}}
            {{--<div class="row justify-content-center">--}}
                {{--<div class="col-md-8 mx-auto text-center">--}}
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
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    @endsection

   
    
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h1 class="p-c font-weight-light"> Admin Area : All Users</h1>
                    <br>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">S/N</th>
                            <th scope="col"> Full Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key => $user)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                <td>{{ $user->email}}</td>
                                <td>{{ $user->gender}}</td>
                                <td>{{ $user->is_admin == 'admin' ? $user->is_admin : 'user'}}</td>
                                <td><a href="{{route('admin.showuser', $user->id)}}" class="btn btn-primary">View User</a></td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                    <div class="row my-4 text-center">
                        <div class="col-md-3 col-12 mx-auto ">
                            {{$users->links()}}
                        </div>
                    </div>
                    {{--<a href="" class="btn btn-secondary my-4">See Joined Classes</a>--}}
                    {{--<a href="" class="btn btn-secondary my-4">Information Board</a>--}}
                </div>
            </div>
        </div>
    @endsection
