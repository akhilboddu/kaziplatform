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
        
        html,
        body {
           margin:0;
           padding:0;
           height:100%;
        }
        #container {
           min-height:100%;
           position:relative;
        }
        #header {
           background:#ff0;
           padding:10px;
        }
        #body {
           padding:10px;
           padding-bottom:60px;   /* Height of the footer */
        }
        #footer {
           
          position: absolute;
          right: 0;
          bottom: 0;
          left: 0;
          padding: 1rem;
          background-color: #efefef;
          text-align: center;

        }
        #demo {
          margin: 0 auto;
          padding-top: 64px;
          max-width: 640px;
          width: 94%;
        }

        

        @yield('style')

    </style>

    @yield('head')

</head>
<body>
    
    @include('inc.navbar')
    <div class="container">
        @include('inc.messages')
        @yield('content')
    </div>
    {{-- <div id="footer"></div> --}}
    
    {{-- <div class="footer">This footer will always be positioned at the bottom of the page, but <strong>not fixed</strong>.</div> --}}
       @include('inc.footer') 
   
    
</body>
    
    {{-- <div class="navbar navbar-inverse navbar-bottom">
    <div class="container">
      <p class="navbar-text pull-left">© 2014 - Site Built By Mr. M.
           <a href="http://tinyurl.com/tbvalid" target="_blank" >HTML 5 Validation</a>
      </p>

      <a href="http://youtu.be/zJahlKPCL9g" class="navbar-btn btn-danger btn pull-right">
      <span class="glyphicon glyphicon-star"></span>  Subscribe on YouTube</a>
    </div>
</div> --}}
    {{-- <div class="footer push" style="bottom: 0px;"></div> --}}
    

    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>  
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'ckeditor' );
    </script>
    <script type="text/javascript">
        new WOW().init();
    </script>
    @yield('script')


</html>


