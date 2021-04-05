<?php require "login/loginheader.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Catalytic Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="dist/css/customfonts.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!--Navigation-->
        <?php
        include 'navigation.php';
        ?>

        <div id="page-wrapper">
         <div class="row">
                       <div class="alert alert-error hide">
                                          <button class="close" data-dismiss="alert"></button>
                                          Oops! There was a problem saving your changes.
                        </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Artist</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row table-toolbar">
                <div class="col-lg-6">                    
                    <!--<a href="artists.php"><button type="button" class="btn btn-default"><i class="fa fa-trash fa-fw"></i> Cancel</button></a>-->
                    <a href="artists.php" class="btn btn-danger"><i class="fa fa-reply fa-fw"></i> Cancel</a>
                </div>                              
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!--<div class="panel-heading">
                           
                        </div>-->
                        <div class="panel-body">
                            <form role="form" id="form1">
                                <div class="row">                               
                                    <div class="col-lg-6">
                                    <h2>Profile</h2>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" placeholder="Enter text" name="formname" id="formname">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="4" name="formdesc" id="formdesc"></textarea>
                                        </div>
                                        <hr>
                                        <h3>Profile Picture</h3>
                                        <div class="form-group">
                                            <label>jpg Image File</label>
                                            <input type="file" id="formimg" name="formimg[]" multiple>
                                        </div>
                                                                                                          
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->

                                    <div class="col-lg-6">
                                   
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->

                                </div>
                                <!-- /.row (nested) -->
                                        
                                        
                                        
                                        <button type="submit" id="submit" class="btn btn-success"><i class="fa fa-save fa-fw"></i> Save</button>
                                        <button type="reset" class="btn btn-default pull-right">Clear Form</button>
                                    
                             </form>                                
                            <p id='msg'></p>
                                
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!--Send Form-->
    <!--<script>
        $(function() {
 
            $('button[type="submit"]').click(function(e){
              e.preventDefault();
              //var hora = $('#hora').val();
              //var tipopropiedad = $('#tipopropiedad option:selected').html();
              //var provincia = $('#provincia option:selected').val();
              var varname = $('#formname').val();
              var vardesc = $('#formdesc').val();
              var varwebsite = $('#formwebsite').val();
              var varfacebook = $('#formfacebook').val();
              var vartwitter = $('#formtwitter').val();
              var varinstagram = $('#forminstagram').val();
              var varsoundcloud = $('#formsoundcloud').val();

              $.ajax({
                type: 'POST',
                url: 'saveartist.php',
                data: {'varname': varname, 'vardesc': vardesc, 'varwebsite': varwebsite, 'varfacebook': varfacebook, 'vartwitter': vartwitter, 'varinstagram': varinstagram, 'varsoundcloud': varsoundcloud},      
                dataType: 'json',          
                success: function(data){
                //console.log(data);
                window.location.replace("artists.php#ok");
                 },

                error: function(data) {
                      var data
                      console.log(data);
                      //$('<p>'. $data .'</p>').appendTo('#Content');
                      //window.alert(JSON.stringify(data));
                      $('.alert-error').removeClass('hide');
                 }
              });
            });
            //$('button[type="cancel"]').click(function(e){
             // e.preventDefault();
            //  window.location.replace("artists.php")
            //});
        });
        </script>-->

    <script type="text/javascript">

    //var uploadButton = $(button[type="submit"]);
    var uploadButton = document.getElementById('submit');
    var fileSelect = document.getElementById('formimg');
    
    //Adding a submit function to the form 
    $('#form1').submit(function(e){
     
     //Preventing the default behavior of the form 
     //Because of this line the form will do nothing i.e will not refresh or redirect the page 
     e.preventDefault();

     uploadButton.innerHTML = 'Saving...';

     var formData = new FormData();
     formData.append("formname", $('#formname').val());
     formData.append("formdesc", $('#formdesc').val());

     var files = fileSelect.files;

    // Loop through each of the selected files.
    for (var i = 0; i < files.length; i++) {
      var file = files[i];

      //Check the file type.
      if (!file.type.match('image.*')) {
        continue;
      }

      // Add the file to the request.
      formData.append('formimg[]', file, file.name);
      //formData.append('formimg', file, file.name);
    }
     
     //Creating an ajax method
     $.ajax({
     
     //Getting the url of the uploadphp from action attr of form 
     //this means currently selected element which is our form 
     //url: $(this).attr('action'),
     url: 'saveprueba.php',
     
     //For file upload we use post request
     type: "POST",
     
     //Creating data from form 
     //data: new FormData(this),
     data: formData,
     
     //Setting these to false because we are sending a multipart request
     contentType: false,
     cache: false,
     processData: false,
     success: function(data){
     //If the request is successfull we will get the scripts output in data variable 
     //Showing the result in our html element 
     $('#msg').html(data);
     },
     error: function(){}
     });
    });
    </script>

</body>

</html>
