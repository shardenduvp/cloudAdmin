<?php
/* @var $this AdminLogsController */
/* @var $model AdminLogs */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'admin-logs-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ipaddress'); ?>
		<?php echo $form->textField($model,'ipaddress',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'ipaddress'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'logtime'); ?>
		<?php echo $form->textField($model,'logtime'); ?>
		<?php echo $form->error($model,'logtime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'controller'); ?>
		<?php echo $form->textField($model,'controller',array('size'=>60,'maxlength'=>245)); ?>
		<?php echo $form->error($model,'controller'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'action'); ?>
		<?php echo $form->textField($model,'action',array('size'=>60,'maxlength'=>145)); ?>
		<?php echo $form->error($model,'action'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'details'); ?>
		<?php echo $form->textArea($model,'details',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'details'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'action_param'); ?>
		<?php echo $form->textField($model,'action_param',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'action_param'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'browser'); ?>
		<?php echo $form->textArea($model,'browser',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'browser'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'query_string'); ?>
		<?php echo $form->textArea($model,'query_string',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'query_string'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'refer_url'); ?>
		<?php echo $form->textArea($model,'refer_url',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'refer_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'request_url'); ?>
		<?php echo $form->textArea($model,'request_url',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'request_url'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->