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
                <h1>About</h1>

                <p></p>

                <hr class="separador-no-carousel">
            </div>

        </div>


    </div>

</header>


    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-8">
              <section>
                <!--<h2 class="text-italic">Catalytic Sound Mission Statement:</h2>-->
                  <p>Catalytic Sound began in 2015 by putting a collective of creative musicians in more control of the dissemination and sale of their available discographies. We provided a single place for our artists to direct their fans to locate the largest number of their recording possible and, later, became a distributor for the DIY record labels represented by musicians of the collective.  In both cases, the purpose was to help the members generate more income through their recorded work.</p>
                  <p>The continuing goal of Catalytic Sound is “sustainability.” For artists, this means the financial security to spend time working on and developing their artistic practice — not hours at day jobs.  For Catalytic Sound this means first: creating innovative economic strategies that support artists’ work in the rapidly shifting economic circumstances that currently affect all musicians. And second: developing more audience awareness for the range of creativity involved by expressing other aspects of the collective's activity, both in terms of the members' work and what inspires it. In doing this, Catalytic Sound aims to do more than sell ‘great’ records — it strives to help generate economic resources for musicians while documenting and making available artistic evolutions in contemporary improvised and experimental music.</p>
                  <p>In financial terms it works like this- after purchasing albums at wholesale from the independent labels we collaborate with, 50% of the net income from every sale goes directly to the musicians, and the other 50% goes to covering costs and developing new projects at the collective (such as Catalytic Quarterly, new revenue generators, developing other means to represent of the musicians' work, website and social media improvements, etc.).  The accounting works like this: for a $20 LP issued by a non-member label, $10 goes to the label, $5 goes to the musician, $5 goes to Catalytic.  In the case of a $20 LP issued on a label run by one of the Catalytic members, $10 goes to the artist and $10 goes to Catalytic (in both cases, minus costs to get the merch shipped to the office in Chicago, an expense always split 50/50 between Catalytic and the musicians).</p>

                  <p>This approach is a novel one, and helps sustain artistic practice by giving a larger percentage of every sale back to the artist than any other music retailer. <strong>But Catalytic Sound is much more than a music retailer.  It is a co-operative, in the truest sense, between artists and patrons.</strong>  The musicians involved provide the diversity and depth of their individual discographies and record labels.  Fans of the music, acting as the ‘members’ of the co-op, gain access to the huge range of these materials from one source.  In this way, purchasing records at Catalytic, in whatever format a person chooses, has a parallel to belonging to a food co-op: money spent sustains a creative ecosystem by directly supporting its producers, helping to maintain their survival through firsthand sponsorship. Right now, supporting the co-op is as simple as choosing to shop at Catalytic Sound, but in the future we hope to develop a more holistic membership for supporters. In this way, and the ways outlined above, Catalytic Sound will continue its ongoing efforts to find solutions that overcome the dwindling and conventional economic resources for musicians. </p>
                  <p>We thank you for joining us in this cause.</p>
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
