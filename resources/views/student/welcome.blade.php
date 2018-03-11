@extends('layouts.app')

@section('content')
	<div class="jumbotron text-center">
			<img style="width: 50%;" src="/storage/logo.png">
			<h2>Kazi Tech Solutions</h2>
    		<h4><kbd>A Working Experience</kbd></h4>
    		<h1 class="text-capitalize">Welcome {{Auth::user()->name}}!</h1>
		    	<p>Lets make a difference. Together. Explore opportunities!</p>
		        <p><a class="btn btn-success btn-lg" href="{{route('student.explore')}}" role="button">Explore Opportunities</a></p>
		</div>

		

@endsection