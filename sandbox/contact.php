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
                <h1>Contact</h1>

                <p></p>

                <hr class="separador-no-carousel">
            </div>

        </div>


    </div>

</header>


    <!-- Page Content -->
    <div class="container">

        <div class="row">
          <div class="col-lg-6">
            <!--<div class="fb-page" data-href="https://www.facebook.com/catalytic.sound/" data-tabs="timeline, messages" data-width="450" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/catalytic.sound/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/catalytic.sound/">Catalytic Sound</a></blockquote></div>-->
            <!--<div class="fb-page" data-href="https://www.facebook.com/catalytic.sound/" data-width="440" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/catalytic.sound/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/catalytic.sound/">Catalytic Sound</a></blockquote></div>-->
            <div class="fb-page" data-href="https://www.facebook.com/catalytic.sound/" data-tabs="timeline, messages" data-width="438" data-height="400" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/catalytic.sound/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/catalytic.sound/">Catalytic Sound</a></blockquote></div>
          </div>
            <div class="col-lg-6">

               <section>

                    <form role="form" id="contact-form">

                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" placeholder="" name="contactname" id="contactname">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" placeholder="" name="contactemail" id="contactemail">
                        </div>

                        <div class="form-group">
                            <label>Message</label>
                            <textarea class="form-control" rows="4" name="contactmessage" id="contactmessage"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success">Send</button>

                    </form>


                    <div class="" id="output"></div>


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
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/additional-methods.min.js"></script>
    <script type="text/javascript" src="js/ajaxmail.js"></script>
    <script type="text/javascript" src="js/ajaxsubscription.js"></script>



</body>
<?php
$conn->close();
?>

</html>
