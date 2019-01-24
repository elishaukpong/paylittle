@extends('layouts.dashboard')
@section('notifications')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-8 mx-auto text-center">
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
        </div>
    </div>
</div>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="p-c font-weight-light">Your Projects</h1>
            <hr>
        </div>
    </div>
</div>

<div class="container my-4">
    <div class="row">
        @forelse ($projects as $project)
            <div class="col-md-4 col-12 mt-3">
                <img class="card-img-top" src="{{asset($project->avatar)}}" alt="Card image cap">
                <div class="card border border-primary">
                    <div class="card-body">
                        <p class="card-title font-weight-bold p-c">{{$project->name}}</p>
                        <p class="card-text">{{$project->shortDetails}}</p>
                        <hr class="dahsboard-border">
                        <a href="{{route('userProjects.show', $project->id)}}" class="btn btn-primary text-white form-control">View Project</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-4 col-12 mt-3">
                <div class="card border border-primary">
                    <div class="card-body text-center">
                        <p class="card-title font-weight-bold p-c">No Project Yet</p>
                        <hr class="dahsboard-border">
                        <a href="" class="btn btn-primary text-white form-control">Create Project</a>
                    </div>
                </div>
            </div>
        @endforelse

    </div>
    <div class="row my-4 text-center">
        <div class="col-md-3 col-12 mx-auto ">
            {{$projects->links()}}
        </div>
    </div>
</div>
@endsection
