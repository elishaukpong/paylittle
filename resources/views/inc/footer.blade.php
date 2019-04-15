{{-- <footer class="text-white font-weight-light">
    <div class="container pt-5 border-bottom">



            <div class="col-md-5 col-12 pb-3 pb-0">
                <p class="text-uppercase font-weight-light pb-2 ml-md-4"> Get updates from us</p>
                <div class="ml-md-4">
                    <form action="{{route('email.subscribe')}}" method="POST">
                        @csrf
                        <input type="email" class="form-control mb-2 {{ $errors->has('emails') ? ' is-invalid' : '' }}" placeholder="Type Email Address" name="emails">
                         @if ($errors->has('emails'))
                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $errors->first('emails') }}</strong>
                                    </span>
                                @endif
                        <input type="submit" value="Submit" class="btn btn-warning form-control" id="email">
                    </form>

                </div>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row pt-3">


        </div>
    </div>
</footer> --}}


<footer>
    <div class="container py-5">
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-6 text-white">

                        <h4 class="text-uppercase font-weight-bold mb-3">Contact</h4>
                        <ul class="list-inline  pb-4 pb-md-0">
                            <li class="list-inline-item py-1">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="fa fa-map-marker mr-3" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-10">
                                        <p>
                                            16 Abua Street, Rumuibekwe, Port Harcourt, Rivers State
                                        </p>
                                    </div>
                                </div>
                            </li><br>
                            <li class="list-inline-item py-1">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="fa fa-envelope mr-3" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-10">
                                        <p>
                                            &nbsp; &nbsp; info@paylittle.ng
                                        </p>
                                    </div>
                                </div>
                            </li><br>
                            <li class="list-inline-item py-1">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="fa fa-phone mr-3" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-10">
                                        <p>
                                            07031960724 08080990560
                                        </p>
                                    </div>
                                </div>

                            </li><br>

                        </ul>

                    </div>
                    <div class="col-4 offset-1">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-uppercase font-weight-bold mb-3 text-white">Links</h4>
                                <ul class="list-inline  pb-4 pb-md-0">
                                    <li class="list-inline-item py-1"><a href="{{route('about')}}" class="text-white">About</a></li> <br>
                                    <li class="list-inline-item py-1"><a href="{{route('projects.index')}}" class="text-white">Projects</a></li> <br>
                                    <li class="list-inline-item py-1"><a href="{{route('blog')}}" class="text-white">Blog</a></li><br>
                                    <li class="list-inline-item py-1"><a href="{{route('contact')}}" class="text-white">Contact</a></li><br>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-12 text-center mt-5 mb-2">
                        <h1 class="display-5 text-white">PAYLITTLE</h1>
                    <p class="text-white">Copyright &copy; {{date('Y')}}</p>
                    </div>

                    <div class="col-12 text-center">
                        <ul class="list-inline m-0">
                            <li class="list-inline-item"><a href="#">Terms and Conditions</a></li>
                            <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                            <li class="list-inline-item"><a href="#">Disclaimer</a></li>
                            <li class="list-inline-item"><a href="#">Contact</a></li>
                        </ul>
                    </div>

                    <div class="col-12 text-center">
                        <ul class="list-inline m-0">
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                </a>
                            </li>

                            <li class="list-inline-item py-1">
                                <a href="#">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                            </li>

                            <li class="list-inline-item py-1">
                                <a href="#">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="col-12 text-center">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <a href="#" class="color-p">Back to Top</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>
