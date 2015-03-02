<?php
/* @var $this ProposalPitchesController */
/* @var $model ProposalPitches */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'proposal-pitches-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'trial_period'); ?>
		<?php echo $form->textField($model,'trial_period',array('size'=>60,'maxlength'=>145)); ?>
		<?php echo $form->error($model,'trial_period'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estimated_cost'); ?>
		<?php echo $form->textField($model,'estimated_cost',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'estimated_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estimated_time'); ?>
		<?php echo $form->textField($model,'estimated_time',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'estimated_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'min_price'); ?>
		<?php echo $form->textField($model,'min_price',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'min_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'max_price'); ?>
		<?php echo $form->textField($model,'max_price',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'max_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time_material'); ?>
		<?php echo $form->textField($model,'time_material',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'time_material'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'billing_schedule'); ?>
		<?php echo $form->textField($model,'billing_schedule',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'billing_schedule'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'add_date'); ?>
		<?php echo $form->textField($model,'add_date'); ?>
		<?php echo $form->error($model,'add_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'remarks'); ?>
		<?php echo $form->textArea($model,'remarks',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'remarks'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'added_by'); ?>
		<?php echo $form->textField($model,'added_by',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'added_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'users_id'); ?>
		<?php echo $form->textField($model,'users_id'); ?>
		<?php echo $form->error($model,'users_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'suppliers_projects_id'); ?>
		<?php echo $form->textField($model,'suppliers_projects_id'); ?>
		<?php echo $form->error($model,'suppliers_projects_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->