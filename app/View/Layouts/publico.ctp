<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7 lte9 lte8 lte7" lang="en-US"><![endif]-->
<!--[if IE 8]><html class="ie ie8 lte9 lte8" lang="en-US">	<![endif]-->
<!--[if IE 9]><html class="ie ie9 lte9" lang="en-US"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<?php
    //App::import('Model', 'Categoria');    
?>
<html class="noIE" lang="en-US">
    <!--<![endif]-->

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
        <meta content="Flatroshop online shopping point" name="description">
        <meta content="logoby.us" name="author">
        <link href="images/ico.html" rel="shortcut icon">
        <title>Bargain-Wholesale</title>

        <!-- Reset CSS -->
        <link href="<?php echo $this->webroot; ?>css/tienda/normalize.css" rel="stylesheet" type="text/css"/>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo $this->webroot; ?>css/tienda/bootstrap.css" rel="stylesheet">

        <!-- Iview Slider CSS -->
        <link href="<?php echo $this->webroot; ?>css/tienda/iview.css" rel="stylesheet">

        <!--	Responsive 3D Menu	-->
        <link href="<?php echo $this->webroot; ?>css/tienda/menu3d.css" rel="stylesheet"/>

        <!-- Animations -->
        <link href="<?php echo $this->webroot; ?>css/tienda/animate.css" rel="stylesheet" type="text/css"/>

        <!-- Custom styles for this template -->
        <link href="<?php echo $this->webroot; ?>css/tienda/custom.css" rel="stylesheet" type="text/css" />

        <!-- Style Switcher -->
        <link href="<?php echo $this->webroot; ?>css/tienda/style-switch.css" rel="stylesheet" type="text/css"/>

        <!-- Color -->
        <link href="<?php echo $this->webroot; ?>css/tienda/skin/mediumpurple-seagreen.css" id="colorstyle" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]> <script src="js/html5shiv.js"></script> <script src="js/respond.min.js"></script> <![endif]-->

        <!-- Bootstrap core JavaScript -->
        <script src="<?php echo $this->webroot; ?>js/tienda/jquery-1.10.2.min.js"></script>
        <script src="<?php echo $this->webroot; ?>js/tienda/bootstrap.min.js"></script>
        <script src="<?php echo $this->webroot; ?>js/tienda/bootstrap-select.js"></script>
        <script src="<?php echo $this->webroot; ?>js/tienda/jquery.modal.min.js"></script>

        <!-- Custom Scripts -->
        <script src="<?php echo $this->webroot; ?>js/tienda/scripts.js"></script>

        <!-- MegaMenu -->
        <script src="<?php echo $this->webroot; ?>js/tienda/menu3d.js" type="text/javascript"></script>

        <!-- iView Slider -->
        <script src="<?php echo $this->webroot; ?>js/tienda/raphael-min.js" type="text/javascript"></script>
        <script src="<?php echo $this->webroot; ?>js/tienda/jquery.easing.js" type="text/javascript"></script>
        <script src="<?php echo $this->webroot; ?>js/tienda/iview.js" type="text/javascript"></script>
        <script src="<?php echo $this->webroot; ?>js/tienda/retina-1.1.0.min.js" type="text/javascript"></script>

        <!--[if IE 8]>
            <script type="text/javascript" src="js/selectivizr.js"></script>
            <![endif]-->

    </head>

    <body>
        <!-- Header -->
        <header> 
            <!-- Top Heading Bar -->
            <?php echo $this->element('tienda/cabecera'); ?>
            <!-- end: Top Heading Bar -->

            <div class="f-space20"></div>
            <!-- Logo and Search -->
            <div class="container">
                <div class="row clearfix">
                    <div class="col-lg-3 col-xs-12">
                      <div class="logo"> <a href="<?php echo $this->Html->url(array('controller' => 'productos', 'action' => 'tienda')); ?>" title="Bargain-Wholesale"><!-- <img alt="Flatro - Responsive Metro Inspired Flat ECommerce theme" src="images/logo2.png"> -->
                                <div class="logoimage"><i class="fa fa-shopping-cart fa-fw"></i></div>
                                <div class="logotext"><span><strong>BARGAIN-</strong></span><span>WHOLESALE</span></div>
                                <span class="slogan">ONLINE STORE</span></a> </div>
                    </div>                                        
                    
                    <!-- end: logo -->
                    <div class="visible-xs f-space20"></div>
                    <!-- search -->
                    <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right">
                        <div class="searchbar">
                            <form action="#">
                                <ul class="pull-left">
                                    <li class="input-prepend dropdown" data-select="true"> <a class="add-on dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="#a"> <span class="dropdown-display">All
                                                Categories</span> <i class="fa fa-sort fa-fw"></i> </a> 
                                        <!-- this hidden field is used to contain the selected option from the dropdown -->
                                        <input class="dropdown-field" type="hidden" value="All Categories"/>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#a" data-value="Men Wear">Men Wear</a></li>
                                            <li><a href="#a" data-value="Women Wear">Women Wear</a></li>
                                            <li><a href="#a" data-value="Music">Music</a></li>
                                            <li><a href="#a" data-value="Mobile Phones">Mobile Phones</a></li>
                                            <li><a href="#a" data-value="Computers">Computers</a></li>
                                            <li><a href="#a" data-value="Gaming">Gaming</a></li>
                                            <li><a href="#a" data-value="Gift Ideas">Gift Ideas</a></li>
                                            <li><a href="#a" data-value="All Categories">All Categories</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="searchbox pull-left">
                                    <input class="searchinput" id="search" placeholder="Search..." type="search">
                                    <button class="fa fa-search fa-fw" type="submit"></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end: search --> 

                </div>
            </div>
            <!-- end: Logo and Search -->
            <div class="f-space20"></div>
            <!-- Menu -->
            <div class="container">
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 menu-col">
                        <?php $urlBase = $this->request->here; ?>
                        <?php //echo FULL_BASE_URL; die;?>
                        <?php if ($urlBase == '/' || $urlBase == '/productos/tienda'): ?>
                            <div class="menu-heading"> <span> <i class="fa fa-bars"></i> Categories</span> </div>
                        <?php else: ?>
                            <div class="menu-heading menuHeadingdropdown"> <span> <i class="fa fa-bars"></i> Categorias</span> </div>
                        <?php endif; ?>
                        <!-- Mega Menu -->                        
                        <?php echo $this->element('tienda/menuprincipal'); ?>
                        <!-- end: Mega Menu --> 
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 menu-col-2"> 
                        <!-- Navigation Buttons/Quick Cart for Tablets and Desktop Only -->
                        <div class="menu-links hidden-xs">
                            <ul class="nav nav-pills nav-justified">
                                <li> <a href="<?php echo $this->Html->url(array('controller' => 'productos', 'action' => 'tienda')); ?>"> <i class="fa fa-home fa-fw"></i> <span class="hidden-sm">Home</span></a> </li>
                                <li> <a href="<?php echo $this->Html->url(array('controller' => 'productos', 'action' => 'acerca')); ?>"> <i class="fa fa-info-circle fa-fw"></i> <span class="hidden-sm">About</span></a> </li>                               
                                <li> <a href="<?php echo $this->Html->url(array('controller' => 'productos', 'action' => 'contacto')); ?>"> <i class="fa fa-pencil-square-o fa-fw"></i> <span class="hidden-sm ">Contact</span></a> </li>                                
                                <?php echo $this->element('tienda/carrito'); ?>                                                                  
                            </ul>
                        </div>
                        <!-- end: Navigation Buttons/Quick Cart Tablets and large screens Only --> 
                        <?php if ($urlBase == '/' || $urlBase == '/productos/tienda'): ?>
                            <!-- Top Searches for tablets and large screens -->
                            <div class="top-searchs hidden-xs"><span class="title">Top
                                    Searches</span> <span class="links"> <a href="#a">Air Jordan Shoes 2010</a> | <a href="#a">Liz Claiborne</a> | <a href="#a">Tommy</a> | <a href="#a">J Crew ST Wedding</a> | <a href="#a">HTC One</a> | <a href="#a">Bridal</a></span> </div>
                            <!-- end: Top Searches --> 

                            <!-- Quick Help for tablets and large screens -->                        
                            <div class="quick-message hidden-xs">
                                <div class="quick-box">
                                    <div class="quick-slide"><span class="title">Help</span>
                                        <div class="quickbox slide" id="quickbox">
                                            <div class="carousel-inner">
                                                <div class="item active"> <a href="#a"> <i class="fa fa-envelope fa-fw"></i> Quick Message</a> </div>
                                                <div class="item"> <a href="#a"> <i class="fa fa-question-circle fa-fw"></i> FAQ</a> </div>
                                                <div class="item"> <a href="#a"> <i class="fa fa-phone fa-fw"></i> (92)3009712255</a> </div>
                                            </div>
                                        </div>
                                        <a class="left carousel-control" data-slide="prev" href="#quickbox"> <i class="fa fa-angle-left fa-fw"></i> </a> <a class="right carousel-control" data-slide="next" href="#quickbox"> <i class="fa fa-angle-right fa-fw"></i> </a> </div>
                                </div>
                            </div>                                               
                            <!-- end: Quick Help -->
                        <?php else: ?>
                        <?php endif; ?> 

                        <div class="clearfix"></div>
                        <!-- Iview Slider -->
                        <?php if ($urlBase == '/' || $urlBase == '/productos/tienda'): ?>
                            <?php echo $this->element('tienda/slider'); ?>
                        <?php else: ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </header>
        <!-- end: Header --> 
        <!-- contenido -->   
        <?php //echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>        
        <!-- fin: contenido -->
        <!-- footer -->
        <?php echo $this->element('tienda/footer'); ?>
        <!-- end: footer -->    
        <script>

            (function($) {
                "use strict";
                $('#menuMega').menu3d();
                $('#iview').iView({
                    pauseTime: 10000,
                    pauseOnHover: true,
                    directionNavHoverOpacity: 0.6,
                    timer: "360Bar",
                    timerBg: '#2da5da',
                    timerColor: '#fff',
                    timerOpacity: 0.9,
                    timerDiameter: 20,
                    timerPadding: 1,
                    touchNav: true,
                    timerStroke: 2,
                    timerBarStrokeColor: '#fff'
                });

                $('.quickbox').carousel({
                    interval: 10000
                });
                $('#monthly-deals').carousel({
                    interval: 3000
                });
                $('#productc2').carousel({
                    interval: 4000
                });
                $('#tweets').carousel({
                    interval: 5000
                });
            })(jQuery);



        </script>
    </body>
</html>