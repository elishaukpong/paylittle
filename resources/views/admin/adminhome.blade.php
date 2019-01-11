@extends('layouts.admindashboard')
    @section('notifications')
        <div class="container my-4">
            <div class="row justify-content-center">
                <div class="col-md-8 mx-auto text-center">
                    @if ($user->email_verified_at == null)
                        <script>
                            swal("Your account is not verified!","", "info",{
                                buttons: ["Verify", "Cancel"],
                            });
                        </script>
                    @endif

                    @if (\Session::has('success'))
                        <script>
                            swal("{{ \Session::get('success') }}","", "success");
                        </script>
                    @endif
                    @if (\Session::has('error'))
                        <script>
                            swal("{{ \Session::get('error') }}","", "error");

                        </script>
                    @endif
                </div>
            </div>
        </div>
    @endsection

   
    
    @section('content')

    @endsection
