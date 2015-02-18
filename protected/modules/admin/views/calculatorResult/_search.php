<?php
/* @var $this CalculatorResultController */
/* @var $model CalculatorResult */
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
		<?php echo $form->label($model,'users_id'); ?>
		<?php echo $form->textField($model,'users_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'question_id'); ?>
		<?php echo $form->textField($model,'question_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'option_id'); ?>
		<?php echo $form->textField($model,'option_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modified'); ?>
		<?php echo $form->textField($model,'modified'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->