<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Creative Music Cooperative">
    <meta name="author" content="Catalytic Sound">

    <title>Catalytic Sound</title>

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

    <meta property="og:url" content="http://catalyticsound.com" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Catalytic Sound" />
    <meta property="og:description" content="Creative Music Cooperative &amp; Digital Downloads" />
    <meta property="og:image" content="http://catalyticsound.com/imgs/logobig2.png" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<?php require_once 'webadmin/basics/config.php';
      require_once 'webadmin/basics/conexion.php';

?>

<body id="homepage">

    <div class="banner-statement animated fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <p class="title-banner">About Catalytic</p>
                    <hr>
                </div>

                <div class="col-sm-10 text-banner">
                    <p>Catalytic Sound is a music based co-operative designed to help create economic sustainability for its artists through patron support. <br><strong>Put simply, 50% of the money you spend at Catalytic Sound will always go directly to the musicians.</strong> <a href="https://catalyticsound.com/about.php">Learn More</a></p>
                </div>
            </div>
            
           
        </div>
    </div>

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
                <li data-target="#albumfront_carousel" data-slide-to="4"></li>
                <li data-target="#albumfront_carousel" data-slide-to="5"></li>
                <li data-target="#albumfront_carousel" data-slide-to="6"></li>
                <li data-target="#albumfront_carousel" data-slide-to="7"></li>
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

                                    //$sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 AND full_db.newadd = 'x' ORDER BY full_db.id DESC LIMIT $limit";
                                    $sql = "SELECT * FROM (SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 ORDER BY full_db.id DESC) as r1 ORDER BY r1.newadd DESC LIMIT $limit";
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


                            <div class="col-md-5 albumcover <?php if ($row["newrelease"] > "") { echo "newrelease"; } elseif ($row["newadd"] > "") {echo "newaddition";}?>">
                            <?php if ($row["coverimgid"] > "") { echo '<img class="img-responsive" src="'.$row["imgpath"].'" alt="catalytic-disc">'; }
                                elseif ($row["coverlink"] > "") { echo '<img class="img-responsive" src="'.$row["coverlink"].'" alt="catalytic-disc">'; }
                                else echo '<img class="img-responsive" style="box-shadow:none" src="imgs/no-albumcover.png">';
                            ?>
                            <!--<iframe style="border: 0; width: 800px; height: 800px;" src="https://bandcamp.com/EmbeddedPlayer/album=890275878/size=large/bgcol=ffffff/linkcol=0687f5/minimal=true/transparent=true/" seamless></iframe>--></div>
                            <div class="col-md-6">
                                <h2 class="album-band"><?php echo $row["albumartist"] ?></h2>
                                <p class="album-title"><?php echo $row["albumname"] ?></p>
                                <p class="album-info"><?php echo $row["label"] ?></p>
                                <p class="descripcion">“<?php echo $row["albumcredits"] ?>”</p>
                                <!--<p><button class="btn"><a href="<?//php echo $row["bandcamplink"] ?>">More Details</a></button></p>-->
                                <p><a class="modalButton" href="#" data-toggle="modal" data-src="<?php echo $row["bandcamplink"] ?>" data-height="600" data-width="100%" data-target="#shopmodal"><button class="btn btn-buy">View More / Buy</button></a></p>
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

                                    //$sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 AND full_db.newadd = 'x' ORDER BY full_db.id DESC LIMIT $limit OFFSET 1";
                                    $sql = "SELECT * FROM (SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 ORDER BY full_db.id DESC) as r1 ORDER BY r1.newadd DESC LIMIT $limit OFFSET 1";
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


                            <div class="col-md-5 albumcover <?php if ($row["newrelease"] > "") { echo "newrelease"; } elseif ($row["newadd"] > "") {echo "newaddition";}?>">
                             <?php if ($row["coverimgid"] > "") { echo '<img class="img-responsive" src="'.$row["imgpath"].'" alt="catalytic-disc">'; }
                                elseif ($row["coverlink"] > "") { echo '<img class="img-responsive" src="'.$row["coverlink"].'" alt="catalytic-disc">'; }
                                else echo '<img class="img-responsive" style="box-shadow:none" src="imgs/no-albumcover.png">';
                            ?>
                            <!--<iframe style="border: 0; width: 800px; height: 800px;" src="https://bandcamp.com/EmbeddedPlayer/album=890275878/size=large/bgcol=ffffff/linkcol=0687f5/minimal=true/transparent=true/" seamless></iframe>--></div>
                            <div class="col-md-6">
                                <h2 class="album-band"><?php echo $row["albumartist"] ?></h2>
                                <p class="album-title"><?php echo $row["albumname"] ?></p>
                                <p class="album-info"><?php echo $row["label"] ?></p>
                                <p class="descripcion">“<?php echo $row["albumcredits"] ?>”</p>
                                <p><a class="modalButton" href="#" data-toggle="modal" data-src="<?php echo $row["bandcamplink"] ?>" data-height="600" data-width="100%" data-target="#shopmodal"><button class="btn btn-buy">View More / Buy</button></a></p>

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

                                    //$sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 AND full_db.newadd = 'x' ORDER BY full_db.id DESC LIMIT $limit OFFSET 2";
                                    $sql = "SELECT * FROM (SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 ORDER BY full_db.id DESC) as r1 ORDER BY r1.newadd DESC LIMIT $limit OFFSET 2";
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


                            <div class="col-md-5 albumcover <?php if ($row["newrelease"] > "") { echo "newrelease"; } elseif ($row["newadd"] > "") {echo "newaddition";}?>">
                             <?php if ($row["coverimgid"] > "") { echo '<img class="img-responsive" src="'.$row["imgpath"].'" alt="catalytic-disc">'; }
                                elseif ($row["coverlink"] > "") { echo '<img class="img-responsive" src="'.$row["coverlink"].'" alt="catalytic-disc">'; }
                                else echo '<img class="img-responsive" style="box-shadow:none" src="imgs/no-albumcover.png">';
                            ?>
                            <!--<iframe style="border: 0; width: 800px; height: 800px;" src="https://bandcamp.com/EmbeddedPlayer/album=890275878/size=large/bgcol=ffffff/linkcol=0687f5/minimal=true/transparent=true/" seamless></iframe>--></div>
                            <div class="col-md-6">
                                <h2 class="album-band"><?php echo $row["albumartist"] ?></h2>
                                <p class="album-title"><?php echo $row["albumname"] ?></p>
                                <p class="album-info"><?php echo $row["label"] ?></p>
                                <p class="descripcion">“<?php echo $row["albumcredits"] ?>”</p>
                                <p><a class="modalButton" href="#" data-toggle="modal" data-src="<?php echo $row["bandcamplink"] ?>" data-height="600" data-width="100%" data-target="#shopmodal"><button class="btn btn-buy">View More / Buy</button></a></p>
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

                                    //$sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 AND full_db.newadd = 'x' ORDER BY full_db.id DESC LIMIT $limit OFFSET 3";
                                    $sql = "SELECT * FROM (SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 ORDER BY full_db.id DESC) as r1 ORDER BY r1.newadd DESC LIMIT $limit OFFSET 3";
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


                            <div class="col-md-5 albumcover <?php if ($row["newrelease"] > "") { echo "newrelease"; } elseif ($row["newadd"] > "") {echo "newaddition";}?>">
                             <?php if ($row["coverimgid"] > "") { echo '<img class="img-responsive" src="'.$row["imgpath"].'" alt="catalytic-disc">'; }
                                elseif ($row["coverlink"] > "") { echo '<img class="img-responsive" src="'.$row["coverlink"].'" alt="catalytic-disc">'; }
                                else echo '<img class="img-responsive" style="box-shadow:none" src="imgs/no-albumcover.png">';
                            ?>
                            <!--<iframe style="border: 0; width: 800px; height: 800px;" src="https://bandcamp.com/EmbeddedPlayer/album=890275878/size=large/bgcol=ffffff/linkcol=0687f5/minimal=true/transparent=true/" seamless></iframe>--></div>
                            <div class="col-md-6">
                                <h2 class="album-band"><?php echo $row["albumartist"] ?></h2>
                                <p class="album-title"><?php echo $row["albumname"] ?></p>
                                <p class="album-info"><?php echo $row["label"] ?></p>
                                <p class="descripcion">“<?php echo $row["albumcredits"] ?>”</p>
                                <p><a class="modalButton" href="#" data-toggle="modal" data-src="<?php echo $row["bandcamplink"] ?>" data-height="600" data-width="100%" data-target="#shopmodal"><button class="btn btn-buy">View More / Buy</button></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- End Item -->

            <div class="item">
                <div class="container-fluid">
                    <div class="row">
                    <?php

                    $result->free();

                    $limit = 1;

                            if($sw == 'newadd') {

                                //$sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 AND full_db.newadd = 'x' ORDER BY full_db.id DESC LIMIT $limit OFFSET 4";
                                $sql = "SELECT * FROM (SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 ORDER BY full_db.id DESC) as r1 ORDER BY r1.newadd DESC LIMIT $limit OFFSET 4";
                            }

                            elseif($sw == 'newrl') {

                                $sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 AND full_db.newrelease = 'x' ORDER BY full_db.id DESC LIMIT $limit OFFSET 4";
                            }

                            else {
                                $sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 AND (full_db.newrelease = 'x' OR full_db.newadd = 'x') ORDER BY full_db.id DESC LIMIT $limit OFFSET 4";
                            }

                            $result = $conn->query($sql);

                            $row = $result->fetch_assoc();

                    ?>


                        <div class="col-md-5 albumcover <?php if ($row["newrelease"] > "") { echo "newrelease"; } elseif ($row["newadd"] > "") {echo "newaddition";}?>">
                         <?php if ($row["coverimgid"] > "") { echo '<img class="img-responsive" src="'.$row["imgpath"].'" alt="catalytic-disc">'; }
                            elseif ($row["coverlink"] > "") { echo '<img class="img-responsive" src="'.$row["coverlink"].'" alt="catalytic-disc">'; }
                            else echo '<img class="img-responsive" style="box-shadow:none" src="imgs/no-albumcover.png">';
                        ?>
                        <!--<iframe style="border: 0; width: 800px; height: 800px;" src="https://bandcamp.com/EmbeddedPlayer/album=890275878/size=large/bgcol=ffffff/linkcol=0687f5/minimal=true/transparent=true/" seamless></iframe>--></div>
                        <div class="col-md-6">
                            <h2 class="album-band"><?php echo $row["albumartist"] ?></h2>
                            <p class="album-title"><?php echo $row["albumname"] ?></p>
                            <p class="album-info"><?php echo $row["label"] ?></p>
                            <p class="descripcion">“<?php echo $row["albumcredits"] ?>”</p>
                            <p><a class="modalButton" href="#" data-toggle="modal" data-src="<?php echo $row["bandcamplink"] ?>" data-height="600" data-width="100%" data-target="#shopmodal"><button class="btn btn-buy">View More / Buy</button></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Item -->

            <div class="item">
                <div class="container-fluid">
                    <div class="row">
                    <?php

                    $result->free();

                    $limit = 1;

                            if($sw == 'newadd') {

                                //$sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 AND full_db.newadd = 'x' ORDER BY full_db.id DESC LIMIT $limit OFFSET 5";
                                $sql = "SELECT * FROM (SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 ORDER BY full_db.id DESC) as r1 ORDER BY r1.newadd DESC LIMIT $limit OFFSET 5";
                            }

                            elseif($sw == 'newrl') {

                                $sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 AND full_db.newrelease = 'x' ORDER BY full_db.id DESC LIMIT $limit OFFSET 5";
                            }

                            else {
                                $sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 AND (full_db.newrelease = 'x' OR full_db.newadd = 'x') ORDER BY full_db.id DESC LIMIT $limit OFFSET 5";
                            }

                            $result = $conn->query($sql);

                            $row = $result->fetch_assoc();

                    ?>


                        <div class="col-md-5 albumcover <?php if ($row["newrelease"] > "") { echo "newrelease"; } elseif ($row["newadd"] > "") {echo "newaddition";}?>">
                         <?php if ($row["coverimgid"] > "") { echo '<img class="img-responsive" src="'.$row["imgpath"].'" alt="catalytic-disc">'; }
                            elseif ($row["coverlink"] > "") { echo '<img class="img-responsive" src="'.$row["coverlink"].'" alt="catalytic-disc">'; }
                            else echo '<img class="img-responsive" style="box-shadow:none" src="imgs/no-albumcover.png">';
                        ?>
                        <!--<iframe style="border: 0; width: 800px; height: 800px;" src="https://bandcamp.com/EmbeddedPlayer/album=890275878/size=large/bgcol=ffffff/linkcol=0687f5/minimal=true/transparent=true/" seamless></iframe>--></div>
                        <div class="col-md-6">
                            <h2 class="album-band"><?php echo $row["albumartist"] ?></h2>
                            <p class="album-title"><?php echo $row["albumname"] ?></p>
                            <p class="album-info"><?php echo $row["label"] ?></p>
                            <p class="descripcion">“<?php echo $row["albumcredits"] ?>”</p>
                            <p><a class="modalButton" href="#" data-toggle="modal" data-src="<?php echo $row["bandcamplink"] ?>" data-height="600" data-width="100%" data-target="#shopmodal"><button class="btn btn-buy">View More / Buy</button></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Item -->

            <div class="item">
                <div class="container-fluid">
                    <div class="row">
                    <?php

                    $result->free();

                    $limit = 1;

                            if($sw == 'newadd') {

                                //$sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 AND full_db.newadd = 'x' ORDER BY full_db.id DESC LIMIT $limit OFFSET 6";
                                $sql = "SELECT * FROM (SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 ORDER BY full_db.id DESC) as r1 ORDER BY r1.newadd DESC LIMIT $limit OFFSET 6";
                            }

                            elseif($sw == 'newrl') {

                                $sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 AND full_db.newrelease = 'x' ORDER BY full_db.id DESC LIMIT $limit OFFSET 6";
                            }

                            else {
                                $sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 AND (full_db.newrelease = 'x' OR full_db.newadd = 'x') ORDER BY full_db.id DESC LIMIT $limit OFFSET 6";
                            }

                            $result = $conn->query($sql);

                            $row = $result->fetch_assoc();

                    ?>


                        <div class="col-md-5 albumcover <?php if ($row["newrelease"] > "") { echo "newrelease"; } elseif ($row["newadd"] > "") {echo "newaddition";}?>">
                         <?php if ($row["coverimgid"] > "") { echo '<img class="img-responsive" src="'.$row["imgpath"].'" alt="catalytic-disc">'; }
                            elseif ($row["coverlink"] > "") { echo '<img class="img-responsive" src="'.$row["coverlink"].'" alt="catalytic-disc">'; }
                            else echo '<img class="img-responsive" style="box-shadow:none" src="imgs/no-albumcover.png">';
                        ?>
                        <!--<iframe style="border: 0; width: 800px; height: 800px;" src="https://bandcamp.com/EmbeddedPlayer/album=890275878/size=large/bgcol=ffffff/linkcol=0687f5/minimal=true/transparent=true/" seamless></iframe>--></div>
                        <div class="col-md-6">
                            <h2 class="album-band"><?php echo $row["albumartist"] ?></h2>
                            <p class="album-title"><?php echo $row["albumname"] ?></p>
                            <p class="album-info"><?php echo $row["label"] ?></p>
                            <p class="descripcion">“<?php echo $row["albumcredits"] ?>”</p>
                            <p><a class="modalButton" href="#" data-toggle="modal" data-src="<?php echo $row["bandcamplink"] ?>" data-height="600" data-width="100%" data-target="#shopmodal"><button class="btn btn-buy">View More / Buy</button></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Item -->

            <div class="item">
                <div class="container-fluid">
                    <div class="row">
                    <?php

                    $result->free();

                    $limit = 1;

                            if($sw == 'newadd') {

                                //$sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 AND full_db.newadd = 'x' ORDER BY full_db.id DESC LIMIT $limit OFFSET 7";
                                $sql = "SELECT * FROM (SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 ORDER BY full_db.id DESC) as r1 ORDER BY r1.newadd DESC LIMIT $limit OFFSET 7";
                            }

                            elseif($sw == 'newrl') {

                                $sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 AND full_db.newrelease = 'x' ORDER BY full_db.id DESC LIMIT $limit OFFSET 7";
                            }

                            else {
                                $sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 AND (full_db.newrelease = 'x' OR full_db.newadd = 'x') ORDER BY full_db.id DESC LIMIT $limit OFFSET 7";
                            }

                            $result = $conn->query($sql);

                            $row = $result->fetch_assoc();

                    ?>


                        <div class="col-md-5 albumcover <?php if ($row["newrelease"] > "") { echo "newrelease"; } elseif ($row["newadd"] > "") {echo "newaddition";}?>">
                         <?php if ($row["coverimgid"] > "") { echo '<img class="img-responsive" src="'.$row["imgpath"].'" alt="catalytic-disc">'; }
                            elseif ($row["coverlink"] > "") { echo '<img class="img-responsive" src="'.$row["coverlink"].'" alt="catalytic-disc">'; }
                            else echo '<img class="img-responsive" style="box-shadow:none" src="imgs/no-albumcover.png">';
                        ?>
                        <!--<iframe style="border: 0; width: 800px; height: 800px;" src="https://bandcamp.com/EmbeddedPlayer/album=890275878/size=large/bgcol=ffffff/linkcol=0687f5/minimal=true/transparent=true/" seamless></iframe>--></div>
                        <div class="col-md-6">
                            <h2 class="album-band"><?php echo $row["albumartist"] ?></h2>
                            <p class="album-title"><?php echo $row["albumname"] ?></p>
                            <p class="album-info"><?php echo $row["label"] ?></p>
                            <p class="descripcion">“<?php echo $row["albumcredits"] ?>”</p>
                            <p><a class="modalButton" href="#" data-toggle="modal" data-src="<?php echo $row["bandcamplink"] ?>" data-height="600" data-width="100%" data-target="#shopmodal"><button class="btn btn-buy">View More / Buy</button></a></p>
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

        <div class="row section-news">
            <div class="col-lg-12">

                <div class="row">
                    <div class="col-sm-12">
                        <?php
                            $sqlnews = "SELECT * FROM news_db WHERE act = 1 AND frontpage = 1 ORDER BY id DESC LIMIT 1";
                            $resultnews = $conn->query($sqlnews);
                            if ($resultnews->num_rows > 0) {
                            // output data of each row
                            while($rownews = $resultnews->fetch_assoc()) {
                        ?>
                        <h2 class="mt-5">News</h2>
                        <hr>

                        <div class="row">
                            <div class="col-sm-4">
                                <h3 class="first-title"><strong><? echo $rownews["title"] ?></strong></h3>
                                <p class="first-subtitle"><? echo $rownews["subtitle"] ?></p>
                            </div> 
                            <div class="col-sm-8">
                                <p><? echo $rownews["message"] ?></p>
                            </div>                           
                        </div>
                        
                        
                        <hr class="hr-inner">

                        <?php
                            }
                        }
                        $resultnews->free();
                        ?>
                    </div>    
                </div>

                <div class="row">
                    <?php
                        $sqlnews = "SELECT * FROM news_db WHERE act = 1 AND frontpage = 1 ORDER BY id DESC LIMIT 4 OFFSET 1";
                        $resultnews = $conn->query($sqlnews);
                        if ($resultnews->num_rows > 0) {
                        // output data of each row
                        while($rownews = $resultnews->fetch_assoc()) {
                    ?>

                    <div class="col-sm-6">
                        <h3 class="secondary-title"><? echo $rownews["title"] ?></h3>
                        <p><? echo $rownews["message"] ?></p>
                    </div>

                

                    <?php
                        }
                    }
                    $resultnews->free();
                    ?>
                </div>

                <a href="oldernews.php">See older news ></a>

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
        $('.footer-inner').addClass('hid-carousel');
        $('.footer-inner').removeClass('animated fadeIn');
    });
    //$('.dropdown').on('shown.bs.dropdown', function(){
        //alert('The dropdown is now fully shown.');
    //});
    $('.dropdown').on('hide.bs.dropdown', function(e){
        //$( "#albumfront_carousel" ).fadeIn( "slow", function() {
            $('#albumfront_carousel').removeClass('hid-carousel');
            $('#albumfront_carousel').addClass('animated fadeIn');
            $('.footer-inner').removeClass('hid-carousel');
          //});

    });
    //$('.dropdown').on('hidden.bs.dropdown', function(){
        //alert('The dropdown is now fully hidden.');
    //});
});
</script>

<div class="modal fade" id="shopmodal" tabindex="-1" role="dialog"  aria-labelledby="shopmodalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
                <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
                <h4 class="modal-title" id="shopmodalLabel"></h4>
                <p class="modal-link-p"><button class="modal-link" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-arrow-left"></span> Go Back to Catalytic Sound</button></p>
                <span><small><a id="linkformodal" style="color:#ccc;" href="#" target="_blank">Bandcamp</a></small></span>
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

    $("#linkformodal").attr({'href':src});
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
