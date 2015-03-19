<!DOCTYPE html>
<html lang="en">
<head>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<!--<script type="text/javascript" src="<?php //echo Yii::app()->theme->baseUrl; ?>/../../node/node_modules/socket.io/node_modules/socket.io-client/dist/socket.io.js"></script>-->
<?php 
	Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/node/node_modules/socket.io/node_modules/socket.io-client/socket.io.js', CClientScript::POS_HEAD);
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/style/js/jquery-1.11.2.min.js', CClientScript::POS_HEAD);
	Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/moment.min.js', CClientScript::POS_HEAD);	
?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->pageTitle; ?></title>
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/css/custom.css" rel="stylesheet">
</head>

<body>

	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  <?php
			$link = Yii::app()->baseUrl;
			if(Yii::app()->user->isGuest)
			{
				echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/style/images/logo.png" alt="Venturepact">', array('/site'),array('class'=>'navbar-brand'));
				//$link = $link."/index.php?r=site/index";
			}
			else
			{
				echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/style/images/logo.png" alt="Venturepact">', array('/'.Yii::app()->user->role),array('class'=>'navbar-brand'));
				//$link = $link."/index.php?r=".Yii::app()->user->role."/index";
			}
		  ?>
        </div>
        
        <div class="navbar-collapse collapse" id="navbar">
        	<!--Center Nav-->
            <ul class="nav navbar-nav nav_position  ">
                <li><a href="#">How do we Work ?</a></li>
                <li><a href="#contact">Blog</a></li>
            </ul>
            
            <!--Center Nav End-->
              <ul class="nav navbar-nav  text_upper">
               	<?php
					
				
						if(Yii::app()->user->isGuest)
						{
							echo  '<li>'.CHtml::link('Search',array('/site/search')).'</li>';	
							//echo  '<li>'.CHtml::link('Supplier',array('/site/shareProfile','name'=>'satnambajwa')).'</li>';	
							echo  '<li>'.CHtml::link('Sign Up',array('/site/signup')).'</li>';
							echo '<li>'.CHtml::link('Login',array('/site/login')).'</li>';
						}
						else
						{
							echo '<li>'.CHtml::link('As Client',array('/client')).'</li>';
							echo '<li>'.CHtml::link('As Supplier',array('/supplier')).'</li>';
							echo '<li>'.CHtml::link('Logout',array('/site/logout')).'</li>';
						} 
					?>

              </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
	<!--Please include below line for chatting if you have to change template-->
	<input type="hidden" value="<?php echo Yii::app()->user->id; ?>" name="dhId" id="dhId" />
	<div id="dynamic_content">
   <?php echo $content;?>
   </div>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/js/bootstrap.min.js"></script> 
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/js/parsley.min.js"></script> 
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/js/validate.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/js/filepicker.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/bootbox.min.js"></script>
</body>
</html>
