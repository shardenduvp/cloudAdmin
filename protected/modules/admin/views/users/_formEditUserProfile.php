<?php
/* @var $this ClientProfilesController */
/* @var $model ClientProfiles */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'client-profiles-form',
	'action'=>Yii::app()->createUrl('admin/clientProfiles/update&id='.$model->id),
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
		<div class="box border inverse">
			<div class="box-title">
				<h4><i class="fa fa-bars"></i>Client Profile Information</h4>
			</div>
			<div class="box-body big">
				<div class="row">
					<div class="col-md-12">
						<p class="note">Fields with <span class="required">*</span> are required.</p>
						<?php echo $form->errorSummary($model); ?>
						
						<div class="alert alert-dismissible hide-div" role="alert"
						id="formResultDivClientProfiles">
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  							<span aria-hidden="true">&times;</span>
  						</button>
  						<span id="formResultClientProfiles"></span>
						</div>

						<div class="form-group">
								<?php echo $form->labelEx($model,'id',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'id',array('class'=>'form-control','disabled'=>'true')); ?>
								<?php echo $form->error($model,'id'); ?>
								</div>
							</div>

						<h4>Comapny Information</h4>
						<div class="form-group">
							<?php echo $form->labelEx($model,'company_name',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php echo $form->textField($model,'company_name',array('size'=>60,'maxlength'=>200,'class'=>'form-control')); ?>
								<?php echo $form->error($model,'company_name'); ?>
							</div>
						</div>

						<div class="form-group">
							<?php echo $form->labelEx($model,'company_link',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php echo $form->textField($model,'company_link',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'company_link'); ?>
							</div>
						</div>

						
						

						<div class="form-group">
							<?php echo $form->labelEx($model,'team_size',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php echo $form->textField($model,'team_size',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'team_size'); ?>
							</div>
						</div>

						<div class="form-group">
							<?php echo $form->labelEx($model,'category',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php echo $form->textField($model,'category',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'category'); ?>
							</div>
						</div>

						
						
						<div class="form-group">
							<?php echo $form->labelEx($model,'foundation_year',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php echo $form->textField($model,'foundation_year',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'foundation_year'); ?>
							</div>
						</div>


						<div class="form-group">
							<?php echo $form->labelEx($model,'description',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php echo $form->textArea($model,'description',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'description'); ?>
							</div>
						</div>

						
						
						<h4>Contact Information</h4>

						

						<div class="form-group">
							<?php echo $form->labelEx($model,'address1',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php echo $form->textField($model,'address1',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'address1'); ?>
							</div>
						</div>

						<div class="form-group">
							<?php echo $form->labelEx($model,'skype_id',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php echo $form->textField($model,'skype_id',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'skype_id'); ?>
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

echo CHtml::ajaxSubmitButton('Update',CHtml::normalizeUrl(array('clientProfiles/update&id='.$model->id,'render'=>true)),
                 array(
                     'dataType'=>'json',
                     'type'=>'post',
                     'success'=>'function(data) { 
                        if(data.status == "success" ){
                        $("#formResultDivClientProfiles").removeClass("hide-div");
                        $("#formResultDivClientProfiles").removeClass("alert-warning");
                        $("#formResultDivClientProfiles").addClass("alert-success");
                        $("#formResultClientProfiles").html("Updated Successfully .");

                        }
                         else{
                         $("#formResultDivClientProfiles").removeClass("hide-div");
                         $("formResultDivClientProfiles").removeClass("alert-success");
                         $("formResultDivClientProfiles").addClass("alert-warning");
						 $("#formResultClientProfiles").html("Something Went Wrong .");

                        }       
                    }',
                    'error'=>'function(){
                    	$("#formResultDivClientProfiles").removeClass("hide-div");
                    	$("formResultDivClientProfiles").removeClass("alert-success");
                         $("formResultDivClientProfiles").addClass("alert-warning");
						 $("#formResultClientProfiles").html("Something Went Wrong .");

                    }'
                     ),array('id'=>'mybtn','class'=>'btn btn-primary pull-right')); 
?>

</div>


<?php $this->endWidget(); ?>

</div><!-- form -->





