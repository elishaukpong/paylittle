<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-8 mx-auto text-center">

            @if ($user->email_verified_at == null && Request::is('clientarea'))
                <script>
                    swal("Your account is not verified!","", "info",{
                        buttons: ["Verify", "Cancel"],
                    });
                </script>
            @endif

            @if (session('success'))
                <script>
                    swal("{{ session('success') }}","", "success");
                </script>
            @endif
            @if (session('error'))
                <script>
                    swal("{{ session('error') }}","", "error");

                </script>
            @endif
            @if (session('info'))
            <script>
                swal("{{ session('info') }}","", "info");
            </script>
            @endif
        </div>
    </div>
</div>

