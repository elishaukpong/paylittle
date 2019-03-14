<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'PayLITTLE') }}</title>
{{--Scripts--}}
@include('inc.scripts')

<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Gothic+A1:200,300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:700,300,300i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
          crossorigin="anonymous">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-dark navbar-expand-md">
        <div class="container">
            <a class="navbar-brand text-light" href="{{ url('/') }}">
                PayLittle
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
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
                        <li class="nav-item mx-1 note">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-light"
                               role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Projects
                                <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('userProjects.view', $user->id)}}">
                                    My Projects
                                </a>
                                <a class="dropdown-item" href="{{route('userProjects.all')}}">
                                    All Projects
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>

                        <li class="nav-item mx-3 dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
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
        @if (session('success'))
            <script>
                swal("{{ session('success') }}", "", "success");
            </script>
        @endif

        @yield('content')
    </main>

    @include('inc.footer')

</div>
</body>

</html>
