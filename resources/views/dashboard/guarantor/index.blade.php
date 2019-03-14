@extends('layouts.dashboardclean')
@section('notifications')
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class="p-c font-weight-light"> All Guarantors </h1>
                    <a href="{{route('guarantor.create')}}" class="btn btn-success btn-sm">Add New Guarantor</a>
                <hr>
            </div>
        </div>
    </div>

    <div class="container my-4">
        <div class="row">

            @forelse ($guarantors as $guarantor)
                <div class="col-md-3 col-12 mt-3">
                    <div class="card">
                        <div class="card-body mt-3">
                            <p class="card-title font-weight-bold text-secondary">{{$guarantor->name}}</p>
                            <p class="card-text">{{$guarantor->email}}</p>
                            <p class="font-weight-bold">Projects Guarantored</p>
                            <a href="{{route('guarantor.edit', $guarantor->id)}}" class="btn btn-success btn-sm">Edit</a>
                        </div>
                    </div>
                </div>

            @empty
                <div class="col-md-4 col-12 mt-3">
                    <div class="card border border-primary">
                        <div class="card-body text-center">
                            <p class="card-title font-weight-bold p-c">No Guarantor Yet</p>
                            <hr class="dahsboard-border">
                            @auth
                                <a href="{{route('guarantor.create')}}" class="btn btn-primary text-white form-control">Create
                                    Guarantor</a>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforelse

        </div>
        <div class="row my-4 text-center">
            <div class="col-md-5 col-12 mx-auto">
                {{$guarantors->links()}}
            </div>
        </div>
    </div>
@endsection
