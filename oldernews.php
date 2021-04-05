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
    <meta property="og:title" content="Catalytic Sound - Contact" />
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

<body id="contact-page">
  <div id="fb-root"></div>
  <script type="text/javascript" src="js/fbbox.js"></script>

    <?php
    include 'nav.php';
    ?>

    <!-- Half Page Image Background Carousel Header -->

<header>



        <div class="container">

        <div class="artist-page-descripcion row">


            <div class="col-sm-12">
                <h1>News</h1>

                <p></p>

                <hr class="separador-no-carousel">
            </div>

        </div>


    </div>

</header>


    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-10">
              <section class="section-news">
                <div class="row">
                    <div class="col-sm-12">
                        <?php
                            $sqlnews = "SELECT * FROM news_db WHERE act = 1 AND frontpage = 0 ORDER BY id DESC";
                            $resultnews = $conn->query($sqlnews);

                            if ($resultnews->num_rows > 0) {
                            // output data of each row
                            while($rownews = $resultnews->fetch_assoc()) {
                            ?>


                        <div class="row">
                            <div class="col-sm-4">
                                <h3 class="first-title"><strong><? echo $rownews["title"] ?></strong></h3>
                            </div> 
                            <div class="col-sm-8">
                                <p><? echo $rownews["message"] ?></p>
                            </div>                           
                        </div>
                        
                        
                        <hr>

                        <?php
                            }
                        }
                        $resultnews->free();
                        ?>
                    </div>    
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

<script src="js/menuhide.js"></script>

<!-- contact form validation -->



</body>
<?php
$conn->close();
?>

</html>
