@extends('layouts.app')

@section('content')
	<div class="jumbotron text-center">
    		<h1 class="text-capitalize">Welcome {{Auth::user()->name}}!</h1>
		    	<p>Lets make a difference. Together. Explore opportunities.</p>
		        <p><a class="btn btn-success btn-lg" href="{{route('student.explore')}}" role="button">Explore Opportunities</a></p>
		</div>

@endsection