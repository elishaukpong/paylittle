@extends('layouts.app')

@section('content')
<section class="about-header">
    <div class="about-header-shadow">
        <div class="container">
            <div class="row  pt-5">
                <div class="col-12 text-center mt-5 ">
                    <h1 class="text-white text-uppercase display-3">About Us</h1>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="my-md-5 py-md-3 about">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 offset-md-1 col-12">
                <p class="text-secondary font-weight-bold mt-5 pt-2">About Paylittle</p>
                <h2 class="font-weight-bold text-secondaryy">How We Work And <br> What We Do</h2>
                <br>
                <p class="text-secondaryy">
                    Paylittle is about helping you raise money to support <br>
                    and fund your projects while paying back at a <br> convenience time frame. <br><br>
                    Paylittle also gives you the opportunity to use your<br>
                    money to sponsor other people's projects <br>
                    and recieve up to 20% returns
                </p>


                <p class="font-weight-bold p-c mt-4">Want to Sponsor? </p>
                <a href="#" class="btn btn-primary btn-sm boo"> See Our Projects </a>

            </div>



            <div class="col-md-4 col-12 about-image d-none d-md-block">
                <img src="{{asset('img/about1.jpg')}}" class="img-fluid border border-secondary p-1" alt="">
            </div>

            <div class="col-md-4 col-12 img-top d-none d-lg-block">
                <img src="{{asset('img/about2.jpg')}}" class="img-fluid rounded shadow"
                {{-- width="400px" height="400px" --}}
                >
            </div>
        </div>
    </div>
</section>

<br>
<hr class="mx-5 px-5">

<section class="my-md-5 py-2 py-md-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-12">
                <h3 class="font-weight-bold text-secondaryy">Mission & Vision</h3>
            </div>

            <div class="col-md-8 offset-md-1 col-12">
                <img src="{{asset('img/shapes.svg')}}" alt="" class="shape">
                <p class="font-weight-bold p-c">Our Mission</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus ipsa ipsam ipsum iure
                    laboriosam laborum magni necessitatibus nobis rem reprehenderit soluta tempore,
                    voluptatem voluptatibus. Aut commodi consequatur fuga suscipit veniam.
                </p>
                <br>
                <p class="font-weight-bold p-c">Our Vision</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus ipsa ipsam ipsum iure
                    laboriosam laborum magni necessitatibus nobis rem reprehenderit soluta tempore,
                    voluptatem voluptatibus. Aut commodi consequatur fuga suscipit veniam.
                </p>
            </div>
        </div>
    </div>
</section>

<hr>

{{-- <section class="my-5">

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="font-weight-bold text-secondaryy my-4">Our Partners</h1>

                <ul class="list-inline">
                    <li class="list-inline-item text-white mr-5">
                        <img src="{{asset('img/intuit.png')}}" class="">
                    </li>
                    <li class="list-inline-item text-white mr-5">
                        <img src="{{asset('img/intuit.png')}}" class="">
                    </li>
                    <li class="list-inline-item text-white mr-5">
                        <img src="{{asset('img/intuit.png')}}" class="">
                    </li>

                </ul>
            </div>
        </div>
    </div>
</section> --}}

<section class="banner">

    <div class="container">
        <div class="row py-5">
            <div class="col-md-9 col-12 text-center text-md-left">
                <h1 class="font-weight-bold text-white py-4 py-md-0">Want to help dreams come true?</h1>
            </div>
            <div class="col-md-3 col-12 text-center text-md-left">
                <a href="{{route('register')}}" class="btn boo btn-warning btn-lg px-4"> Get Started</a>
            </div>
        </div>

    </div>
</section>

@endsection


{{--
<section class="my-5 py-4 who-we-are">--}} {{--
    <div class="container">--}} {{--
        <div class="row my-5">--}} {{--
            <div class="col-12 text-center">--}} {{--
                <h1 class="text-uppercase p-c who mb-3">Who we are</h1>--}} {{--
                <p class="mx-5 px-md-5 p-c">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae id inventore ullam numquam architecto molestiae
                    quis rem deserunt quo atque.</p>--}} {{--
            </div>--}} {{--
        </div>--}} {{--

        <div class="row text-center">--}} {{--
            <div class="col-md-4 col-12 px-4">--}} {{--
                <i class="fa fa-lightbulb-o p-c my-4" aria-hidden="true"></i>--}} {{--
                <h2 class="p-c text-uppercase">We Make your dreams come true</h2>--}} {{--
                <p class="p-c my-3">Getting that perfect dream can be financially draining and physically stressful. We are here to alleviate
                    this burden--}} {{--from your shoulders</p>--}} {{--
            </div>--}} {{--

            <div class="col-md-4 col-12 px-4">--}} {{--
                <i class="fa fa-cogs p-c my-4" aria-hidden="true"></i>--}} {{--
                <h2 class="p-c text-uppercase">We help you do more with your finances</h2>--}} {{--
                <p class="p-c my-3">Very little and more can be done wth your income. Let's help you optimize your income to create tthe life
                    you desire </p>--}} {{--
            </div>--}} {{--

            <div class="col-md-4 col-12 px-4">--}} {{--
                <i class="fa fa-university p-c my-4" aria-hidden="true"></i>--}} {{--
                <h2 class="p-c text-uppercase">We help you secure your home</h2>--}} {{--
                <p class="p-c my-3">Acquire homes through the PayLittle Housing scheme at very flexible payment deals. Start Living in your own
                    apartment now</p>--}} {{--
            </div>--}} {{--

        </div>--}} {{--

    </div>--}} {{--
</section>--}}
{{--

<section class="home-jum">--}} {{--
    <div class="container my-5 py-5">--}} {{--
        <div class="row">--}} {{--
            <div class="col-12">--}} {{--
                <h5 class="text-center text-light">With Paylittle, you could either get help with optimizing your income to afford a range of commodities, or
                    you could be a benefactor and help others live a comfortable life, this comes with its perks </h5>--}}
                {{--
            </div>--}} {{--
        </div>--}} {{--
    </div>--}} {{--
</section>--}} {{----}} {{--
<section class="partners my-5 py-3">--}} {{--
    <div class="container">--}} {{--
        <div class="row">--}} {{--
            <div class="col-12 text-center">--}} {{--
                <h3 class="p-c">Our Partners</h3>--}} {{--

            </div>--}} {{--
            <div class="col-12">--}} {{--
                <div class="col-12 mx-auto text-center mb-4">--}} {{--
                    <ul class="list-inline">--}} {{--
                        <li data-aos="zoom-in" data-aos-duration="3000" class="list-inline-item mx-5">--}} {{--
                            <img src="{{asset('img/intuit.png')}}" alt="">--}} {{--
                        </li>--}} {{--
                        <li data-aos="zoom-in" data-aos-duration="3000" class="list-inline-item mx-5">--}} {{--
                            <img src="{{asset('img/intuit.png')}}" alt="">--}} {{--
                        </li>--}} {{--
                        <li data-aos="zoom-in" data-aos-duration="3000" class="list-inline-item mx-5">--}} {{--
                            <img src="{{asset('img/intuit.png')}}" alt="">--}} {{--
                        </li>--}} {{--
                    </ul>--}} {{--
                </div>--}} {{--
            </div>--}} {{--
        </div>--}} {{--
    </div>--}} {{-- </section> --}}
