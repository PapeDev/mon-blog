<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    <!-- Stylesheets -->
    <link href="{{ asset('front/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/swiper.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    {{--<link href="{{ asset('front/css/ionicons.css') }}" rel="stylesheet">--}}

    @stack('css')
</head>
<body>
@include('layouts.front.partials.header')

@yield('content')

@include('layouts.front.partials.footer')

<!-- SCIPTS -->

<script src="{{ asset('front/js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('front/js/tether.min.js') }}"></script>
<script src="{{ asset('front/js/bootstrap.js') }}"></script>
<script src="{{ asset('front/js/swiper.js') }}"></script>
<script src="{{ asset('front/js/scripts.js') }}"></script>
@stack('scripts')
</body>
</html>