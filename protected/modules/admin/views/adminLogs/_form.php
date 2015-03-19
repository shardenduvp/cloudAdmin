<?php
/* @var $this AdminLogsController */
/* @var $model AdminLogs */
/* @var $form CActiveForm */
?>

<div class="form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'admin-logs-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<div class="row">
		<div class="col-md-12">
			<div class="box border inverse mb0">
				<div class="box-title">
					<h4><i class="fa fa-search"></i>Update Email Logs</h4>
				</div>
			<div class="box-body big" >
			<?php echo $form->errorSummary($model); ?>
		   
	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'username'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textField($model,'username',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'username'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'ipaddress'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textField($model,'ipaddress',array('size'=>50,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'ipaddress'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'logtime'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textField($model,'logtime',array('size'=>50,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'logtime'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'controller'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textField($model,'controller',array('size'=>50,'maxlength'=>250));?>
		<?php echo $form->error($model,'controller'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'action'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textField($model,'action',array('size'=>50,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'action'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'details'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textArea($model,'details',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'details'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'browser'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textArea($model,'browser',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'browser'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'query_string'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textArea($model,'query_string',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'query_string'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'refer_url'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textArea($model,'refer_url',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'refer_url'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'user_id'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textField($model,'user_id',array('size'=>50,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'user_id'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'request_url'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textArea($model,'request_url',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'request_url'); ?>
		</div>
	</div>

	<div class="row">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->