<!DOCTYPE html>
<html>
<head>
<!-- Meta, title, CSS, favicons, etc. -->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/../../node/node_modules/socket.io/node_modules/socket.io-client/socket.io.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/js/jquery-1.11.2.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/js/parsley.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/jquery-ui.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/moment.min.js"></script>
<meta charset="utf-8">
<title>VenturePact :: Client Profile</title>
<meta name="keywords" content="" />
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Favicon -->
<link rel="shortcut icon" href="favicon.ico">
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/css/main_style.css" rel="stylesheet">
<!-- Theme CSS -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/theme/theme.css" rel="stylesheet">
<!-- Admin Forms CSS -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/theme/assets/admin-tools/admin-forms/css/admin-forms.css" rel="stylesheet">
</head>
<body class="admin-panels-page sb-l-m" data-spy="scroll" data-target="#nav-spy" data-offset="300">
<!-- Start: Main -->
<div id="main">
<!-- Start: Sidebar -->
	<aside id="sidebar_left" class="nano nano-primary fixed_div">
		<div class="nano-content nm">      
		  <!-- sidebar menu -->	
			<ul class="nav sidebar-menu text-center">
				<li class="nav_tab nav-logo">
					<span class="toggle_sidemenu_l">
						<?php echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/images/vp_icon.png" />',array('/client'),array('class'=>'pa20'));?>
					</span>
				</li>
				<li class="nav_tab nav_tab_active">
					<?php echo CHtml::link('<span class="icon-plus fs20" aria-hidden="true"></span><p class="mt5 mb0 fs11 font_bold ">Project</p>',array('/client/project'));?>
				</li>
				<li class="nav_tab">
					<?php echo CHtml::link('<span class="icon-home fs20" aria-hidden="true"></span><p class="mb0 fs11 font_bold  mt5">Dashboard</p>',array('/client/index'));?>
				</li>
				<li class="nav_tab">
					<?php echo CHtml::link('<span class="icon-users fs20" aria-hidden="true"></span><span class="label label-xs bg-danger font_newlight ">New</span><p class="mb0 fs11 font_bold  mt5">Introductions</p>',array('/client/introductions'));?>
				</li>
				
				<!--Active projects -->
				<?php $this->widget('widgetDashboardMenu');?>
				<!--Active projects -->
			</ul>
			<ul id="nav-tab" class="nav sidebar-menu text-center profile_link_set font_newregular pb30" >
				<li class="nav_tab1 pb5 bb-none posr"> 
					<div class="left-section-hover" id="notification-toggle">
						<img class="img-circle mb5" width="50" height="50" src="<?php echo Yii::app()->user->image;?>"> 
						<div class="badge badge-orange-dark"><span class="fs9">3</span></div>	
						<div class="col-md-12 np text-left notification-toggle cside">
							<div class="col-md-12 mt30 mb10 pl20 pr20">
								<div class="col-sm-12 np mb10">
									<a href="#">
									<p class="fs10 font_newlight mb0 toggle-color">
										<span class="orange-new font-newbold">John</span> mentioned you in a post mentioned you in a postgdsfgdfgfd.								
									</p>
									</a>
									<p class="fs10 font_newlight grey-light">5m ago</p>
								</div>
								<div class="col-sm-12 np mb10">
									<a href="#">
									<p class="fs10 font_newlight mb0 toggle-color">
										<span class="orange-new font-newbold">John</span> mentioned you in a post mentioned you in a postgdsfgdfgfd.								
									</p>
									</a>
									<p class="fs10 font_newlight grey-light">5m ago</p>
								</div>
								<div class="col-sm-12 np mb10">
								<a href="#">
									<p class="fs10 font_newlight mb0 toggle-color">
										<span class="orange-new font-newbold">John</span> mentioned you in a post mentioned you in a postgdsfgdfgfd.								
									</p>
									</a>
									<p class="fs10 font_newlight grey-light">5m ago</p>
								</div>
								<div class="blue-border-top clearfix">
									<a href="#" class="orange-new fs10 font_newlight font-weight-normal pt10 pull-right">See All</a>
								</div>
							</div>
							<div class="col-md-12 blue-border-top bg-dark-blue pl5">
								<div class="col-md-4 pt0 blue-border-right pb10">
									<div class="check-img"><?php echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/images/check-active.png" alt="check" class="mr5"> Client View',array('/client/introductions'),array('class'=>'font_newregular grey-new'));?></div>	
								</div>
								<div class="col-md-5 pt0 blue-border-right pb10 pl15">
									<div class="check-img"><?php echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/images/check.png" alt="check" class="mr5"> Supplier View',array('/supplier/viewprofile'),array('class'=>'font_newregular grey-new'));?></div>
								</div>
								<div class="col-md-2 blue-border-right pt10 pb10 text-center"><?php echo CHtml::link('<span aria-hidden="true" class="icon-settings fs18 grey-light"></span>',array('/client/account'));?></div>
								<div class="col-md-1 pt10 pb10 text-center"><?php echo CHtml::link('<span aria-hidden="true" class="icon-power fs18 orange-light"></span>',array('/site/logout'));?></div>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</aside>
  <!-- Start: Content-Wrapper -->
    <!-- Start: Content-Wrapper -->
	<section id="content_wrapper">
		<!--Please include below line for chatting if you have to change template-->
			<input type="hidden" value="<?php echo Yii::app()->user->id; ?>" name="dhId" id="dhId" />
		<?php echo $content; ?>
	</section>
</div>
<!-- End: Main -->
<!-- BEGIN: PAGE SCRIPTS --> 
<!-- jQuery --> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/js/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/js/bootstrap-select.js"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/js/validate.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/js/filepicker.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/bootbox.min.js"></script>
<!-- Page Plugins --> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/magnific/jquery.magnific-popup.js"></script>
<!-- Admin Widgets  -->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/theme/assets/admin-tools/admin-plugins/admin-panels/json2.js"></script> 
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/theme/assets/admin-tools/admin-plugins/admin-panels/jquery.ui.touch-punch.min.js"></script> 
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/theme/assets/admin-tools/admin-plugins/admin-panels/adminpanels.js"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/jquerymask/jquery.maskedinput.min.js"></script>
<!-- Theme Javascript -->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/theme/assets/js/utility/utility.js"></script> 
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/theme/assets/js/main.js"></script> 
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/theme/assets/js/demo.js"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/tab-effect.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/jquery.slimscroll.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/theme/assets/admin-tools/admin-forms/js/jquery-ui-timepicker.min.js"></script>
<!-- END: PAGE SCRIPTS -->
<script type="text/javascript">
var userpicurl = "<?php echo (empty(Yii::app()->user->image)?'https://www.filepicker.io/api/file/A9r6eU3JQOxoJXvAWPgY':Yii::app()->user->image); ?>";
jQuery(document).ready(function() {
	
	initJs();
});
function initJs()
{
	Core.init();            
}
</script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/notification.js"></script>
</body>
</html>