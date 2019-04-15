<!-- Scripts -->

<script src="{{ asset('js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<!-- Get a specific version -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ asset('js/custom.js') }}"></script>


@if(Request::segment(1) == "account" || Request::segment(1) == "users")
    <script>
        $(function () {
            $imageToUse = $('.user-profile-image').attr('src');
            $image = "linear-gradient(to right, #328cf284, #328cf292), url('" + $imageToUse + "')";

            $('#user').css('background', $image);
            $('#user').css('background-size', 'cover');
            $('#user').css('background-position', 'center');
        })
    </script>
@endif

<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="{{asset('slick/slick.min.js')}}" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" defer>
    $(document).on('ready', function() {
            $(".center").slick({
                dots: true,
                infinite: true,
                centerMode: true,
                slidesToShow: 3,
                slidesToScroll: 5,
                variableWidth: true
            });
        });

</script>
