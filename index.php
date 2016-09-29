<!DOCTYPE html>
<html>
    <head>
        <title>
        BIG Data 1.0 - Maps
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8" />
<!--        <link rel="icon" type="image/ico" href="http://tattek.com/minimal/assets/images/favicon.ico" />-->
        <!-- Bootstrap -->
        <link href="assets/css/vendor/bootstrap/bootstrap.min.css" rel="stylesheet" />
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" />
        <link type="text/css" rel="stylesheet" media="all" href="assets/js/vendor/mmenu/css/jquery.mmenu.all.css" />
        <link rel="stylesheet" href="assets/css/minimal.css"/>

        <!--LeafLet-->
        <link rel="stylesheet" href="assets/css/leaflet.css" />
        <script src="assets/js/jquery.js"></script>
<!--        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>-->
        <script src="assets/js/leaflet.js"></script>
        <script src="assets/js/d3.js"></script>
        <script src="assets/js/queue.v1.min.js"></script>
        <script src="./assets/js/sunburst/createSunburst.js"></script>
        <script src="./assets/js/sunburst/sequences.js"></script>
<!--        <script>-->
<!--            $('document').ready(function(){-->
<!--                initDataBase();-->
<!--            })-->
<!--        </script>-->
    </head>

    <body class="bg-3">
        <!-- Preloader -->
        <div class="mask"><div id="loader"></div></div>
        <!--/Preloader -->
        <!-- Wrap all page content here -->
        <div id="wrap">
            <!-- Make page fluid -->
            <div class="row">
                <!-- Fixed navbar -->
                <div class="navbar navbar-default navbar-fixed-top navbar-transparent-black mm-fixed-top" role="navigation" id="navbar">
                    <!-- Branding -->
                    <div class="navbar-header col-md-2">
                        <a class="navbar-brand" href="#">
                            <strong>BIG</strong>Data
                        </a>
                        <div class="sidebar-collapse">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Branding end -->
                    <!-- .nav-collapse -->
                    <div class="navbar-collapse">
                        <!-- Quick Actions -->
                        <ul class="nav navbar-nav quick-actions">
                            <li>
                                <a href="#mmenu"><i class="fa fa-comments"></i></a>
                            </li>
                        </ul>
                        <!-- /Quick Actions -->
                        
                        <!-- Sidebar -->
                        <ul class="nav navbar-nav side-nav" id="sidebar">
                            <li class="navigation" id="navigation">
                                <a href="#" class="sidebar-toggle" data-toggle="#navigation">M&eacute;tro<i class="fa fa-angle-up"></i></a>
                                <ul class="menu" id="menu_lines">

                                </ul>
                            </li>
                        </ul>
                        <!-- Sidebar end -->
                    </div>
                    <!--/.nav-collapse -->
                </div>
                <!-- Fixed navbar end -->
                <!-- Page content -->
                <div id="content" class="col-md-12">
                    <!-- page header -->
                    <div class="pageheader">
                        <h2 ><i class="fa fa-compass" style="line-height: 48px;padding-left: 0;"></i> Maps</h2>
                    </div>
                    <!-- /page header -->
                    <!-- content main container -->
                    <div class="main">
                        <!-- row -->
                        <div class="row" id="wrongInfo">
                        </div>
                        <div class="row">
                            <!-- col 12 -->
                            <div class="col-md-12">
                                <!-- tile -->
                                <section class="tile transparent">
                                    <!-- tile header -->
                                    <div class="tile-header nopadding">
                                        <div class="controls">
                                            <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
                                            <a href="#" class="remove"><i class="fa fa-times"></i></a>
                                        </div>
                                    </div>
                                    <!-- /tile header -->
                                    <!-- tile body -->
                                    <div id="map" style="height: 570px;"></div>

                                        <iframe id="sunburst" name="sunburst" src =""></iframe>

                                    <!-- /tile body -->
                                </section>

                                <!-- /tile -->
                            </div>
                            <!-- /col 12 -->
                        </div>
                        <!-- /row -->
                    </div>
                    <!-- /content container -->
                </div>
                <!-- Page content end -->
            </div>
            <!-- Make page fluid-->
        </div>
        <!-- Wrap all page content end -->


        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="assets/js/vendor/bootstrap/bootstrap.min.js"></script>
<!--        <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?lang=css&skin=sons-of-obsidian"></script>-->
        <script type="text/javascript" src="assets/js/vendor/mmenu/js/jquery.mmenu.min.js"></script>
        <script type="text/javascript" src="assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>
        <script type="text/javascript" src="assets/js/vendor/nicescroll/jquery.nicescroll.min.js"></script>

        <script src="assets/js/vendor/tabdrop/bootstrap-tabdrop.min.js"></script>
        <script src="assets/js/minimal.min.js"></script>
        <script src="./assets/js/layer/init.js"></script>
        <script src="./assets/js/database/initDataBase.js"></script>
        <script src="./assets/js/layer/linesmenu.js"></script>

    </body>
</html>