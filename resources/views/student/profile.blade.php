@extends('layouts.app')

@section('content')

<div class="container">

	<div class="row">
		<div class="col-md-8"><h1>Student Profile</h1></div>
	    <div class="col-md-4" style="align-content: center; margin-top: 20px"><a href="{{route('profile.edit', ['id' => Auth::user()->id])}}"><div class="btn btn-success btn-lg btn-block">EDIT</div></a></div>
    </div>	
   	<hr>
	
	
	<div class="row">
	<div class="container">	
		<div class="panel">
			<div class="panel-body">
		        <img src="/storage/students/cover_images/{{$user->cover_image}}" style="width:auto; height:250px; float:left; margin-right:25px;">
		        <h2>{{$user->name}}'s Profile</h2>
		        <small><kbd>{{$user->headline}}</kbd></small>      
		    </div>
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
				<center><img src="/storage/students/stars_rating/1-star.png" style="width:100px; height:100px; text-align: center;"></center>
				<div class="panel-body">
					<p>Kazi XP</p>
					<p>etc</p>
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
