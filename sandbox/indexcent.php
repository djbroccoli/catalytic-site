<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Catalytic Sound</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts CSS -->
    <link href="css/customfonts.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/anim.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<?php require_once 'admin/basics/config.php';
      require_once 'admin/basics/conexion.php';

?>

<body id="homepage" class="indexcent">

    <?php
    include 'nav.php';
    ?>

    <!-- Half Page Image Background Carousel Header -->

<header>
<?php if($_GET['sw'] == 'newadd') {$sw = "newadd";} elseif($_GET['sw'] == 'newrl') {$sw = "newrl";} else {$sw = "all";}; ?>

        <div class="container">
        <div id="albumfront_carousel" class="albumfront_carousel carousel slide" data-ride="carousel" data-interval="2500">

        <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#albumfront_carousel" data-slide-to="0" class="active"></li>
                <li data-target="#albumfront_carousel" data-slide-to="1"></li>
                <li data-target="#albumfront_carousel" data-slide-to="2"></li>
                <li data-target="#albumfront_carousel" data-slide-to="3"></li>
            </ol>

            <div class="carousel-selector-albumes">
                <a href="index.php?sw=newrl"><button class="btn btn-toggle <?php if($sw == 'newrl') {echo 'btn-selected';} ?>">New Releases</button></a>
                <a href="index.php?sw=newadd"><button class="btn btn-toggle <?php if($sw == 'newadd') {echo 'btn-selected';} ?>">New Additions</button></a>
            </div>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="container-fluid">
                        <div class="row">
                        <?php

                        $limit = 1;

                                //$sql = "SELECT * FROM full_db ORDER BY id DESC LIMIT $limit";

                                if($sw == 'newadd') {

                                    $sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 AND full_db.newadd = 'x' ORDER BY full_db.id DESC LIMIT $limit";
                                }
                                elseif($sw == 'newrl') {

                                    $sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 AND full_db.newrelease = 'x' ORDER BY full_db.id DESC LIMIT $limit";
                                }
                                else {
                                    $sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 AND (full_db.newrelease = 'x' OR full_db.newadd = 'x') ORDER BY full_db.id DESC LIMIT $limit";
                                }

                                $result = $conn->query($sql);

                                $row = $result->fetch_assoc();

                        ?>


                            <div class="col-md-offset-1 col-md-5 albumcover <?php if ($row["newrelease"] > "") { echo "newrelease"; } elseif ($row["newadd"] > "") {echo "newaddition";}?>">
                            <?php if ($row["coverimgid"] > "") { echo '<img class="img-responsive" src="'.$row["imgpath"].'" alt="audiographic-disc">'; }
                                elseif ($row["coverlink"] > "") { echo '<img class="img-responsive" src="'.$row["coverlink"].'" alt="audiographic-disc">'; }
                                else echo '<img class="img-responsive" style="box-shadow:none" src="imgs/no-albumcover.png">';
                            ?>
                            <!--<iframe style="border: 0; width: 800px; height: 800px;" src="https://bandcamp.com/EmbeddedPlayer/album=890275878/size=large/bgcol=ffffff/linkcol=0687f5/minimal=true/transparent=true/" seamless></iframe>--></div>
                            <div class="col-md-6">
                                <h2 class="album-band"><?php echo $row["albumartist"] ?></h2>
                                <p class="album-title"><?php echo $row["albumname"] ?></p>
                                <p class="album-info"><?php echo $row["label"] ?></p>
                                <p class="descripcion">“<?php echo $row["albumcredits"] ?>”</p>
                                <!--<p><button class="btn"><a href="<?//php echo $row["bandcamplink"] ?>">More Details</a></button></p>-->
                                <p><a target="_blank" href="<?php echo $row["bandcamplink"] ?>"><button class="btn btn-buy">View More / Buy</button></a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="container-fluid">
                        <div class="row">
                        <?php

                        $result->free();

                        $limit = 1;

                                if($sw == 'newadd') {

                                    $sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 AND full_db.newadd = 'x' ORDER BY full_db.id DESC LIMIT $limit OFFSET 1";
                                }

                                elseif($sw == 'newrl') {

                                    $sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 AND full_db.newrelease = 'x' ORDER BY full_db.id DESC LIMIT $limit OFFSET 1";
                                }

                                else {
                                    $sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 AND (full_db.newrelease = 'x' OR full_db.newadd = 'x') ORDER BY full_db.id DESC LIMIT $limit OFFSET 1";
                                }

                                $result = $conn->query($sql);

                                $row = $result->fetch_assoc();

                        ?>


                            <div class="col-md-offset-1 col-md-5 albumcover <?php if ($row["newrelease"] > "") { echo "newrelease"; } elseif ($row["newadd"] > "") {echo "newaddition";}?>">
                             <?php if ($row["coverimgid"] > "") { echo '<img class="img-responsive" src="'.$row["imgpath"].'" alt="audiographic-disc">'; }
                                elseif ($row["coverlink"] > "") { echo '<img class="img-responsive" src="'.$row["coverlink"].'" alt="audiographic-disc">'; }
                                else echo '<img class="img-responsive" style="box-shadow:none" src="imgs/no-albumcover.png">';
                            ?>
                            <!--<iframe style="border: 0; width: 800px; height: 800px;" src="https://bandcamp.com/EmbeddedPlayer/album=890275878/size=large/bgcol=ffffff/linkcol=0687f5/minimal=true/transparent=true/" seamless></iframe>--></div>
                            <div class="col-md-6">
                                <h2 class="album-band"><?php echo $row["albumartist"] ?></h2>
                                <p class="album-title"><?php echo $row["albumname"] ?></p>
                                <p class="album-info"><?php echo $row["label"] ?></p>
                                <p class="descripcion">“<?php echo $row["albumcredits"] ?>”</p>
                                <p><a target="_blank" href="<?php echo $row["bandcamplink"] ?>"><button class="btn btn-buy">View More / Buy</button></a></p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="container-fluid">
                        <div class="row">
                        <?php

                        $result->free();

                        $limit = 1;

                                if($sw == 'newadd') {

                                    $sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 AND full_db.newadd = 'x' ORDER BY full_db.id DESC LIMIT $limit OFFSET 2";
                                }

                                elseif($sw == 'newrl') {

                                    $sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 AND full_db.newrelease = 'x' ORDER BY full_db.id DESC LIMIT $limit OFFSET 2";
                                }

                                else {
                                    $sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 AND (full_db.newrelease = 'x' OR full_db.newadd = 'x') ORDER BY full_db.id DESC LIMIT $limit OFFSET 2";
                                }

                                $result = $conn->query($sql);

                                $row = $result->fetch_assoc();

                        ?>


                            <div class="col-md-offset-1 col-md-5 albumcover <?php if ($row["newrelease"] > "") { echo "newrelease"; } elseif ($row["newadd"] > "") {echo "newaddition";}?>">
                             <?php if ($row["coverimgid"] > "") { echo '<img class="img-responsive" src="'.$row["imgpath"].'" alt="audiographic-disc">'; }
                                elseif ($row["coverlink"] > "") { echo '<img class="img-responsive" src="'.$row["coverlink"].'" alt="audiographic-disc">'; }
                                else echo '<img class="img-responsive" style="box-shadow:none" src="imgs/no-albumcover.png">';
                            ?>
                            <!--<iframe style="border: 0; width: 800px; height: 800px;" src="https://bandcamp.com/EmbeddedPlayer/album=890275878/size=large/bgcol=ffffff/linkcol=0687f5/minimal=true/transparent=true/" seamless></iframe>--></div>
                            <div class="col-md-6">
                                <h2 class="album-band"><?php echo $row["albumartist"] ?></h2>
                                <p class="album-title"><?php echo $row["albumname"] ?></p>
                                <p class="album-info"><?php echo $row["label"] ?></p>
                                <p class="descripcion">“<?php echo $row["albumcredits"] ?>”</p>
                                <p><a target="_blank" href="<?php echo $row["bandcamplink"] ?>"><button class="btn btn-buy">View More / Buy</button></a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="container-fluid">
                        <div class="row">
                        <?php

                        $result->free();

                        $limit = 1;

                                if($sw == 'newadd') {

                                    $sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 AND full_db.newadd = 'x' ORDER BY full_db.id DESC LIMIT $limit OFFSET 3";
                                }

                                elseif($sw == 'newrl') {

                                    $sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 AND full_db.newrelease = 'x' ORDER BY full_db.id DESC LIMIT $limit OFFSET 3";
                                }

                                else {
                                    $sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 AND (full_db.newrelease = 'x' OR full_db.newadd = 'x') ORDER BY full_db.id DESC LIMIT $limit OFFSET 3";
                                }

                                $result = $conn->query($sql);

                                $row = $result->fetch_assoc();

                        ?>


                            <div class="col-md-offset-1 col-md-5 albumcover <?php if ($row["newrelease"] > "") { echo "newrelease"; } elseif ($row["newadd"] > "") {echo "newaddition";}?>">
                             <?php if ($row["coverimgid"] > "") { echo '<img class="img-responsive" src="'.$row["imgpath"].'" alt="audiographic-disc">'; }
                                elseif ($row["coverlink"] > "") { echo '<img class="img-responsive" src="'.$row["coverlink"].'" alt="audiographic-disc">'; }
                                else echo '<img class="img-responsive" style="box-shadow:none" src="imgs/no-albumcover.png">';
                            ?>
                            <!--<iframe style="border: 0; width: 800px; height: 800px;" src="https://bandcamp.com/EmbeddedPlayer/album=890275878/size=large/bgcol=ffffff/linkcol=0687f5/minimal=true/transparent=true/" seamless></iframe>--></div>
                            <div class="col-md-6">
                                <h2 class="album-band"><?php echo $row["albumartist"] ?></h2>
                                <p class="album-title"><?php echo $row["albumname"] ?></p>
                                <p class="album-info"><?php echo $row["label"] ?></p>
                                <p class="descripcion">“<?php echo $row["albumcredits"] ?>”</p>
                                <p><a target="_blank" href="<?php echo $row["bandcamplink"] ?>"><button class="btn btn-buy">View More / Buy</button></a></p>
                            </div>
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

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

    <!-- wow delay -->
    <script src="js/wow.js"></script>
              <script>
              new WOW().init();
    </script>


<script>
$(document).ready(function(){
    $('.dropdown').on('show.bs.dropdown', function(){
        $('#albumfront_carousel').addClass('hid-carousel');
        $('#albumfront_carousel').removeClass('animated fadeIn');
    });
    //$('.dropdown').on('shown.bs.dropdown', function(){
        //alert('The dropdown is now fully shown.');
    //});
    $('.dropdown').on('hide.bs.dropdown', function(e){
        //$( "#albumfront_carousel" ).fadeIn( "slow", function() {
            $('#albumfront_carousel').removeClass('hid-carousel');
            $('#albumfront_carousel').addClass('animated fadeIn');
          //});

    });
    //$('.dropdown').on('hidden.bs.dropdown', function(){
        //alert('The dropdown is now fully hidden.');
    //});
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
