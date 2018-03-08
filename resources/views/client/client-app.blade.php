<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href='//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'/>

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
    </style>

</head>
<body>
    <div class="wrapper">
        <div id="app">
        <nav class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Branding Image -->
                        @if(!Auth::guard('clients')->check())
                            <a class="navbar-brand" href="{{url('/')}}">
                                {{ config('app.name', 'Laravel') }}
                            </a>
                        @else
                            <a class="navbar-brand" href="{{route('client.home')}}">
                                {{ config('app.name', 'Laravel') }}
                            </a>
                        @endif

                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->

                        <ul class="nav navbar-nav">
                           	&nbsp;

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->

    						@if(Auth::guest())                   
    	                        <li><a href="{{ route('client.login') }}">Login</a></li>
    	                        <li><a href="{{ route('client.register')}}">Register</a></li>

    	                    @else
                                @if (!\Request::is('client/jobs/create'))  {{-- This checks for current route --}}
                                    <li><a href="{{route('jobs.create')}}">Post a Job</a></li>
                                @endif	                    
    	                        
                                @if(Auth::guard('clients')->check())
    	                           <li><a class="text-capitalize" href="{{ route('client.dashboard') }}">{{ Auth::guard('clients')->user()->company_name }}</a></li>
                                @else
                                    <li><a class="text-capitalize" href="{{ route('client.dashboard') }}">My Company</a></li>
                                @endif

    	                        <li><a href="{{ route('client.home') }}">Home</a></li>
    	                        <li><a href="{{ route('client.help') }}">Help</a></li>






                                            {{-- USING VUE.JS FOR NOTIFICATIONS --}}
                                    <application v-bind:notifications="notifications"></application>







    	                        <li class="dropdown">
    	                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
    	                                 <span class="caret"></span>
    	                            </a>

    	                            <ul class="dropdown-menu">
    	                                <li><a href="">Leaderboard</a></li>
    	                                <li>
    	                                    <a href="{{ route('logout') }}"
    	                                        onclick="event.preventDefault();
    	                                                 document.getElementById('logout-form').submit();">
    	                                        Sign out
    	                                    </a>

    	                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    	                                        {{ csrf_field() }}
    	                                    </form>
    	                                </li> 
    	                            </ul>
    	                        </li>
    	                     @endif
                            
                        </ul>
                    </div>
                </div>
            </nav>
            </div>
        <div class="container">
            @include('inc.messages')
            @yield('content')
        </div>
        <div class="push"></div>
        <nav class="navbar navbar-default" role="navigation">

            @include('inc.footer')

        </nav>
    </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'ckeditor' );
        </script>

    
</body>
</html>