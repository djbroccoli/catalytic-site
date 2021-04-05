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
    <meta property="og:title" content="Audiographic Records" />
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

<body>

    <?php
    include 'nav.php';
    ?>

    <!-- Half Page Image Background Carousel Header -->

<header>


        <div class="container">

        <div class="artist-page-descripcion row">


            <div class="col-sm-12">
                <h1>Search</h1>

                <p class="search-results-p">Search results for: <span><?php echo $_GET["search"] ?></span></p>

                <hr class="separador-no-carousel">
            </div>

        </div>


    </div>

</header>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12">

    <?php

    $labelnamestr = $stmtname;
    $labelnamex = explode(" / ", $labelnamestr);
    $labelname1 = $labelnamex[0];
    $labelname2 = $labelnamex[1];

    //$limit = 12;
    //if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
    //$start_from = ($page-1) * $limit;

            //$sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 AND albumname LIKE '%$wildcard%' OR albumartist LIKE '%$wildcard%' OR label LIKE '%$wildcard%' ORDER BY id DESC";

            //$result = $conn->query($sql);

            //$row = $result->fetch_assoc();

            $sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 AND albumname LIKE ? OR albumartist LIKE ? OR label LIKE ? OR personnel LIKE ? ORDER BY full_db.id DESC";

            $stmt = $conn->prepare($sql);


            $rawwildcard = $_GET["search"];
            //$wildcard = "%".$_GET["search"]."%";
            $unchar   = array("/", "%", "*", "'");
            $newchar = rand(3,9);
            $filteredwildcard = str_ireplace($unchar,$newchar,$rawwildcard);
            $wildcard = "%".$filteredwildcard."%";
            //echo $wildcard;

            $stmt->bind_param("ssss", $wildcard, $wildcard, $wildcard, $wildcard);

            $stmt->execute();

            $stmt->store_result();

            $stmtnumrows = $stmt->num_rows();
            //echo $stmtnumrows;

            $stmt->bind_result($stmtid, $stmtartistid, $stmtalbumname, $stmtalbumartist, $stmtpersonnel, $stmtlabel, $stmtreleaseyear, $stmtformats, $stmtbandcamplink, $stmtbandcampembedid, $stmtquantity, $stmtwholesalecost, $stmtphysical, $stmtalbumcredits, $stmtcoverlink, $stmtcoverimgid, $stmtnewadd, $stmtnewrelease, $stmtdontslide, $stmtaotw, $stmtact, $stmtimgpath);
            //$meta = $stmt->result_metadata();
            //while ($field = $meta->fetch_field())
            //{
            //    $params[] = &$row[$field->name];
            //}

            //call_user_func_array(array($stmt, 'bind_result'), $params);

            //$result = $stmt->fetch();



    ?>

   <!-- Catalog Section -->
    <section id="catalog" class="catalog-section">
        <div class="">
            <!--<div class="row">
                <div class="col-lg-12">
                    <div class="button-group filter-button-group">
                      <button class="btn" data-filter="*">All</button>
                      <button class="btn" data-filter=".Cd">Cd</button>
                      <button class="btn" data-filter=".DVD">DVD</button>
                      <button class="btn" data-filter=".Lp">Lp</button>
                      <button class="btn" data-filter=".Book">Digital</button>
                    </div>
                </div>
            </div>-->

            <div class="row fila-discos filterdiscos">

            <?php
            if ($stmtnumrows > 0) {
            // output data of each row
                while($stmt->fetch()) {

                    //highlight search term
                    if (stristr($stmtalbumname, $rawwildcard, true) > "") { $hlalbumname = stristr($stmtalbumname, $rawwildcard, true).' '.stristr($stmtalbumname, $rawwildcard); } else { $hlalbumname = stristr($stmtalbumname, $rawwildcard); }
                    if (stristr($stmtalbumartist, $rawwildcard, true) > "") { $hlalbumartist = stristr($stmtalbumartist, $rawwildcard, true).' '.stristr($stmtalbumartist, $rawwildcard); } else { $hlalbumartist = stristr($stmtalbumartist, $rawwildcard); }
                    if (stristr($stmtlabel, $rawwildcard, true) > "") { $hllabel = stristr($stmtlabel, $rawwildcard, true).' '.stristr($stmtlabel, $rawwildcard); } else { $hllabel = stristr($stmtlabel, $rawwildcard); }
                    if (stristr($stmtpersonnel, $rawwildcard, true) > "") { $hlpersonnel = stristr($stmtpersonnel, $rawwildcard, true).' '.stristr($stmtpersonnel, $rawwildcard); } else { $hlpersonnel = stristr($stmtpersonnel, $rawwildcard); }


                    $formatstr = $stmtformats;
                    $formatx = explode(", ", $formatstr);

            ?>
                <div class="col-sm-6 col-md-3 disco<?php foreach ($formatx as $key => $val) {echo " " .$val;} if ($stmtnewrelease > "") { echo " newrelease"; } elseif ($stmtnewadd > "") {echo " newaddition";} elseif ($stmtaotw > "") {echo " aotw";}?>">
                    <!--<a class="img-responsive" href="record.php?id=<?//php echo $row["id"] ?>">-->
                    <!--<a class="img-responsive" target="_blank" href="<?//php echo $row["bandcamplink"] ?>">-->

                    <a class="modalButton" href="#" data-toggle="modal" data-src="<?php echo $stmtbandcamplink; ?>" data-height="600" data-width="100%" data-target="#shopmodal">

                    <?php
                        if ($stmtcoverimgid > "") { echo '<div class="details-shadow"><div class="details-text"><button class="btn btn-buy">View More / Buy</button><p>Available Formats:</p><p>'.$stmtformats.'</p></div><img class="img-responsive" src="'.$stmtimgpath.'" alt="audiographic-disc"></div>'; }
                        elseif ($stmtcoverlink > "") { echo '<div class="details-shadow"><div class="details-text"><button class="btn btn-buy">View More / Buy</button><p>Available Formats:</p><p>'.$stmtformats.'</p></div><img class="img-responsive" src="'.$stmtcoverlink.'" alt="audiographic-disc"></div>'; }
                        else echo '<img class="img-responsive" style="box-shadow:none" src="imgs/no-albumcover.png">';
                     ?>

                    <div><p class="album-details-name"><?php if ($hlalbumname > "") { echo '<span style="background-color:#cacaca;padding:2px;">'.$hlalbumname.'</span>';} else {echo $stmtalbumname;} ?></p></div>
                    </a>
                    <p class="album-details-title"><?php if ($hlalbumartist > "") { echo '<span style="background-color:#cacaca;padding:2px;">'.$hlalbumartist.'</span>';} else {echo $stmtalbumartist;} ?></p>
                    <p class="album-details-title"><?php if ($hllabel > "") { echo '<span style="background-color:#cacaca;padding:2px;">('.$hllabel.')</span>';} else {echo '('.$stmtlabel.')';} ?></p>
                    <?php if ($hlpersonnel > "") { echo '<p class="album-details-title"><span style="background-color:#cacaca;padding:2px;font-style:italic;font-size:11px;">('. $hlpersonnel .')</span></p>';} ?>
                </div>

                <?php
                }


                ?>


            </div>



            <?php










            }
            else echo '<p class="text-center">Sorry, there are no results for your search</p>';

            $stmt->free_result();

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
    <!--<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>-->

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

<?php
    $conn->close();
?>

</body>

</html>
