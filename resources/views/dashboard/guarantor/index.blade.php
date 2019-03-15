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
                            <h2 class="card-title font-weight-bold text-secondary">{{$guarantor->name}}</h2>
                            {{-- <p class="font-weight-bold">Projects Guarantored</p> --}}
                            <br>
                            <a href="{{route('guarantor.edit', $guarantor->id)}}" class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                        {{-- <a href="{{route('guarantor.delete', $guarantor->id)}}" class="btn btn-danger btn-sm g-delete" data-id="{{$guarantor->id}}">Delete</a> --}}
                            <form action="{{route('guarantor.destroy', $guarantor->id)}}" method="post" class="my-3">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-danger g-delete" data-id="{{$guarantor->id}}" >
                                    <i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                            </form>
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
