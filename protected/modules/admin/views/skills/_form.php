<?php
/* @var $this SkillsController */
/* @var $model Skills */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'skills-form',
	'htmlOptions'=>array(
		'class'=>'form-horizontal'
		),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<div class="row">
		<div class="col-md-12">
		<div class="box border inverse">
			<div class="box-title">
				<h4><i class="fa fa-bars"></i>Add Skills</h4>
			</div>
			<div class="box-body big">
				<div class="row">
					<div class="col-md-12">
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model); ?>

	<div class="hide-div alert alert-dismissible" role="alert"
						id="formResultDiv">
  						
  						<span id="formResult"></span>
						</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'name',array('class'=>'col-md-4 control-label')); ?>
			<div class="col-md-8">
				<?php echo $form->textField($model,'name',array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'name'); ?>
			</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'description',array('class'=>'col-md-4 control-label')); ?>
			<div class="col-md-8">
				<?php echo $form->textArea($model,'description',array('class'=>'form-control','value'=>'Added By Admin.')); ?>
				<?php echo $form->error($model,'description'); ?>
			</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'parent_id',array('class'=>'col-md-4 control-label')); ?>
			<div class="col-md-5">
			<?php $list=CHtml::listData($model->findAll(),'id','name');?>
				<?php echo $form->dropDownList($model,'parent_id',$list,array('empty'=>'Select a Parent','class'=>'form-control')); ?>
				<?php echo $form->error($model,'parent_id'); ?>
			</div>
	</div>

		</div>
	</div>
</div>
</div>
</div>
</div>
	<div class="form-actions clearfix">
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); 
echo CHtml::ajaxSubmitButton('Add',CHtml::normalizeUrl(array('skills/create')),
                 array(
                     'dataType'=>'json',
                     'type'=>'post',
                     'beforeSend'=>'function(){
                     	$("#updateBtnUser").button("loading");
                     }',
                     'success'=>'function(data) {
                        if(data.status == "success" ){
                        $("#formResultDiv").removeClass("hide-div");
                        $("#formResultDiv").removeClass("alert-warning");
                        $("#formResultDiv").addClass("alert-success");
                        $("#formResult").html("Added Successfully .");

                         $("#updateBtnUser").button("reset");

                        }
                         else{
                         $("#formResultDiv").removeClass("hide-div");
                         $("#formResultDiv").removeClass("alert-success");
                         $("#formResultDiv").addClass("alert-warning");
						 $("#formResult").html("Something Went Wrong .");

						  $("#updateBtnUser").button("reset");

                        }       
                    }',
                    'error'=>'function(){
                    	$("#formResultDiv").removeClass("hide-div");
                    	$("#formResultDiv").removeClass("alert-success");
                         $("#formResultDiv").addClass("alert-warning");
						 $("#formResult").html("Something Went Wrong .");

						  $("#updateBtnUser").button("reset");

                    }'
                     ),array('id'=>'updateBtnUser','class'=>'btn btn-primary pull-right',
                     'data-loading-text'=>'Adding ...','autocomplete'=>'off',
                     )); 
		?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->