<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>Bargain-Wholesale</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $this->webroot; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $this->webroot; ?>css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo $this->webroot; ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo $this->webroot; ?>css/style.css" rel="stylesheet">
    <link href="<?php echo $this->webroot; ?>css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo $this->webroot; ?>js/jquery.js"></script>
    <script src="<?php echo $this->webroot; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $this->webroot; ?>js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo $this->webroot; ?>js/jquery.nicescroll.js" type="text/javascript"></script>    
  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
      <?php echo $this->element('header'); ?>
      <!--header end-->
      <!--sidebar start-->

       <aside>
            <?php echo $this->element('sidebar'); ?>
       </aside>
 
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <?php echo $this->Session->flash(); ?>
              <?php echo $this->fetch('content'); ?>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>   
       <!--common script for all pages-->
    <script src="<?php echo $this->webroot; ?>js/common-scripts.js"></script>
  </body>
</html>