<?php
/* @var $this ChatRoomController */
/* @var $model ChatRoom */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'chat-room-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'users_id'); ?>
		<?php echo $form->textField($model,'users_id'); ?>
		<?php echo $form->error($model,'users_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'room_type'); ?>
		<?php echo $form->textField($model,'room_type',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'room_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'proposal_id'); ?>
		<?php echo $form->textField($model,'proposal_id'); ?>
		<?php echo $form->error($model,'proposal_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'room_name'); ?>
		<?php echo $form->textField($model,'room_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'room_name'); ?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->