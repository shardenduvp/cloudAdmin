<?php
/* @var $this SuppliersHasReferencesController */
/* @var $model SuppliersHasReferences */
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
		<?php echo $form->label($model,'project_name'); ?>
		<?php echo $form->textField($model,'project_name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_description'); ?>
		<?php echo $form->textArea($model,'project_description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'company_name'); ?>
		<?php echo $form->textField($model,'company_name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'client_email'); ?>
		<?php echo $form->textField($model,'client_email',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'year_engagement'); ?>
		<?php echo $form->textField($model,'year_engagement',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'communication_rating'); ?>
		<?php echo $form->textField($model,'communication_rating'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'skill_rating'); ?>
		<?php echo $form->textField($model,'skill_rating'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'timeline_rating'); ?>
		<?php echo $form->textField($model,'timeline_rating'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'independence_rating'); ?>
		<?php echo $form->textField($model,'independence_rating'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'provide_do_well'); ?>
		<?php echo $form->textArea($model,'provide_do_well',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'provider_improve'); ?>
		<?php echo $form->textArea($model,'provider_improve',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tag_line'); ?>
		<?php echo $form->textArea($model,'tag_line',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'add_date'); ?>
		<?php echo $form->textField($model,'add_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modified'); ?>
		<?php echo $form->textField($model,'modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'suppliers_id'); ?>
		<?php echo $form->textField($model,'suppliers_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'client_profiles_id'); ?>
		<?php echo $form->textField($model,'client_profiles_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'suppliers_has_portfolio_id'); ?>
		<?php echo $form->textField($model,'suppliers_has_portfolio_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'client_first_name'); ?>
		<?php echo $form->textField($model,'client_first_name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'client_last_name'); ?>
		<?php echo $form->textField($model,'client_last_name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'follow_venturepact'); ?>
		<?php echo $form->textField($model,'follow_venturepact'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_unattributed'); ?>
		<?php echo $form->textField($model,'is_unattributed'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email_hide'); ?>
		<?php echo $form->textField($model,'email_hide'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'review_type'); ?>
		<?php echo $form->textField($model,'review_type'); ?>
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