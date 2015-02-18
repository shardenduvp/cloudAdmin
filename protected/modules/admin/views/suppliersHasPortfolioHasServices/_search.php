<?php
/* @var $this SuppliersHasPortfolioHasServicesController */
/* @var $model SuppliersHasPortfolioHasServices */
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
		<?php echo $form->label($model,'suppliers_has_portfolio_id'); ?>
		<?php echo $form->textField($model,'suppliers_has_portfolio_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'services_id'); ?>
		<?php echo $form->textField($model,'services_id'); ?>
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