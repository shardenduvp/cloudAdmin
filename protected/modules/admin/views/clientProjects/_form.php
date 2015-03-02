<?php
/* @var $this ClientProjectsController */
/* @var $model ClientProjects */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'client-projects-form',
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
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tag_line'); ?>
		<?php echo $form->textField($model,'tag_line',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'tag_line'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'business_problem'); ?>
		<?php echo $form->textArea($model,'business_problem',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'business_problem'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'about_company'); ?>
		<?php echo $form->textArea($model,'about_company',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'about_company'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'team_size'); ?>
		<?php echo $form->textField($model,'team_size',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'team_size'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'summary'); ?>
		<?php echo $form->textArea($model,'summary',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'summary'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'unique_features'); ?>
		<?php echo $form->textArea($model,'unique_features',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'unique_features'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'min_budget'); ?>
		<?php echo $form->textField($model,'min_budget',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'min_budget'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'max_budget'); ?>
		<?php echo $form->textField($model,'max_budget',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'max_budget'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'custom_budget_range'); ?>
		<?php echo $form->textField($model,'custom_budget_range',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'custom_budget_range'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_date'); ?>
		<?php echo $form->textField($model,'start_date'); ?>
		<?php echo $form->error($model,'start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_start_preference'); ?>
		<?php echo $form->textField($model,'project_start_preference',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'project_start_preference'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'preferences'); ?>
		<?php echo $form->textField($model,'preferences',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'preferences'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'regions'); ?>
		<?php echo $form->textField($model,'regions',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'regions'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tier'); ?>
		<?php echo $form->textField($model,'tier',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'tier'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'absolute_necessary_language'); ?>
		<?php echo $form->textField($model,'absolute_necessary_language',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'absolute_necessary_language'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'good_know_language'); ?>
		<?php echo $form->textField($model,'good_know_language',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'good_know_language'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'which_one_is_inportant'); ?>
		<?php echo $form->textField($model,'which_one_is_inportant',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'which_one_is_inportant'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'questions_for_supplier'); ?>
		<?php echo $form->textArea($model,'questions_for_supplier',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'questions_for_supplier'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'requirement_change_scale'); ?>
		<?php echo $form->textField($model,'requirement_change_scale',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'requirement_change_scale'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'add_date'); ?>
		<?php echo $form->textField($model,'add_date'); ?>
		<?php echo $form->error($model,'add_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modify_date'); ?>
		<?php echo $form->textField($model,'modify_date'); ?>
		<?php echo $form->error($model,'modify_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_call_scheduled'); ?>
		<?php echo $form->textField($model,'is_call_scheduled',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'is_call_scheduled'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'other_status'); ?>
		<?php echo $form->textField($model,'other_status',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'other_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'current_status'); ?>
		<?php echo $form->textField($model,'current_status',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'current_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_profiles_id'); ?>
		<?php echo $form->textField($model,'client_profiles_id'); ?>
		<?php echo $form->error($model,'client_profiles_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'current_status_id'); ?>
		<?php echo $form->textField($model,'current_status_id'); ?>
		<?php echo $form->error($model,'current_status_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'other_current_status'); ?>
		<?php echo $form->textField($model,'other_current_status',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'other_current_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state'); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->