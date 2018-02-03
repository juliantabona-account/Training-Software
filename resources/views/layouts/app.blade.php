<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title'){{ env('APP_NAME') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('fonts/font-awesome/css/font-awesome.min.css') }}">

        <!-- Linked Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap-4/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/default-navbar.css') }}" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">

        <!-- Additional Styles -->

        @yield('style')

    </head>  
    <body>
        <div id = "app">
            
            @if(Auth::check())
                @include('layouts.navigation.client-dashboard')
            @else
                @include('layouts.navigation.default')
            @endif

            @yield('content')

        </div>

        <script src="{{ asset('js/app.js') }}"></script>

        <!-- jQuery-3.0.0.min --> 
        <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>

        <!-- Popper-1.12.3.js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

        <!-- Bootstrap 4 -->
        <script src="{{ asset('js/bootstrap-4/bootstrap.min.js') }}"></script>

        <!-- Cycle.js [For Converting Javascript Object to JSON - It Encodes Cyclical Structures to JSON]--> 
        <script src="{{ asset('js/cycle.js') }}"></script>

        <script src="{{asset('js/jquery-sortable/jquery-sortable.js')}}"></script> 

        <!-- Additional Js -->
        @yield('js')

        <!-- Main.js [App Custom Js] -->
        <script src="{{ asset('js/main.js') }}"></script>

    </body>
</html>
