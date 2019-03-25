@extends('layouts.dashboardclean')
@section('notifications')
@endsection


@section('content')
   <div class="jumbotron text-center guarantor-jumbotron ">
        <div class="jumbotron-cover py-4">
            <h1 class="font-weight-bold text-white "> Edit Guarantor</h1>
        </div>
    </div>

    <div class="container my-4">
        <div class="row">
            <div class="col-md-8 col-12 mx-auto">

                <div class="card">
                    <div class="card-body text-left">
                        <form action="{{route('guarantor.update', $guarantor->id)}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <br>
                            <div class="form-group py-2 px-5">
                                <label for="name">Name</label>
                                <div class="input-group">
                                    <input id="name" type="text"
                                           class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" value="{{$guarantor->name}}" required
                                           autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group py-2 px-5">
                                <label for="email">Email</label>
                                <div class="input-group">
                                    <input id="email" type="email"
                                           class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{$guarantor->email}}">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group py-2 px-5">
                                <div>
                                    <input type="submit" value="Update Details"
                                           class="btn btn-primary float-right form-control">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
