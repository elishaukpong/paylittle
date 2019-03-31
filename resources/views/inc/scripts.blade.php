<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<!-- Get a specific version -->
<script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll@14.0.0/dist/smooth-scroll.polyfills.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ asset('js/custom.js') }}" defer></script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
        var scroll = new SmoothScroll('a[href*="#"]');
    })
</script>
@if(Request::segment(1) == "account")
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

