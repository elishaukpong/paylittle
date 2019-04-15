<footer class="text-white font-weight-light">
    <div class="container pt-5 border-bottom">
        <div class="row">
            <div class="col-md-3 col-12">
                <p class="text-uppercase font-weight-light">Contact</p>
                <ul class="list-inline  pb-4 pb-md-0">
                    <li class="list-inline-item py-1 pr-5">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-map-marker mr-3" aria-hidden="true"></i>
                            </div>
                            <div class="col-10">
                                16 Abua Street, Rumuibekwe, Port Harcourt, Rivers State
                            </div>
                        </div>
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
                <p class="text-uppercase font-weight-light">Useful Links</p>
                <ul class="list-inline  pb-4 pb-md-0">
                    <li class="list-inline-item py-1"><a href="{{route('about')}}" class="text-white">About</a></li> <br>
                <li class="list-inline-item py-1"><a href="{{route('blog')}}" class="text-white">Blog</a></li><br>
                <li class="list-inline-item py-1"><a href="{{route('contact')}}" class="text-white">Contact</a></li><br>
                </ul>
            </div>

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
            <div class="col-md-7 offset-md-2 col-12 text-center">
                <p class="copyright">&copy; 2019  PayLittle</p>
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
