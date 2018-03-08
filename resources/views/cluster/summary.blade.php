@extends('layouts.app') 

@section('content')

	<div class="container">
		<h1>Summary of requests</h1>
		<hr>

		<ul class="list-group">
			<li class="list-group-item">{{$member2}}</li>
		</ul>

		<div class="row">
			<a class="pull-left btn btn-primary btn-lg" href="{{route('addmember', Auth::user()->cluster->id)}}">Add more</a>
			<a class="pull-right btn btn-success btn-lg" href="{{route('cluster.show', Auth::user()->cluster->id)}}">Dashboard</a>
		</div>
	</div>

@endsection

