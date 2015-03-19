<?php
/* @var $this SuppliersHasReferencesController */
/* @var $model SuppliersHasReferences */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'suppliers-has-references-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'project_name'); ?>
		<?php echo $form->textField($model,'project_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'project_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_description'); ?>
		<?php echo $form->textArea($model,'project_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'project_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'company_name'); ?>
		<?php echo $form->textField($model,'company_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'company_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_email'); ?>
		<?php echo $form->textField($model,'client_email',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'client_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year_engagement'); ?>
		<?php echo $form->textField($model,'year_engagement',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'year_engagement'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_published'); ?>
		<?php echo $form->textField($model,'is_published'); ?>
		<?php echo $form->error($model,'is_published'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'skill_rating'); ?>
		<?php echo $form->textField($model,'skill_rating'); ?>
		<?php echo $form->error($model,'skill_rating'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'timeline_rating'); ?>
		<?php echo $form->textField($model,'timeline_rating'); ?>
		<?php echo $form->error($model,'timeline_rating'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'independence_rating'); ?>
		<?php echo $form->textField($model,'independence_rating'); ?>
		<?php echo $form->error($model,'independence_rating'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'provide_do_well'); ?>
		<?php echo $form->textArea($model,'provide_do_well',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'provide_do_well'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'provider_improve'); ?>
		<?php echo $form->textArea($model,'provider_improve',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'provider_improve'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tag_line'); ?>
		<?php echo $form->textArea($model,'tag_line',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'tag_line'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'add_date'); ?>
		<?php echo $form->textField($model,'add_date'); ?>
		<?php echo $form->error($model,'add_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified'); ?>
		<?php echo $form->textField($model,'modified'); ?>
		<?php echo $form->error($model,'modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'suppliers_id'); ?>
		<?php echo $form->textField($model,'suppliers_id'); ?>
		<?php echo $form->error($model,'suppliers_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_profiles_id'); ?>
		<?php echo $form->textField($model,'client_profiles_id'); ?>
		<?php echo $form->error($model,'client_profiles_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'suppliers_has_portfolio_id'); ?>
		<?php echo $form->textField($model,'suppliers_has_portfolio_id'); ?>
		<?php echo $form->error($model,'suppliers_has_portfolio_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_first_name'); ?>
		<?php echo $form->textField($model,'client_first_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'client_first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_last_name'); ?>
		<?php echo $form->textField($model,'client_last_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'client_last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'follow_venturepact'); ?>
		<?php echo $form->textField($model,'follow_venturepact'); ?>
		<?php echo $form->error($model,'follow_venturepact'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_unattributed'); ?>
		<?php echo $form->textField($model,'is_unattributed'); ?>
		<?php echo $form->error($model,'is_unattributed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_hide'); ?>
		<?php echo $form->textField($model,'email_hide'); ?>
		<?php echo $form->error($model,'email_hide'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'review_type'); ?>
		<?php echo $form->textField($model,'review_type'); ?>
		<?php echo $form->error($model,'review_type'); ?>
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