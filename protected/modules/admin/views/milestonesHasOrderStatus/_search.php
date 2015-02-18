<?php
/* @var $this MilestonesHasOrderStatusController */
/* @var $model MilestonesHasOrderStatus */
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
		<?php echo $form->label($model,'supplier_milestones_id'); ?>
		<?php echo $form->textField($model,'supplier_milestones_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'old_status'); ?>
		<?php echo $form->textField($model,'old_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'new_status'); ?>
		<?php echo $form->textField($model,'new_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'note'); ?>
		<?php echo $form->textArea($model,'note',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->