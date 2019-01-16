@extends('layouts.app')

@section('content')

    <section class="header">
        <div class="bg-shadow">
            <div class="container">
                <div class="row">
                    <div class="col-12 my-md-5 py-md-3 text-center">
                        <h1 class="text-uppercase mt-5 pt-md-5 text-light display-4 font-weight-bold">We make life better</h1>
                        <p class="text-light mb-5">Pay Little Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, nam.</p>

                        <a href="/sponsor" class="btn btn-success btn-lg mx-4 px-5 my-2">Become a Sponsor</a>
                        <a href="/client" class="btn btn-primary btn-lg mx-4 px-5 my-2">Become a Paylittler</a>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="my-5 py-4 who-we-are">
        <div class="container">
            <div class="row my-5">
                <div class="col-12 text-center">
                    <h1 class="text-uppercase p-c who mb-3">Who we are</h1>
                    <p class="mx-5 px-md-5 p-c">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae id inventore ullam numquam architecto molestiae quis rem deserunt quo atque.</p>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-md-4 col-12 px-4">
                    <i class="fa fa-lightbulb-o p-c my-4" aria-hidden="true"></i>
                    <h2 class="p-c text-uppercase">We Make your dreams come true</h2>
                    <p class="p-c my-3">Getting that perfect dream can be financially draining and physically stressful. We are here to alleviate this burden
                        from your shoulders</p>
                </div>

                <div class="col-md-4 col-12 px-4">
                    <i class="fa fa-cogs p-c my-4" aria-hidden="true"></i>
                    <h2 class="p-c text-uppercase">We help you do more with your finances</h2>
                    <p class="p-c my-3">Very little and more can be done wth your income. Let's help you optimize your income to create tthe life you desire </p>
                </div>

                <div class="col-md-4 col-12 px-4">
                    <i class="fa fa-university p-c my-4" aria-hidden="true"></i>
                    <h2 class="p-c text-uppercase">We help you secure your home</h2>
                    <p class="p-c my-3">Acquire homes through the PayLittle Housing scheme at very flexible payment deals. Start Living in your own apartment now</p>
                </div>

            </div>

        </div>
    </section>

    <section class="home-jum">
        <div class="container my-5 py-5">
            <div class="row">
                <div class="col-12">
                    <h5 class="text-center text-light">With Paylittle, you could either get help with optimizing your income to afford a range of commodities, or you could be a benefactor and help others live a comfortable life, this comes with its perks  </h5>
                </div>
            </div>
        </div>
    </section>
    <section class="partners my-5 py-3">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="p-c">Our Partners</h3>

                </div>
                <div class="col-12">
                    <div class="col-12 mx-auto text-center mb-4">
                        <ul class="list-inline">
                            <li data-aos="zoom-in" data-aos-duration="3000" class="list-inline-item mx-5">
                            <img src="{{asset('img/intuit.png')}}" alt="">
                            </li>
                            <li data-aos="zoom-in" data-aos-duration="3000" class="list-inline-item mx-5">
                            <img src="{{asset('img/intuit.png')}}" alt="">
                            </li>
                            <li data-aos="zoom-in" data-aos-duration="3000" class="list-inline-item mx-5">
                            <img src="{{asset('img/intuit.png')}}" alt="">
                            </li>
                        </ul>
                    </div>
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
