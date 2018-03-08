@extends('client.client-app') 

@section('content')
	<h1>EDIT JOB</h1>
	<hr>

  	<p>Please change the details as needed.</p>

		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#overview">General</a></li>
			<li><a data-toggle="tab" href="#pricing">Pricing</a></li>
			<li><a data-toggle="tab" href="#uploads">Uploads</a></li>
			<li><a data-toggle="tab" href="#requirements">Requirements</a></li>
			<li><a data-toggle="tab" href="#publish">Publish</a></li>
		</ul>

		<div class="tab-content">
			<div id="overview" class="tab-pane fade in active">
				<h3>Overview</h3>
					<br>
					{{-- can use 'url' but using 'action', need to describe method --}}
					{!! Form::open(['action' => ['JobsController@update', $job->id], 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}

				    	<div class='form-group'> {{-- Bootstrap accepted in forms --}}
				    		{{Form::label('title', 'Title')}} {{-- the label --}}
				    		{{Form::text('title', $job->title, ['class' => 'form-control', 'placeholder' => 'Title for your Job'])}}
				    	</div>

				    	<div class='form-group'> 
				    		{{Form::label('description', 'Description')}} 
				    		{{Form::textarea('description', $job->description, ['id' => 'ckeditor', 'class' => 'form-control', 'placeholder' => 'Briefly describe the job'])}}
				    	</div>
				</div>

				<div id="pricing" class="tab-pane fade">
					<h3>Scope and Pricing</h3>
						<br>
						<div class='form-group'> 
					    		{{Form::label('budget', 'Budget')}} 
					    		{{Form::text('budget', $job->budget, ['class' => 'form-control', 'placeholder' => 'Expected budget (not fixed)'])}}
					    </div>

				    	<div class='form-group'> 
					    		{{Form::label('delivery_time', 'Expected Delivery Time')}} 
					    		{{Form::text('delivery_time', $job->delivery_time, ['class' => 'form-control', 'placeholder' => 'When do you expect job to be done?'])}}
						</div>
				</div>

				<div id="uploads" class="tab-pane fade">
					<h3>Cover Image and Specifications</h3>
						<br>
						<div class="form-group">
				        	{{Form::label('cover_image', 'Upload Cover Image')}} 
				            {{Form::file('cover_image')}}
				        </div>

				        <div class="form-group">
				        	{{Form::label('file', 'Any additional upload')}} 
				            {{Form::file('file')}}
				        </div>
						
				</div>

				<div id="requirements" class="tab-pane fade">
					<h3>Requirements</h3>
						<br>
						<p>Need to figure this out</p>
				</div>

				<div id="publish" class="tab-pane fade">
					<h3>Publish</h3>
						<br>
						<h4>Hey There!</h4>
						<p>You are nearly done updating the opportunity!</p>
						<p>Once again, by clicking on Publish below, you are agreeing to the <a href="{{ route('client.kazi-terms')}}" target="_blank">Terms and Conditions</a> of Kazi Technologies.</p>
						<p>Please click on Update below to continue.</p>

						{{Form::hidden('_method', 'PUT')}}
						{{Form::submit('Update', ['class' => 'btn btn-primary'])}}
				    	
					{!! Form::close() !!}
				</div>
		
		</div>
	
@endsection