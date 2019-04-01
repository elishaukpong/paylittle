<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Paylittle') }}</title>

    {{--Scripts--}}
    @include('inc.scripts') {{-- Styles and Fonts --}}
    @include('inc.styles')

</head>

<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark ">
            <div class="container">
                <a class="navbar-brand text-light" href="{{ url('/') }}">
                Paylittle
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon">
                        {{-- <i class="fa fa-navicon"></i> --}}
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"> </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto my-2 dashboard">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item mx-2">
                                <a class="nav-link text-light" href="{{route('about')}}">About Us</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link text-light" href="{{route('projects.index')}}">Projects</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link text-light" href="{{route('blog')}}">Blog</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link text-light" href="{{route('contact')}}">Contact Us</a>
                            </li>

                            <li class="nav-item mx-3">
                                <a class="nav-link text-light" href="{{route('login')}}">Login</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a class="nav-link text-primary btn btn-warning px-4" href="{{route('register')}}">Sign Up</a>
                            </li>

                        @else

                            <li class="nav-item mx-2">
                                <a class="nav-link text-light" href="{{route('about')}}">About Us</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link text-light" href="{{route('blog')}}">Blog</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link text-light" href="{{route('contact')}}">Contact Us</a>
                            </li>

                            <li class="nav-item mx-2 dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" v-pre>
                                    Projects <span class="caret"></span>
                                    </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('project.create')}}">
                                                                            New Project
                                                                    </a>
                                    <a class="dropdown-item" href="{{route('projects.index')}}">
                                                                        All Projects
                                                                    </a>
                                    <a class="dropdown-item" href="{{route('user.projects.show', $user->id)}}">
                                                                        My Projects
                                                                    </a>
                                    <a class="dropdown-item" href="{{route('sponsored.project')}}">
                                                                        Sponsored Projects
                                                                    </a>

                                </div>
                            </li>
                            @if(!$user->is_admin)
                                <li class="nav-item mx-2 dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" v-pre>
                                        Guarantors <span class="caret"></span>
                                        </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{route('guarantor.create')}}">
                                                New Guarantor
                                            </a>
                                        <a class="dropdown-item" href="{{route('guarantor.index')}}">
                                                My Gurantors
                                            </a>


                                    </div>
                                </li>
                            @else
                          <li class="nav-item mx-2">
                            <a class="nav-link text-light" href="{{route('admin.show.users')}}">Users</a>
                        </li>
                            @endif

                            <li class="nav-item mx-2 dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" v-pre>
                                        {{ Auth::user()->first_name }} <span class="caret"></span>
                                    </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('user.show')}}">
                                            {{ __('My Profile') }}
                                        </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
    @include('inc.alerts')
            <div class="container-fluid my-4">
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
