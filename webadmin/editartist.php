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
<?php require_once 'basics/config.php';
      require_once 'basics/conexion.php';
?>

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
                    <h1 class="page-header">Edit Artist</h1>
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
                            <form role="form">
                                <div class="row">
                                <?php

                                $sql = "SELECT * FROM artists_db WHERE act = 1 AND id = ".$_GET['id'];
                                $result = $conn->query($sql);

                                $row = $result->fetch_assoc();
                                ?>
                                    <div class="col-lg-6">
                                    <h2>Profile</h2>
                                        <div class="form-group">
                                                <label for="formid">Artist ID</label>
                                                <input class="form-control" type="text" placeholder="Disabled input" name="formid" id="formid" value="<?php echo $row["id"] ?>" disabled>
                                            </div>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" placeholder="Enter text" name="formname" id="formname" value="<?php echo $row["name"] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="4" name="formdesc" id="formdesc"><?php echo $row["description"] ?></textarea>
                                        </div>
                                        <hr>
                                        <h3>Profile Picture</h3>
                                        <div class="form-group">
                                            <label>Change Image (250px width)</label>
                                            <input class="filestyle" type="file" id="formimg" name="formimg" data-input="false" data-buttonText="&nbsp;Choose Image">
                                            <img src="/<?php echo $row["imgpath"] ?>" class="img-responsive img-previous" style="max-width: 250px;margin-top: 10px;">
                                            <input type="hidden" id="formimgprevious" name="formimgprevious" value="<?php echo $row["imgpath"] ?>">
                                        </div>
                                        <hr>
                                       <h3>Contact & Social Networks</h3>
                                       <div class="form-group">
                                            <label>Website</label>
                                            <input class="form-control" placeholder="http://website.com/" name="formwebsite" id="formwebsite" value="<?php echo $row["website"] ?>">
                                        </div>
                                       <div class="form-group">
                                            <label>Facebook</label>
                                            <input class="form-control" placeholder="https://facebook.com/user" name="formfacebook" id="formfacebook" value="<?php echo $row["facebook"] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Twitter</label>
                                            <input class="form-control" placeholder="https://twitter.com/user" name="formtwitter" id="formtwitter" value="<?php echo $row["twitter"] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Instagram</label>
                                            <input class="form-control" placeholder="https://instagram.com/user" name="forminstagram" id="forminstagram" value="<?php echo $row["instagram"] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Soundcloud</label>
                                            <input class="form-control" placeholder="https://soundcloud.com/user" name="formsoundcloud" id="formsoundcloud" value="<?php echo $row["soundcloud"] ?>">
                                        </div>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->

                                    <div class="col-lg-6">

                                    </div>
                                    <!-- /.col-lg-6 (nested) -->

                                </div>
                                <!-- /.row (nested) -->



                                        <button type="submit" class="btn btn-success"><i class="fa fa-save fa-fw"></i> Save</button>
                                        <button type="reset" class="btn btn-default pull-right">Clear Form</button>

                             </form>

                            <?php
                            $result->close();
                            ?>

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

    <!-- Custom Input File Style -->
    <script src="js/file-input-style.js"></script>

    <!--Send Form-->
    <!--<script>
        $(function() {

            $('button[type="submit"]').click(function(e){
              e.preventDefault();
              //var hora = $('#hora').val();
              //var tipopropiedad = $('#tipopropiedad option:selected').html();
              //var provincia = $('#provincia option:selected').val();
              var varid = $('#formid').val();
              var varname = $('#formname').val();
              var vardesc = $('#formdesc').val();
              var varwebsite = $('#formwebsite').val();
              var varfacebook = $('#formfacebook').val();
              var vartwitter = $('#formtwitter').val();
              var varinstagram = $('#forminstagram').val();
              var varsoundcloud = $('#formsoundcloud').val();

              $.ajax({
                type: 'POST',
                url: 'saveartistedit.php',
                data: {'varid': varid, 'varname': varname, 'vardesc': vardesc, 'varwebsite': varwebsite, 'varfacebook': varfacebook, 'vartwitter': vartwitter, 'varinstagram': varinstagram, 'varsoundcloud': varsoundcloud},
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

        <!--Send Form-->

        <script type="text/javascript">
            $(function() {
                $('#formimg').click(function(){
                    $('.img-previous').fadeOut("slow");
                });
            });
        </script>

        <script>
            $(function() {

                $('button[type="submit"]').click(function(e){
                  e.preventDefault();


                  $(this).html('Saving...');

                  var formData = new FormData();
                  formData.append("formid", $('#formid').val());
                  formData.append("formname", $('#formname').val());
                  formData.append("formdesc", $('#formdesc').val());
                  formData.append("formwebsite", $('#formwebsite').val());
                  formData.append("formfacebook", $('#formfacebook').val());
                  formData.append("formtwitter", $('#formtwitter').val());
                  formData.append("forminstagram", $('#forminstagram').val());
                  formData.append("formsoundcloud", $('#formsoundcloud').val());
                  formData.append("formimgpath", $('#formimgprevious').val());


                  var fileSelect = document.getElementById('formimg');

                  var files = fileSelect.files;

                  for (var i = 0; i < files.length; i++) {
                      var file = files[i];

                      if (!file.type.match('image.*')) {
                        continue;
                      }

                      formData.append('formimg[]', file, file.name);

                    }

                  $.ajax({
                    type: 'POST',
                    url: 'saveartistedit.php',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
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
            </script>
<?php
    $conn->close();
?>
</body>

</html>
