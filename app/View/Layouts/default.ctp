<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="People Energy">
    <meta name="author" content="Ruler Technologies Pty Ltd">
    <link rel="shortcut icon" href="<?php echo $this->webroot; ?>assets/img/favicon.ico">

    <title>Bonus Cash</title>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <?=$this->Html->script('jquery-ui-1.10.4.custom.min');?>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<!-- NAVBAR
================================================== -->
  <body data-spy="scroll">
    <div id="top" class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?php echo $this->webroot; ?>#top"><img src="<?php echo $this->webroot; ?>assets/img/logo.png" class="logo"></a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav pull-right">
                <li><a href="<?php echo $this->webroot; ?>#customers"><img src="<?php echo $this->webroot; ?>assets/img/home.png"></a></li>
                <li><a href="<?php echo $this->webroot; ?>#retailers"><img src="<?php echo $this->webroot; ?>assets/img/consumers.png"></a></li>
                <li><a href="<?php echo $this->webroot; ?>#member"><img src="<?php echo $this->webroot; ?>assets/img/card.png"></a></li>
                <li><a href="<?php echo $this->webroot; ?>#launching"><img src="<?php echo $this->webroot; ?>assets/img/retailers.png"></a></li>
                <li><a href="<?php echo $this->webroot; ?>#summary"><img src="<?php echo $this->webroot; ?>assets/img/theRevolution.png"></a></li>
                 <li><a href="<?php echo $this->webroot; ?>#contact"><img src="<?php echo $this->webroot; ?>assets/img/contact.png"></a></li>
              </ul>
            </div>
          </div>
           <div class="container">
	          <?php echo $this->Session->flash(); ?>
           </div>
        </div>

      </div>
    </div>
	<div class="container" style="margin-top: 70px;">	
	</div>

	<?php echo $this->fetch('content'); ?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="<?php echo $this->webroot; ?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo $this->webroot; ?>assets/js/docs.min.js"></script>
    <script src="<?php echo $this->webroot; ?>assets/js/custom.js"></script>
  </body>
</html>