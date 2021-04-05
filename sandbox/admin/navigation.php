<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a href="index.php"><img style="height:50px;float:left;padding-left:10px;" class="img-responsive hidden-xs visible-md visible-lg" src="dist/imgs/logobigbw.png"></a>
                <a class="navbar-brand" href="index.php">Admin</a>

            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li><a href="http://catalyticsound.com/" target="_blank"> Go to catalyticsound.com</a></li>

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle userlink" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['username'] ?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <!--<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>-->
                        <!--<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>-->
                        <!--<li class="divider"></li>-->
                        <li><a href="login/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <!--<li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>

                        </li>-->
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="artists.php"><i class="fa fa-male fa-fw"></i> Artists</a>
                        </li>
                        <li>
                            <a href="labels.php"><i class="fa fa-industry fa-fw"></i> Labels</a>
                        </li>
                        <li>
                            <a href="albums.php"><i class="fa fa-play-circle-o fa-fw"></i> Albums</a>
                        </li>
                        <li>
                            <a href="messages.php"><i class="fa fa-envelope-o fa-fw"></i> Messages</a>
                        </li>
                        <!--<li>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li>-->
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Other<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <!--<li>
                                    <a href="panels-wells.html">Albums of the Week</a>
                                </li>-->
                                <li>
                                    <a href="subscribers.php">Subscribers</a>
                                </li>
                                <li>
                                    <a href="adminaotw.php">Albums of the Week</a>
                                </li>
                                <li>
                                    <a href="globalconf.php">Settings</a>
                                </li>
                                <!--<li>
                                    <a href="notifications.html">Users</a>
                                </li>-->
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <!--<li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                <!--</li>
                            </ul>-->
                            <!-- /.nav-second-level -->
                        <!--</li>-->
                        <!--<li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="blank.html">Blank Page</a>
                                </li>
                                <li>
                                    <a href="login.html">Login Page</a>
                                </li>
                            </ul>

                        </li>-->
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
