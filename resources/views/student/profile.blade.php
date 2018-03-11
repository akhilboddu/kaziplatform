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
              		<p>Click on the  <span class="glyphicon glyphicon-pencil"></span>  icon to edit sections of your profile.</p>
					
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
				
		        <img src="/storage/students/cover_images/{{$user->cover_image}}" style="width:auto; height:250px; float:left; margin-right:25px;">
		        <h2>{{$user->name}}'s Profile <a class="glyphicon glyphicon-pencil pull-right" data-toggle="modal" data-target="#Overview"></a></h2> 
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
	                	<h3>Experience <a class="glyphicon glyphicon-plus pull-right" data-toggle="modal" data-target="#addexperience"></a></h3>
	                	<br>
						
						@if(count($experiences)>0)
		                	@foreach($experiences as $exp)
	                            <div class="well">
				                    <div class="row">
				                        <div class="col-md-4 col-sm-4">
				                            <img style="height: 100%; width: 100%; object-fit: contain;" src="/storage/students/experiences/{{$exp->cover_image}}">
				                        </div>
				                        <div class="col-md-8 col-sm-8">
				                            <h3>Role: <strong>{{$exp->position}}</strong><a class="glyphicon glyphicon-pencil pull-right" href="{{route('experience.edit', [ Auth::user()->id , $exp->id ] )}}"></a></h3>
				                            <h4>Duration: <kbd>{{$exp->duration}}</kbd></p></h4>
				                            <h4>Company: <strong>{{$exp->company_name}}</strong></h4>
				                            <kbd>{{$exp->link}}</kbd></p>
				                            <small>{{$exp->description}}</small>
				                            

				                        </div>
		                    		</div>
	                    		</div>
	                        @endforeach

		                      

	                    @else

	                      <div class="well">
					                    <div class="row">
					                        <div class="col-md-4 col-sm-4">
					                            <img style="height: 100%; width: 100%; object-fit: contain;" src="/storage/students/experiences/briefcase.png">
					                        </div>
					                        <div class="col-md-8 col-sm-8">
					                            {{-- <h3>Role: <strong>Example Role</strong></h3>
					                            <h4>Duration: <kbd>3 months</kbd></p></h4>
					                            <h4>Company: <strong>Example Company</strong></h4>
					                            <kbd>example company link</kbd></p>
					                            <small>Languages learned: Python. Capitalized on using django for web development.</small> --}}
					                            
					                            <h2><i>You currently dont have any experiences! Click on the "+" icon above to add an experience.</i></h2>

					                        </div>
			                    		</div>
		                    		</div>
	                    @endif


	                	
						<br>
						<hr>


						<h3>Programming Languages <a class="glyphicon glyphicon-plus pull-right" data-toggle="modal" data-target="#languages"></a></h3>
						<br>
	                	<ul class="list-group">
	                		@if(count($languages)>0)
			                	@foreach($languages as $lang)
		                            <li class="list-group-item">{{$lang->language}}


									 {!! Form::open( 
                                                [   'action' => ['LanguagesController@destroy', Auth::user()->id, $lang->id], 
                                                    'method' => 'POST',  
                                                    'class' => 'pull-right'
                                                ] 
                                        ) !!}

                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm', 'style' => 'margin-left: 5px; margin-right: 5px; margin-bottom: 5px'])}}

                                        {!! Form::close() !!}
		                            </li>
		                        @endforeach

		                      

	                    @else
							<li class="list-group-item">None</li>
	                      
	                    @endif

						</ul>



						<div class="modal fade" id="languages" tabindex="-1" role="dialog" aria-labelledby="languages" aria-hidden="true">
				          <div class="modal-dialog">

				            <div class="modal-content">

							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				                  <h4 class="modal-title" id="myModalLabel">Add a programming language</strong></h4>
							</div>

							<div class="modal-body">
				              {!! Form::open(['action' => ['LanguagesController@store', Auth::user()->id], 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}

				                            <div class='form-group'> {{-- Bootstrap accepted in forms --}}
				                                    {{Form::label('language', 'Add a Programming language')}} {{-- the label --}}
				                                    {{Form::text('language','', ['class' => 'form-control', 'placeholder' => 'Eg. Java, Python, JavaScript etc.'])}}
				                            </div>

				                            

				                            </div>
											
											<div class="modal-footer">
				                  				<a type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</a>
				                            
				                            {{Form::submit('Add Language', ['class' => 'btn btn-primary btn-lg'])}}
				                        </div>
				                            
				                        {!! Form::close() !!} 

								

				            	</div>
				          </div>
				        </div>

						<hr>
						<h3>Interests <a class="glyphicon glyphicon-plus pull-right" data-toggle="modal" data-target="#interests"></a></h3><br>
	                	<ul class="list-group">
							@if(count($interests)>0)
			                	@foreach($interests as $int)
		                            <li class="list-group-item">{{$int->interest}}


									 {!! Form::open( 
                                                [   'action' => ['InterestsController@destroy', Auth::user()->id, $int->id], 
                                                    'method' => 'POST',  
                                                    'class' => 'pull-right'
                                                ] 
                                        ) !!}

                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm', 'style' => 'margin-left: 5px; margin-right: 5px; margin-bottom: 5px'])}}

                                        {!! Form::close() !!}
		                            </li>
		                        @endforeach

		                      

	                    @else
							<li class="list-group-item">None</li>
	                      
	                    @endif
						</ul>
						<hr>

						<div class="modal fade" id="interests" tabindex="-1" role="dialog" aria-labelledby="interests" aria-hidden="true">
				          <div class="modal-dialog">

				            <div class="modal-content">

							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				                  <h4 class="modal-title" id="myModalLabel">Add an interest</strong></h4>
							</div>

							<div class="modal-body">
				              {!! Form::open(['action' => ['InterestsController@store', Auth::user()->id], 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}

				                            <div class='form-group'> {{-- Bootstrap accepted in forms --}}
				                                    {{Form::label('interest', 'Add an Interest you would like to learn at Kazi')}} {{-- the label --}}
				                                    {{Form::text('interest','', ['class' => 'form-control', 'placeholder' => 'Eg. React, Solidity etc.'])}}
				                            </div>

				                            

				                            </div>
											
											<div class="modal-footer">
				                  				<a type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</a>
				                            
				                            {{Form::submit('Add Language', ['class' => 'btn btn-primary btn-lg'])}}
				                        </div>
				                            
				                        {!! Form::close() !!} 

								

				            	</div>
				          </div>
				        </div>
						
	                </div>
	          </div>
	    </div>

	    <div class="col-md-4">
			<div class="panel">
				<div class="panel-heading"><h2>Kazi Rating</h2></div>
				<p class="container"><strong>Coming Soon!</strong></p>
				<center><img src="/storage/students/stars_rating/1-star.png" style="width:100px; height:100px; text-align: center;"></center>
				<div class="panel-body"><br>
					<p><strong>Maintain high standards to redeem Kazi XP for yourself in the future.</strong></p>
				</div>
			</div>
		</div>  

	   {{--  <div class="col-md-8 second">
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
	    </div> --}}
	</div>

	<div class="modal fade" id="addexperience" tabindex="-1" role="dialog" aria-labelledby="addexperience" aria-hidden="true">
          <div class="modal-dialog modal-lg">

            <div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">Add an Experience</strong></h4>
			</div>

			<div class="modal-body">

				
              {!! Form::open(['action' => ['ExperiencesController@store',Auth::user()->id] , 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}

                            <div class='form-group'> {{-- Bootstrap accepted in forms --}}
                                    {{Form::label('company', 'Company Name')}} {{-- the label --}}
                                    {{Form::text('company','', ['class' => 'form-control', 'placeholder' => 'Company Name that will be displayed'])}}
                            </div>

                            <div class='form-group'> 
                                    {{Form::label('position', 'Position')}} 
                                    {{Form::text('position','', ['class' => 'form-control', 'placeholder' => 'Position you had at this company'])}}
                            </div>

                            <div class='form-group'> 
                                    {{Form::label('duration', 'Duration (in months, or PRESENT if ongoing)')}} 
                                    {{Form::text('duration','', ['class' => 'form-control', 'placeholder' => 'Exter duration in months, or present if still ongoing'])}}
                            </div>

                            <div class='form-group'> 
                                    {{Form::label('link', 'Link to company page')}} 
                                    {{Form::text('link','', ['class' => 'form-control', 'placeholder' => 'Link to existing company page'])}}
                            </div>

                            <div class="form-group">
                                    {{Form::label('cover_image', 'Upload a company logo')}} 
                                    {{Form::file('cover_image')}}
                            </div> 

                            <div class='form-group'> 
					    		{{Form::label('description', 'Description')}} 
					    		{{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Briefly describe your experience'])}}
					    	</div>

                            </div>
							
							<div class="modal-footer">
                  				<a type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</a>
                            
                            {{Form::submit('Add Experience', ['class' => 'btn btn-primary btn-lg'])}}
                        </div>
                            
                {!! Form::close() !!} 

            	</div>
          </div>
        </div>

    




	<p id="demo"></p>




</div>

@endsection

@section('script')
	<script type="text/javascript">
		var x;
		x = document.getElementById("expid").innerHTML;
		document.getElementById("demo").innerHTML = x;
	</script>
	
@endsection














