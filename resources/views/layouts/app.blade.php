<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PayLITTLE') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Gothic+A1:200,300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:700,300,300i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous">



</head>
<body>
    <div id="app">
        <nav class="navbar navbar-light navbar-expand-md">
            <div class="container">
                <a class="navbar-brand text-light" href="{{ url('/') }}">
                    PayLittle
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon text-light"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto my-2">
                        <!-- Authentication Links -->
                        @guest

                            <li class="nav-item mx-3">
                                <a class="nav-link text-light" href="/about">About</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a class="nav-link text-light" href="/blog">Blog</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a class="nav-link text-light" href="/contact">Contact Us</a>
                            </li>

                             <li class="nav-item mx-3">
                                <a class="nav-link text-light" href="/login">Login</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a class="nav-link text-primary btn btn-warning px-4" href="/register">Sign Up</a>
                            </li>

                        @else
                            <li class="nav-item mx-3">
                                <a class="nav-link text-light" href="/about">About</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a class="nav-link text-light" href="/Blog">Blog</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a class="nav-link text-light" href="/contact">Contact Us</a>
                            </li>

                            <li class="nav-item mx-3 dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->first_name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('clientarea') }}">
                                        {{ __('Dashboard') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

            <main class="">
                @if (\Session::has('success'))
                    <script>
                        swal("{{ \Session::get('success') }}","", "success");
                    </script>
                @endif
                @if (\Session::has('error'))
                    <script>
                        swal("{{ \Session::get('error') }}","", "error");

                    </script>
                @endif

            @yield('content')
        </main>

        <footer class="text-white font-weight-light">
            <div class="container pt-5 border-bottom">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <p class="text-uppercase font-weight-light">Contact</p>
                        <ul class="list-inline  pb-4 pb-md-0">
                            <li class="list-inline-item py-1 pr-5">
                                <i class="fa fa-map-marker mr-3" aria-hidden="true"></i> 16 Abua Street, PH
                            </li><br>
                            <li class="list-inline-item py-1">
                                <i class="fa fa-envelope mr-3" aria-hidden="true"></i> info@paylittle.ng
                            </li><br>
                            <li class="list-inline-item py-1">
                                <i class="fa fa-phone mr-3" aria-hidden="true"></i>
                                07031960724 <br> &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 08080990560
                            </li><br>

                        </ul>
                    </div>
                    <div class="col-md-2 col-12">
                        <p class="text-uppercase font-weight-light">Products</p>
                        <ul class="list-inline  pb-4 pb-md-0">
                            <li class="list-inline-item py-1">Oracle Technology</li> <br>
                            <li class="list-inline-item py-1">Google Cloud</li> <br>
                            <li class="list-inline-item py-1">Bonitasoft</li> <br>
                            <li class="list-inline-item py-1">Microsoft Suites</li> <br>
                        </ul>
                    </div>
                    <div class="col-md-2 offset-md-1 col-12">
                        <p class="text-uppercase font-weight-light">Useful Links</p>
                        <ul class="list-inline  pb-4 pb-md-0">
                            <li class="list-inline-item py-1">About Us</li> <br>
                            <li class="list-inline-item py-1">Products & Services</li><br>
                            <li class="list-inline-item py-1">Blog</li><br>
                            <li class="list-inline-item py-1">Contact Us</li><br>
                        </ul>
                    </div>
                    <div class="col-md-3 col-12">
                        <p class="text-uppercase font-weight-light pb-2 ml-md-4"> Get updates from us</p>
                        <div class="ml-md-4">
                            <form action="{{route('email.subscribe')}}" method="POST">
                                @csrf
                                <input type="text" class="form-control mb-2" placeholder="Type Email Address" name="emails">
                                <input type="submit" value="Submit" class="btn btn-warning form-control" id="email">
                            </form>

                        </div>
                        <div class="ml-md-4 mt-5">
                            <img src="{{asset('img/leadway.png')}}" style="width:30%" class="img-fluid float-right">
                            <p class="float-right pt-4">Insured By:</p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row pt-3">
                    <div class="col-md-7 offset-md-2 col-12 text-center">
                        <p class="copyright">&copy; 2019 Copyright : PayLittle</p>
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

    </div>
</body>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll@14.0.0/dist/smooth-scroll.polyfills.min.js"></script>
<script src="{{ asset('js/custom.js') }}" defer></script>
<script>
    // var scroll = new SmoothScroll('a[href*="#"]', {easing: 'easeInQuad'});
</script>

</html>
