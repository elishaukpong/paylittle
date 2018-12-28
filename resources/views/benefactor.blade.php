@extends('layouts.main')

@section('content')
<section class="bene-header">
    <div class="bene-header-shadow">
        <div class="container">
            <div class="row  pt-5">
                <div class="col-12 text-center mt-5 pt-5">
                    <h1 class="text-white text-uppercase display-3">Be a Sponsor</h1>
                </div>
            </div>
        </div>
    </div>

</section>
 <section class="my-5 py-2">
     <div class="container">
         <div class="row">
             <div class="col-12 mx-auto text-center">
                 <p class="p-c">
                     You can help us alleviate the stress people incur on their finances when making major steps and changes in their lifes by being a sponsor on the Pay Little platform.
                     Pay Little Sponsorship falls into three categories which comes with different ROI percentages based on initial investment.
                     We believe in you to help us make people's dreams come through while ensuring your dreams come true too.
                 </p>
             </div>
         </div>
         <div class="row my-5">
             <div class="col-6">
                <img src="{{asset('img/sp.jpg')}}" class="img-fluid" alt="">
             </div>
             <div class="col-6 px-5 my-5">
                 <h4 class="p-c my-4">Become a Sponsor today</h4>
                <form class="mr-5" method="POST" action="/sponsor">
                    @csrf
                    <div class="form-group">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Enter Name"
                            required autofocus> 
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                    </div>
                    <div class="form-group">
                        <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                            placeholder="Enter Email" required> 
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span> 
                        @endif
                    </div>
                    <div class="form-group">
                        <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}"
                            placeholder="Enter Phone Number" required> 
                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span> 
                        @endif
                    </div>
                    <div class="form-group">
                        <input id="amount" type="number" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount" value="{{ old('amount') }}"
                            placeholder="Enter Amount" required autofocus> 
                        @if ($errors->has('amount'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('amount') }}</strong>
                            </span> 
                        @endif
                    </div>
                    <div class="form-group pb-4">
                        <select class="form-control" id="exampleFormControlSelect1" name="duration">
                            <option value="Null">Select Duration of Sponsorship</option>
                            <option value="3">3 Years</option>
                            <option value="2">Below 3 and Above 2 Years</option>
                            <option value="1">6 Months - 1 Year</option>
                        </select>
                    </div>
                 
                    <button type="submit" class="btn btn-success form-control">Submit</button>
                </form>
             </div>
         </div>
     </div>
 </section>
    <footer class="text-white">
            <div class="container py-5 border-bottom">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <p class="text-uppercase font-weight-bold">Contact</p>
                        <ul class="list-inline  pb-4 pb-md-0">
                            <li class="list-inline-item py-1 pr-5">
                                <i class="fa fa-map-marker mr-3" aria-hidden="true"></i> 16 Abua Street, PH
                            </li><br>
                            <li class="list-inline-item py-1">
                                <i class="fa fa-envelope mr-3" aria-hidden="true"></i> info@paylittle.com.ng
                            </li><br>
                            <li class="list-inline-item py-1">
                                <i class="fa fa-phone mr-3" aria-hidden="true"></i> Null
                            </li><br>
                            <li class="list-inline-item py-1">
                                <i class="fa fa-fax mr-3" aria-hidden="true"></i> Null
                            </li><br>
                        </ul>
                    </div>
                    <div class="col-md-2 col-12">
                        <p class="text-uppercase font-weight-bold">Products</p>
                        <ul class="list-inline  pb-4 pb-md-0">
                            <li class="list-inline-item py-1">Oracle Technology</li> <br>
                            <li class="list-inline-item py-1">Google Cloud</li> <br>
                            <li class="list-inline-item py-1">Bonitasoft</li> <br>
                            <li class="list-inline-item py-1">Microsoft Suites</li> <br>
                        </ul>
                    </div>
                    <div class="col-md-2 offset-md-1 col-12">
                        <p class="text-uppercase font-weight-bold">Useful Links</p>
                        <ul class="list-inline  pb-4 pb-md-0">
                            <li class="list-inline-item py-1">About Us</li> <br>
                            <li class="list-inline-item py-1">Products & Services</li><br>
                            <li class="list-inline-item py-1">Blog</li><br>
                            <li class="list-inline-item py-1">Contact Us</li><br>
                        </ul>
                    </div>
                    <div class="col-md-3 col-12">
                        <!-- <div class="mt-5 pt-2"></div> -->
                        <p class="text-uppecase font-weight-bold pb-2 ml-md-4"> Get Updates from us</p>
                        <div class="ml-md-4">
                            <input type="text" class="form-control mb-2" placeholder="Type Email Address">
                            <input type="submit" value="Submit" class="btn btn-success form-control">
                        </div>

                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row pt-3">
                    <div class="col-md-7 offset-md-2 col-12 text-center">
                        <p class="copyright">&copy; 2018 Copyright : PayLittle</p>
                    </div>
                    <div class="col-md-3 col-12 text-center">
                        <ul class="list-inline">
                            <li class="list-inline-item py-1">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </li>
                            <li class="list-inline-item py-1">
                                <i class="fa fa-google-plus" aria-hidden="true"></i>
                            </li>
                            <li class="list-inline-item py-1">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </li>
                            <li class="list-inline-item py-1">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </li>
                            <li class="list-inline-item py-1">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </li>
                            <li class="list-inline-item py-1">
                                <a href="#" class="color-p">Back to Top</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
@endsection
