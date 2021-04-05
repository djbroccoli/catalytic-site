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

<body>

    <?php
    include 'nav.php';
    ?>

    <!-- Half Page Image Background Carousel Header -->

<header>

<? if($_GET['ft'] == '1') {$format = "CD";}
    elseif($_GET['ft'] == '2') {$format = "LP";}
    elseif($_GET['ft'] == '3') {$format = "Digital";}
    elseif($_GET['ft'] == '4') {$format = "DVD";}
    elseif($_GET['ft'] == '5') {$format = "Book";}
    elseif($_GET['ft'] == '6') {$format = "Poster";}
    elseif($_GET['ft'] == '7') {$format = "T-Shirt";};
?>


        <div class="container">

        <div class="artist-page-descripcion row">


            <div class="col-sm-12">
                <h1><?php echo $format ?></h1>

                <p></p>

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

    $limit = 20;
    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
    $start_from = ($page-1) * $limit;


            //$sql = "SELECT 50: MIN(id), 300: MAX(id) FROM full_db; SELECT a.* FROM full_db a JOIN ( SELECT id FROM ( SELECT id FROM ( SELECT 50 + (300 - 50 + 1 - 50) * RAND() AS start FROM DUAL ) AS init JOIN full_db y WHERE y.id > init.start ORDER BY y.id LIMIT 60 ) z ORDER BY RAND() LIMIT 16 ) r ON a.id = r.id";
            $sql = "SELECT full_db.*, img_db.imgpath FROM full_db LEFT JOIN img_db ON full_db.coverimgid = img_db.id WHERE full_db.act = 1 AND formats LIKE '%".$format."%' ORDER BY albumname ASC LIMIT $start_from, $limit";

            $result = $conn->query($sql);

            //$row = $result->fetch_assoc();

    ?>

   <!-- Catalog Section -->
    <section id="catalog" class="catalog-section">
        <div class="">
            <div class="row">
                <div class="col-lg-12">
                    <!--<div class="button-group filter-button-group">
                      <button class="btn" data-filter="*">All</button>
                      <button class="btn" data-filter=".Cd">Cd</button>
                      <button class="btn" data-filter=".DVD">DVD</button>
                      <button class="btn" data-filter=".Lp">Lp</button>
                      <button class="btn" data-filter=".Book">Digital</button>
                    </div>-->
                </div>
            </div>

            <div class="row fila-discos filterdiscos">

            <?php
            if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {

                    $formatstr = $row["formats"];
                    $formatx = explode(", ", $formatstr);

            ?>
                <div class="col-sm-6 col-md-3 disco<?php foreach ($formatx as $key => $val) {echo " " .$val;} if ($row["newrelease"] > "") { echo " newrelease"; } elseif ($row["newadd"] > "") {echo " newaddition";}?>">
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

                <?php
                }
                ?>


            </div>



            <?php



            $sql = "SELECT COUNT(id) FROM full_db WHERE full_db.act = 1 AND formats LIKE '%$format%' ORDER BY albumname ASC";
            $result = $conn->query($sql);

            $row = $result->fetch_row();
            $total_records = $row[0];
            $total_pages = ceil($total_records / $limit);
            $pagLink = "<nav class='nav-pagination' aria-label='Page navigation'>
            <ul class='pagination'>";
            for ($i=1; $i<=$total_pages; $i++) {
                         $pagLink .= "<li  ".(($i==$_GET['page'])?'class="active"':"")."><a href='format.php?ft=".$_GET['ft']."&page=".$i."#catalog'>".$i."</a></li>";
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

<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/additional-methods.min.js"></script>
<script type="text/javascript" src="js/ajaxsubscription.js"></script>

<?php
    $conn->close();
?>


</body>

</html>
