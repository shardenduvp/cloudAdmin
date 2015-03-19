<?php
/* @var $this ProposalPitchesController */
/* @var $model ProposalPitches */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'proposal-pitches-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'billing_type'); ?>
		<?php echo $form->textField($model,'billing_type'); ?>
		<?php echo $form->error($model,'billing_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tm_billing_schedule_type'); ?>
		<?php echo $form->textField($model,'tm_billing_schedule_type'); ?>
		<?php echo $form->error($model,'tm_billing_schedule_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tm_amount'); ?>
		<?php echo $form->textField($model,'tm_amount',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'tm_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fp_total_price'); ?>
		<?php echo $form->textField($model,'fp_total_price',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'fp_total_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fp_total_price_interval'); ?>
		<?php echo $form->textField($model,'fp_total_price_interval'); ?>
		<?php echo $form->error($model,'fp_total_price_interval'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'duration'); ?>
		<?php echo $form->textField($model,'duration',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'duration'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_date'); ?>
		<?php echo $form->textField($model,'start_date'); ?>
		<?php echo $form->error($model,'start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'trial'); ?>
		<?php echo $form->textField($model,'trial',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'trial'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'add_date'); ?>
		<?php echo $form->textField($model,'add_date'); ?>
		<?php echo $form->error($model,'add_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'remarks'); ?>
		<?php echo $form->textArea($model,'remarks',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'remarks'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_note'); ?>
		<?php echo $form->textArea($model,'client_note',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'client_note'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_comment'); ?>
		<?php echo $form->textArea($model,'client_comment',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'client_comment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'notes'); ?>
		<?php echo $form->textArea($model,'notes',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'notes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'admin_note'); ?>
		<?php echo $form->textArea($model,'admin_note',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'admin_note'); ?>
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