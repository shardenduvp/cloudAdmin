<?php
/* @var $this ZonesController */
/* @var $model Zones */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'zones-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>245)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gmt'); ?>
		<?php echo $form->textField($model,'gmt',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'gmt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'save_hour'); ?>
		<?php echo $form->textField($model,'save_hour',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'save_hour'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'zonescol'); ?>
		<?php echo $form->textField($model,'zonescol',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'zonescol'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->