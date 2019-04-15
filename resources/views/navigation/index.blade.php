@extends('layouts.app')
@section('content')

    <section class="header">
        <div class="bg-shadow">
            <div class="container">
                <div class="row">
                    <div class="col-12 my-md-5 py-md-3">
                        <h1 class="text-uppercase mt-5 pt-md-5 text-light display-4 font-weight-bold">We make life <br> better and cozy</h1>
                        <p class="text-light mb-5 font-weight-light">Pay Little helps you afford whatever you want while paying at your convinience.</p>
                        <br>
                        <a href="{{route('projects.index')}}" class="btn btn-primary btn-lg mr-4 px-5 py-3 my-2">Get Started</a>
                        <a href="#learnhow" class="btn btn-outline-light btn-lg mx-md-4 px-5 py-3 my-2">Learn How</a>
                    </div>
                </div>

                <br><br>
            </div>
        </div>

    </section>



    <section id="learnhow">
        <div class="container" >
            <div class="row">
                <div class="col-12 text-center pb-3">
                    <div class="mt-3 pt-3 mt-lg-5 pt-lg-5"></div>
                    <h1 class="p-c">How It Works</h1>
                    <br>
                    <div class="row">
                        <div class="col-md-6 col-12 mx-auto p-c">
                            <p>We make it possible to afford quick funding to take care of pressing issues and repay over a period of time.
                                Its a fast and simple process to secure this loan</p>

                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>

            <div class="row mt-md-5">
                <div class="col-12 col-md-7">
                    <img src="{{asset('img/create.jpg')}}" class="img-fluid rounded create-project-image">
                </div>
                <div class="col-12 col-md-5 flex-box">

                    <h1 class="p-c mx-md-4 my-4">Create Project</h1>
                    <ul class="text-left p-c" >
                        <li class="my-4">
                           Create an account.
                        </li>
                        <li class="my-4">
                           Go to dashboard, select new project.
                        </li>
                        <li class="my-4">
                           Provide project details and create
                        </li>
                        <li class="my-4">
                          and wait for feedback on project sonsorship.
                        </li>
                    </ul>

                </div>
            </div>
            <br><br>
            <div class="row mt-md-5 pt-md-5">

                <div class="col-12 col-md-5 flex-box">

                    <h1 class="p-c mx-4 my-4">Sponsor Project</h1>

                    <ul class="p-c">
                        <li class="my-4">
                            Open projects list from navigation bar.
                        </li>
                        <li class="my-4">
                            Scan through projects and choose anyone of choice
                        </li>
                        <li class="my-4">
                           Click on sponsorship, and select sponsorship amount
                        </li>
                        <li class="my-4">
                          Make payment for sponsorship and send details to sponsorship@paylittle.ng
                        </li>

                    </ul>

                </div>
                <div class="col-12 col-md-7 order-first order-md-last">
                    <img src="{{asset('img/sponsor.jpg')}}" class="img-fluid rounded sponsor-project-image">
                </div>
            </div>


        </div>
    </section>

    <section class="py-5 mt-4 ">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="mt-md-2 pt-md-1 mt-lg-3 pt-lg-3"></div>
                    <h1 class="p-c">Trending Projects</h1>
                    <div class="mt-md-2 pt-md-1 mt-lg-3 pt-lg-3"></div>
                </div>
            </div>
        </div>
         <div class="center slider">
             @foreach($projects as $project)
                <div class="card">
                    <div class="text-content-block">
                        <img class="card-img-top img-fluid project-image-size" src="{{asset($project->photo->projectavatar)}}" alt="Card image cap">
                        <div class="text-content p-3">
                            <p class="card-title font-weight-bold text-white">{{$project->name}}</p>
                            <p class="card-text text-white">{{$project->shortDetails}}</p>
                        </div>
                    </div>
                    <div class="card-body mt-3">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{$project->projectsponsorshippercentage}}" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <br>
                        <p class="float-lg-left text-primary">{{$project->formattedamountsponsored}}
                            <small class="font-weight-bold ">Raised</small>
                        </p>
                        <p class="float-lg-right text-primary">
                            <small class="font-weight-bold text-primary">Total</small> {{$project->formattedamount}}</p>

                        <a href="{{route('project.show', $project->slug)}}" class="btn btn-primary form-control text-white">View Project</a>
                    </div>
                </div>
             @endforeach
         </div>

    </section>

    <section class="banner">

        <div class="container">
            <div class="row py-5">
                <div class="col-md-9 col-12 text-center text-md-left">
                    <h1 class="font-weight-bold text-white py-4 py-md-0">Ready to create your project?</h1>
                </div>
                <div class="col-md-3 col-12 text-center text-md-left">
                    <a href="{{route('register')}}" class="btn boo btn-warning btn-lg px-4"> Get Started</a>
                </div>
            </div>

        </div>
    </section>

    <section class="my-5 py-5">

        <div class="container">

            <div id="carouselExampleIndicators" class="carousel slide mt-4" data-ride="carousel">
                <ol class="carousel-indicators d-none d-md-flex">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{asset('img/twelve.png')}}" class=" ml-md-5 pl-md-5 img-fluid rounded-circle" alt="">
                            </div>
                            <div class="col-md-7 ml-md-5">
                                <p class="mt-4 py-3 py-0 px-4 px-md-0 text-justify  testimonial">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam assumenda at consectetur eveniet explicabo. Culpa cupiditate
                                    eos est ex fugiat, maxime nemo nisi officiis porro praesentium sed, suscipit? Alias beatae
                                    consectetur, consequuntur delectus deserunt distinctio dolor, fugit harum hic id incidunt
                                    libero quia quisquam totam voluptatibus! Architecto aut ?
                                </p>
                                <h5 class="font-weight-bold px-4 px-md-0 "> JOHN MILLER</h5>
                                <p class="px-4 px-md-0 ">Founder, Farmsponsors</p>
                            </div>

                        </div>
                    </div>
                    <div class="carousel-item">

                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{asset('img/twelve.png')}}" class=" ml-md-5 pl-md-5 img-fluid rounded-circle" alt="">
                            </div>
                            <div class="col-md-7 ml-md-5">
                                <p class="mt-4  py-3 py-0 px-4 px-md-0  text-justify  testimonial">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam assumenda at consectetur eveniet explicabo. Culpa cupiditate
                                    eos est ex fugiat, maxime nemo nisi officiis porro praesentium sed, suscipit? Alias beatae
                                    consectetur, consequuntur delectus deserunt distinctio dolor, fugit harum hic id incidunt
                                    libero quia quisquam totam voluptatibus! Architecto aut ?
                                </p>
                                <h5 class="font-weight-bold px-4 px-md-0 "> JOHN MILLER</h5>
                                <p class="px-4 px-md-0 ">Founder, Farmsponsors</p>
                            </div>

                        </div>

                    </div>
                    <div class="carousel-item">

                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{asset('img/twelve.png')}}" class=" ml-md-5 pl-md-5 img-fluid rounded-circle" alt="">
                            </div>
                            <div class="col-md-7 ml-md-5">
                                <p class="mt-md-4  py-3 py-0 px-4 px-md-0  text-justify  testimonial">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam assumenda at consectetur eveniet explicabo. Culpa cupiditate
                                    eos est ex fugiat, maxime nemo nisi officiis porro praesentium sed, suscipit? Alias beatae
                                    consectetur, consequuntur delectus deserunt distinctio dolor, fugit harum hic id incidunt
                                    libero quia quisquam totam voluptatibus! Architecto aut ?
                                </p>
                                <h5 class="font-weight-bold px-4 px-md-0 "> JOHN MILLER</h5>
                                <p class="px-4 px-md-0 ">Founder, Farmsponsors</p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- @include('inc.slick') --}}
@endsection
