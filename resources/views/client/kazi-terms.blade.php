<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href='//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Kazi') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    

</head>
<body>
    <div class="wrapper">
        <nav class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">

                        <a class="navbar-brand" href="">
                            {{ config('app.name', 'Laravel') }}
                        </a>

                    </div>

                   
            </nav>
        <div class="container">
            <div class="jumbotron text-center">
    		<h1>Terms and Conditions</h1>
		    	<p>For clients. Coming soon.</p>
		</div>
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