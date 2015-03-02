<?php
/* @var $this SupplierHasMilestonesController */
/* @var $model SupplierHasMilestones */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'supplier-has-milestones-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'module'); ?>
		<?php echo $form->textArea($model,'module',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'module'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_date'); ?>
		<?php echo $form->textField($model,'start_date'); ?>
		<?php echo $form->error($model,'start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end_date'); ?>
		<?php echo $form->textField($model,'end_date'); ?>
		<?php echo $form->error($model,'end_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount'); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'transaction'); ?>
		<?php echo $form->textField($model,'transaction',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'transaction'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textArea($model,'note',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reminder_date'); ?>
		<?php echo $form->textField($model,'reminder_date'); ?>
		<?php echo $form->error($model,'reminder_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'milestone_title'); ?>
		<?php echo $form->textField($model,'milestone_title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'milestone_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'overview'); ?>
		<?php echo $form->textArea($model,'overview',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'overview'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'due_date'); ?>
		<?php echo $form->textField($model,'due_date'); ?>
		<?php echo $form->error($model,'due_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_schedule_payment'); ?>
		<?php echo $form->textField($model,'is_schedule_payment'); ?>
		<?php echo $form->error($model,'is_schedule_payment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'suppliers_id'); ?>
		<?php echo $form->textField($model,'suppliers_id'); ?>
		<?php echo $form->error($model,'suppliers_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'supplier_proposal_id'); ?>
		<?php echo $form->textField($model,'supplier_proposal_id'); ?>
		<?php echo $form->error($model,'supplier_proposal_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->