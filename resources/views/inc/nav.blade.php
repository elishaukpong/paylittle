<nav class="navbar navbar-expand-md navbar-dark ">
    <div class="container">
        <a class="navbar-brand text-light" href="{{ url('/') }}">
                       <img src="{{asset('img/logo.png')}}" alt="Logo" class="img-fluid" width="50px" height="50px">
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
            </ul>
        </div>
    </div>
</nav>
