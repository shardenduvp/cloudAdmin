<?php
/* @var $this EmailLogsController */
/* @var $model EmailLogs */
/* @var $form CActiveForm */
?>

<div class="form-horizontal">

<?php  $form=$this->beginWidget('CActiveForm', array(
	'id'=>'email-logs-form',
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
			<?php echo $form->labelEx($model,'reciver'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
			<?php echo $form->textField($model,'reciver',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'reciver'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'templete'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textField($model,'templete',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'templete'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'other_info',array('size'=>50,'maxlength'=>50)); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textArea($model,'other_info',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'other_info'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'esubject',array('size'=>50,'maxlength'=>50)); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textArea($model,'esubject',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'esubject'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'time'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textField($model,'time',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'time',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'status'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textField($model,'status',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'status',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'user_id'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textField($model,'user_id',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'user_id',array('rows'=>6, 'cols'=>50)); ?>
		</div>
	</div>

	<div class="row">
	  <div class="col-sm-4 tr-align"></div>
	    <div class="col-sm-6 col-offset-sm-2 search-button">
	      <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary button')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>
</div></div></div></div></div>