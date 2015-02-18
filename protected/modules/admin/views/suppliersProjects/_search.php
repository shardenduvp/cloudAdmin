<?php
/* @var $this SuppliersProjectsController */
/* @var $model SuppliersProjects */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pitch'); ?>
		<?php echo $form->textArea($model,'pitch',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'about_project'); ?>
		<?php echo $form->textArea($model,'about_project',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'why_you'); ?>
		<?php echo $form->textArea($model,'why_you',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estimated_cost'); ?>
		<?php echo $form->textField($model,'estimated_cost',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estimated_time'); ?>
		<?php echo $form->textField($model,'estimated_time',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'trial_period'); ?>
		<?php echo $form->textField($model,'trial_period',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'chat_room_id'); ?>
		<?php echo $form->textField($model,'chat_room_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comments'); ?>
		<?php echo $form->textArea($model,'comments',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'min_price'); ?>
		<?php echo $form->textField($model,'min_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'max_price'); ?>
		<?php echo $form->textField($model,'max_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_material'); ?>
		<?php echo $form->textField($model,'time_material',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'billing_schedule'); ?>
		<?php echo $form->textField($model,'billing_schedule',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'start_date'); ?>
		<?php echo $form->textField($model,'start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'note'); ?>
		<?php echo $form->textArea($model,'note',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_escrow'); ?>
		<?php echo $form->textField($model,'is_escrow'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'others'); ?>
		<?php echo $form->textField($model,'others',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'add_date'); ?>
		<?php echo $form->textField($model,'add_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'client_projects_id'); ?>
		<?php echo $form->textField($model,'client_projects_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'suppliers_id'); ?>
		<?php echo $form->textField($model,'suppliers_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'default_q1_ans'); ?>
		<?php echo $form->textArea($model,'default_q1_ans',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'default_q2_ans'); ?>
		<?php echo $form->textArea($model,'default_q2_ans',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'default_q3_ans'); ?>
		<?php echo $form->textArea($model,'default_q3_ans',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'default_q4_ans'); ?>
		<?php echo $form->textArea($model,'default_q4_ans',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'default_q5_ans'); ?>
		<?php echo $form->textArea($model,'default_q5_ans',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'default_q6_ans'); ?>
		<?php echo $form->textArea($model,'default_q6_ans',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->