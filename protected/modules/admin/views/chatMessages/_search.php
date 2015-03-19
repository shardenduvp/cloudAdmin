<?php
/* @var $this ChatMessagesController */
/* @var $model ChatMessages */
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
		<?php echo $form->label($model,'chat_template_id'); ?>
		<?php echo $form->textField($model,'chat_template_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'chat_message_has_user_id'); ?>
		<?php echo $form->textField($model,'chat_message_has_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'message'); ?>
		<?php echo $form->textArea($model,'message',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ip_address'); ?>
		<?php echo $form->textField($model,'ip_address',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sender_type'); ?>
		<?php echo $form->textField($model,'sender_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'add_date'); ?>
		<?php echo $form->textField($model,'add_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'chat_room_id'); ?>
		<?php echo $form->textField($model,'chat_room_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'proposal_id'); ?>
		<?php echo $form->textField($model,'proposal_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_sent_from_supplier'); ?>
		<?php echo $form->textField($model,'is_sent_from_supplier'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->