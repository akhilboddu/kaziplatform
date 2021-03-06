@extends('layouts.app') 

@section('content')

	<h1>EDITING A CLUSTER</h1>
	<hr>

  	<p>Edit your cluster details in General tab, and add members in the Members tab.</p>

		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#overview">General</a></li>
			<li><a data-toggle="tab" href="#members">Members</a></li>
			
		</ul>

		<div class="tab-content">
			<div id="overview" class="tab-pane fade in active">
				<h3>Overview</h3>
					<br>
					{{-- can use 'url' but using 'action', need to describe method --}}
					{!! Form::open(['action' => ['ClustersController@update', $cluster->id], 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}

				    	<div class='form-group'> {{-- Bootstrap accepted in forms --}}
				    		{{Form::label('name', 'Name of Cluster')}} {{-- the label --}}
				    		{{Form::text('name', $cluster->name, ['class' => 'form-control', 'placeholder' => 'Name of your cluster'])}}
				    	</div>

				    	<div class='form-group'> 
				    		{{Form::label('slogan', 'Headline')}} 
				    		{{Form::text('slogan', $cluster->slogan, ['class' => 'form-control', 'placeholder' => 'Create a headline for your cluster'])}}
				    	</div>

				    	{{Form::hidden('_method', 'PUT')}}
						{{Form::submit('Save', ['class' => 'btn btn-primary'])}}
				    	

					{!! Form::close() !!}
				</div>

				<div id="members" class="tab-pane fade">
					<h3>Members</h3>

						<h4>Current Members</h4>
							<ul class="list-group">
								@foreach($members as $member)
									<li class="list-group-item"> {{$member->name}} | {{ $member->email }}</li>
								@endforeach
		                        
		                        {{-- <li class="list-group-item">Expected Delivery Time<kbd class="pull-right">Member 2</kbd></li> --}}
		            
		                    </ul>
						
						<a href="{{route('addmember', Auth::user()->cluster->id)}}" class="btn btn-primary">Add members</a>
					
 
						

				    	

				</div>

				
		
		</div>
		<div id='app'></div>
	
@endsection

@section('script')


@endsection