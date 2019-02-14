<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Paylittle') }}</title>

    {{--Scripts--}}
   @include('inc.scripts')



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700,800" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
          crossorigin="anonymous">

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
                            <li class="nav-item mx-3">
                                <a class="nav-link text-light" href="/login">Login</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a class="nav-link text-primary btn btn-warning px-4" href="/register">Sign Up</a>
                            </li>

                        @else

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
                @auth
                {{-- Flash Notifications --}}
                <div class="row">
                    <div class="col-12">
                        <div class="container my-4">
                            <div class="row justify-content-center">
                                <div class="col-md-8 mx-auto text-center">
                                    {{--@if ($user->email_verified_at !== null)--}}
                                        {{--<script>--}}
                                             {{--swal("Your account is not verified!","", "info",{--}}
                                                {{--buttons: ["Verify", "Cancel"],--}}
                                             {{--});--}}
                                        {{--</script>--}}
                                    {{--@endif--}}

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
                @endauth

                {{-- App Layout --}}
                <div class="row">

                    <div class="col-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
       @include('inc.footer')

    </div>
</body>

</html>
