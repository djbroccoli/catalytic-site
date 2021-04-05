    <?php
            $sql = "SELECT * FROM artists_db WHERE act = 1 ORDER BY name ASC";
            $result = $conn->query($sql);

    ?>

    <!-- Navigation -->
    <nav class="navbar" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav first-nav">
                    <li class="social-icon">
                        <a class="social-facebook" target="_blank" href="https://www.facebook.com/catalytic.sound"><!--<img src="imgs/iconsc.png" class="img-responsive">--><i class="fa fa-facebook fa-lg"></i></a>
                    </li>
                    <!--<li class="social-icon">
                        <a class="social-twitter" target="_blank" href="#"><i class="fa fa-twitter fa-lg"></i></a>
                    </li>-->
                    <li class="social-icon">
                        <a class="social-soundcloud" target="_blank" href="https://soundcloud.com/ken-vandermark"><!--<img src="imgs/iconfb.png" class="img-responsive">--><i class="fa fa-soundcloud fa-lg"></i></a>
                    </li>
                    <li class="social-icon">
                        <a class="social-instagram" target="_blank" href="https://instagram.com/catalytic_sound"><!--<img src="imgs/iconfb.png" class="img-responsive">--><i class="fa fa-instagram fa-lg"></i></a>
                    </li>
                    <li>

                        <form id="busqueda" action="searchresults.php" method="get">
                        <div class="form-group has-feedback">
                            <input type="text" name="search" placeholder="Search here" <?php if ($_GET["search"] > '') {echo 'value="'. $_GET["search"] .'"';} ?>>
                            <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        </div>
                        </form>
                    </li>
                </ul>

            <div>
                <ul class="nav navbar-nav nav-principal">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-title="Musicians+++" data-toggle="dropdown" href="#">Musicians <span class="glyphicon glyphicon-chevron-down"></span></a>
                        <ul class="dropdown-menu drop-principal animated fadeIn">

                            <?
                            if ($result->num_rows > 0) {
                            // output data of each row
                                while($row = $result->fetch_assoc()) {

                            ?>

                            <li class="wow flash" data-wow-duration="0.6s"><span class="span-hover glyphicon glyphicon-chevron-right"></span><a href='/artist.php?id=<? echo $row["id"] ?>'><? echo $row["name"] ?></a></li>


                            <?php
                                }
                            }
                            else {

                            }

                            ?>


                        </ul>
                    </li>

                    <?php
                                $sql = "SELECT * FROM labels_db WHERE act = 1 ORDER BY name ASC";
                                $result = $conn->query($sql);

                    ?>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-title="Labels" data-toggle="dropdown" href="#">Labels <span class="glyphicon glyphicon-chevron-down"></span></a>
                        <ul class="dropdown-menu drop-principal animated fadeIn">

                        <?
                            if ($result->num_rows > 0) {
                            // output data of each row
                                while($row = $result->fetch_assoc()) {

                        ?>

                            <li class="wow flash" data-wow-duration="0.6s"><span class="span-hover glyphicon glyphicon-chevron-right"></span><a href='/label.php?labelid=<? echo $row["id"] ?>'><? echo $row["name"] ?></a><span class="label-musician-info wow slideInRight" data-wow-duration="0.9s"><? echo $row["musician"] ?></span></li>


                            <?php
                                }
                            }
                            else {

                            }

                            ?>


                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-title="Albums" data-toggle="dropdown" href="#">Albums <span class="glyphicon glyphicon-chevron-down"></span></a>
                        <ul class="dropdown-menu drop-principal animated fadeIn paddingleft-fix">
                            <li class="wow flash" data-wow-duration="0.6s"><span class="span-hover glyphicon glyphicon-chevron-right"></span><a href="/format.php?ft=1">CD</a></li>
                            <li class="wow flash" data-wow-duration="0.6s"><span class="span-hover glyphicon glyphicon-chevron-right"></span><a href="/format.php?ft=3">DIGITAL</a></li>
                            <li class="wow flash" data-wow-duration="0.6s"><span class="span-hover glyphicon glyphicon-chevron-right"></span><a href="/format.php?ft=2">LP</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-title="Special Items" data-toggle="dropdown" href="#">Special Items <span class="glyphicon glyphicon-chevron-down"></span></a>
                            <ul class="dropdown-menu drop-principal animated fadeIn paddingleft-fix">
                            <li class="wow flash" data-wow-duration="0.6s"><span class="span-hover glyphicon glyphicon-chevron-right"></span><a href="/format.php?ft=5">Book</a></li>
                            <li class="wow flash" data-wow-duration="0.6s"><span class="span-hover glyphicon glyphicon-chevron-right"></span><a href="/format.php?ft=4">DVD</a></li>
                            <li class="wow flash" data-wow-duration="0.6s"><span class="span-hover glyphicon glyphicon-chevron-right"></span><a href="/format.php?ft=6">Poster</a></li>
                            <li class="wow flash" data-wow-duration="0.6s"><span class="span-hover glyphicon glyphicon-chevron-right"></span><a href="/format.php?ft=7">T-Shirt</a></li>
                            
                            <li class="wow flash" data-wow-duration="0.6s"><span class="span-hover glyphicon glyphicon-chevron-right"></span><a href="/quarterly/quarterlyindex.php">CS Quarterly</a></li>
                        </ul>
                    </li>
                    <li>
                        <a data-title="New to Catalytic" href="/new.php">New to Catalytic</a>
                    </li>
                    <li>
                        <a data-title="Contact" href="/contact.php">Contact</a>
                    </li>
                    <li>
                        <a data-title="About" href="/about.php">About</a>
                    </li>
<!--                    <li>
                        <a target="_blank" href="https://www.patreon.com/bePatron?u=13528147&redirect_uri=https%3A%2F%2Fcatalyticsound.com" class="btn btn-member">Become a Member</a>
                    </li>-->
                   <li>
                        <a data-title="Soundstream" target="_blank" href="https://stream.catalyticsound.com/" class="btn btn-member">Soundstream</a>
                 </li>
                </ul>
                <div class="nav-curtain hid-header"></div>
            </div>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
