<?php
/* @var $this SuppliersProjectsController */
/* @var $model SuppliersProjects */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'suppliers-projects-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'pitch'); ?>
		<?php echo $form->textArea($model,'pitch',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'pitch'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'about_project'); ?>
		<?php echo $form->textArea($model,'about_project',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'about_project'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'why_you'); ?>
		<?php echo $form->textArea($model,'why_you',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'why_you'); ?>
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
		<?php echo $form->labelEx($model,'trial_period'); ?>
		<?php echo $form->textField($model,'trial_period',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'trial_period'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'chat_room_id'); ?>
		<?php echo $form->textField($model,'chat_room_id'); ?>
		<?php echo $form->error($model,'chat_room_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comments'); ?>
		<?php echo $form->textArea($model,'comments',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comments'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'min_price'); ?>
		<?php echo $form->textField($model,'min_price'); ?>
		<?php echo $form->error($model,'min_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'max_price'); ?>
		<?php echo $form->textField($model,'max_price'); ?>
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
		<?php echo $form->labelEx($model,'start_date'); ?>
		<?php echo $form->textField($model,'start_date'); ?>
		<?php echo $form->error($model,'start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textArea($model,'note',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_escrow'); ?>
		<?php echo $form->textField($model,'is_escrow'); ?>
		<?php echo $form->error($model,'is_escrow'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'others'); ?>
		<?php echo $form->textField($model,'others',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'others'); ?>
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
		<?php echo $form->labelEx($model,'client_projects_id'); ?>
		<?php echo $form->textField($model,'client_projects_id'); ?>
		<?php echo $form->error($model,'client_projects_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'suppliers_id'); ?>
		<?php echo $form->textField($model,'suppliers_id'); ?>
		<?php echo $form->error($model,'suppliers_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'default_q1_ans'); ?>
		<?php echo $form->textArea($model,'default_q1_ans',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'default_q1_ans'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'default_q2_ans'); ?>
		<?php echo $form->textArea($model,'default_q2_ans',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'default_q2_ans'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'default_q3_ans'); ?>
		<?php echo $form->textArea($model,'default_q3_ans',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'default_q3_ans'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'default_q4_ans'); ?>
		<?php echo $form->textArea($model,'default_q4_ans',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'default_q4_ans'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'default_q5_ans'); ?>
		<?php echo $form->textArea($model,'default_q5_ans',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'default_q5_ans'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'default_q6_ans'); ?>
		<?php echo $form->textArea($model,'default_q6_ans',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'default_q6_ans'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->