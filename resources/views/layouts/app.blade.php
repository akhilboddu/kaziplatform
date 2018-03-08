<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'/> 
    <link href="https://fonts.googleapis.com/css?family=Pontano+Sans" rel="stylesheet">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <meta name="token" id="token" value="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Kazi') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style type="text/css">
        * {
            margin: 0;
        }
        html, body {
            height: 100%;
        }
        .wrapper {
            min-height: 100%;
            height: 100%;
            margin: 0 auto -155px; /* the bottom margin is the negative value of the footer's height */
        }
        .footer, .push {
            height: 155px; /* .push must be the same height as .footer */
        }

        @yield('style')

    </style>

    @yield('head')

</head>
<body>
    <div class="wrapper">
    @include('inc.navbar')
    <div class="container">
        @include('inc.messages')
        @yield('content')
    </div>
    <div class="footer push" style="bottom: 0px;"></div>
    <nav class="navbar navbar-inverse" role="navigation">
        @include('inc.footer')
    </nav>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>  
    @yield('script')

</body>
</html>


