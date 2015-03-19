<div class="white_outer">
	<div class="container">
		<div class="row">
			<div class="col-md-12 "><h3>Dashboard</h3></div>
		</div>
	</div>
</div>  

<div class="dark-wrapper">
	<div class="container inner">
		<div class="row">
			<?php if(isset($_REQUEST['first'])){?>
				<div class="alert alert-success" id="repsoneRest2">
				<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
				<p id="messageResponse2">
				<script id="timelyScript" src="https://book.gettimely.com/widget/book-button.js"> </script>
				<div style="display:none;"><script id="hideScript">var hideButton = new timelyButton('vp', { buttonId: 'hideScript' });</script></div>
				<strong> Welcome to VenturePact!</strong> If you would like to discuss your requirements over a call, feel free to schedule a call <a href="#" onclick="hideButton.start();">here</a>. <?php if($_REQUEST['first']!=2){?>Also, please click on the verification link sent to your email address.<?php }?></p>
				</div>
			<?php }
			if(Yii::app()->user->hasFlash('success')){?>
				<div class="alert alert-success" id="repsoneRest2">
				<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
				<p id="messageResponse2">
				<strong> Welcome to VenturePact!</strong> Your account email address has been verified.</p>
				</div>
			<?php }
			if(Yii::app()->user->hasFlash('success1')){?>
				<div class="alert alert-success" id="repsoneRest2">
				<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
				<p id="messageResponse2">
				<strong> Your password has been reset!</strong></p>
				</div>
			<?php } ?>
			<?php if(Yii::app()->user->hasFlash('linkedinError') && isset($_REQUEST['role'])){?>
					<div class="alert alert-success" id="repsoneRest2">
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
					<p id="messageResponse2">
					<strong>You are already Signed Up as Supplier</strong></p>
					</div>
			<?php } ?>
			<?php echo CHtml::link('<button type="button" class="btn btn-primary  text-center model_text" >My Account</button>', array('/supplier/account'));?>
            <?php echo CHtml::link('<button type="button" class="btn btn-primary  text-center model_text" >My Profile</button>', array('/supplier/viewprofile'));?>
            <?php echo CHtml::link('<button type="button" class="btn btn-primary  text-center model_text" >Projects</button>', array('/supplier/projectListing'));?>
		</div>
	</div>
</div>