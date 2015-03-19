<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $this->pageTitle; ?></title>
<!-- Favicon -->
<link rel="shortcut icon" href="favicon.ico">
<!-- Bootstrap CSS -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main_style.css" rel="stylesheet">
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
</head>
<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<!-- Navigation -->
<nav class="navbar navbar-vpcolor navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="container">
	  <div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		  <span class="sr-only">Toggle navigation</span>
		  <span class="icon-bar bgwhite"></span>
		  <span class="icon-bar bgwhite"></span>
		  <span class="icon-bar bgwhite"></span>
		</button>
		<a class="navbar-brand pa10" href="#page-top">
			<img alt="venturepact_logo" src="images/logo.png" />
		</a>
	  </div>

	  <!-- Collect the nav links, forms, and other content for toggling -->
	  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<li> <a href="#">How Do We Work</a> </li>
			<li> <a href="#">Pricing</a> </li>
			<li> <a href="#">For Suppliers</a> </li>
			<li> <a href="#">Blog</a> </li>
		</ul>
		<div class="col-sm-6 col-md-2 col-md-offset-1">
            <div class="col-lg-12 col-md-12">
        <?php $form=$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/site/search'),'id'=>'search-edit-supplier','method'=>'get','enableClientValidation'=>true,'clientOptions'=>array(),'htmlOptions'=>array('class'=>"navbar-form mt20")));?>
        	<div class="input-group">
			  <?php
			  $for		=	Yii::app()->request->getParam('keyword');
			  $skills	=	Yii::app()->request->getParam('skills');
			  $services	=	Yii::app()->request->getParam('services');
			  $industry	=	Yii::app()->request->getParam('industry');?>
				<input class="form-control border_right_none" name="keyword" type="text" value="<?php if(!empty($for)){echo $for;} ?>" placeholder="Search Service, Skill, Industry..." id="sup-search" spellcheck="true" />
				<div class="input-group-btn">
					 <?php echo CHtml::submitButton( 'Search',array( 'id'=>'btnprotfolioedit','class'=>'btn btn-default')); ?>
                </div>
			</div>
            <?php $this->endWidget(); ?>
        </div>
		</div>
		<ul class="nav navbar-nav navbar-right">
			<li> <a href="#"><span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>&nbsp; Login</a> </li>
			<li> <button type="button" class="btn btn-danger pa5 pl10 pr10 mt20">Register</button></li>
		</ul>
	  </div><!-- /.navbar-collapse -->
  </div>
</nav>
 <?php echo $content;?>


<!--<script src="js/main_style.js"></script>-->

<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
<!-- Scrolling Nav JavaScript -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.easing.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/slick.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/scripts.js"></script>

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/scrolling-nav.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-select.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$('.selectpicker').selectpicker();
		$('[data-toggle="tooltip"]').tooltip()
	});
</script>
</body>
</html>
