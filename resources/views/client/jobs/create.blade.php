@extends('client.client-app') 

@section('content')
	<h1>CREATE JOB</h1>
	<hr>

  	<p>Please fill in the general information about the Job and the expected requirements.</p>

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
					{!! Form::open(['action' => 'JobsController@store', 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}

				    	<div class='form-group'> {{-- Bootstrap accepted in forms --}}
				    		{{Form::label('title', 'Title')}} {{-- the label --}}
				    		{{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title for your Job'])}}
				    	</div>

				    	<div class='form-group'> 
				    		{{Form::label('description', 'Description')}} 
				    		{{Form::textarea('description', '', ['id' => 'ckeditor', 'class' => 'form-control', 'placeholder' => 'Briefly describe the job'])}}
				    	</div>
				</div>

				<div id="pricing" class="tab-pane fade">
					<h3>Scope and Pricing</h3>
						<br>
						<div class='form-group'> 
					    		{{Form::label('budget', 'Budget')}} 
					    		{{Form::text('budget', 'R', ['class' => 'form-control', 'placeholder' => 'Expected budget (not fixed)'])}}
					    </div>

				    	<div class='form-group'> 
					    		{{Form::label('delivery_time', 'Expected Delivery Time')}} 
					    		{{Form::text('delivery_time', '', ['class' => 'form-control', 'placeholder' => 'When do you expect job to be done?'])}}
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
						<h4>Congratulations!</h4>
						<p>You are nearly done creating an opportunity!</p>
						<p>By clicking on Publish below, you are agreeing to the <a href="{{ route('client.kazi-terms')}}" target="_blank">Terms and Conditions</a> of Kazi Technologies.</p>
						<p>Please click on Publish below to continue.</p>

						{{Form::submit('Publish', ['class' => 'btn btn-primary'])}}
				    	
					{!! Form::close() !!}
				</div>
		
		</div>
	
@endsection