<!DOCTYPE html>
<html lang="en">

<head>

  <?php require_once 'webadmin/basics/config.php';
        require_once 'webadmin/basics/conexion.php';
  ?>

  <?php
              $sql0 = "SELECT * FROM artists_db WHERE act = 1 and id = (?)";
              $stmt = $conn->prepare($sql0);

              $urlid = $_GET['id'];

              $stmt->bind_param('s', $urlid);
              $stmt->execute();
              //get_result necesita mysqlnd (MySQL Native Driver Only)
              //$result = $stmt->get_result();
              $stmt->bind_result($stmtid, $stmtname, $stmtdescription, $stmtimgpath, $stmtwebsite, $stmtfacebook, $stmttwitter, $stmtinstagram, $stmtsoundcloud, $editedby, $editedwhen, $stmtact, $stmtdatabase);

              //$sql = "SELECT * FROM artists_db WHERE act = 1 and id = ".$_GET['id'];
              //$result = $conn->query($sql);

              //$row = $result->fetch_assoc();
              $result0 = $stmt->fetch();

              //$artistid = $row['id'];
              //$artistname = $row['name'];

              $artistid = $stmtid;
              $artistname = $stmtname;
              ?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Creative Music Cooperative">
    <meta name="author" property="og:author" content="Catalytic Sound">

    <title>Catalytic Sound - <?php echo $artistname; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts CSS -->
    <link href="css/customfonts.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/anim.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet">


        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="theme-color" content="#ffffff">

        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="@kenvandermark">
        <meta name="twitter:url" content="http://catalyticsound.com">
        <meta name="twitter:title" content="Catalytic Sound">
        <meta name="twitter:description" content="Catalytic Sound &amp; Collective">

        <!--<meta property="og:url" content="http://catalyticsound.com" />-->
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Catalytic Sound - <?php echo $artistname; ?>" />
        <meta property="og:description" content="Creative Music Cooperative &amp; Digital Downloads" />
        <meta property="og:image" content="<?php echo $stmtimgpath; ?>" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>



<body id="artist-page">

    <?php
    $stmt->free_result();
    include 'nav.php';
    ?>

    <!-- Half Page Image Background Carousel Header -->

<header>

        <div class="container">

        <div class="artist-page-descripcion row">

            <div class="col-sm-2">
                <img class="img-responsive" src="<?php echo $stmtimgpath?>">
            </div>

            <div class="col-sm-10">
                <h1><?php echo $stmtname?></h1>

                <p><?php echo $stmtdescription?></p>

                <?php if ($stmtwebsite > "") { ?><a target="_blank" href="<?php echo $stmtwebsite ?>"><button class="btn">Website</button></a><?php } ?>
                <?php if($stmtfacebook > "") { ?><a class="social social-facebook" target="_blank" href="<?php echo $stmtfacebook ?>"><i class="fa fa-facebook fa-lg"></i></a> <?php } ?>
                <?php if($stmttwitter > "") { ?><a class="social social-twitter" target="_blank" href="<?php echo $stmttwitter ?>"><i class="fa fa-twitter fa-lg"></i></a><?php } ?>
                <?php if($stmtinstagram > "") { ?><a class="social social-instagram" target="_blank" href="<?php echo $stmtinstagram ?>"><i class="fa fa-instagram fa-lg"></i></a><?php } ?>
            </div>

        </div>





        <div id="albumfront_carousel" class="albumfront_carousel carousel slide artist-page-carousel" data-ride="carousel" data-interval="2500">

        <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#albumfront_carousel" data-slide-to="0" class="active"></li>

                <?php
                $stmt->free_result();
                $limit = 4;

                $sql = "SELECT * FROM full_db WHERE artistid = $artistid AND (newadd = 'x' OR newrelease = 'x') AND act = 1 LIMIT $limit OFFSET 4";
                $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                ?>
                <li data-target="#albumfront_carousel" data-slide-to="1"></li>
                 <?php

                    }



                 ?>

            </ol>

            <h3 class="text-center">Recent Albums</h3>
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="container-fluid">

                        <div class="row row-carousel-newreleases">

                        <?php

                        //$limit = 4;

                                //$sql = "SELECT * FROM full_db WHERE artistid = $artistid AND (newadd = 'x' OR newrelease = 'x') ORDER BY releaseyear DESC LIMIT $limit";
                                $sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE artistid = $artistid AND (newadd = 'x' OR newrelease = 'x') AND full_db.act = 1 ORDER BY releaseyear DESC LIMIT $limit";
                                $result = $conn->query($sql);
                                $rowcount = $result->num_rows;


                        if ($result->num_rows > 0) {
                        // output data of each row
                            while($row = $result->fetch_assoc()) {

                        ?>
                            <a href="#" data-toggle="modal" data-src="<?php echo $row["bandcamplink"] ?>" data-height="600" data-width="100%" data-target="#shopmodal" class="modalButton <?php if ($rowcount == 4) { echo "col-xs-12 col-sm-6 col-md-3"; } elseif ($rowcount == 3) {echo "col-xs-12 col-sm-6 col-md-3";} elseif ($rowcount == 2) {echo "col-xs-12 col-sm-6 col-md-3";} elseif ($rowcount == 1) {echo "col-xs-12 col-sm-6 col-md-3";}?> img-responsive">
                            <div class="col-xs-12 albumcover <?php if ($row["newrelease"] > "") { echo "newrelease"; } elseif ($row["newadd"] > "") {echo "newaddition";}?>">


                                <?php
                                if ($row["coverimgid"] > "") { echo '<img class="img-responsive" src="'.$row["imgpath"].'" alt="audiographic-disc">'; }
                                elseif ($row["coverlink"] > "") { echo '<img class="img-responsive" src="'.$row["coverlink"].'" alt="audiographic-disc">'; }
                                else echo '<img class="img-responsive" style="box-shadow:none" src="imgs/no-albumcover.png">';
                                ?>

                                <!--<iframe style="border: 0; width: 800px; height: 800px;" src="https://bandcamp.com/EmbeddedPlayer/album=890275878/size=large/bgcol=ffffff/linkcol=0687f5/minimal=true/transparent=true/" seamless></iframe>-->
                                <p class="album-details-name"><?php echo $row["albumname"] ?></p>
                            </div>
                            </a>


                       <?php }
                        }    else {
                            echo "<p>There are no recent albums</p>";
                        }
                        ?>


                        </div>
                    </div>
                </div>

                        <?php

                        //$limit = 4;

                                $sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE artistid = ".$artistid." AND (newadd = 'x' OR newrelease = 'x') AND full_db.act = 1 ORDER BY releaseyear DESC LIMIT ".$limit." OFFSET 4";
                                $result = $conn->query($sql);
                                $rowcount = $result->num_rows;



                        ?>

                        <?php
                        if ($result->num_rows > 0) {


                        ?>

                <div class="item">
                    <div class="container-fluid">
                        <div class="row">

                        <?php
                        // output data of each row
                            while($row = $result->fetch_assoc()) {

                        ?>

                            <a href="#" data-toggle="modal" data-src="<?php echo $row["bandcamplink"] ?>" data-height="600" data-width="100%" data-target="#shopmodal" class="modalButton <?php if ($rowcount == 4) { echo "col-xs-12 col-sm-6 col-md-3"; } elseif ($rowcount == 3) {echo "col-xs-12 col-sm-6 col-md-3";} elseif ($rowcount == 2) {echo "col-xs-12 col-sm-6 col-md-3";} elseif ($rowcount == 1) {echo "col-xs-12 col-sm-6 col-md-3";}?> img-responsive">
                             <div class="col-xs-12 albumcover <?php if ($row["newrelease"] > "") { echo "newrelease"; } elseif ($row["newadd"] > "") {echo "newaddition";}?>">


                                <?php
                                if ($row["coverimgid"] > "") { echo '<img class="img-responsive" src="'.$row["imgpath"].'" alt="audiographic-disc">'; }
                                elseif ($row["coverlink"] > "") { echo '<img class="img-responsive" src="'.$row["coverlink"].'" alt="audiographic-disc">'; }
                                else echo '<img class="img-responsive" style="box-shadow:none" src="imgs/no-albumcover.png">';
                                ?>

                                <!--<iframe style="border: 0; width: 800px; height: 800px;" src="https://bandcamp.com/EmbeddedPlayer/album=890275878/size=large/bgcol=ffffff/linkcol=0687f5/minimal=true/transparent=true/" seamless></iframe>-->
                                <p class="album-details-name"><?php echo $row["albumname"] ?></p>
                            </div>
                            </a>

                       <?php }
                        }
                        ?>


                        </div>
                    </div>
                </div>
            <!-- End Item -->
            </div>
            <!-- End Carousel Inner -->
            <!--<div class="controls">
                <ul class="nav">
                    <li data-target="#albumfront_carousel" data-slide-to="0" class="active"><a href="#"><img src="http://placehold.it/50x50"><small></small></a></li>
                    <li data-target="#albumfront_carousel" data-slide-to="1"><a href="#"><img src="http://placehold.it/50x50"><small></small></a></li>
                    <li data-target="#albumfront_carousel" data-slide-to="2"><a href="#"><img src="http://placehold.it/50x50"><small></small></a></li>
                    <li data-target="#albumfront_carousel" data-slide-to="3"><a href="#"><img src="http://placehold.it/50x50"><small></small></a></li>
                </ul>
            </div>-->
        </div>
        <!-- End Carousel -->
    </div>

</header>


    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12">

    <?php

    $limit = 12;
    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
    $start_from = ($page-1) * $limit;

            if($_GET['filter'] == 'all') {$filter = "all";} elseif($_GET['filter'] == 'solo') {$filter = "solo";} elseif($_GET['filter'] == 'bands') {$filter = "bands";};

            if($filter == 'solo') {
                // query to get all Fitzgerald records
                $sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE artistid = ".$artistid." AND full_db.act = 1 AND albumartist LIKE '" .$artistname. "' ORDER BY albumartist ASC LIMIT $start_from, $limit";
            }
            elseif($filter == 'bands') {
                // query to get all Herring records
                $sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE artistid = ".$artistid." AND full_db.act = 1 AND albumartist NOT LIKE '" .$artistname. "' ORDER BY albumartist ASC LIMIT $start_from, $limit";
            } else {
                // query to get all records
                $sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE artistid = ".$artistid." AND full_db.act = 1 ORDER BY albumartist ASC LIMIT $start_from, $limit";
            }

            //$sql = "SELECT * FROM full_db WHERE artistid = $artistid ORDER BY albumartist ASC LIMIT $start_from, $limit";
            $result = $conn->query($sql);

            //$row = $result->fetch_assoc();

    ?>

   <!-- Catalog Section -->
    <section id="catalog" class="catalog-section">
        <div class="">
            <div class="row">
                <div class="col-lg-12">

                    <div class="button-group filter-button-group">
                      <!--<button class="btn" data-filter="*">All</button>
                      <button class="btn" data-filter=".Cd">Cd</button>
                      <button class="btn" data-filter=".DVD">DVD</button>
                      <button class="btn" data-filter=".Lp">Lp</button>
                      <button class="btn" data-filter=".Book">Digital</button>-->

                      <!--<form action='<?php// echo $_SERVER['PHP_SELF'] . "?id=" . $artistid . "&filter="; ?>' method='post' name='form_filter'>-->
                      <form action="" method='post' name='form_filter'>
                        <select class="form-control" id="filterartist" name="value">
                            <option value="all" <?php if($_GET['filter'] == 'all') {echo "selected";}?>>All</option>
                            <option value="solo" <?php if($_GET['filter'] == 'solo') {echo "selected";}?>>Solo / Special Projects</option>
                            <option value="bands" <?php if($_GET['filter'] == 'bands') {echo "selected";}?>>Bands</option>
                        </select>

                    </form>
                    </div>

                </div>
            </div>

            <div class="row fila-discos filterdiscos">

            <?php
            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_assoc()) {

            ?>
                <div class="col-sm-6 col-md-3 disco <?php echo $row["formats "]; if ($row["newrelease"] > "") { echo " newrelease"; } elseif ($row["newadd"] > "") {echo " newaddition";} elseif ($row["aotw"] > "") {echo "aotw";}?>">
                    <!--<a class="img-responsive" href="record.php?id=<?//php echo $row["id"] ?>">-->
                    <!--<a class="img-responsive" target="_blank" href="<?//php echo $row["bandcamplink"] ?>">-->

                    <a class="modalButton" href="#" data-toggle="modal" data-src="<?php echo $row["bandcamplink"] ?>" data-height="600" data-width="100%" data-target="#shopmodal">

                        <?php
                        if ($row["coverimgid"] > "") { echo '<div class="details-shadow"><div class="details-text"><button class="btn btn-buy">View More / Buy</button><p>Available Formats:</p><p>'.$row["formats"].'</p></div><img class="img-responsive" src="'.$row["imgpath"].'" alt="audiographic-disc"></div>'; }
                        elseif ($row["coverlink"] > "") { echo '<div class="details-shadow"><div class="details-text"><button class="btn btn-buy">View More / Buy</button><p>Available Formats:</p><p>'.$row["formats"].'</p></div><img class="img-responsive" src="'.$row["coverlink"].'" alt="audiographic-disc"></div>'; }
                        else echo '<img class="img-responsive" style="box-shadow:none" src="imgs/no-albumcover.png">';
                        ?>

                    <div><p class="album-details-name"><?php echo $row["albumname"] ?></p></div>
                    </a>
                    <p class="album-details-title"><?php echo $row["albumartist"] ?></p>
                </div>

                <div class="col-sm-6 col-md-3">
                    <a class="modalButton" href="#" data-toggle="modal" data-src="<?php echo $row["bandcamplink"] ?>" data-height="600" data-width="100%" data-target="#shopmodal">
                    <div><p class="album-details-name"><?php echo $row["albumname"] ?></p></div>
                    <p class="album-details-title"><?php echo $row["albumartist"] ?></p>
                    <p class="album-details-title"><?php echo $row["releaseyear"] ?></p>
                    <p class="album-details-quote"><?php if ($row["albumcredits"] > "") {echo '"' . $row["albumcredits"] . '"';} ?></p>
                    </a>
                </div>

                <?php
                }
                ?>


            </div>



            <?php

            if($filter == 'solo') {
                // query to get all Fitzgerald records
                $sql = "SELECT COUNT(id) FROM full_db WHERE full_db.act = 1 AND artistid = $artistid AND albumartist LIKE '".$artistname."'";
            }
            elseif($filter == 'bands') {
                // query to get all Herring records
                $sql = "SELECT COUNT(id) FROM full_db WHERE full_db.act = 1 AND artistid = $artistid AND albumartist NOT LIKE '".$artistname."'";
            } else {
                // query to get all records
                $sql = "SELECT COUNT(id) FROM full_db WHERE full_db.act = 1 AND artistid = $artistid";
            }

            //$sql = "SELECT COUNT(id) FROM full_db WHERE artistid = $artistid";
            $result = $conn->query($sql);

            $row = $result->fetch_row();
            $total_records = $row[0];
            $total_pages = ceil($total_records / $limit);
            $pagLink = "<nav class='nav-pagination' aria-label='Page navigation'>
            <ul class='pagination'>";
            for ($i=1; $i<=$total_pages; $i++) {
                         $pagLink .= "<li  ".(($i==$_GET['page'])?'class="active"':"")."><a href='artist.php?id=".$artistid."&filter=".$filter."&page=".$i."#catalog'>".$i."</a></li>";
            };
            echo $pagLink . "</ul>
                            </nav>";

            //echo '<option value="'.$value.'" '.(($value=='United States')?'selected="selected"':"").'>'.$value.'</option>';

            //" .(($i == $_GET['page'])?"class='active'")."



            }
            else {

            }

            ?>

        </div>
    </section>



            </div>
        </div>

    <?php
    include 'footer.php';
    ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- wow delay -->
    <script src="js/wow.js"></script>
              <script>
              new WOW().init();
    </script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

    <!--<script type="text/javascript">
        $(document).ready(function(ev){
    $('#albumfront_carousel').on('slide.bs.carousel', function (evt) {
      $('#albumfront_carousel .controls li.active').removeClass('active');
      $('#albumfront_carousel .controls li:eq('+$(evt.relatedTarget).index()+')').addClass('active');
    })
});
    </script>-->


    <!--<script type="text/javascript">
        $('.dropdown-toggle').on('shown.bs.dropdown', function () {
            $( "#albumfront_carousel" ).addClass( ".hid-carousel" );
        })
    </script>-->

<script src="js/menuhide.js"></script>


<script type="text/javascript">
            $.urlParam = function(name){
                var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
                return results[1] || 0;
            }
                var artistid = $.urlParam('id');
                //console.log($.urlParam('id'));
                //var filter = $('select#filterartist option:selected').val();
                //console.log(filter);

             $('select#filterartist').change(function(){

                var filter = $('select#filterartist option:selected').val();

                window.location = "artist.php?id="+artistid+"&filter="+filter+"#catalog";
            });
</script>

<div class="modal fade" id="shopmodal" tabindex="-1" role="dialog"  aria-labelledby="shopmodalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
                <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
                <h4 class="modal-title" id="shopmodalLabel"></h4>
                <p class="modal-link-p"><button class="modal-link" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-arrow-left"></span> Go Back to Catalytic Sound</button></p>
           </div>
         <div class="modal-body">
              <iframe class="modal-iframe" frameborder="0"></iframe>
         </div>
        <!-- <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

         </div>-->
        </div><!-- /.modal-content -->
     </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <script type="text/javascript">$('a.modalButton').on('click', function(e) {
    var src = $(this).attr('data-src');
    var height = $(this).attr('data-height') || 600;
    var width = $(this).attr('data-width') || 900;


    $("#shopmodal iframe").attr({'src':src,
                        'height': height,
                        'width': width});
});
</script>

<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/additional-methods.min.js"></script>
<script type="text/javascript" src="js/ajaxsubscription.js"></script>

<?php
    $conn->close();
?>

</body>

</html>
