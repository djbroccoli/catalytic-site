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

    <!-- Morris Charts CSS -->
    <!--<link href="vendor/morrisjs/morris.css" rel="stylesheet">-->

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
    <?php require_once 'basics/config.php';
      require_once 'basics/conexion.php';

    ?>

        <!--Navigation-->
        <?php
        include 'navigation.php';
        ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">

                            <?php

                                $sql = "SELECT * FROM artists_db WHERE act = 1";
                                $result = $conn->query($sql);
                                $row_cnt = $result->num_rows;

                                //$row = $result->fetch_assoc();
                            ?>
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-male fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $row_cnt ?></div>
                                    <div>Artists</div>
                                </div>
                            </div>
                        </div>
                        <a href="artists.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <?php
                $result->close();
                ?>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                        <?php

                                $sql = "SELECT * FROM labels_db WHERE act = 1";
                                $result = $conn->query($sql);
                                $row_cnt = $result->num_rows;

                                //$row = $result->fetch_assoc();
                        ?>
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-industry fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $row_cnt ?></div>
                                    <div>Labels</div>
                                </div>
                            </div>
                        </div>
                        <a href="labels.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php
                $result->close();
                ?>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                        <?php

                                $sql = "SELECT * FROM full_db WHERE act = 1";
                                $result = $conn->query($sql);
                                $row_cnt = $result->num_rows;

                                //$row = $result->fetch_assoc();
                        ?>
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-play-circle-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $row_cnt ?></div>
                                    <div>Albums</div>
                                </div>
                            </div>
                        </div>
                        <a href="albums.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php
                $result->close();
                ?>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                            <?php

                                $sql = "SELECT * FROM messages_db WHERE act = 1 AND newmail = 1";
                                $result = $conn->query($sql);
                                $row_cnt = $result->num_rows;

                                //$row = $result->fetch_assoc();
                                ?>
                                <div class="col-xs-3">
                                    <i class="fa fa-envelope-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $row_cnt ?></div>
                                    <div>New Message(s)<!--<span>
                                    <?php
                                    //$subsql = "SELECT * FROM messages_db WHERE act = 1";
                                    //$subresult = $conn->query($subsql);
                                    //$subrow_cnt = $subresult->num_rows;
                                    ?>
                                    <span> (Total: <?//php echo $subrow_cnt ?>)</span>--></div>
                                </div>
                            </div>
                        </div>
                        <a href="messages.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <?php
                $result->close();
            ?>

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

    <!-- Morris Charts JavaScript -->
    <!--<script src="vendor/raphael/raphael.min.js"></script>
    <script src="vendor/morrisjs/morris.min.js"></script>
    <script src="data/morris-data.js"></script>-->

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
<?php
$conn->close();
?>
</body>

</html>
