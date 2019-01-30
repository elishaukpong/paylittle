<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PayLITTLE') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700,800" rel="stylesheet">


</head>
<body>

    <div id="app">
        <nav class="navbar navbar-expand-md bg-primary ">
            <div class="container">
                <a class="navbar-brand text-light" href="{{ url('/') }}">
                Paylittle
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto my-2 dashboard">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item mx-3">
                                <a class="nav-link text-light" href="/">Home</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a class="nav-link text-light" href="/about">About</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a class="nav-link text-light" href="/contact">Contact</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            {{-- <li class="nav-item mx-1">
                                <a class="nav-link text-light" href="/"><i class="fa fa-home" aria-hidden="true"></i></a>
                            </li> --}}
                            {{--<li class="nav-item mx-1 note">--}}
                                {{--<a class="nav-link text-light" href="#">--}}
                                    {{--<i class="fa fa-bell-o" aria-hidden="true"> </i> --}}
                                {{--</a>--}}
                                {{--<i class="badge bg-danger text-light">3</i>--}}
                            {{--</li>--}}
                            <li class="nav-item mx-1 note">
                                <a class="nav-link text-light" href="{{route('clientarea')}}">
                                    Dashboard
                                </a>
                            </li>

                            <li class="nav-item mx-1 note">
                                <a class="nav-link text-light" href="{{route('userProjects.all')}}">
                                    Projects
                                </a>
                            </li>

                            <li class="nav-item mx-1 note">
                                <a class="nav-link text-light" href="{{route('user.show', Auth::user()->id)}}">
                                  Account
                                </a>
                            </li>

                            <li class="nav-item mx-1 note">
                                <a class="nav-link text-light" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            <div class="container-fluid my-4">
                {{-- Flash Notifications --}}
                <div class="row">
                    <div class="col-12">
                        <div class="container my-4">
                            <div class="row justify-content-center">
                                <div class="col-md-8 mx-auto text-center">
                                    @if ($user->email_verified_at !== null)
                                        <script>
                                             swal("Your account is not verified!","", "info",{
                                                buttons: ["Verify", "Cancel"],
                                             });
                                        </script>
                                    @endif

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
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- App Layout --}}
                <div class="row">

                    <div class="col-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
        <footer class="text-white font-weight-light">
            <div class="container pt-5 border-bottom">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <p class="text-uppercase font-weight-bold">Contact</p>
                        <ul class="list-inline  pb-4 pb-md-0">
                            <li class="list-inline-item py-1 pr-5">
                                <i class="fa fa-map-marker mr-3" aria-hidden="true"></i> 16 Abua Street, PH
                            </li><br>
                            <li class="list-inline-item py-1">
                                <i class="fa fa-envelope mr-3" aria-hidden="true"></i> info@paylittle.ng
                            </li><br>
                            <li class="list-inline-item py-1">
                                <i class="fa fa-phone mr-3" aria-hidden="true"></i> Null
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
                        <p class="text-uppecase font-weight-bold pb-2 ml-md-4"> Get updates from us</p>
                        <div class="ml-md-4">
                            <input type="text" class="form-control mb-2" placeholder="Type Email Address">
                            <input type="submit" value="Submit" class="btn btn-warning form-control">
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
<script src="{{ asset('js/custom.js') }}" defer></script>

</html>
