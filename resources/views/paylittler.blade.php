@extends('layouts.main')

@section('content')
<section class="bene-header">
    <div class="bene-header-shadow">
        <div class="container">
            <div class="row  pt-5">
                <div class="col-12 text-center mt-5 pt-5">
                    <h1 class="text-white text-uppercase display-3">Be a Pay Littler</h1>
                </div>
            </div>
        </div>
    </div>

</section>
 <section class="my-5 py-2">
     <div class="container">
         <div class="row">
             <div class="col-10 mx-auto text-center">
                 <p class="p-c">
                    As a Pay Littler, you are provided access to funds to finance your projects ranging through house rents, school fees, building projects etc and the payment is spread over a period of time, monthly, quarterly or outright payment. We want to make life more comfortable and convinient for you even with your meager income. 
                 </p>
             </div>
         </div>
         <div class="row my-5">
             <div class="col-6">
                <img src="{{asset('img/sp2.jpg')}}" class="img-fluid" alt="">
             </div>
             <div class="col-6 px-5 my-5">
                 <h4 class="p-c my-4">Let's help you pay for it today</h4>
                <form class="mr-5">
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone Number">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter Amount">
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>Select Duration of Sponsorship</option>
                            <option>3 Years</option>
                            <option>Below 3 and Above 2 Years</option>
                            <option>6 Months - 1 Year</option>
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
