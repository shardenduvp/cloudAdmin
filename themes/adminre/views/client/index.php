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
			<?php } ?>
			<?php if(Yii::app()->user->hasFlash('success')){?>
				<div class="alert alert-success" id="repsoneRest2">
				<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
				<p id="messageResponse2">
				<strong> Welcome to VenturePact!</strong> Your account email address has been verified.</p>
				</div>
			<?php } ?>
			<?php if(Yii::app()->user->hasFlash('success1')){?>
				<div class="alert alert-success" id="repsoneRest2">
				<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
				<p id="messageResponse2">
				<strong> Your password has been reset!</strong></p>
				</div>
			<?php } ?>
			<?php if(Yii::app()->user->hasFlash('linkedinError')){?>
					<div class="alert alert-danger" id="repsoneRest2">
						<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
						<p id="messageResponse2">
						<strong><?php echo Yii::app()->user->getFlash('linkedinError'); ?></strong></p>
					</div>
			<?php } ?>
			<?php if(Yii::app()->user->hasFlash('saved')){?>
					<div class="alert alert-success" id="repsoneRest2">
						<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
						<p id="messageResponse2">
						<strong><?php echo Yii::app()->user->getFlash('saved'); ?></strong></p>
					</div>
			<?php } ?>
            <?php if(Yii::app()->user->hasFlash('successA')){?>
					<div class="alert alert-success" id="repsoneRest2">
						<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
						<p id="messageResponse2">
						<strong><?php echo Yii::app()->user->getFlash('successA'); ?></strong></p>
					</div>
			<?php } ?>
            <?php if(Yii::app()->user->hasFlash('errorA')){?>
					<div class="alert alert-danger" id="repsoneRest2">
						<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
						<p id="messageResponse2">
						<strong><?php echo Yii::app()->user->getFlash('errorA'); ?></strong></p>
					</div>
			<?php } ?>
			<?php echo CHtml::link('<button type="button" class="btn btn-primary  text-center model_text" >My Account</button>', array('/client/account'));?>
			<?php //echo CHtml::link('<button type="button" class="btn btn-primary  text-center model_text" >My Profile</button>', array('/client/profile'));?>
            <?php echo CHtml::link('<button type="button" class="btn btn-primary  text-center model_text" >Create Project</button>', array('/client/project'));?>
			 <?php echo CHtml::link('<button type="button" class="btn btn-primary  text-center model_text" >Introductions</button>', array('/client/introductions'));?>
			<div class="col-md-12 mt15">
				<?php $projects = ClientProjects::model()->findAllByAttributes(array('client_profiles_id'=>Yii::app()->user->clientProfileId));?>
			</div>
			<div class="col-md-12 pt10 mt15 pa0 ">
				<h4>Client Projects:</h4>
				<?php
				$coutP	=	0;
				foreach($projects as $project){
					if($project->status==0)
						continue;
					$coutP=$coutP+1;
					$pref = "";
					if($project->project_start_preference == 1)
						$pref = "Immediately";
					if($project->project_start_preference == 2)
						$pref = "Within the next 30 days";
					if($project->project_start_preference == 3)
						$pref = "No Hurry";
				?>
					 <div id="projectId-<?php echo $project->id?>" class="outline col-md-6 bg_white border_r mb5">
						<div class="col-md-12 border_b pa0 pb10">
							<h4 class="semi-bold text-info  "><?php echo $project->name; ?></h4>
							<small class="mr15">Start Preference: <?php echo $pref; ?></small> <small class="ml15">Budget: $<?php echo $project->min_budget; ?> - $<?php echo $project->max_budget; ?></small>
							<span class="pull-right">
								<?php echo CHtml::link('Edit', array('/client/project','id'=>$project->id));?> |
								<?php echo CHtml::link('Archive', array('/client/projectDelete','id'=>$project->id),array('class'=>'delete'));?>
								<?php //echo CHtml::ajaxLink('Archive',array('/client/projectDelete','id'=>$project->id),array('success'=>'function(data){ $("#projectId-'.$project->id.'").addClass("hide");alert("Project Archived");}')); ?>
							</span>
						</div>
						<div class="col-md-12 pa0 mt15 ">
							<div class="col-md-3 bg_light mt10 pl0 ">
							<span class="text_circle pull-left mb10 ml0 "><?php echo date('d,M',strtotime((isset($project->modify_date))?$project->modify_date:$project->add_date));?></span>
							</div>
							<div class="col-md-9">
							<h5><?php echo $project->currentStatus->name; ?></h5>
							<span class="label label-warning">Not Started</span>
							</div>
						 </div>                                    
					 </div>
				 <?php }
				 
				 if($coutP==0){
					echo 'No Record Found';
				}?>
			</div>
            
            <div class="col-md-12 pt10 mt15 pa0 ">
				<h4>Archived Projects:</h4>
				<?php 
				$cout=0;
				foreach($projects as $project){
					if($project->status!=0)
						continue;
					$cout = $cout+1;
					$pref = "";
					if($project->project_start_preference == 1)
						$pref = "Immediately";
					if($project->project_start_preference == 2)
						$pref = "Within the next 30 days";
					if($project->project_start_preference == 3)
						$pref = "No Hurry";?>
					 <div id="projectId-<?php echo $project->id?>" class="outline col-md-6 bg_white border_r mb5">
						<div class="col-md-12 border_b pa0 pb10">
							<h4 class="semi-bold text-info  "><?php echo $project->name; ?></h4>
							<small class="mr15">Start Preference: <?php echo $pref; ?></small> <small class="ml15">Budget: $<?php echo $project->min_budget; ?> - $<?php echo $project->max_budget; ?></small>
						</div>
						<div class="col-md-12 pa0 mt15 ">
							<div class="col-md-3 bg_light mt10 pl0 "> 
							<span class="text_circle pull-left mb10 ml0 "><?php echo date('d,M',strtotime((isset($project->modify_date))?$project->modify_date:$project->add_date));?></span>
							</div>
							<div class="col-md-9">
							<h5><?php echo $project->currentStatus->name; ?></h5>
							<span class="label label-warning">Not Started</span>
							</div>
						 </div>                                    
					 </div>
				 <?php }
			if($cout==0){
				echo 'No Record Found';
			}?>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
	$(".delete").click(function(e){
		var conf = confirm("Are you sure? You want to archive this Project?");
		if(!conf)
		{
			e.preventDefault();
		}
	});
});
</script>
