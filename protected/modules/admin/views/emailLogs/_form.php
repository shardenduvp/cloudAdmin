<?php
/* @var $this EmailLogsController */
/* @var $model EmailLogs */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'email-logs-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'reciver'); ?>
		<?php echo $form->textField($model,'reciver',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'reciver'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'templete'); ?>
		<?php echo $form->textField($model,'templete',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'templete'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'esubject'); ?>
		<?php echo $form->textArea($model,'esubject',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'esubject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time'); ?>
		<?php echo $form->textField($model,'time'); ?>
		<?php echo $form->error($model,'time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'other_info'); ?>
		<?php echo $form->textArea($model,'other_info',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'other_info'); ?>
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