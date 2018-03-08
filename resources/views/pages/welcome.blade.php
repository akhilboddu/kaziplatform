@extends('layouts.app') 

@section('content')
    
    @if(Auth::guest())
    	<div class="jumbotron text-center">
    		<h1>Kazi Technologies</h1>
		    	<p>Lets make a difference. Together. Sign up now!</p>
		        <p><a class="btn btn-success btn-lg" href="/register" role="button">Sign Up</a></p>
		</div>
    @else 
    	@include('student.welcome')
    @endif
        
    
@endsection