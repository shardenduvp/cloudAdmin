<?php
/* @var $this EmailLogsController */
/* @var $model EmailLogs */
/* @var $form CActiveForm */
?>

<div class="form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'email-logs-form',
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'enableAjaxValidation'=>false,
)); ?>

<!--
<?php /* $form=$this->beginWidget('CActiveForm', array(
	'id'=>'email-logs-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); */?>
-->

<div class="row">
		<div class="col-md-12">
		<p class="note">Fields with <span class="required">*</span> are required.</p>
			<div class="box border inverse mb0">
				<div class="box-title">
					<h4><i class="fa fa-search"></i>Update Email Logs</h4>
				</div>

			<div class="box-body big" >
			<?php echo $form->errorSummary($model); ?>
			        
	<div class="form-group">
		<div class="col-sm-4 tr-align">
			<?php echo $form->labelEx($model,'reciver'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
			<?php echo $form->textField($model,'reciver',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'reciver'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'templete'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textField($model,'templete',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'templete'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'esubject'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textArea($model,'esubject',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'esubject'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'time'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textField($model,'time'); ?>
		<?php echo $form->error($model,'time'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'status'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'other_info'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textArea($model,'other_info',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'other_info'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'user_id'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
		</div>
	</div>

	<div class="row">
	  <div class="col-sm-4 tr-align"></div>
	    <div class="col-sm-6 col-offset-sm-2 search-button">
	      <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>
</div></div></div></div></div>