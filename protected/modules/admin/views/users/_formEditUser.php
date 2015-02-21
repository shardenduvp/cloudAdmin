<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	'htmlOptions'=>array(
		'class'=>'form-horizontal'
		),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row">
		<div class="col-md-12">
		<div class="box border inverse">
			<div class="box-title">
				<h4><i class="fa fa-bars"></i>General Information</h4>
			</div>
			<div class="box-body big">
				<div class="row">
					<div class="col-md-12">
						<p class="note">Fields with <span class="required">*</span> are required.</p>
						<?php echo $form->errorSummary($model); ?>
						<div id="formResult"></div>
						<h4>Basic Information</h4>
						<div class="form-group">
							<?php echo $form->labelEx($model,'last_name',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php echo $form->textField($model,'last_name',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'last_name'); ?>
							</div>
						</div>

						<div class="form-group">
							<?php echo $form->labelEx($model,'first_name',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php echo $form->textField($model,'first_name',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'first_name'); ?>
							</div>
						</div>

						<div class="form-group">
							<?php echo $form->labelEx($model,'image',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php echo $form->textField($model,'image',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'image'); ?>
							</div>
						</div>

						<div class="form-group">
							<?php echo $form->labelEx($model,'company_name',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php echo $form->textField($model,'company_name',array('size'=>60,'maxlength'=>200,'class'=>'form-control')); ?>
								<?php echo $form->error($model,'company_name'); ?>
							</div>
						</div>

						<div class="form-group">
							<?php echo $form->labelEx($model,'display_name',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php echo $form->textField($model,'display_name',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'display_name'); ?>
							</div>
						</div>

						
						<h4>Account Information</h4>

						<div class="form-group">
							<?php echo $form->labelEx($model,'username',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php echo $form->textField($model,'username',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'username'); ?>
							</div>
						</div>

						<div class="form-group">
							<?php echo $form->labelEx($model,'password',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php echo $form->textField($model,'password',array('class'=>'form-control','value'=>base64_decode($model->password))); ?>
								<?php echo $form->error($model,'password'); ?>
							</div>
						</div>

						<div class="form-group">
							<?php echo $form->labelEx($model,'role_id',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php 
								echo $form->dropDownList($model,'role_id',array('1'=>'Admin','2'=>'Client','3'=>'Supplier'),array('class'=>'form-control'));
								?>
								<?php echo $form->error($model,'password'); ?>
							</div>
						</div>
						
						<div class="form-group">
							<?php echo $form->labelEx($model,'add_date',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php echo $form->textField($model,'add_date',array('class'=>'form-control','disabled'=>'true')); ?>
								<?php echo $form->error($model,'add_date'); ?>
							</div>
						</div>

						<div class="form-group">
							<?php echo $form->labelEx($model,'last_login',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php echo $form->textField($model,'last_login',array('class'=>'form-control','disabled'=>'true')); ?>
								<?php echo $form->error($model,'last_login'); ?>
							</div>
						</div>

						<div class="form-group">
							<?php echo $form->labelEx($model,'role',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php echo $form->textField($model,'role',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'role'); ?>
							</div>
						</div>

						<div class="form-group">
							<?php echo $form->labelEx($model,'status',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php 
								//$status = CHtml::listData($model->role0->findAll(),'name','name');
								echo $form->dropDownList($model,'status',array('1'=>'Verified','0'=>'Not-Verified'),array('class'=>'form-control'));
								?>
								<?php echo $form->error($model,'password'); ?>
							</div>
						</div>

						<h4>Contact Information</h4>

						<div class="form-group">
							<?php echo $form->labelEx($model,'phone_number',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php echo $form->numberField($model,'phone_number',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'phone_number'); ?>
							</div>
						</div>

						<div class="form-group">
							<?php echo $form->labelEx($model,'linkedin',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php echo $form->textField($model,'linkedin',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'linkedin'); ?>
							</div>
						</div>
		</div>
				</div>
			</div>
		</div>
		</div>
	</div>

<div class="form-actions clearfix"> <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Update',array('class'=>'btn btn-primary pull-right'));

 // echo CHtml::ajaxSubmitButton('Save',CHtml::normalizeUrl(array('admin/users/update&id='.$model->id,'render'=>true)),
 //                 array(
 //                     'dataType'=>'json',
 //                     'type'=>'post',
 //                     'success'=>'function(data) { 
 //                        if(data.status=="success"){
 //                         $("#formResult").html("form submitted successfully.");

 //                        }
 //                         else{
 //                        $("#formResult").html("form doent submitted successfully.");
 //                        }       
 //                    }'
 //                     ),array('id'=>'mybtn','class'=>'btn btn-primary pull-right')); 
               ?>


  </div>
<?php $this->endWidget(); ?>
</div><!-- form -->

