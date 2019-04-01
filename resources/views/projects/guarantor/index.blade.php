@extends('layouts.dashboardclean')

@section('content')
    <div class="jumbotron text-center guarantor-jumbotron ">
        <div class="jumbotron-cover py-4">
            <h1 class="font-weight-bold text-white ">Guarantors</h1>
        </div>
    </div>

    <div class="container my-4">
        <div class="row">

            @forelse ($guarantors as $guarantor)
                <div class="col-md-3 col-12 mt-3">
                    <div class="card">
                        <div class="card-body mt-3 text-center">
                            <h1 class="text-white lib-head mb-4">{{$guarantor->initial}}</h1>
                            <h5 class="card-title font-weight-bold text-secondary">{{$guarantor->name}}</h5>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{route('guarantor.edit', $guarantor->id)}}" class="btn btn-success btn-sm form-control pt-2">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>

                                </div>
                                <div class="col-md-6 py-4 py-md-0">
                                    <form action="{{route('guarantor.destroy', $guarantor->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger g-delete form-control" data-id="{{$guarantor->id}}" >
                                            <i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                    </form>

                                </div>
                            </div>

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
