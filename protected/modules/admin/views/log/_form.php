<?php
/* @var $this LogController */
/* @var $model Log */
/* @var $form CActiveForm */
?>

<div class="form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'log-form',
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
		<?php echo $form->labelEx($model,'proposal_id'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textField($model,'proposal_id'); ?>
		<?php echo $form->error($model,'proposal_id'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'project_status'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textField($model,'project_status'); ?>
		<?php echo $form->error($model,'project_status'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'is_checked'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textField($model,'is_checked'); ?>
		<?php echo $form->error($model,'is_checked'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'title'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textField($model,'title',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'title'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'description'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>245)); ?>
		<?php echo $form->error($model,'description'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'add_date'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textField($model,'add_date'); ?>
		<?php echo $form->error($model,'add_date'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'update_date'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textField($model,'update_date'); ?>
		<?php echo $form->error($model,'update_date'); ?>
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
		<?php echo $form->labelEx($model,'for_user'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textField($model,'for_user'); ?>
		<?php echo $form->error($model,'for_user'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'notification'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textField($model,'notification'); ?>
		<?php echo $form->error($model,'notification'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'is_read'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textField($model,'is_read'); ?>
		<?php echo $form->error($model,'is_read'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'is_active'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textField($model,'is_active'); ?>
		<?php echo $form->error($model,'is_active'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4 tr-align">
		<?php echo $form->labelEx($model,'login_id'); ?>
		</div>
		<div class="col-sm-6 col-offset-sm-2">
		<?php echo $form->textField($model,'login_id'); ?>
		<?php echo $form->error($model,'login_id'); ?>
		</div>
	</div>

	<div class="row">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->