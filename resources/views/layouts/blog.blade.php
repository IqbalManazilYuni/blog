<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('description')">
    <title>{{ config('app.name') }}</title>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/my-blog/css/blog.css') }}" rel="stylesheet">
    <script src="{{ asset('vendor/fontawesome-free/js/all.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('vendor/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/bg/full_bps.png') }}" type="image/x-icon">
</head>

<body class="d-flex flex-column min-vh-100">


    @include('layouts._blog._navbar')
    <div class="container">
        @yield('content')
    </div>
    @include('layouts._blog._footer')
    <script src="{{ asset('vendor/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
