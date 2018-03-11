@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Experience at <strong>{{$exp->company_name}}</strong>
					<a href="{{route('profile.show', Auth::user()->id)}}" class="btn btn-success btn-sm pull-right">Back to Profile</a>

					<a class="btn btn-sm btn-danger pull-right" style= "margin-left: 5px; margin-right: 5px" data-toggle="modal" data-target="#General">Delete</a>
					
                </div>
                <div class="modal fade" id="General" tabindex="-1" role="dialog" aria-labelledby="General" aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	                  <h4 class="modal-title" id="myModalLabel">WOOOAAAHHHH!</strong></h4>
				</div>

				<div class="modal-body">
              		<p>Are you sure you want to continue deleting your experience as the <strong>{{$exp->position}}</strong> at <strong>{{$exp->company_name}}</strong>?</p>
					
                </div>
							
				<div class="modal-footer">
      				<a type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</a>
      				 {!! Form::open( 
                                                [   'action' => ['ExperiencesController@destroy', Auth::user()->id, $exp->id], 
                                                    'method' => 'POST',  
                                                    'class' => 'pull-right'
                                                ] 
                                        ) !!}

                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Yes Delete', ['class' => 'btn btn-danger btn-lg', 'style' => 'margin-left: 5px; margin-right: 5px'])}}

                                        {!! Form::close() !!}
                            
                </div>
                            
                        

				

            </div>
        </div>
    </div>



                <div class="panel-body">


                	<div class="well">
			                    <div class="row">
			                        <div class="col-md-4 col-sm-4">
			                            <img style="height: 100%; width: 100%; object-fit: contain;" src="/storage/students/experiences/{{$exp->cover_image}}">
			                        </div>
			                        <div class="col-md-8 col-sm-8">
			                            <h3>Role: <strong>{{$exp->position}}</strong></h3>
			                            <h4>Duration: <kbd>{{$exp->duration}}</kbd></p></h4>
			                            <h4>Company: <strong>{{$exp->company_name}}</strong></h4>
			                            <kbd>{{$exp->link}}</kbd></p>
			                            <small>{{$exp->description}}</small>
			                            <p id="expid" hidden>{{$exp->id}}</p>

			                        </div>
	                    		</div>
                    		</div>
                    
                   

                   
                    
                    {!! Form::open(['action' => ['ExperiencesController@update', 'profile' => Auth::user()->id, 'experience' => $exp->id] , 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}

	                            <div class='form-group'> {{-- Bootstrap accepted in forms --}}
	                                    {{Form::label('company', 'Company Name')}} {{-- the label --}}
	                                    {{Form::text('company',$exp->company_name, ['class' => 'form-control', 'placeholder' => 'Company Name that will be displayed'])}}
	                            </div>

	                            <div class='form-group'> 
	                                    {{Form::label('position', 'Position')}} 
	                                    {{Form::text('position',$exp->position, ['class' => 'form-control', 'placeholder' => 'Position you had at this company'])}}
	                            </div>

	                            <div class='form-group'> 
	                                    {{Form::label('duration', 'Duration (in months, or PRESENT if ongoing)')}} 
	                                    {{Form::text('duration',$exp->duration, ['class' => 'form-control', 'placeholder' => 'Exter duration in months, or present if still ongoing'])}}
	                            </div>

	                            <div class='form-group'> 
	                                    {{Form::label('link', 'Link to company page')}} 
	                                    {{Form::text('link',$exp->link, ['class' => 'form-control', 'placeholder' => 'Link to existing company page'])}}
	                            </div>

	                            <div class="form-group">
	                                    {{Form::label('cover_image', 'Upload a company logo')}} 
	                                    {{Form::file('cover_image')}}
	                            </div> 

	                            <div class='form-group'> 
						    		{{Form::label('description', 'Description')}} 
						    		{{Form::textarea('description', $exp->description, ['class' => 'form-control', 'placeholder' => 'Briefly describe your experience'])}}
						    	</div>

	                            
								
								
	                  				
	        
	                            {{Form::hidden('_method', 'PUT')}}
	                            <a href="{{route('profile.show', Auth::user()->id)}}" class="btn btn-success btn-lg">Back to Profile</a>
	                            {{Form::submit('Update Experience', ['class' => 'btn btn-primary btn-lg'])}}
	                            <br><br>
	                      
	                            
	                {!! Form::close() !!} 


                </div>
            </div>
        </div>
    </div>
</div>



@endsection