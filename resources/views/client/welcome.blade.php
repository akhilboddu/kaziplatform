@extends('client.client-app') 

@section('content')
    
    
	<div class="jumbotron text-center">
		<h1>Client Welcome page</h1>
	    	<p>This is the future. Sign up now!</p>

	    	@guest
	        	<p><a class="btn btn-success btn-lg" href="" role="button">Sign Up</a></p>
	        @endguest
	</div>
   
        
    
@endsection