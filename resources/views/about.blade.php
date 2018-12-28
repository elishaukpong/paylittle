@extends('layouts.main')

@section('content')
<section class="about-header">
    <div class="about-header-shadow">
        <div class="container">
            <div class="row  pt-5">
                <div class="col-12 text-center mt-5 pt-5">
                    <h1 class="text-white text-uppercase display-3">About Us</h1>
                </div>
            </div>
        </div>
    </div>

</section>
 <section class="my-5 py-5">
     <div class="container">
         <div class="row my-3">
             <div class="col-3 offset-2 text-center">
                <img src="{{asset('img/sp2.jpg')}}" alt="" class="img-fluid">
             </div>
             <div class="col-6 my-5">
                 <p class="p-c">
                    PayLittle is a platform that renders support to individuals with the aid of sponsors.
                    These sponsors can get returns on their sponsorship/investments as high as 20% depending on the investment duration. The paylittler is then offered this sponsorship as at when needed and pays back with a flexible payment deal when he/she can afford it.
                    This platform enables individuals to cater for their needs while paying little over a period of time.
                </p>
             </div>
         </div>
         <div class="row my-5 py-5">
            <div class="col-md-6 col-12 mb-5 mb-md-0 text-center">
                <h2 class="p-c font-weight-bold text-uppercase pb-4">Our Mission</h2>
                <p class="px-5 p-c">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu pretium magna. Mauris non quam id nisi vestibulum ultrices.
                    In varius mauris et sapien auctor,
                </p>
            </div>
            <div class="col-md-6 col-12 text-center">
                <h2 class="p-c font-weight-bold text-uppercase pb-4">Our Vision</h2>
                <p class="px-5 p-c">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu pretium magna. Mauris non quam id nisi vestibulum ultrices.
                    In varius mauris et sapien auctor,
                </p>
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
