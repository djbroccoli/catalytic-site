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
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts CSS -->
    <link href="/css/customfonts.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/anim.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/css/styles.css" rel="stylesheet">

    <style type="text/css">
        .ul-newsletters {
            border-top: 1px dotted black;
            padding-top: 10px;
            border-bottom: 1px dotted black;
            padding-bottom: 10px;
        }

        .ul-newsletters li p {
            margin-bottom: initial;
        }
    </style>


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

<?php 

$path1 = $_SERVER['DOCUMENT_ROOT'];
$path1 .= "/webadmin/basics/config.php";
include_once($path1);

$path2 = $_SERVER['DOCUMENT_ROOT'];
$path2 .= "/webadmin/basics/conexion.php";
include_once($path2);

//require_once '/webadmin/basics/config.php';
//require_once '/webadmin/basics/conexion.php';
?>

<body id="contact-page">
  <div id="fb-root"></div>
  <script type="text/javascript" src="js/fbbox.js"></script>

    <?php
    $pathnav = $_SERVER['DOCUMENT_ROOT'];
    $pathnav .= "/nav.php";
    include_once($pathnav);
    ?>

    <!-- Half Page Image Background Carousel Header -->

<header>



        <div class="container">

        <div class="artist-page-descripcion row">


            <div class="col-sm-12">
                <h1>Catalytic Sound Quarterly</h1>

                <p>Check out digital issues of Catalytic Quarterly designed by Federico Peñalva, <a href="https://joeldv.com" target="_blank">Joel Villafane</a>, <a href="https://santiagoqg.com/" target="_blank">Santiago Quintana</a>, and Max Houston Oppenheimer.</p>

                <hr class="separador-no-carousel">
            </div>

        </div>


    </div>

</header>


    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-8">

                <ul class="ul-newsletters">
                    
                    
                    <li>
                        <p><a href="https://catalyticsound.com/quarterly/12/CQ12.pdf"><strong>#12 </strong>March 2021</p></a>
                    </li>
                    <li>
                        <p><a href="https://catalyticsound.com/quarterly/11/CQ11.pdf"><strong>#11 </strong>October 2020</p></a>
                    </li>
                    <li>
                        <p><a href="https://catalyticsound.com/quarterly/10/CQ10.pdf"><strong>#10 </strong>June 2020</p></a>
                    </li>
                    <li>
                        <p><a href="https://catalyticsound.com/quarterly/9/index.html"><strong>#9 </strong>March 2020</p></a>
                    </li>
		            <li>
                        <p><a href="https://catalyticsound.com/quarterly/8/index.html"><strong>#8 </strong>January 2020</p></a>
                    </li>

                    <li>
                        <p><a href="https://catalyticsound.com/quarterly/7/index.html"><strong>#7 </strong>October 2019</p></a>
                    </li>
                    <li>
                        <p><a href="https://catalyticsound.com/quarterly/6/index.html"><strong>#6 </strong>July 2019</p></a>
                    </li>
                    <li>
                        <p><a href="https://catalyticsound.com/quarterly/5/index.html"><strong>#5 </strong>April 2019</p></a>
                    </li>
                    <li>
                        <p><a href="https://catalyticsound.com/quarterly/4/index.html"><strong>#4 </strong>January 2019</p></a>
                    </li>
                    <li>
                        <p><a href="https://catalyticsound.com/quarterly/3/index.html"><strong>#3 </strong>October 2018</p></a>
                    </li>
                    <li>
                        <p><a href="https://catalyticsound.com/quarterly/2/index.html"><strong>#2 </strong>July 2018</p></a>
                    </li>
                    <li>
                        <p><a href="https://catalyticsound.com/quarterly/1/index.html"><strong>#1 </strong>April 2018</p></a>
                    </li>
                    
                    
                </ul>

                <p><br></p>
                <p><br></p>
                <p><br></p>
                <p><br></p>
                <p><br></p>
                <p><br></p>
              
            </div>


        </div>

    <?php
    $pathfooter = $_SERVER['DOCUMENT_ROOT'];
    $pathfooter .= "/footer.php";
    include_once($pathfooter);
    ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>

    <!-- wow delay -->
    <script src="/js/wow.js"></script>
              <script>
              new WOW().init();
    </script>

<script src="/js/menuhide.js"></script>

<!-- contact form validation -->
    <script type="text/javascript" src="/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/js/additional-methods.min.js"></script>
    <script type="text/javascript" src="/js/ajaxsubscription.js"></script>



</body>
<?php
$conn->close();
?>

</html>
