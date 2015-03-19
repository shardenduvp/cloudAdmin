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
<!-- Start: Content-Wrapper -->
	<section id="wrapper-main">
		<div class="col-md-12 col-sm-12 col-xs-12 np">
			<?php echo $content; ?>
		</div>
	</section>
<!-- End: Content-Wrapper -->
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
var url = "https://www.filepicker.io/api/file/A9r6eU3JQOxoJXvAWPgY";
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