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
		<div class="col-md-8">
		<div class="box border inverse">
			<div class="box-title">
				<h4><i class="fa fa-bars"></i>Create Users</h4>
			</div>
			<div class="box-body big">
				<div class="row">
					<div class="col-md-10">
						<?php echo $form->errorSummary($model); ?>
						<div id="formResult"></div>

					<?php echo $form->errorSummary($model); ?>

					<div class="form-group">
						<?php echo $form->labelEx($model,'first_name',array('class'=>'col-md-4 control-label')); ?>
						<div class="col-md-8">
						<?php echo $form->textField($model,'first_name',array('class'=>'form-control')); ?>
						<?php echo $form->error($model,'first_name'); ?>
						</div>
					</div>

					<div class="form-group">
					    <?php echo $form->labelEx($model,'last_name',array('class'=>'col-md-4 control-label')); ?>
						<div class="col-md-8">
						<?php echo $form->textField($model,'last_name',array('class'=>'form-control')); ?>
						<?php echo $form->error($model,'last_name'); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo $form->labelEx($model,'image',array('class'=>'col-md-4 control-label')); ?>
						<div class="col-md-8">
							<div class="input-group">
								<?php echo $form->textField($model,'image',array('class'=>'form-control','readonly'=>'true','id'=>'image')); ?>
                            	<span class="input-group-btn ">
                                    <div class="btn btn-primary">
                                        <a href="javascript:void(0)" style="color:#FFF;text-decoration:none;" id="openBrow">Browse </a>
                                    </div>
                                </span>
                        	</div>
						</div>
						<?php echo $form->error($model,'image'); ?>
					</div>

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
						<?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
						<?php echo $form->error($model,'password'); ?>
						</div>
					</div>

					<div class="form-group">
					<?php echo $form->labelEx($model,'role_id',array('class'=>'col-md-4 control-label')); ?>
						<div class="col-md-4">
						<?php //echo $form->textField($model,'role_id'); 
							echo CHtml::activeDropDownList($model, 'role_id',
                     		 array('1'=>'Admin','2'=>'Client','3'=>'Supplier'),
                      		array('empty'=>'Select Roles',"",'class'=>'form-control'));
						?>
						<?php echo $form->error($model,'role_id'); ?>
						</div>
					</div>

					<div class="form-group pull-right">
						<div class="col-md-12">
							<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-inverse pull-right')); ?>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
					
			
	

<?php $this->endWidget(); ?>
					
</div><!-- form -->

<script>
$('#openBrow').click(function(){
	filepicker.setKey("AlqJxqOBnROGcRhBT1jPFz");
	filepicker.pickMultiple({mimetypes: ['image/*'],},
	function(InkBlob){
		for(i in InkBlob){
			var docs = $('#docs').val();
			docs = docs+InkBlob[i].mimetype+"|"+InkBlob[i].filename+"|"+InkBlob[i].size+"|"+InkBlob[i].url+",";
    		$('#docs').val(docs);
			var data =InkBlob[i].url;
			$('#image').val(data);
		}
		console.log($('#docs').val());
	},
	function(FPError){
		console.log(FPError.toString());
  	}
	);
});
</script>