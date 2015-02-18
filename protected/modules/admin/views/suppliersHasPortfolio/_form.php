<?php
/* @var $this SuppliersHasPortfolioController */
/* @var $model SuppliersHasPortfolio */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'suppliers-has-portfolio-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'suppliers_id'); ?>
		<?php echo $form->textField($model,'suppliers_id'); ?>
		<?php echo $form->error($model,'suppliers_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_name'); ?>
		<?php echo $form->textField($model,'project_name',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'project_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_link'); ?>
		<?php echo $form->textField($model,'project_link',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'project_link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'industry_id'); ?>
		<?php echo $form->textField($model,'industry_id'); ?>
		<?php echo $form->error($model,'industry_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'service_id'); ?>
		<?php echo $form->textField($model,'service_id'); ?>
		<?php echo $form->error($model,'service_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_name'); ?>
		<?php echo $form->textField($model,'client_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'client_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year_done'); ?>
		<?php echo $form->textField($model,'year_done',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'year_done'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estimate_price'); ?>
		<?php echo $form->textField($model,'estimate_price',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'estimate_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_date'); ?>
		<?php echo $form->textField($model,'start_date'); ?>
		<?php echo $form->error($model,'start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estimate_timeline'); ?>
		<?php echo $form->textField($model,'estimate_timeline',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'estimate_timeline'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'language_used'); ?>
		<?php echo $form->textField($model,'language_used',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'language_used'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cover'); ?>
		<?php echo $form->textField($model,'cover',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'cover'); ?>
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
		<?php echo $form->labelEx($model,'portfolio_type'); ?>
		<?php echo $form->textField($model,'portfolio_type'); ?>
		<?php echo $form->error($model,'portfolio_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'one_line_pitch'); ?>
		<?php echo $form->textField($model,'one_line_pitch',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'one_line_pitch'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'who_can'); ?>
		<?php echo $form->textField($model,'who_can',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'who_can'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'markets'); ?>
		<?php echo $form->textField($model,'markets',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'markets'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'portfolio_status'); ?>
		<?php echo $form->textField($model,'portfolio_status',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'portfolio_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_of_customers'); ?>
		<?php echo $form->textField($model,'no_of_customers',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'no_of_customers'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'launched_in'); ?>
		<?php echo $form->textField($model,'launched_in',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'launched_in'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_of_users'); ?>
		<?php echo $form->textField($model,'no_of_users',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'no_of_users'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deployment'); ?>
		<?php echo $form->textField($model,'deployment',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'deployment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_free_trial'); ?>
		<?php echo $form->textField($model,'is_free_trial'); ?>
		<?php echo $form->error($model,'is_free_trial'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_size'); ?>
		<?php echo $form->textField($model,'project_size',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'project_size'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'per_hour_rate'); ?>
		<?php echo $form->textField($model,'per_hour_rate',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'per_hour_rate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'platform'); ?>
		<?php echo $form->textField($model,'platform',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'platform'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'company_name'); ?>
		<?php echo $form->textField($model,'company_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'company_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_discreet'); ?>
		<?php echo $form->textField($model,'is_discreet'); ?>
		<?php echo $form->error($model,'is_discreet'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'discreet_desc'); ?>
		<?php echo $form->textField($model,'discreet_desc',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'discreet_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location'); ?>
		<?php echo $form->textField($model,'location'); ?>
		<?php echo $form->error($model,'location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->