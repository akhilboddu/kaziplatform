@extends('client.client-app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Client Dashboard</div>

                <div class="panel-body">
                    <p>Hi <strong>{{ Auth::guard('clients')->user()->name}}</strong> from <strong>{{ Auth::guard('clients')->user()->company_name }}</strong></p>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Your Job Posts</h3>
                    @if(count($jobs) > 0)
                        @foreach($jobs as $job)
                            <div class="well">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <img style="height: 100%; width: 100%; object-fit: contain;" src="/storage/jobs/cover_images/{{$job->cover_image}}">
                                    </div>
                                    <div class="col-md-8 col-sm-8">
                                        <h3><a href="jobs/{{$job->id}}">{{$job->title}}</a></h3>
                                        <small><strong>Created on {{$job->created_at}} by {{ $job->client->name }}</strong></small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div>
                                    {{-- Doing the delete button: --}}
                                        {!! Form::open( 
                                                [   'action' => ['JobsController@destroy', $job->id], 
                                                    'method' => 'POST',  
                                                    'class' => 'pull-right'
                                                ] 
                                        ) !!}

                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Delete', ['class' => 'btn btn-danger', 'style' => 'margin-left: 5px; margin-right: 5px'])}}

                                        {!! Form::close() !!}

                                        <a href="jobs/{{$job->id}}/edit" class="btn btn-success pull-right">Edit</a>
                                    </div>
                                </div>
                                
                            </div>
                                
                                
                            
                        @endforeach
                        
                    @else
                        <p>Sorry you have not created any opportunities yet! <a href="{{ route('jobs.create')}}">Create now!</a></p>
                    @endif

                   
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
