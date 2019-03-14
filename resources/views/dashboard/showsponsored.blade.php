@extends('layouts.dashboard')
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
                    <h1 class="p-c font-weight-light"> Sponsored Projects</h1>
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
                            <th scope="col"> Project Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Date Due</th>
                            <th scope="col">Returns</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($projectsubscriptions as $key => $projectsubscription)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ $projectsubscription->project->name }}</td>
                                <td>{{ $projectsubscription->status->status ?? 'Waiting'}}</td>
                                <td>{{ $projectsubscription->amount}}</td>
                                {{--make this two true data--}}
                                <td>{{ $projectsubscription->created_at->addMonth(rand(2,8))->diffForHumans()}}</td>
                                <td>{{ $projectsubscription->amountdue}}</td>
                                {{--<td>{{ $project->gender}}</td>--}}
                                {{--<td><a href="{{route('admin.showuser', $project->id)}}" class="btn btn-primary">View User</a></td>--}}

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                    <div class="row my-4 text-center">
                        <div class="col-md-3 col-12 mx-auto ">
                            {{--{{$user->links()}}--}}
                        </div>
                    </div>
                    {{--<a href="" class="btn btn-secondary my-4">See Joined Classes</a>--}}
                    {{--<a href="" class="btn btn-secondary my-4">Information Board</a>--}}
                </div>
            </div>
        </div>
    @endsection