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