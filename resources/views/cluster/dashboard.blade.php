@extends('layouts.app')

@section('content')


<div class="container">

    

    @if(Auth::user()->cluster_id != 0)

        <div class="row">
            <div class="col-md-8"><h1>My Cluster Dashboard</h1></div>
            <div class="col-md-4" style="align-content: center; margin-top: 20px"><a href="{{ route('cluster.edit', Auth::user()->cluster->id) }}"><div class="btn btn-success btn-lg btn-block">EDIT</div></a></div>
        </div>  
        <hr>

    
    
        <div class="row">
        <div class="container"> 
            <div class="panel">
                <div class="panel-body">

                    <h2>{{Auth::user()->cluster->name}}</h2>
                    <a href="{{route('addmember', Auth::user()->cluster->id)}}" class="btn btn-primary pull-right">Add members</a><br>

            
                    <p>{{Auth::user()->cluster->slogan}}</p>   
                    
                   
                        

                    <hr>

                    <div class="container">

                        @foreach($members as $member)
                            <div class="col-sm-2 col-md-2">
                                <center><img src="/storage/students/cover_images/{{$member->cover_image}}" style="object-fit: cover;width:150px; height:150px; border-radius:50%; margin-right:25px;"></center>
                                <h5>{{$member->name}}</h5>
                                <p><kbd>{{$member->headline}}</kbd></p>
                            </div>
                        @endforeach
                    
                    </div>

                </div>
            </div>
        </div>
        </div>  

        <div class="row">

             <div class="col-md-8">
                 <div class="panel">


                    {{-- <a class="glyphicon glyphicon-pencil pull-right" data-toggle="modal" data-target="#largeModal"></a> --}}
                    
                    <div class="panel-heading"><h2>Projects</h2>                        
                        

                    </div>

                        <div class="panel-body">



                            <hr>
                            <h3>Active Jobs</h3>
                            <p>Job stuff</p>
                            <p>Job stuff</p>
                            <p>Job stuff</p>
                            <br>

                            <hr>
                            <h3>Completed Jobs</h3>
                            <p>Job stuff</p>
                            <p>Job stuff</p>
                            <p>Job stuff</p>
                            <br>
                            
                            <hr>
                            <h3>Awaiting for response Projects</h3>
                            <p>Job stuff</p>
                            <p>Job stuff</p>
                            <p>Job stuff</p>

                        </div>
                  </div>
            </div>

            <div class="col-md-4">
                <div class="panel">
                    <div class="panel-heading"><h2>Kazi Cluster Rating</h2></div>
                    <center><img src="/storage/students/stars_rating/1-star.png" style="width:100px; height:100px; text-align: center;"></center>
                    <div class="panel-body">
                        <p><strong>Maintain high standards to redeem Kazi XP for your cluster in the future.</strong></p>
                        
                    </div>
                </div>
            </div>  

           {{--  <div class="col-md-8 second">
                 <div class="panel">
                    <div class="panel-heading"><h2>Notes</h2></div>
                        <div class="panel-body">
                            <ul class="list-group">
                                <li class="list-group-item">Facebook <kbd class="pull-right">Thats the link</kbd></li>
                                <li class="list-group-item">Twitter<kbd class="pull-right">Or not</kbd></li>
                            </ul>
                        </div>
                  </div>
            </div> --}}

             <div class="col-md-8 second">
                 <div class="panel">
                    <div class="panel-heading"><h2>Need Some assistance?</h2></div>
                        <div class="panel-body">
                            <p><strong>Contact us for Support</strong></p>
                            <ul class="list-group">
                                <li class="list-group-item">Email<kbd class="pull-right">info&#64;kazitechsolutions.com</kbd></li>
                                <li class="list-group-item">Facebook <a href="https://www.facebook.com/kazitechsolutions/" target="_blank"> <kbd class="pull-right">www.facebook.com/kazitechsolutions/ </kbd></a></li>
                                <li class="list-group-item">Instagram<a href="https://www.instagram.com/kazitechsolutions/" target="_blank"> <kbd class="pull-right">www.instagram.com/kazitechsolutions/</kbd></a></li>
                            </ul>
                            <p><strong>View our page</strong></p>
                            <ul class="list-group">

                                <li class="list-group-item">Kazi Tech Solutions<a href="http://kazitechsolutions.com/" target="_blank"> <kbd class="pull-right">www.kazitechsolutions.com/</kbd></a></li>
                                
                            </ul>
                        </div>
                  </div>
            </div>
        </div>

    @else

        <div class="row">
            <div class="col-md-8"><h1>My Cluster Dashboard</h1></div>
            <div class="col-md-4" style="align-content: center; margin-top: 20px"><a href="{{ route('cluster.create')}}"><div class="btn btn-success btn-lg btn-block">REGISTER</div></a></div>
        </div>  

        <hr>

        <div class="row">
        <div class="container"> 
            <div class="panel">
                <div class="panel-body">
                    <hr>
                    <h2>Sorry it seems like you do not belong to any cluster! </h2>
                    <p>Register your cluster now as a leader.</p>
                   

                    

                </div>
            </div>
        </div>
        </div>  


    @endif

    </div>



@endsection
