@extends('layouts.app')
@section('content')

    <section class="header">
        <div class="bg-shadow">
            <div class="container">
                <div class="row">
                    <div class="col-12 my-md-5 py-md-3">
                        <h1 class="text-uppercase mt-5 pt-md-5 text-light display-4 font-weight-bold">We make life <br> better and cozzy</h1>
                        <p class="text-light mb-5 font-weight-light">Pay Little helps you afford whatever you want while paying at your convinience.</p>
                        <br>
                        <a href="{{route('userProjects.all')}}" class="btn btn-primary btn-lg mr-4 px-5 py-3 my-2">Get Started</a>
                        <a href="#learnhow" class="btn btn-outline-light btn-lg mx-md-4 px-5 py-3 my-2">Learn How</a>
                    </div>
                </div>

                <br><br>

                <div class="row">
                    <div class="col-12">
                        <ul class="list-inline">
                            {{--<li class="list-inline-item text-white mr-md-5">--}}
                                {{--<p class="font-weight-bold">--}}
                                    {{--Raised:--}}

                                {{--</p>--}}
                                {{--<hr class="home-divider">--}}
                                {{--<p class="font-weight-bold">NGN {{$totalRaisedAmount}}</p>--}}
                            {{--</li>--}}
                            <li class="list-inline-item text-white mr-md-5">
                                <p class="font-weight-bold">
                                    Projects:

                                </p>
                                <hr class="home-divider">
                                <p class="font-weight-bold">{{$projectcount}}</p>
                            </li>
                            <li class="list-inline-item text-white mx-md-5 mx-2">
                                <p class="font-weight-bold">
                                    Sponsored Up To:

                                </p>
                                <hr class="home-divider">
                                <p class="font-weight-bold">NGN {{$totalSponsoredAmount}}</p>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </section>

    {{--Featured Projects--}}
    <section class="mt-5 pt-5 featured-projects">

        <div class="container">
            <div class="row">
                <div class="col-12 mx-auto">
                    <ul class="nav nav-pills mb-3 ml-md-5 pl-md-5" id="pills-tab" role="tablist">
                        <li class="nav-item mx-4">
                            <a class="nav-link px-5 active" id="pills-home-tab" data-toggle="pill" href="#pills-allCampaigns" role="tab" aria-controls="pills-all" aria-selected="true">
                                All Projects
                            </a>
                        </li>
                        <li class="nav-item mx-4">
                            <a class="nav-link px-5" id="pills-profile-tab" data-toggle="pill" href="#pills-trendingCampaigns" role="tab" aria-controls="pills-trending" aria-selected="false">
                                Trending
                            </a>
                        </li>
                        <li class="nav-item mx-4">
                            <a class="nav-link px-5" id="pills-contact-tab" data-toggle="pill" href="#pills-newestCampaigns" role="tab" aria-controls="pills-newest" aria-selected="false">
                                Newest
                            </a>
                        </li>
                        <li class="nav-item mx-4">
                            <a class="nav-link px-5" id="pills-contact-tab" data-toggle="pill" href="#pills-mostFundedCampaigns" role="tab" aria-controls="pills-mostfunded" aria-selected="false">
                                Most Sponsored
                            </a>
                        </li>

                    </ul>

                    <div class="tab-content my-5" id="pills-tabContent">
                        {{--All Campaigns--}}
                        <div class="tab-pane fade show active" id="pills-allCampaigns" role="tabpanel" aria-labelledby="pills-all-tab">
                            <div class="container my-4">
                                <div class="row">
                                    @forelse ($projects as $project)
                                        <div class="col-md-4 col-12 mt-3">
                                            <div class="card">
                                                <a href="{{route('userProjects.show',$project->id)}}"><img class="card-img-top img-fluid" src="{{asset($project->photo->projectavatar)}}" alt="Card image cap"></a>
                                                <div class="card-body mt-3">
                                                    <p class="card-title font-weight-bold text-secondary">{{$project->name}}</p>
                                                    <p class="card-text">{{$project->shortDetails}}</p>
                                                    <p class="text-right text-primary">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                        {{ $project->subscription->count() ? $project->subscription->count(): 0}} Sponsors
                                                    </p>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: {{$project->projectsponsorshippercentage}}" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <br>
                                                    <p class="float-left text-secondary"> {{$project->formattedamountsponsored}} <small>Raised</small></p>
                                                    <p class="float-right text-secondary"><small>Total</small> {{$project->formattedamount}}</p>
                                                    <br><br>
                                                    <a href="{{route('userProjects.show', $project->id)}}" class="btn btn-primary form-control text-white">View Project Details</a>

                                                </div>
                                            </div>

                                        </div>



                                    @empty
                                    @endforelse

                                </div>

                                <div class="row my-5">
                                    <div class="col-12 text-center">
                                        <div class="col-12 text-center text-md-right">
                                            <a href="{{route('userProjects.all')}}" class="btn btn-outline-primary btn-lg pl-md-5 pr-md-4 boo">
                                                See More <i class="fa fa-long-arrow-right pl-3" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{--Trending Campaigns--}}
                        <div class="tab-pane fade" id="pills-trendingCampaigns" role="tabpanel" aria-labelledby="pills-trending-tab">
                            <div class="container my-4">
                                <div class="row">
                                    @forelse ($trendingprojects as $trendingproject)
                                        <div class="col-md-4 col-12 mt-3">
                                            <div class="card">
                                                <img class="card-img-top img-fluid" src="{{asset($trendingproject->project->photo->projectavatar)}}" alt="Card image cap">
                                                <div class="card-body mt-3">
                                                    <p class="card-title font-weight-bold text-secondary">{{$trendingproject->name}}</p>
                                                    <p class="card-text">{{$trendingproject->shortDetails}}</p>
                                                    <p class="text-right text-primary">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                        {{ $trendingproject->subscription ? $trendingproject->subscription->count(): 0}} Sponsors
                                                    </p>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: {{$trendingproject->projectsponsorshippercentage}}" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <br>
                                                    <p class="float-left text-secondary">{{$trendingproject->formattedamountsponsored}} <small>Raised</small></p>
                                                    <p class="float-right text-secondary"><small>Total</small> {{$trendingproject->formattedamount}}</p>
                                                    <br><br>
                                                    <a href="{{route('userProjects.show', $trendingproject->id)}}" class="btn btn-primary form-control text-white">View Project Details</a>

                                                </div>
                                            </div>

                                        </div>



                                    @empty

                                    @endforelse


                                </div>

                                <div class="row my-5">
                                    <div class="col-12 text-center">
                                        <div class="col-12 text-center text-md-right">
                                            <a href="{{route('userProjects.all')}}" class="btn btn-outline-primary btn-lg pl-md-5 pr-md-4 boo">
                                                See More <i class="fa fa-long-arrow-right pl-3" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{--Newest Campaigns--}}
                        <div class="tab-pane fade" id="pills-newestCampaigns" role="tabpanel" aria-labelledby="pills-newest-tab">
                            <div class="container my-4">
                                <div class="row">
                                    @forelse ($newestprojects as $project)
                                        <div class="col-md-4 col-12 mt-3">
                                            <div class="card">
                                                <img class="card-img-top img-fluid" src="{{asset($project->photo->projectavatar)}}" alt="Card image cap">
                                                <div class="card-body mt-3">
                                                    <p class="card-title font-weight-bold text-secondary">{{$project->name}}</p>
                                                    <p class="card-text">{{$project->shortDetails}}</p>
                                                    <p class="text-right text-primary">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                        {{ $project->subscription->count() ? $project->subscription->count(): 0}} Sponsors
                                                    </p>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: {{$project->projectsponsorshippercentage}}" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <br>
                                                    <p class="float-left text-secondary">{{$project->formattedamountsponsored}} <small>Raised</small></p>
                                                    <p class="float-right text-secondary"><small>Total</small> {{$project->formattedamount}}</p>
                                                    <br><br>
                                                    <a href="{{route('userProjects.show', $project->id)}}" class="btn btn-primary form-control text-white">View Project Details</a>

                                                </div>
                                            </div>

                                        </div>



                                    @empty

                                    @endforelse

                                </div>

                                <div class="row my-5">
                                    <div class="col-12 text-center">
                                        <div class="col-12 text-center text-md-right">
                                            <a href="{{route('userProjects.all')}}" class="btn btn-outline-primary btn-lg pl-md-5 pr-md-4 boo">
                                                See More <i class="fa fa-long-arrow-right pl-3" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{--Most Funded--}}
                        <div class="tab-pane fade" id="pills-mostFundedCampaigns" role="tabpanel" aria-labelledby="pills-mostfunded-tab">

                            <div class="container my-4">
                                <div class="row">
                                    @forelse ($projects as $project)
                                        <div class="col-md-4 col-12 mt-3">
                                            <div class="card">
                                                <img class="card-img-top img-fluid" src="{{asset($project->photo->projectavatar)}}" alt="Card image cap">
                                                <div class="card-body mt-3">
                                                    <p class="card-title font-weight-bold text-secondary">{{$project->name}}</p>
                                                    <p class="card-text">{{$project->shortDetails}}</p>
                                                    <p class="text-right text-primary">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                        {{ $project->subscription->count() ? $project->subscription->count(): 0}} Sponsors
                                                    </p>
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: {{$project->projectsponsorshippercentage}}" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <br>
                                                    <p class="float-left text-secondary">{{$project->formattedamountsponsored}} <small>Raised</small></p>
                                                    <p class="float-right text-secondary"><small>Total</small> {{$project->formattedamount}}</p>
                                                    <br><br>
                                                    <a href="{{route('userProjects.show', $project->id)}}" class="btn btn-primary form-control text-white">View Project Details</a>

                                                </div>
                                            </div>

                                        </div>



                                    @empty

                                    @endforelse

                                </div>

                                <div class="row my-5">
                                    <div class="col-12 text-center">
                                        <div class="col-12 text-center text-md-right">
                                            <a href="{{route('userProjects.all')}}" class="btn btn-outline-primary btn-lg pl-md-5 pr-md-4 boo">
                                                See More <i class="fa fa-long-arrow-right pl-3" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>


    <section class="second-header" id="learnhow">
        <div class="bg2-shadow">
            <div class="container">
                <div class="row py-5 text-white">
                    <div class="col-12">
                        <h3 class="display-5 text-white font-weight-bold">How it works</h3>
                        <p class="text-white"> We recommend you follow this process</p>
                    </div>
                </div>

                <div class="row text-center how-we-work pb-4">
                    <div class="col-12 col-md-3">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <br><br>
                        <h5 class="font-weight-bold mt-3 text-white">1. Create An Account</h5>
                        <p class=" text-white pt-3 font-weight-light">
                            Click on Get Started, fill in your details and submit.
                            Head to your mail box to confirm you email and then login
                        </p>
                    </div>

                    <div class="col-12 col-md-3">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        <br><br>
                        <h5 class="font-weight-bold mt-3 text-white">2. Sponsor A Project</h5>
                        <p class=" text-white pt-3 font-weight-light">
                            Check our project listings and select a project you wish to sponsor, read the details, and sponsor
                        </p>
                    </div>

                    <div class="col-12 col-md-3">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        <br><br>
                        <h5 class="font-weight-bold mt-3 text-white">3. Create A Project</h5>
                        <p class=" text-white pt-3 font-weight-light">
                            On your dashboard, click the create a project button, follow the instructions and submit
                        </p>
                    </div>

                    <div class="col-12 col-md-3">
                        <i class="fa fa-money" aria-hidden="true"></i>
                        <br><br>
                        <h5 class="font-weight-bold mt-3 text-white">4. Project Validation</h5>
                        <p class=" text-white pt-3 font-weight-light">
                           We will validate your project and then open for sponsorship, if it meets the criteria.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    {{--<section class="my-5 py-4 who-we-are">--}}
        {{--<div class="container">--}}
            {{--<div class="row my-5">--}}
                {{--<div class="col-12 text-center">--}}
                    {{--<h1 class="text-uppercase p-c who mb-3">Who we are</h1>--}}
                    {{--<p class="mx-5 px-md-5 p-c">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae id inventore ullam numquam architecto molestiae quis rem deserunt quo atque.</p>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="row text-center">--}}
                {{--<div class="col-md-4 col-12 px-4">--}}
                    {{--<i class="fa fa-lightbulb-o p-c my-4" aria-hidden="true"></i>--}}
                    {{--<h2 class="p-c text-uppercase">We Make your dreams come true</h2>--}}
                    {{--<p class="p-c my-3">Getting that perfect dream can be financially draining and physically stressful. We are here to alleviate this burden--}}
                        {{--from your shoulders</p>--}}
                {{--</div>--}}

                {{--<div class="col-md-4 col-12 px-4">--}}
                    {{--<i class="fa fa-cogs p-c my-4" aria-hidden="true"></i>--}}
                    {{--<h2 class="p-c text-uppercase">We help you do more with your finances</h2>--}}
                    {{--<p class="p-c my-3">Very little and more can be done wth your income. Let's help you optimize your income to create tthe life you desire </p>--}}
                {{--</div>--}}

                {{--<div class="col-md-4 col-12 px-4">--}}
                    {{--<i class="fa fa-university p-c my-4" aria-hidden="true"></i>--}}
                    {{--<h2 class="p-c text-uppercase">We help you secure your home</h2>--}}
                    {{--<p class="p-c my-3">Acquire homes through the PayLittle Housing scheme at very flexible payment deals. Start Living in your own apartment now</p>--}}
                {{--</div>--}}

            {{--</div>--}}

        {{--</div>--}}
    {{--</section>--}}

    {{--<section class="home-jum">--}}
        {{--<div class="container my-5 py-5">--}}
            {{--<div class="row">--}}
                {{--<div class="col-12">--}}
                    {{--<h5 class="text-center text-light">With Paylittle, you could either get help with optimizing your income to afford a range of commodities, or you could be a benefactor and help others live a comfortable life, this comes with its perks  </h5>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    {{----}}
    {{--<section class="partners my-5 py-3">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-12 text-center">--}}
                    {{--<h3 class="p-c">Our Partners</h3>--}}

                {{--</div>--}}
                {{--<div class="col-12">--}}
                    {{--<div class="col-12 mx-auto text-center mb-4">--}}
                        {{--<ul class="list-inline">--}}
                            {{--<li data-aos="zoom-in" data-aos-duration="3000" class="list-inline-item mx-5">--}}
                            {{--<img src="{{asset('img/intuit.png')}}" alt="">--}}
                            {{--</li>--}}
                            {{--<li data-aos="zoom-in" data-aos-duration="3000" class="list-inline-item mx-5">--}}
                            {{--<img src="{{asset('img/intuit.png')}}" alt="">--}}
                            {{--</li>--}}
                            {{--<li data-aos="zoom-in" data-aos-duration="3000" class="list-inline-item mx-5">--}}
                            {{--<img src="{{asset('img/intuit.png')}}" alt="">--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}

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
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam assumenda at consectetur eveniet explicabo.
                                    Culpa cupiditate eos est ex fugiat, maxime nemo nisi officiis porro praesentium sed,
                                    suscipit? Alias beatae consectetur, consequuntur delectus deserunt distinctio dolor,
                                    fugit harum hic id incidunt libero quia quisquam totam voluptatibus! Architecto aut ?
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
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam assumenda at consectetur eveniet explicabo.
                                    Culpa cupiditate eos est ex fugiat, maxime nemo nisi officiis porro praesentium sed,
                                    suscipit? Alias beatae consectetur, consequuntur delectus deserunt distinctio dolor,
                                    fugit harum hic id incidunt libero quia quisquam totam voluptatibus! Architecto aut ?
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
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam assumenda at consectetur eveniet explicabo.
                                    Culpa cupiditate eos est ex fugiat, maxime nemo nisi officiis porro praesentium sed,
                                    suscipit? Alias beatae consectetur, consequuntur delectus deserunt distinctio dolor,
                                    fugit harum hic id incidunt libero quia quisquam totam voluptatibus! Architecto aut ?
                                </p>
                                <h5 class="font-weight-bold px-4 px-md-0 "> JOHN MILLER</h5>
                                <p class="px-4 px-md-0 ">Founder, Farmsponsors</p>
                            </div>

                        </div>

                    </div>
                </div>


                {{--Arrow right and left--}}

                {{--<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">--}}
                    {{--<span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
                    {{--<span class="sr-only">Previous</span>--}}
                {{--</a>--}}
                {{--<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">--}}
                    {{--<span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
                    {{--<span class="sr-only">Next</span>--}}
                {{--</a>--}}
            </div>
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
@endsection
