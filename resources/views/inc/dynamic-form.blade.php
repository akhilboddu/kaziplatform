        $(function() {
        var expDiv = $('#p_scents');
        var i = $('#p_scents p').size() + 1;
        
        $('#addScnt').live('click', function() {
                $('<p>\
                                                <div class="panel panel-primary">\
                                                        <div class="panel-heading">Experience</div>\
                                                        <div class="panel-body">\
                                                                <br>\
                                                                <div class="form-group"> \
                                                                        {{Form::label('position', 'Position')}} \
                                                                        {{Form::text('position','', ['class' => 'form-control', 'placeholder' => 'What was your position?'])}}\
                                                            </div>\
\
                                                            <div class="form-group"> \
                                                                        {{Form::label('company', 'Company')}} \
                                                                        {{Form::text('company','', ['class' => 'form-control', 'placeholder' => 'Where did you work?'])}}\
                                                            </div>\
\
                                                            <div class="form-group"> \
                                                                {{Form::label('description', 'Description')}} \
                                                                {{Form::textarea('description', '', ['id' => 'ckeditor', 'class' => 'form-control', 'placeholder' => 'Briefly describe what exactly you did for experience'])}}\
                                                        </div>\
\
                                                        <div class="form-group"> \
                                                                {{Form::label('time', 'Time')}} \
                                                                {{Form::text('time','', ['class' => 'form-control', 'placeholder' => 'How long was the experience?'])}}\
                                                        </div>\
                                                    </div>\
                                                \
                                                    <div id="remScnt" class="panel-footer"><a href="#">Remove this Experience</a></div>\
\
                                                </div>\
                                                </p>').appendTo(expDiv);
                i++;
                return false;
        });
        
        $('#remScnt').live('click', function() { 
                if( i > 2 ) {
                        $(this).parents('p').remove();
                        i--;
                }
                return false;
        });















<html>  
      <head>  
           <title>Dynamically Add or Remove input fields in PHP with JQuery</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
      <body>  
           <div class="container">  
                <br />  
                <br />  
                <h2 align="center">Dynamically Add or Remove input fields in PHP with JQuery</h2>  
                <div class="form-group">  
                     <form name="add_name" id="add_name">  
                          <div class="table-responsive">  
                               <table class="table table-bordered" id="dynamic_field">  
                                    <tr>  
                                         <td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>  
                                         <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                                    </tr>  
                               </table>  
                               <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />  
                          </div>  
                     </form>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      $('#submit').click(function(){            
           $.ajax({  
                url:"name.php",  
                method:"POST",  
                data:$('#add_name').serialize(),  
                success:function(data)  
                {  
                     alert(data);  
                     $('#add_name')[0].reset();  
                }  
           });  
      });  
 });  
 </script>
