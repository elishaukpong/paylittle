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

<section class="my-5 py-3 about">
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



            <div class="col-md-4 col-12 about-image">
                <img src="https://placeimg.com/400/500" class="img-fluid border border-secondary p-1" alt="">
            </div>
            
            <div class="img-top">
                <img src="https://placeimg.com/250/250" class="rounded shadow">
            </div>
        </div>
    </div>
</section>

<section class="my-5 py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-12">
                <h3 class="font-weight-bold text-secondaryy">Mission & Vision</h3>
            </div>

            <div class="col-md-8 offset-md-1 col-12">
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

<section class="my-5">

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="font-weight-bold text-secondaryy">Our Partners</h1>
            </div>
        </div>
    </div>
</section>

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
