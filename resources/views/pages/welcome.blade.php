@extends('layouts.app') 

@section('content')
    
    @if(Auth::guest())
    	<div class="jumbotron text-center">
    		<img style="width: 50%;" src="/storage/logo.png">
    		<h2>Kazi Tech Solutions</h2>
    		<h4><kbd>A Working Experience</kbd></h4>
				<br>
		    	<p>Lets make a difference. Together.</p>
		        <p><a class="btn btn-primary btn-lg" style="margin-right: 10px" href="{{route('login')}}" role="button">Login</a><a class="btn btn-success btn-lg" href="{{route('register')}}" role="button">Register</a></p>

		</div>
    @else 
    	@include('student.welcome')
    @endif
        
    
@endsection