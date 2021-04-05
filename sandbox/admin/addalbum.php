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
                    <h1 class="page-header">Add Album</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row table-toolbar">
                <div class="col-lg-6">
                    <!--<a href="artists.php"><button type="button" class="btn btn-default"><i class="fa fa-trash fa-fw"></i> Cancel</button></a>-->
                    <a href="albums.php" class="btn btn-danger"><i class="fa fa-reply fa-fw"></i> Cancel</a>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!--<div class="panel-heading">

                        </div>-->
                        <?php require_once 'basics/config.php';
                              require_once 'basics/conexion.php';
                        ?>
                        <div class="panel-body">
                            <form role="form">
                                <div class="row">
                                    <div class="col-lg-6">
                                    <h2>Album</h2>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" placeholder="Enter text" name="formalbumname" id="formalbumname">
                                        </div>
                                        <div class="form-group">
                                            <label>Artists</label>
                                            <input class="form-control" placeholder="Enter text" name="formartist" id="formartist">
                                        </div>
                                        <div class="form-group">
                                            <label>Show on artist's page:</label>
                                            <select class="form-control" id="formartistpage">
                                            <option value="">Select...</option>

                                            <?php

                                            $sql = "SELECT * FROM artists_db WHERE act = 1";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                            ?>
                                                <option value="<?php echo $row["id"] ?>"><?php echo $row["name"] ?></option>
                                            <?php
                                                }
                                            }
                                            $result->close();
                                            ?>

                                            </select>
                                        </div>

                                       <h3>Other</h3>
                                       <div class="form-group">
                                            <label>Personnel</label>
                                            <input class="form-control" placeholder="" name="formpersonnel" id="formpersonnel">
                                        </div>
                                        <div class="form-group">
                                            <label>Label</label>
                                            <input class="form-control" placeholder="" name="formlabel" id="formlabel">
                                        </div>
                                        <div class="form-group">
                                            <label>Year of Release</label>
                                            <input class="form-control" placeholder="" name="formlabel" id="formreleaseyear" maxlength="4">
                                        </div>
                                        <div class="form-group">
                                            <label>Formats</label>
                                            <input class="form-control" placeholder="" name="formformats" id="formformats">
                                        </div>
                                        <div class="form-group">
                                            <label>Bandcamp Link</label>
                                            <input class="form-control" placeholder="http://bandcamp.com/" name="formbandcamplink" id="formbandcamplink">
                                        </div>
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="number" class="form-control" placeholder="" name="formquantity" id="formquantity">
                                        </div>
                                        <div class="form-group">
                                            <label>Wholesale Cost</label>
                                            <input class="form-control" placeholder="" name="formwholesale" id="formwholesale">
                                        </div>
                                        <div class="form-group">
                                            <label>Album Credits / Reviews</label>
                                            <textarea class="form-control" rows="4" name="formdesc" id="formdesc"></textarea>
                                        </div>


                                    </div>
                                    <!-- /.col-lg-6 (nested) -->

                                    <div class="col-lg-6">

                                    <h2>Artwork</h2>
                                        <img id="img-cover" src="" class="img-responsive" style="max-width: 250px;margin-top: 30px;margin-bottom: 30px;">
                                        <div class="form-group input-group">
                                            <label>Bandcamp Image URL</label>
                                            <input class="form-control" placeholder="Bandcamp link (Right click on album and 'Copy image URL')" name="formcoverlink" id="formcoverlink">
                                            <span class="input-group-btn" style="padding-top: 25px;">
                                                <button id="button-change-img" class="btn btn-default" type="button"><i class="fa fa-refresh"></i> Reload
                                                </button>
                                            </span>
                                        </div>
                                        <div class="form-group input-group">
                                            <label>Or Upload Custom Artwork</label>
                                            <p>
                                                <input class="form-control" placeholder="" name="formcoverimgid" id="formcoverimgid" type="hidden">
                                                <input class="form-control filestyle" placeholder="" name="formimgpath" id="formimgpath" type="file" data-input="false" data-buttonText="&nbsp;Choose Image">
                                                <!--<button id="button-change-customimg" class="btn btn-default" type="button"><i class="fa fa-file"></i> Upload
                                                </button>-->
                                            </p>
                                        </div>
                                        <h3>Tags</h3>
                                        <div class="form-group">
                                            <label>Select all that apply</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="physical" value="x" id="formphysical">Physical
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="newadd" value="x" id="formnewadd">New Addition
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="newrelease" value="x" id="formnewrelease">New Release
                                                </label>
                                            </div>
                                        </div>


                                    </div>
                                    <!-- /.col-lg-6 (nested) -->

                                </div>
                                <!-- /.row (nested) -->



                                        <button type="submit" class="btn btn-success"><i class="fa fa-save fa-fw"></i> Save</button>
                                        <button type="reset" class="btn btn-default pull-right">Clear Form</button>

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

    <!-- Refresh Image Cover -->
    <script type="text/javascript">
        $(function() {
            $('#button-change-img').click(function(e){
              var imgchangesrc = $('#formcoverlink').val();
              //console.log(imgchangesrc);
              e.preventDefault();
              $('#img-cover').attr('src',imgchangesrc);
              $('#formcoverimgid').val('');
            });
        });
    </script>

    <!-- Upload Image Cover -->
    <script type="text/javascript">
        $(function() {
            $('#formimgpath').on("change", function(){
                $('#img-cover').attr('src','');

                var formData = new FormData();

                var fileSelect = document.getElementById('formimgpath');

                var files = fileSelect.files;

                for (var i = 0; i < files.length; i++) {
                  var file = files[i];

                  if (!file.type.match('image.*')) {
                    continue;
                  }

                  formData.append('formimgpath[]', file, file.name);

                }

                $.ajax({
                type: 'POST',
                url: 'saveimgalbum.php',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                dataType: 'json',
                success: function(data){
                //console.log(data);
                //$('#img-cover').attr('src','imgcover');
                //$('#formcoverimgid').value('imgid');

                //$.each(data, function(key, val) {

                                $('#img-cover').attr('src','../' + data['imgcover'] + '');
                                $('#formcoverimgid').val('' + data.imgid + '');
                      //});
                 },

                error: function(data) {
                      var data
                      console.log(data);
                      $('#img-cover').attr('src','../imgs/error.png');
                      $('.alert-error').removeClass('hide');

                 }
              });
            });
        });
    </script>

    <!--Send Form-->
    <script>
        $(function() {

            $('button[type="submit"]').click(function(e){
              e.preventDefault();
              $(this).html('Saving...');
              //var varalbumname = $('#formalbumname').val();
              //var varartist = $('#formartist').val();
              //var varartistpage = $('#formartistpage').val();
              //var varcoverlink = $('#formcoverlink').val();
              //var varpersonnel = $('#formpersonnel').val();
              //var varlabel = $('#formlabel').val();
              //var varreleaseyear = $('#formreleaseyear').val();
              //var varformats = $('#formformats').val();
              //var varbandcamplink = $('#formbandcamplink').val();
              //var varquantity = $('#formquantity').val();
              //var varwholesale = $('#formwholesale').val();
              //var vardesc = $('#formdesc').val();
              //var varphysical = $('#formphysical:checked').val() || '';
              //var varnewadd = $('#formnewadd:checked').val() || '';
              //var varnewrelease = $('#formnewrelease:checked').val() || '';
              //var varnewrelease = $('input[name="newrelease"]').html();

              var formData = new FormData();
              formData.append("formalbumname", $('#formalbumname').val());
              formData.append("formartist", $('#formartist').val());
              formData.append("formartistpage", $('#formartistpage').val());
              formData.append("formcoverlink", $('#formcoverlink').val());
              formData.append("formcoverimgid", $('#formcoverimgid').val());
              formData.append("formpersonnel", $('#formpersonnel').val());
              formData.append("formlabel", $('#formlabel').val());
              formData.append("formreleaseyear", $('#formreleaseyear').val());
              formData.append("formformats", $('#formformats').val());
              formData.append("formbandcamplink", $('#formbandcamplink').val());
              formData.append("formquantity", $('#formquantity').val());
              formData.append("formwholesale", $('#formwholesale').val());
              formData.append("formdesc", $('#formdesc').val());
              formData.append("formphysical", $('#formphysical:checked').val() || '');
              formData.append("formnewadd", $('#formnewadd:checked').val() || '');
              formData.append("formnewrelease", $('#formnewrelease:checked').val() || '');

              //console.log(varnewrelease);
              //return false;


              $.ajax({
                type: 'POST',
                url: 'savealbum.php',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                dataType: 'json',
                success: function(data){
                //console.log(data);
                window.location.replace("albums.php#ok");
                 },

                error: function(data) {
                      var data
                      console.log(data);

                      //window.alert(JSON.stringify(data));
                      $('.alert-error').removeClass('hide');
                 }
              });
            });

        });
        </script>
<?php
    $conn->close();
?>
</body>

</html>
