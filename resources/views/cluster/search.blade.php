@extends('layouts.app')

@section('content')

{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>  


<div class="container" style="width: auto; height: auto;">

	<h1>Adding members</h1>
	<hr>

	<strong>Note:</strong>
	<ul>
		<li>Please add the details of the members you would like to send a request to, and click on send requests below to continue.</li>
		<li>You can only have upto 5 members in your cluster.</li>
		<li>Members will not be listed until they accept the invitation.</li>
	</ul>

	<hr>
	
	<h4>There are currently <strong><i>{{count($members)}}</i></strong> members in your cluster.</h4>
	<ul class="list-group">
		@foreach($members as $member)
			<li class="list-group-item"> {{$member->name}} | {{ $member->email }}</li>
		@endforeach
    </ul>

	

	@if(count($members)!=5)
		
		<form id="send-requests" action={{route('send.request', Auth::user()->cluster->id)}} method="POST">

			 {{ csrf_field() }}
			<div class="form-group">
				<label>Enter name and select from options</label>
					
					    <input id="2" name="2" class="typeahead form-control" style="margin:10px;width:300px;" type="text" placeholder="Enter name here" data-provide="typeahead">
					    
		   	</div>

		   	<input class="btn btn-success btn-lg pull-left" type="submit" value="Send Request">

	   </form>

   @else

   		<a href="{{route('cluster.show', Auth::user()->cluster_id)}}" class="btn btn-primary btn-lg pull-left"> Dashboard </a>

   @endif

</div>


<script type="text/javascript">

    //Autocompletion
    var path = "{{ route('autocomplete', Auth::user()->cluster->id) }}";

    $('.typeahead').typeahead({

    	displayText: function(item) {   
    				
			return item.id + " | " +  item.name + " | " + item.email;
		},

        source:  function (query, process) {
	        return $.get(path, { query: query }, function (data) {
	                return process(data);
	            });
        }
    });
 </script>

 @endsection

@section('script')

<script type="text/javascript">

	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

</script>

@endsection




































