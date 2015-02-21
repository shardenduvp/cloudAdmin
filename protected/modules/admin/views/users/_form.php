<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<div class="box border inverse">
	<div class="box-title">
		<h4><i class="fa fa-bars"></i>Create Users</h4>
	</div>
	<div class="box-body big">
					<p class="note">Fields with <span class="required">*</span> are required.</p>

					<?php echo $form->errorSummary($model); ?>

					<div class="row"><label class="control-label col-sm-2">
					    <?php echo $form->labelEx($model,'last_name'); ?></label>
						<?php echo $form->textField($model,'last_name',array('size'=>45,'maxlength'=>45),array('class'=>'form-control')); ?>
						<?php echo $form->error($model,'last_name'); ?>
						</div>
					
					<div class="row">
					   <label class="control-label col-sm-2">
						<?php echo $form->labelEx($model,'first_name'); ?></label>
						<?php echo $form->textField($model,'first_name',array('size'=>45,'maxlength'=>45)); ?>
						<?php echo $form->error($model,'first_name'); ?>
						
					</div>

					<div class="row">
						<label class="control-label col-sm-2">
						<?php echo $form->labelEx($model,'image'); ?></label>
						<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>200)); ?>
						<?php echo $form->error($model,'image'); ?>
					</div>

					<div class="row">
						<label class="control-label col-sm-2">
						<?php echo $form->labelEx($model,'company_name'); ?></label>
						<?php echo $form->textField($model,'company_name',array('size'=>60,'maxlength'=>100)); ?>
						<?php echo $form->error($model,'company_name'); ?>
					</div>

					<div class="row">
						<label class="control-label col-sm-2">
						<?php echo $form->labelEx($model,'display_name'); ?></label>
						<?php echo $form->textField($model,'display_name',array('size'=>60,'maxlength'=>100)); ?>
						<?php echo $form->error($model,'display_name'); ?>
					</div>

					<div class="row">
					<label class="control-label col-sm-2">
						<?php echo $form->labelEx($model,'username'); ?></label>
						<?php echo $form->emailField($model,'username',array('size'=>30,'maxlength'=>30)); ?>
						<?php echo $form->error($model,'username'); ?>
					</div>

					<div class="row">
					<label class="control-label col-sm-2">
						<?php echo $form->labelEx($model,'phone_number'); ?></label>
						<?php echo $form->textField($model,'phone_number',array('size'=>25,'maxlength'=>25)); ?>
						<?php echo $form->error($model,'phone_number'); ?>
					</div>

					<div class="row">
					<label class="control-label col-sm-2">
						<?php echo $form->labelEx($model,'password'); ?></label>
						<?php echo $form->passwordField($model,'password',array('size'=>30,'maxlength'=>30)); ?>
						<?php echo $form->error($model,'password'); ?>
					</div>

					<!-- <div class="row">
						<?php echo $form->labelEx($model,'linkedin'); ?><br>
						<?php echo $form->textField($model,'linkedin',array('size'=>60,'maxlength'=>200)); ?>
						<?php echo $form->error($model,'linkedin'); ?>
					</div>
					<br> -->
					<!-- <!-- <div class="row">
						<?php echo $form->labelEx($model,'role'); ?>
						<?php 
							echo CHtml::activeDropDownList($model, 'role',
                     		 array('1'=>'Admin','2'=>'Client','3'=>'Supplier'),
                      		array('empty'=>'Select Roles',""),array('class'=>'form-group control-label'));
						 ?>
						<?php echo $form->error($model,'role'); ?>
					</div> -->
					<br> 
					<div class="row">
					<label class="control-label col-sm-2">
						<?php echo $form->labelEx($model,'add_date'); ?></label>
						<?php // echo $form->textField($model,'add_date');
						 $form->widget('zii.widgets.jui.CJuiDatePicker', array(
						    'model' => $model,
						    'attribute' => 'add_date',
						    'htmlOptions' => array(
						        'size' => '10',         // textField size
						        'maxlength' => '10',    // textField maxlength
						    ),
						));
						 ?>

						<?php echo $form->error($model,'add_date'); ?>
					</div>

					<div class="row">
					<label class="control-label col-sm-2">
						<?php echo $form->labelEx($model,'last_login'); ?></label>
						<?php //echo $form->textField($model,'last_login'); 
							$form->widget('zii.widgets.jui.CJuiDatePicker', array(
						    'model' => $model,
						    'attribute' => 'last_login',
						    'htmlOptions' => array(
						        'size' => '10',         // textField size
						        'maxlength' => '10',    // textField maxlength
						    ),
						));
						?>
						<?php echo $form->error($model,'last_login'); ?>
					</div>

					<div class="row">
						<label class="control-label col-sm-2">
						<?php echo $form->labelEx($model,'status'); ?></label>
						<div class='col-xs-3 col-offset-3'>
							<?php echo $form->radioButton($model,'status',array('value'=>0)); ?>
							<?php echo CHtml::label('Not Verified', ''); ?><br>
							<?php echo $form->radioButton($model,'status',array('value'=>1)); ?>
							<?php echo CHtml::label('Verified', ''); ?>
							<?php echo $form->error($model,'status'); ?>
						</div>
					</div>


					<div class="row">
						<label class="control-label col-sm-2">
						<?php echo $form->labelEx($model,'role_id'); ?></label>
						<?php //echo $form->textField($model,'role_id'); 
							echo CHtml::activeDropDownList($model, 'role_id',
                     		 array('1'=>'Admin','2'=>'Client','3'=>'Supplier'),
                      		array('empty'=>'Select Roles',""),array('class'=>'form-group control-label'));
						?>

						<?php echo $form->error($model,'role_id'); ?>
					</div>
					<br>
					<div class="row buttons">
					<label class="control-label col-sm-2">
						<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-inverse')); ?>
					</label>
					</div>
	</div>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->