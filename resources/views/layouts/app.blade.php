<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'PayLITTLE') }}</title>

    <link rel="shortcut icon" href="{{asset('img/logo.png')}}" type="image/x-icon">


    {{-- Styles and Fonts --}}
    @include('inc.styles')

    {{--Scripts--}}
    @include('inc.scripts')
</head>
<body>

    <div id="app">
        @auth
            @include('inc.auth-nav')
        @else
            @include('inc.nav')
        @endauth

        <main class="">
            @if (session('success'))
                <script>
                    swal("{{ session('success') }}", "", "success");
                </script>
            @endif

            @yield('content')
        </main>

        @include('inc.footer')

    </div>
</body>

</html>
