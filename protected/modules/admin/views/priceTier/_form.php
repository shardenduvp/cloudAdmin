<?php
/* @var $this PriceTierController */
/* @var $model PriceTier */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'price-tier-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'min_price'); ?>
		<?php echo $form->textField($model,'min_price',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'min_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'max_price'); ?>
		<?php echo $form->textField($model,'max_price',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'max_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'d_min_price'); ?>
		<?php echo $form->textField($model,'d_min_price',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'d_min_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'d_max_price'); ?>
		<?php echo $form->textField($model,'d_max_price',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'d_max_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'d_description'); ?>
		<?php echo $form->textArea($model,'d_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'d_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price_zone'); ?>
		<?php echo $form->textField($model,'price_zone'); ?>
		<?php echo $form->error($model,'price_zone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price_zone_id'); ?>
		<?php echo $form->textField($model,'price_zone_id'); ?>
		<?php echo $form->error($model,'price_zone_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->