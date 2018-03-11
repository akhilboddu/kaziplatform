@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Available opportunities</h1>
    <hr>
        @if(count($jobs) > 0 && Auth::user()->cluster_id!=0)
            @foreach($jobs as $job)
                <div class="well">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <img style="height: 100%; width: 100%; object-fit: contain;" src="/storage/jobs/cover_images/{{$job->cover_image}}">
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <h3><a href="jobs/{{$job->id}}">{{$job->title}}</a></h3>
                            <small>Created on <strong>{{$job->created_at}}</strong> by <strong>{{ $job->client->name }}</strong> from <strong>{{$job->client->company_name}}</strong></small>
                        </div>
                    </div>
                    <div class="row">
                            <a href="jobs/{{$job->id}}" class="btn btn-success pull-right">Preview</a>
                        </div>
                    </div>
                    
                
                    
                    
                
            @endforeach
            {{$jobs->links()}}
        @elseif(Auth::user()->cluster_id == 0)
            
            <div class="well">
                <div class="row" style="text-align: center;"">
                    <h4><strong>Please <kbd>create a cluster</kbd> or <kbd>accept invitation</kbd> from another cluster to view available opportunities</strong></h4><br>
                    <a class="btn btn-success btn-lg" " href="{{ route('profile.show', Auth::user()->id) }}">
                        View Profile
                    </a>
                    <a class="btn btn-primary btn-lg" href="{{route('cluster.create')}}" }}">
                        Create a cluster
                    </a>
                </div>
                                
                                
            </div>
            
        @else
            <div class="well">
                <div class="row">
                    <h3 style="text-align: center;"><strong>No opportunities available.</h3></strong></h1>
                </div>
                                
                                
            </div>
            <p></p>
        @endif
</div>


@endsection
