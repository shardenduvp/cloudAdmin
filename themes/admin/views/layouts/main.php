<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Cloud Admin | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/cloud-admin.css" >
    <link rel="stylesheet" type="text/css"  href="<?php echo Yii::app()->theme->baseUrl; ?>/css/themes/night.css" id="skin-switcher" >
    <link rel="stylesheet" type="text/css"  href="<?php echo Yii::app()->theme->baseUrl; ?>/css/responsive.css" >
    
    <!-- STYLESHEETS -->
    <!--[if lt IE 9]>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/flot/excanvas.min.js"></script>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- ANIMATE -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/animatecss/animate.min.css" />
    <!-- DATE RANGE PICKER -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <!-- TODO -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-todo/css/styles.css" />
    <!-- FULL CALENDAR -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/js/fullcalendar/fullcalendar.min.css" />
    <!-- GRITTER -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/js/gritter/css/jquery.gritter.css" />
    <!-- FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
</head>

<body>
    <!-- HEADER -->
    <header class="navbar clearfix" id="header">
        <div class="container">
                <div class="navbar-brand">
                    <!-- COMPANY LOGO -->
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>">
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/logo/logo.png" alt="VenturePact Logo" class="img-responsive" height="32" width="220">
                    </a>
                    <!-- /COMPANY LOGO -->
                    
                    <!-- SIDEBAR COLLAPSE -->
                    <div id="sidebar-collapse" class="sidebar-collapse btn">
                        <i class="fa fa-bars" 
                            data-icon1="fa fa-bars" 
                            data-icon2="fa fa-bars" ></i>
                    </div>
                    <!-- /SIDEBAR COLLAPSE -->
                </div>

                <!-- /NAVBAR LEFT -->
                <!-- BEGIN TOP NAVIGATION MENU -->                  
                <ul class="nav navbar-nav pull-right">
                    
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <li class="dropdown user pull-right" id="header-user">
                        <?php if(!Yii::app()->user->isGuest) { ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/avatars/avatar3.jpg" />
                            <span class="username">John Doe</span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-user"></i> My Profile</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i> Account Settings</a></li>
                            <li><a href="#"><i class="fa fa-eye"></i> Privacy Settings</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl('site/logout'); ?>"><i class="fa fa-power-off"></i> Log Out</a></li>
                        </ul>
                        <?php } else { ?>
                        <a href="<?php echo Yii::app()->createUrl('site/login'); ?>" class="dropdown-toggle">
                            <img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/avatars/avatar3.jpg" />
                            
                            <span class="name">Login</span>
                        </a>
                        <?php } ?>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
                <!-- END TOP NAVIGATION MENU -->
        </div>

        <!-- TEAM STATUS REMOVED -->
    </header>



    <!-- PAGE -->
    <section id="page">
        <?php echo $content; ?>
    </section>



    <!-- JAVASCRIPTS -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- JQUERY -->
    <!--<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery/jquery-2.0.3.min.js"></script>-->
    <!-- JQUERY UI-->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
    <!-- BOOTSTRAP -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap-dist/js/bootstrap.min.js"></script>
        
    <!-- DATE RANGE PICKER -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-daterangepicker/moment.min.js"></script>
    
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
    
    <!-- SLIMSCROLL -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js">
    
    </script><script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
    
    <!-- DATA TABLES -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/datatables/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/datatables/media/assets/js/datatables.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/datatables/extras/TableTools/media/js/TableTools.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/datatables/extras/TableTools/media/js/ZeroClipboard.min.js"></script>

    <!-- COOKIE -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jQuery-Cookie/jquery.cookie.min.js"></script>
    
    <!-- CUSTOM SCRIPT -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/script.js"></script>
    <script>
        jQuery(document).ready(function() {
            App.setPage("widgets_box");  //Set current page
            App.init(); //Initialise plugins and elements
        });
    </script>
    <!-- /JAVASCRIPTS -->
</body>
</html>