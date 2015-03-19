<?php
/* @var $this ClientProfilesController */
/* @var $model ClientProfiles */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'client-profiles-form',
	'action'=>Yii::app()->createUrl('admin/clientProfiles/update',array('id'=>$model->id)),
	'htmlOptions'=>array(
		'class'=>'form-horizontal'
		),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>


<div class="row">
	<div class="col-md-12">
		<div class="box inverse">
			<div class="box-body big">
				<div class="row">
					<div class="col-md-12">
						<p class="note">Fields with <span class="required">*</span> are required.</p>
						<?php echo $form->errorSummary($model); ?>
						
						<div class=" hide-div alert alert-dismissible" role="alert"
						id="formResultDivClientProfiles">
  						<span id="formResultClientProfiles"></span>
						</div>

					<div class="row">
						<div class="col-xs-4">
	              			<img alt="User Pic" src="themes\admin\img\2.jpg" class="img-circle" height="100px" width="100px" ;> 
						</div>

						<div class="col-xs-4">
							<div class="form-group">
								<div class="col-md-8">
								<b>First name</b>
								<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>200,'class'=>'form-control')); ?>
								<?php echo $form->error($model,'first_name'); ?>
								</div>
							</div>
						</div>

						<div class="col-xs-4">
							<div class="form-group">
								<div class="col-md-8">
								<b>Last name</b>
									<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>200,'class'=>'form-control')); ?>
									<?php echo $form->error($model,'last_name'); ?>
								</div>
							</div>
						</div>

					 <div class="col-xs-4">
						<div class="form-group">
							<div class="col-md-8">
							<b>Email</b>
								<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>200,'class'=>'form-control')); ?>
								<?php echo $form->error($model,'email'); ?>
							</div>
						</div>
					  </div>
					</div>	


					<p><p>
					<h4> Company Information </h4>
				</p>
					<div class="row">
						<div class="col-xs-4">
							<div class="form-group">
								<div class="col-md-8">
								<b>Company Name</b>
									<?php echo $form->textField($model,'company_name',array('size'=>60,'maxlength'=>200,'class'=>'form-control')); ?>
									<?php echo $form->error($model,'company_name'); ?>
								</div>
							</div>
						</div>

						<div class="col-xs-4">
							<div class="form-group">
								<div class="col-md-8">
								<b>Company link</b>
									<?php echo $form->textField($model,'company_link',array('class'=>'form-control')); ?>
									<?php echo $form->error($model,'company_link'); ?>
								</div>
							</div>
						</div>

						<div class="col-xs-4">	
							<div class="form-group">
								<div class="col-md-8">
								<b>Foundation Year</b>
									<?php echo $form->textField($model,'foundation_year',array('class'=>'form-control')); ?>
									<?php echo $form->error($model,'foundation_year'); ?>
								</div>
							</div>	
						</div>
					</div>

				<div class="row">
					<div class="col-xs-4">
						<div class="form-group">
							<div class="col-md-8">
							<b>Team Size</b>
								<?php echo $form->textField($model,'team_size',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'team_size'); ?>
							</div>
						</div>
					</div>

					<div class="col-xs-4">
						<div class="form-group">
							<div class="col-md-8">
							<b>Category</b>
								<?php echo $form->textField($model,'category',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'category'); ?>
							</div>
						</div>
					</div>

					<div class="col-xs-4">
						<div class="form-group">
							<div class="col-md-8">
							<b>Description</b>
								<?php echo $form->textArea($model,'description',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'description'); ?>
							</div>
						</div>	
					</div>
				</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="form-actions clearfix"> 

<?php 
echo CHtml::ajaxSubmitButton('Update',CHtml::normalizeUrl(array('clientProfiles/update','id'=>$model->id)),
                 array(
                     'dataType'=>'json',
                     'type'=>'post',
                     'beforeSend'=>'function(){
                     	$("#updateBtnClient").button("loading");
                     }',
                     'success'=>'function(data) { 
                        if(data.status == "success" ){
                        $("#formResultDivClientProfiles").removeClass("hide-div");
                        $("#formResultDivClientProfiles").removeClass("alert-warning");
                        $("#formResultDivClientProfiles").addClass("alert-success");
                        $("#formResultClientProfiles").html("Updated Successfully .");

                        $("#updateBtnClient").button("reset");

                        }
                         else{
                         $("#formResultDivClientProfiles").removeClass("hide-div");
                         $("formResultDivClientProfiles").removeClass("alert-success");
                         $("formResultDivClientProfiles").addClass("alert-warning");
						 $("#formResultClientProfiles").html("Something Went Wrong .");

						 $("#updateBtnClient").button("reset");

                        }       
                    }',
                    'error'=>'function(){
                    	$("#formResultDivClientProfiles").removeClass("hide-div");
                    	$("formResultDivClientProfiles").removeClass("alert-success");
                         $("formResultDivClientProfiles").addClass("alert-warning");
						 $("#formResultClientProfiles").html("Something Went Wrong .");

						 $("#updateBtnClient").button("reset");

                    }'
                     ),array('id'=>'updateBtnClient','class'=>'btn btn-danger pull-right','data-loading-text'=>'Updating ...','autocomplete'=>'off')); 
?>

</div>


<?php $this->endWidget(); ?>

</div><!-- form -->





