@extends('layouts.app')

@section('content')

<h1>Edit Profile</h1>
<hr>

<p>Please change the details as needed.</p>

    <ul class="nav nav-pills">
        <li class="active"><a data-toggle="tab" href="#overview">General</a></li>
        <li><a data-toggle="tab" href="#experience">Experience</a></li>
        <li><a data-toggle="tab" href="#education">Education</a></li>
        <li><a data-toggle="tab" href="#skills">Skills</a></li>
        <li><a data-toggle="tab" href="#accomplishments">Accomplishments</a></li>
        <li><a data-toggle="tab" href="#links">My Links</a></li>
        <li><a data-toggle="tab" href="#publish">Submit</a></li>
    </ul>

    <div class="tab-content">
            <div id="overview" class="tab-pane fade in active">
                    <h3>Overview</h3>

                    <div class="container">

                        {!! Form::open(['action' => ['StudentProfileController@update', Auth::user()->id], 'method' =>'POST', 'enctype' => 'multipart/form-data']) !!}

                            <div class='form-group'> {{-- Bootstrap accepted in forms --}}
                                    {{Form::label('name', 'Name')}} {{-- the label --}}
                                    {{Form::text('name', , ['class' => 'form-control', 'placeholder' => 'Name that will be displayed'])}}
                            </div>

                            <div class='form-group'> 
                                    {{Form::label('headline', 'Headline')}} 
                                    {{Form::text('headline', , ['class' => 'form-control', 'placeholder' => 'Headline to be displayed'])}}
                            </div>

                            <div class="form-group">
                                    {{Form::label('cover_image', 'Upload your Avatar')}} 
                                    {{Form::file('cover_image')}}
                            </div> 

                            {{Form::hidden('_method', 'PUT')}}
                            {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
                            
                        {!! Form::close() !!} 
            
                    </div>
            </div>
    </div>

@endsection