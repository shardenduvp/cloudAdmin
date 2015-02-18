<?php
/* @var $this MilestonesHasOrderStatusController */
/* @var $model MilestonesHasOrderStatus */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'milestones-has-order-status-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'supplier_milestones_id'); ?>
		<?php echo $form->textField($model,'supplier_milestones_id'); ?>
		<?php echo $form->error($model,'supplier_milestones_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'old_status'); ?>
		<?php echo $form->textField($model,'old_status'); ?>
		<?php echo $form->error($model,'old_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'new_status'); ?>
		<?php echo $form->textField($model,'new_status'); ?>
		<?php echo $form->error($model,'new_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textArea($model,'note',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->