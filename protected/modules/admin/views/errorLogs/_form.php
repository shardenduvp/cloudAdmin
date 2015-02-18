<?php
/* @var $this ErrorLogsController */
/* @var $model ErrorLogs */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'error-logs-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_type'); ?>
		<?php echo $form->textField($model,'user_type',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'user_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_name'); ?>
		<?php echo $form->textArea($model,'user_name',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'user_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'error_code'); ?>
		<?php echo $form->textField($model,'error_code'); ?>
		<?php echo $form->error($model,'error_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'message'); ?>
		<?php echo $form->textArea($model,'message',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'message'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'request_url'); ?>
		<?php echo $form->textArea($model,'request_url',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'request_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'query_string'); ?>
		<?php echo $form->textArea($model,'query_string',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'query_string'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'file_name'); ?>
		<?php echo $form->textArea($model,'file_name',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'file_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'line_number'); ?>
		<?php echo $form->textField($model,'line_number'); ?>
		<?php echo $form->error($model,'line_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'error_type'); ?>
		<?php echo $form->textField($model,'error_type',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'error_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time'); ?>
		<?php echo $form->textField($model,'time'); ?>
		<?php echo $form->error($model,'time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reference_url'); ?>
		<?php echo $form->textArea($model,'reference_url',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'reference_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ipaddress'); ?>
		<?php echo $form->textField($model,'ipaddress',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'ipaddress'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'browser'); ?>
		<?php echo $form->textArea($model,'browser',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'browser'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->