<?php
/* @var $this UpdateLogsController */
/* @var $model UpdateLogs */
/* @var $form CActiveForm */
?>

<div class="form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'update-logs-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<div class="row">
		<div class="col-md-12"> 
			<div class="box border inverse mb0">
				<div class="box-title">
					<h4><i class="fa fa-search"></i>Update Email Logs</h4>
				</div>
			<div class="box-body big" >
			<?php echo $form->errorSummary($model); ?>
		   
	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'username'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'username'); ?>
		
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'action'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textField($model,'action',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'action'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align"><div class="row">
		<?php echo $form->labelEx($model,'controller'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textField($model,'controller',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'controller'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'description'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'user_ip'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textField($model,'user_ip',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'user_ip'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'datetime'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textField($model,'datetime'); ?>
		<?php echo $form->error($model,'datetime'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'user_id'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
		</div>
	</div>

	<div class="row">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->