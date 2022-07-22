<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!--App Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Dashboard Styles -->
        <link href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('backend/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
        <link href="{{asset('backend/css/animate.css')}}" rel="stylesheet">
        <link href="{{asset('backend/css/style.css')}}" rel="stylesheet">

        <!--App Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

    </head>
    <body class="gray-bg">
        
        @yield('admin_auth_content')


        <!-- Mainly scripts -->
        <script src="{{asset('backend/js/jquery-3.1.1.min.js')}}"></script>
        <script src="{{asset('backend/js/popper.min.js')}}"></script>
        <script src="{{asset('backend/js/bootstrap.js')}}"></script>
    </body>
</html>
