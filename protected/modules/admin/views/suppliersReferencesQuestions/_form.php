<?php
/* @var $this SuppliersReferencesQuestionsController */
/* @var $model SuppliersReferencesQuestions */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'suppliers-references-questions-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'review_questions_id'); ?>
		<?php echo $form->textField($model,'review_questions_id'); ?>
		<?php echo $form->error($model,'review_questions_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'suppliers_has_references_id'); ?>
		<?php echo $form->textField($model,'suppliers_has_references_id'); ?>
		<?php echo $form->error($model,'suppliers_has_references_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'answers'); ?>
		<?php echo $form->textArea($model,'answers',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'answers'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rating'); ?>
		<?php echo $form->textField($model,'rating',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'rating'); ?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->