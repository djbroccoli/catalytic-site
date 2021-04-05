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
                        <div class="alert alert-success" hidden>
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h4>Success!</h4>Your changes have been saved.
                        </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Settings</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row table-toolbar">
                <div class="col-lg-6">
                    <!--<a href="artists.php"><button type="button" class="btn btn-default"><i class="fa fa-trash fa-fw"></i> Cancel</button></a>-->
                    <!--<a href="artists.php" class="btn btn-danger"><i class="fa fa-reply fa-fw"></i> Cancel</a>-->
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!--<div class="panel-heading">

                        </div>-->
                        <div class="panel-body">
                            <form role="form" id="notificationsform">
                                <div class="row">
                                  <?php

                                  $sql = "SELECT * FROM conf_db WHERE id = 1";
                                  $result = $conn->query($sql);

                                  $row = $result->fetch_assoc();
                                  ?>

                                    <div class="col-lg-6">
                                    <h2>Notifications</h2>
                                    <div class="form-group">
                                        <label></label>
                                        <div class="checkbox">
                                            <label>
                                                <input <?php if ($row["sendcontactmessage"] > '') { echo "checked"; } ?> type="checkbox" name="formsendcontacmessage" value="1" id="formsendcontacmessage">Send a copy of messages submitted through "Contact" page
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input <?php if ($row["sendaotw"] > '') { echo "checked"; } ?> type="checkbox" name="formsendaotw" value="1" id="formsendaotw">Send "Albums of the Week" list when generated
                                            </label>
                                        </div>
                                    </div>
                                        <div class="form-group">
                                            <label>Email address</label>
                                            <input type="email" class="form-control" placeholder="Enter email..." name="formnotificationemail" id="formnotificationemail" value="<?php echo $row["notificationemail"] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Secondary email address</label>
                                            <input type="email" class="form-control" placeholder="Enter email..." name="formnotificationemail2" id="formnotificationemail2" value="<?php echo $row["notificationemail2"] ?>">
                                        </div>

                                    </div>
                                    <!-- /.col-lg-6 (nested) -->

                                    <div class="col-lg-6">

                                    </div>
                                    <!-- /.col-lg-6 (nested) -->

                                </div>
                                <!-- /.row (nested) -->



                                        <button type="submit" class="btn btn-success"><i class="fa fa-save fa-fw"></i> Save</button>

                             </form>



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

    <!-- Validation -->
    <script type="text/javascript" src="/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/js/additional-methods.min.js"></script>

    <!--Send Form-->
    <script>
        $(function() {

          var form = $('#notificationsform');

          $(form).validate({
              ignore: ":hidden",
              rules: {
                 formnotificationemail: {
                     required: true,
                     email: true
                   },
                   formnotificationemail2: {
                       email: true
                     }
              },
              messages: {
                 formnotificationemail: {
                     required: "<i class='fa fa-exclamation-triangle'></i> Please, type your email address"
                 },
                 formnotificationemail2: {
                     required: "<i class='fa fa-exclamation-triangle'></i> Please, type your email address"
                 }
             },

              //$('button[type="submit"]').click(function(e){
              //e.preventDefault();
              submitHandler: function (form) {
              $('button[type="submit"]').html('Saving...');

              var formData = new FormData();
              formData.append("formsendcontacmessage", $('#formsendcontacmessage:checked').val() || '');
              formData.append("formsendaotw", $('#formsendaotw:checked').val() || '');
              formData.append("formnotificationemail", $('#formnotificationemail').val());
              formData.append("formnotificationemail2", $('#formnotificationemail2').val());

              //console.log($('#formnotificationemail').val());
              //return false;

              $.ajax({
                type: 'POST',
                url: 'saveglobalconf.php',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(data){
                console.log(data);
                window.location.replace("globalconf.php#ok");
                window.location.reload();
                 },

                error: function(data) {
                      var data
                      console.log(data);
                      //$('<p>'. $data .'</p>').appendTo('#Content');

                      $('.alert-error').removeClass('hide');
                 }
              });
            }
            //$('button[type="cancel"]').click(function(e){
             // e.preventDefault();
            //  window.location.replace("artists.php")
            //});
            });
        });
        </script>
        <script>if(window.location.hash=="#ok"){$('.alert').removeAttr("hidden").delay(4000).fadeOut();}</script>


</body>

</html>
