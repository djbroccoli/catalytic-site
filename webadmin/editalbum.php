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
                    <h1 class="page-header">Edit Album</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row table-toolbar">
                <div class="col-lg-6">
                    <!--<a href="artists.php"><button type="button" class="btn btn-default"><i class="fa fa-trash fa-fw"></i> Cancel</button></a>-->
                    <a href="<?php if ($_GET['pg'] == 'dup') {echo 'duplicatealbums.php';} else {echo 'albums.php';} ?>" class="btn btn-danger"><i class="fa fa-reply fa-fw"></i> Cancel</a>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!--<div class="panel-heading">

                        </div>-->
                        <?php

                                $sql = "SELECT * FROM full_db WHERE act = 1 AND id = ".$_GET['id'];
                                $result = $conn->query($sql);

                                $row = $result->fetch_assoc();
                        ?>
                        <div class="panel-body">
                             <form role="form">
                                <div class="row">
                                    <!--<div class="col-lg-12"><h2>Album</h2></div>-->
                                    <div class="col-lg-6">
                                    <h2>Album</h2>
                                    <div class="form-group">
                                                <label for="formid">Album ID</label>
                                                <input class="form-control" type="text" placeholder="Disabled input" name="formid" id="formid" value="<?php echo $row["id"] ?>" disabled>
                                            </div>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" placeholder="Enter text" name="formalbumname" id="formalbumname" value="<?php echo $row["albumname"] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Artists</label>
                                            <input class="form-control" placeholder="Enter text" name="formartist" id="formartist" value="<?php echo $row["albumartist"] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Show on artist's page: (Hold down Ctrl / Cmd + click to select multiple)</label>
                                            <select multiple class="form-control" id="formartistpage">
                                            <option value=""></option>

                                            <?php

                                            $sql2 = "SELECT * FROM artists_db WHERE act = 1";
                                            $result2 = $conn->query($sql2);

                                            if ($result2->num_rows > 0) {
                                            // output data of each row
                                            while($row2 = $result2->fetch_assoc()) {
                                                $multipleartistsstring = explode(',',$row["artistid"]);
                                                //if ($row2["id"] == $row["artistid"]) { echo "selected"; }
                                            ?>
                                                <option <?php if (in_array($row2["id"], $multipleartistsstring)) { echo "selected"; } ?> value="<?php echo $row2["id"] ?>"><?php echo $row2["name"] ?></option>
                                            <?php
                                                }
                                            }
                                            $result2->close();
                                            ?>

                                            </select>
                                        </div>

                                       <h3>Other</h3>
                                       <div class="form-group">
                                            <label>Personnel</label>
                                            <input class="form-control" placeholder="" name="formpersonnel" id="formpersonnel" value="<?php echo $row["personnel"] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Label</label>
                                            <input class="form-control" placeholder="" name="formlabel" id="formlabel" value="<?php echo $row["label"] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Year of Release</label>
                                            <input class="form-control" placeholder="" name="formlabel" id="formreleaseyear" maxlength="4" value="<?php echo $row["releaseyear"] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Formats</label>
                                            <input class="form-control" placeholder="" name="formformats" id="formformats" value="<?php echo $row["formats"] ?>">
                                        </div>
                                        <div class="form-group input-group">
                                            <label>Bandcamp Link</label>
                                            <input class="form-control" placeholder="http://bandcamp.com/" name="formbandcamplink" id="formbandcamplink" value="<?php echo $row["bandcamplink"] ?>">
                                            <span class="input-group-btn" style="padding-top: 25px;"><a class="btn btn-default" href="<?php echo $row["bandcamplink"] ?>" target="_blank"> <span class="glyphicon glyphicon-new-window"></span> Open</a></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input class="form-control" type="number" placeholder="" name="formquantity" id="formquantity" value="<?php echo $row["quantity"] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Wholesale Cost</label>
                                            <input class="form-control" placeholder="" name="formwholesale" id="formwholesale" value="<?php echo $row["wholesalecost"] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Album Credits / Reviews</label>
                                            <textarea class="form-control" rows="4" name="formdesc" id="formdesc"><?php echo $row["albumcredits"] ?></textarea>
                                        </div>


                                    </div>
                                    <!-- /.col-lg-6 (nested) -->

                                    <div class="col-lg-6">

                                    <h2>Artwork</h2>
                                        <img id="img-cover" src="<?php if ($row["coverimgid"] > "") {
                                            $coverimgid = $row["coverimgid"];
                                            $sql3 = "SELECT * FROM img_db WHERE id = '$coverimgid'";
                                            $result3 = $conn->query($sql3);

                                            $row3 = $result3->fetch_assoc();
                                            echo "../".$row3["imgpath"];
                                            $result3->close();
                                            } else echo $row["coverlink"] ?>" class="img-responsive" style="max-width: 250px;margin-top: 30px;margin-bottom: 30px;">
                                        <div class="form-group input-group">
                                            <label>Image URL</label>
                                            <input class="form-control" placeholder="Bandcamp link (Right click on album and 'Copy image URL')" name="formcoverlink" id="formcoverlink" value="<?php if ($row["coverimgid"] > "") { echo ""; } else echo $row["coverlink"] ?>">

                                            <span class="input-group-btn" style="padding-top: 25px;">
                                                <button id="button-change-img" class="btn btn-default" type="button"><i class="fa fa-refresh"></i> Reload
                                                </button>
                                            </span>

                                        </div>

                                        <div class="form-group input-group">
                                            <label>Or Upload Custom Artwork</label>
                                            <p>
                                                <input class="form-control" placeholder="" name="formcoverimgid" id="formcoverimgid" type="hidden" value="<?php echo $row["coverimgid"] ?>">
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
                                                    <input <?php if ($row["physical"] > '') { echo "checked"; } ?> type="checkbox" name="physical" value="x" id="formphysical">Physical
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input <?php if ($row["newadd"] > '') { echo "checked"; } ?> type="checkbox" name="newadd" value="x" id="formnewadd">New Addition
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input <?php if ($row["newrelease"] > '') { echo "checked"; } ?> type="checkbox" name="newrelease" value="x" id="formnewrelease">New Release
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input <?php if ($row["dontslide"] > '') { echo "checked"; } ?> type="checkbox" name="dontslide" value="x" id="formdontslide">DO NOT add to slide show
                                                </label>
                                                <p class="small">(Check this option to prevent this item being added to the home page slide show. By default all items are added.)</p>
                                            </div>
                                        </div>


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
              //var varid = $('#formid').val();
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

              var formData = new FormData();
              formData.append("formid", $('#formid').val());
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
              formData.append("formdontslide", $('#formdontslide:checked').val() || '');

              $.ajax({
                type: 'POST',
                url: 'savealbumedit.php',
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
                      //$('<p>'. $data .'</p>').appendTo('#Content');
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
