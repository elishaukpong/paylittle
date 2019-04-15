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
                <!-- Authentication Links -->
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
                        <a class="dropdown-item" href="{{route('user.projects.show')}}">
                                                                                My Projects
                                                                            </a>
                        <a class="dropdown-item" href="{{route('sponsored.project')}}">
                                                                                Sponsored Projects
                                                                            </a>

                    </div>
                </li>
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
            </ul>
        </div>
    </div>
</nav>
