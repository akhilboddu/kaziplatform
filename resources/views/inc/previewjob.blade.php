<div class="container">
    
    <div class="row"> 
        <div class="container">
            <div class="panel" style="margin-top: 0px;">
                <div class="panel-heading"><h1>{{$job->title}}</h1></div>
                <div class="panel-body">
                    <p>Provided by <strong>{{$job->client->company_name}}</strong></p>
                </div>
            </div>
        </div>
    </div>    


<div class="row">
    <div class="col-md-8">
         <div class="panel">
            <div class="panel-heading large"><h2>Job Description</h2></div>
                <div class="panel-body">
                    <p><strong>{!! $job->description !!}</strong></p>
                    <img style="height: 100%; width: 100%; object-fit: contain;" src="/storage/jobs/cover_images/{{$job->cover_image}}">
                </div>
          </div>
    </div>

    @if(!Auth::guest() && Auth::guard('clients')->check())
        <div class="col-md-4">
             <div class="panel">
                 <a href="{{$job->id}}/edit"><div class="panel-heading btn btn-success btn-lg btn-block">EDIT</div></a>
              </div>
        </div>

        <div class="col-md-4 second">
             <div class="panel">
                 {{-- Doing the delete button: --}}
                    {!! Form::open( 
                            [   'action' => ['JobsController@destroy', $job->id], 
                                'method' => 'POST',  
                                
                            ] 
                    ) !!}

                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('DELETE', ['class' => 'panel-heading btn btn-danger btn-lg btn-block'])}}

                    {!! Form::close() !!}
              </div>
        </div>
    @else
 
        <div class="col-md-4">
             <div class="panel">

                  @if($status == 1)
                      <a><div class="panel-heading btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#largeModal">Apply!</div></a>
                  @else
                      <a><div class="panel-heading btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#small">Apply!</div></a>
                  @endif
              </div>
        </div>

        {{-- CAN INSERT FORM FOR APPLYING FOR THE JOB IN THE MODAL --}}
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">


              <form id="send-application" action={{route('applications.store', $job->id)}} method="POST">
                {{ csrf_field() }}

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">Application for <strong>{{$job->title}}</strong></h4>
                </div>

                <div class="modal-body">
                  <h3>Are you sure you want to continue?</h3><br>
                  <p>Your application will be sent to the client.</p>

                  
                  
                </div>

                <div class="modal-footer">
                  <a type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</a>

                  {{-- FORM SUBMIT --}}
                  <input class="btn btn-primary btn-lg" type="submit" value="Send Application">

                </div>


              </form>



            </div>
          </div>
        </div>

        <div class="modal fade" id="small" tabindex="-1" role="dialog" aria-labelledby="small" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">


              <form id="send-application" action={{route('applications.store', $job->id)}} method="POST">
                {{ csrf_field() }}

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">WHHOOOOPPPS!</strong></h4>
                </div>

                <div class="modal-body">
                  <h3>Looks like you have already applied!</h3><br>
                  <p>Wait for further communication.</p>

                  
                  
                </div>

                <div class="modal-footer">
                  <a type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</a>

                  {{-- FORM SUBMIT --}}
                  {{-- <input class="btn btn-primary btn-lg" type="submit" value="Send Application"> --}}

                </div>


              </form>



            </div>
          </div>
        </div>


    @endif

    <div class="col-md-4 third">
         <div class="panel">
             <div class="panel-heading"></div>
                <div class="panel-body">
                      <p>Need assistance? Visit our <a href="/student/help">help page</a></p>
                </div>
          </div>
    </div>

    <div class="col-md-8 second">
         <div class="panel">
            <div class="panel-heading"><h2>Specifics</h2></div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item">Approximate Budget <kbd class="pull-right">{{$job->budget}}</kbd></li>
                        <li class="list-group-item">Expected Delivery Time<kbd class="pull-right">{{$job->delivery_time}}</kbd></li>
            
                    </ul>
                </div>
          </div>
    </div>

</div>



    </div>