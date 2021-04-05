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

    <!-- DataTables CSS -->
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

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
                        <div class="alert alert-success" hidden>
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h4>Success!</h4>Your changes have been saved
                        </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Duplicate Albums</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row table-toolbar">

                                    <div class="col-lg-6">
                                          <div class="btn-group">
                                             <a href="albums.php"><button class="btn"><i class="fa fa-reply fa-fw"></i> Go Back</button></a>
                                          </div>
                                    </div>
                                    <div class="col-lg-6">
                                          <!--<div class="btn-group pull-right">
                                             <button data-toggle="dropdown" class="btn dropdown-toggle">Tools <span class="caret"></span></button>
                                             <ul class="dropdown-menu">

                                                <li><a href="writexlsxalbums.php" target="_blank">Download as spreadsheet</a></li>
                                                <li><a href="writecsvalbums.php" target="_blank">Download as .CSV file</a></li>
                                             </ul>
                                          </div>-->
                                    </div>

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of Duplicate Records
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Artist</th>
                                        <th>Label</th>
                                        <th>Formats</th>
                                        <th>Year of Release</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                        $sql = "SELECT * FROM full_db WHERE albumname IN (SELECT albumname FROM full_db WHERE act <> 0 GROUP BY albumname HAVING count(albumname) > 1) AND act <> 0 ORDER BY albumname";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                ?>
                                    <tr class="odd">
                                        <td><strong><? echo $row["albumname"] ?></strong></td>
                                        <td style="color:<?php if ($row["act"] == 2) {echo 'lightgray';} ?>;"><? echo $row["albumartist"] ?></td>
                                        <td style="color:<?php if ($row["act"] == 2) {echo 'lightgray';} ?>;"><? echo $row["label"] ?></td>
                                        <td style="color:<?php if ($row["act"] == 2) {echo 'lightgray';} ?>;"><? echo $row["formats"] ?></td>
                                        <td style="color:<?php if ($row["act"] == 2) {echo 'lightgray';} ?>;"><? echo $row["releaseyear"] ?></td>
                                        <td class="center">
                                        <a href="editalbum.php?id=<? echo $row['id'] ?>&pg=dup"><i class="fa fa-pencil fa-fw"></i>Edit </a>
                                        <a href="deletealbum.php?id=<? echo $row['id'] ?>" onClick="return confirm('Do you really want to delete <? echo $row["albumname"] ?>?')"><i class="fa fa-trash fa-fw"></i>Delete</a>
                                        </td>
                                    </tr>

                                    <?php
                                        }
                                    }
                                                                       
                                    ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

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

    <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true,
            stateSave: true,
            stateDuration: 700
        });
    });
    </script>
    <script>if(window.location.hash=="#ok"){$('.alert').removeAttr("hidden").delay(4000).fadeOut();}</script>
<?php
$conn->close();
?>
</body>

</html>
