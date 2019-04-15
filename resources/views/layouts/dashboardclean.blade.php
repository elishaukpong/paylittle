<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Paylittle') }}</title>
    <link rel="shortcut icon" href="{{asset('img/logo.png')}}" type="image/x-icon">

    {{--Scripts--}}
    @include('inc.scripts') {{-- Styles and Fonts --}}
    @include('inc.styles')

</head>

<body>

    <div id="app">
         @auth
            @include('inc.auth-nav')
        @else
            @include('inc.nav')
        @endauth


        <main class="">
            @include('inc.alerts')
            <div class="container-fluid my-4">
                {{-- App Layout --}}
                <div class="row">
                    <div class="col-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    @include('inc.footer')

    </div>
</body>

</html>
