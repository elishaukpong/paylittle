<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mx-auto text-center">

            @auth
            @if ($user->email_verified_at == null && Request::is('clientarea'))
                <script>
                    swal("Your account is not verified!","", "info",{
                        buttons: ["Verify", "Cancel"],
                    });
                </script>
            @endif
            @endauth

            @if (session('success'))
                <script>
                   toastr.success(" {{session('success')}} ")
                </script>
            @endif
            @if (session('error'))
                <script>
                    swal("{{ session('error') }}","", "error");

                </script>
            @endif
            @if (session('info'))
            <script>
               toastr.info(" {{session('info')}} ")
            </script>
            @endif
        </div>
    </div>
</div>

