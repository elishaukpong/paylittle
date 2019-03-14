@extends('layouts.dashboardclean')

@section('content')

    <div class="container my-4">
        <div class="row">
            <div class="col-md-4 col-12 mx-auto text-center">

                <div class="card">

                    <div class="card-body text-center">
                        <img src="{{asset('svg/bank.svg')}}" alt="" class="img-fluid" style="width:100px;">
                        <br><br>
                        <p class="bank-text">
                            Pay the sum of NGN {{number_format($amount)}} to<br><br>
                            Globetrot Farm Sponsors <br>
                            2033547424 <br>
                            First Bank PLC
                        </p>
                        <a href="{{route('view.sponsor', Auth::user())}}" class="btn btn-success "> Proceed</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
