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
	'enableAjaxValidation'=>true,
)); ?>

	<div class="row">
		<div class="col-md-12">
		<div class="box border inverse">
			<div class="box-title">
				<h4><i class="fa fa-bars"></i>Users Profile Information</h4>
			</div>
			<div class="box-body big">
				<div class="row">
					<div class="col-md-12">
						<p class="note">Fields with <span class="required">*</span> are required.</p>
						<?php echo $form->errorSummary($model); ?>
						
						<div class="hide-div alert alert-dismissible" role="alert"
						id="formResultDiv">
  						
  						<span id="formResult"></span>
						</div>

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
								<?php echo $form->emailField($model,'username',array('class'=>'form-control')); ?>
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
								<?php echo $form->error($model,'role_id'); ?>
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
							<?php echo $form->labelEx($model,'status',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php 
								//$status = CHtml::listData($model->role0->findAll(),'name','name');
								echo $form->dropDownList($model,'status',array('1'=>'Verified','0'=>'Not-Verified'),array('class'=>'form-control'));
								?>
								<?php echo $form->error($model,'status'); ?>
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

<div class="form-actions clearfix"> 
<?php 

echo CHtml::ajaxSubmitButton('Update',CHtml::normalizeUrl(array('users/update','id'=>$model->id)),
                 array(
                     'dataType'=>'json',
                     'type'=>'post',
                     'beforeSend'=>'function(){
                     	$("#updateBtnUser").button("loading");
                     }',
                     'success'=>'function(data) { 
                        if(data.status == "success" ){
                        $("#formResultDiv").removeClass("hide-div");
                        $("#formResultDiv").removeClass("alert-warning");
                        $("#formResultDiv").addClass("alert-success");
                        $("#formResult").html("Updated Successfully .");

                         $("#updateBtnUser").button("reset");

                        }
                         else{
                         $("#formResultDiv").removeClass("hide-div");
                         $("#formResultDiv").removeClass("alert-success");
                         $("#formResultDiv").addClass("alert-warning");
						 $("#formResult").html("Something Went Wrong .");

						  $("#updateBtnUser").button("reset");

                        }       
                    }',
                    'error'=>'function(){
                    	$("#formResultDiv").removeClass("hide-div");
                    	$("#formResultDiv").removeClass("alert-success");
                         $("#formResultDiv").addClass("alert-warning");
						 $("#formResult").html("Something Went Wrong .");

						  $("#updateBtnUser").button("reset");

                    }'
                     ),array('id'=>'updateBtnUser','class'=>'btn btn-primary pull-right',
                     'data-loading-text'=>'Updating ...','autocomplete'=>'off',
                     )); 
?>


  </div>
<?php $this->endWidget(); ?>
</div><!-- form -->

