<?php
/* @var $this ClientProfilesHasCitiesController */
/* @var $model ClientProfilesHasCities */
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
		<?php echo $form->label($model,'client_profiles_id'); ?>
		<?php echo $form->textField($model,'client_profiles_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cities_id'); ?>
		<?php echo $form->textField($model,'cities_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_main'); ?>
		<?php echo $form->textField($model,'is_main'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'add_date'); ?>
		<?php echo $form->textField($model,'add_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->