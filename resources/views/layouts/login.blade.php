<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}"> 
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}"> 
    <link rel="stylesheet" href="{{ asset('plugins/dist/css/adminlte.min.css') }}"> 
</head>
<body class="login-page" style="min-height: 466px;">
    @yield('content') 
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script> 
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> 
    <script src="{{ asset('plugins/dist/js/adminlte.js') }}"></script> 
    @yield('scripts')
</body>
</html>