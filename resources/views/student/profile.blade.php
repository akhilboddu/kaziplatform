@extends('layouts.app')

@section('content')

<div class="container">

	<div class="row">
		<div class="col-md-8"><h1>Student Profile</h1></div>
	    <div class="col-md-4" style="align-content: center; margin-top: 20px"><a {{-- href="{{route('profile.edit', ['id' => Auth::user()->id])}}" --}}><div class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#General">EDIT</div></a></div>
    </div>	
   	<hr>
	
	<div class="modal fade" id="General" tabindex="-1" role="dialog" aria-labelledby="General" aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                  <h4 class="modal-title" id="myModalLabel">Need to Edit information?</strong></h4>
				</div>

				<div class="modal-body">
              		<p>Click on the little  <span class="glyphicon glyphicon-pencil"></span>  icon to edit sections of your profile.</p>
					
                </div>
							
				<div class="modal-footer">
      				<a type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</a>
                            
                </div>
                            
                        

				

            </div>
        </div>
    </div>
	
	<div class="row">
	<div class="container">	

		<div class="panel">

			<div class="panel-body">
				<a class="glyphicon glyphicon-pencil pull-right" data-toggle="modal" data-target="#Overview"></a>
		        <img src="/storage/students/cover_images/{{$user->cover_image}}" style="width:auto; height:250px; float:left; margin-right:25px;">
		        <h2>{{$user->name}}'s Profile</h2> 
		        <small><kbd>{{$user->headline}}</kbd></small>      
		    </div>
	    </div>
	</div>
	</div>	
	

	


	 <div class="modal fade" id="Overview" tabindex="-1" role="dialog" aria-labelledby="Overview" aria-hidden="true">
          <div class="modal-dialog modal-lg">

            <div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">Overview</strong></h4>
			</div>

			<div class="modal-body">
              {!! Form::open(['action' => ['StudentProfileController@update', Auth::user()->id], 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}

                            <div class='form-group'> {{-- Bootstrap accepted in forms --}}
                                    {{Form::label('name', 'Name')}} {{-- the label --}}
                                    {{Form::text('name',Auth::user()->name, ['class' => 'form-control', 'placeholder' => 'Name that will be displayed'])}}
                            </div>

                            <div class='form-group'> 
                                    {{Form::label('headline', 'Headline')}} 
                                    {{Form::text('headline',Auth::user()->headline, ['class' => 'form-control', 'placeholder' => 'Headline to be displayed'])}}
                            </div>

                            <div class="form-group">
                                    {{Form::label('cover_image', 'Upload your Avatar')}} 
                                    {{Form::file('cover_image')}}
                            </div> 

                            </div>
							
							<div class="modal-footer">
                  				<a type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</a>
                            {{Form::hidden('_method', 'PUT')}}
                            {{Form::submit('Update', ['class' => 'btn btn-primary btn-lg'])}}
                        </div>
                            
                        {!! Form::close() !!} 

				

            	</div>
          </div>
        </div>



	<div class="row">

		 <div class="col-md-8">
	         <div class="panel">
	            <div class="panel-heading"><h2>Expertise</h2></HEADER></div>
	                <div class="panel-body">
	                	</ul>
	                	<hr>
	                	<h3>Experience</h3>
	                	<ul class="list-group">
							<li class="list-group-item">1<kbd class="pull-right">time</kbd></li>
							<li class="list-group-item">2<kbd class="pull-right">time</kbd></li>
							<li class="list-group-item">3<kbd class="pull-right">time</kbd></li>
							<li class="list-group-item">+<kbd class="pull-right">time</kbd></li>
						
						<hr>
						<h3>Skills</h3>
	                	<ul class="list-group">
							<li class="list-group-item">1 <kbd class="pull-right">time</kbd></li>
							<li class="list-group-item">2<kbd class="pull-right">time</kbd></li>
							<li class="list-group-item">3<kbd class="pull-right">time</kbd></li>
							<li class="list-group-item">+<kbd class="pull-right">time</kbd></li>
						</ul>
						<hr>
						<h3>Interests</h3>
	                	<ul class="list-group">
							<li class="list-group-item">1 <kbd class="pull-right">time</kbd></li>
							<li class="list-group-item">2<kbd class="pull-right">time</kbd></li>
							<li class="list-group-item">3<kbd class="pull-right">time</kbd></li>
							<li class="list-group-item">+<kbd class="pull-right">time</kbd></li>
						</ul>
						<hr>
						<h3>Accomplishments</h3>
	                	<ul class="list-group">
							<li class="list-group-item">1 <kbd class="pull-right">time</kbd></li>
							<li class="list-group-item">2<kbd class="pull-right">time</kbd></li>
							<li class="list-group-item">3<kbd class="pull-right">time</kbd></li>
							<li class="list-group-item">+<kbd class="pull-right">time</kbd></li>
						</ul>
	                </div>
	          </div>
	    </div>

	    <div class="col-md-4">
			<div class="panel">
				<div class="panel-heading"><h2>Kazi Rating</h2></div>
				<p class="container"><strong>Coming Soon!</strong></p>
				<center><img src="/storage/students/stars_rating/1-star.png" style="width:100px; height:100px; text-align: center;"></center>
				<div class="panel-body"><br>
					<p><strong>Maintain high standards to redeem Kazi XP in the future.</strong></p>
				</div>
			</div>
		</div>  

	    <div class="col-md-8 second">
	         <div class="panel">
	            <div class="panel-heading"><h2>My links</h2></div>
	                <div class="panel-body">
	                	<ul class="list-group">
							<li class="list-group-item">Facebook <kbd class="pull-right">Thats the link</kbd></li>
							<li class="list-group-item">Twitter<kbd class="pull-right">Or not</kbd></li>
						</ul>
	                </div>
	          </div>
	    </div>

	     <div class="col-md-8 third">
	         <div class="panel">
	            <div class="panel-heading"><h2>Bio</h2></div>
	                <div class="panel-body">
	                	<p><strong>Something</strong></p>
	                </div>
	          </div>
	    </div>
	</div>
</div>


@endsection
