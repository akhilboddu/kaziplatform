@extends('layouts.app') 

@section('content')
	<h1>REGISTERING A CLUSTER</h1>
	<hr>

  	<p>Please fill in the general information about the Cluster.</p>

		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#overview">General</a></li>
		</ul>

		<div class="tab-content">
			<div id="overview" class="tab-pane fade in active">
				<h3>Overview</h3>
					<br>
					{{-- can use 'url' but using 'action', need to describe method --}}
					{!! Form::open(['action' => 'ClustersController@store', 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}

				    	<div class='form-group'> {{-- Bootstrap accepted in forms --}}
				    		{{Form::label('name', 'Name of Cluster')}} {{-- the label --}}
				    		{{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name of your cluster'])}}
				    	</div>

				    	<div class='form-group'> 
				    		{{Form::label('slogan', 'Headline')}} 
				    		{{Form::text('slogan', '', ['class' => 'form-control', 'placeholder' => 'Create a headline for your cluster'])}}
				    	</div>

				    	{{Form::submit('Save', ['class' => 'btn btn-primary'])}}
				    	

					{!! Form::close() !!}
				</div>

				
		</div>
		<div id='app'></div>
	
@endsection

@section('script')










@endsection