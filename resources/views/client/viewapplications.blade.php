@extends('client.client-app')

@section('content')


	<div class="container">
    <h1>Cluster Applicants</h1>
    <hr>
        @if(count($applications) > 0)
            @foreach($applications as $application)
                <div class="well">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <img style="height: 100%; width: 100%; object-fit: contain;" src="/storage/jobs/cover_images/noimage.jpg">
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <h3><a href="">{{$application['id']}}</a></h3>
							<small></small>
                            {{-- <small>Created on <strong>{{$job->created_at}}</strong> by <strong>{{ $job->client->name }}</strong> from <strong>{{$job->client->company_name}}</strong></small> --}}
                        </div>
                    </div>
                    <div class="row">
                            {{-- <a href="jobs/{{$job->id}}" class="btn btn-success pull-right">Preview</a> --}}
                        </div>
                    </div>
                    
                
                    
                    
                
            @endforeach
          
        @else
            <p>No opportunities available.</p>
        @endif
</div>

@endsection