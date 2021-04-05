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
                    <h1 class="page-header">Messages</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row table-toolbar">

                                    <div class="col-lg-6">
                                          <!--<div class="btn-group">
                                             <a href="addartist.php"><button class="btn btn-success"><i class="fa fa-plus fa-fw"></i> Add Artist</button></a>
                                          </div>-->
                                    </div>
                                    <div class="col-lg-6">
                                          <div class="btn-group pull-right">
                                             <button data-toggle="dropdown" class="btn dropdown-toggle">Tools <span class="caret"></span></button>
                                             <ul class="dropdown-menu">
                                                <li><a href="#">Print</a></li>
                                                <li><a href="#">Download as spreadsheet</a></li>
                                             </ul>
                                          </div>
                                    </div>

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of Messages
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                        date_default_timezone_set('America/Chicago');
                                        $sql = "SELECT * FROM messages_db WHERE act = 1 ORDER BY id DESC";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                ?>
                                    <tr class="odd">
                                        <td <?php if ($row["newmail"] == 1) {echo 'style="font-weight:bold;"';}?>><? echo $row["name"] ?></td>
                                        <td <?php if ($row["newmail"] == 1) {echo 'style="font-weight:bold;"';}?>><? echo $row["email"] ?></td>
                                        <td <?php if ($row["newmail"] == 1) {echo 'style="font-weight:bold;"';}?>><? echo $row["message"] ?></td>
                                        <td <?php if ($row["newmail"] == 1) {echo 'style="font-weight:bold;"';}?>><? echo date($row["serverdate"]) ?></td>
                                        <td class="center">
                                            <a href="deletemessage.php?id=<? echo $row['id'] ?>" onClick="return confirm('Do you really want to delete this message from <? echo $row["name"] ?>?')"><i class="fa fa-trash fa-fw"></i>Delete</a>
                                        </td>

                                    </tr>

                                    <?php
                                        }
                                    }
                                    $result->close();
                                    ?>


                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <!--<div class="well">-->
                                <!--<h4>Subtitle</h4>-->

                               <!-- <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://catalyticsound.com/artists.php/">View Artists Page</a>
                            </div>-->
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
            "order": [[ 3, "desc" ]],
            "pageLength": 100
        });
    });
    </script>
    <script>if(window.location.hash=="#ok"){$('.alert').removeAttr("hidden").delay(4000).fadeOut();}</script>
<?php
$finalsql = "UPDATE messages_db SET newmail = 0";
$conn->query($finalsql);
?>

<?php
$conn->close();
?>
</body>

</html>
