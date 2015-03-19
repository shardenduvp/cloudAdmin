<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="box">
  <div class="panel-body">
    <div class="row">

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
		));
		?>

		<div class="col-md-12">

			<!-- Error Fields -->
			<div class="row">
				<div class="col-md-12">
					<?php echo $form->errorSummary($model); ?>
						<div class="hide-div alert alert-dismissible" role="alert" id="formResultDiv">
					  	<span id="formResult"></span>
						</div>
				</div>
			</div>

			<!-- Form Groups -->
			<div class="row">
				<!-- Profile Image -->
        <div class="col-md-2" align="center">
          <img alt="User Pic"
            class="img-circle"
            id="user_pic"
            style="width:100px;height:100px;"
            src="<?php if($model->image==null){
                    echo Yii::app()->theme->baseUrl."/adminPanel/img/user.png";
                  }else{
                    echo $model->image;
                  }
                  ?>"
          />
          <!-- Image File Picker -->
          <div class="btn btn-link">
						<?php echo $form->hiddenField($model,'image',array('class'=>'form-control','readonly'=>'true','id'=>'image')); ?>
						<a href="javascript:void(0)" id="openBrow">Browse</a>
            <?php echo $form->error($model,'image'); ?>
          </div>
        </div>
        <!-- Edit Basic Information -->
        <div class="col-md-10">
        	<div class="row">
        		<div class="col-md-5 col-md-offset-1">
        			<div class="form-group">
        				<?php echo $form->labelEx($model,'first_name',array('class'=>'control-label')); ?>
        				<?php echo $form->textField($model,'first_name',array('class'=>'form-control')); ?>
        				<?php echo $form->error($model,'first_name'); ?>
        			</div>
        		</div>
        		<div class="col-md-5 col-md-offset-1">
        			<div class="form-group">
        				<?php echo $form->labelEx($model,'last_name',array('class'=>'control-label')); ?>
        				<?php echo $form->textField($model,'last_name',array('class'=>'form-control')); ?>
        				<?php echo $form->error($model,'last_name'); ?>
        			</div>
        		</div>
        	</div>
        	<div class="row">
        		<div class="col-md-5 col-md-offset-1">
        			<div class="form-group">
        				<?php echo $form->labelEx($model,'company_name',array('class'=>'control-label')); ?>
        				<?php echo $form->textField($model,'company_name',array('class'=>'form-control')); ?>
        				<?php echo $form->error($model,'company_name'); ?>
        			</div>
        		</div>
        		<div class="col-md-5 col-md-offset-1">
        			<div class="form-group">
        				<?php echo $form->labelEx($model,'display_name',array('class'=>'control-label')); ?>
        				<?php echo $form->textField($model,'display_name',array('class'=>'form-control')); ?>
        				<?php echo $form->error($model,'display_name'); ?>
        			</div>
        		</div>
        	</div>
        </div>
			</div>

			<hr/>
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							<h4>Account Information</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group ps10">
							<?php echo $form->labelEx($model,'username',array('class'=>'control-label')); ?>
							<?php echo $form->emailField($model,'username',array('class'=>'form-control')); ?>
							<?php echo $form->error($model,'username'); ?>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group ps10">
        				<?php echo $form->labelEx($model,'password',array('class'=>'control-label')); ?>
        				<?php echo $form->passwordField($model,'password',array('class'=>'form-control', 'value'=>base64_decode($model->password))); ?>
        				<?php echo $form->error($model,'password'); ?>
        			</div>
						</div>
						<div class="col-md-4">
							<div class="form-group ps10">
								<?php echo $form->labelEx($model,'role_id',array('class'=>'control-label')); ?>
								<?php echo $form->dropDownList($model,'role_id',array('1'=>'Admin','2'=>'Client','3'=>'Supplier'),array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'role_id'); ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group ps10">
								<?php echo $form->labelEx($model,'add_date',array('class'=>'control-label')); ?>
								<?php echo $form->textField($model,'add_date',array('class'=>'form-control','disabled'=>'true')); ?>
								<?php echo $form->error($model,'add_date'); ?>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group ps10">
								<?php echo $form->labelEx($model,'last_login',array('class'=>'control-label')); ?>
								<?php echo $form->textField($model,'last_login',array('class'=>'form-control','disabled'=>'true')); ?>
								<?php echo $form->error($model,'last_login'); ?>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group ps10">
								<?php echo $form->labelEx($model,'status',array('class'=>'control-label')); ?>
								<?php echo $form->dropDownList($model,'status',array('1'=>'Verified','0'=>'Not-Verified'),array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'status'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<hr/>

			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							<h4>Contact Information</h4>
						</div>
					</div>
					<div class="row">
        		<div class="col-md-6">
        			<div class="form-group ps10">
        				<?php echo $form->labelEx($model,'phone_number',array('class'=>'control-label')); ?>
        				<?php echo $form->textField($model,'phone_number',array('class'=>'form-control')); ?>
        				<?php echo $form->error($model,'phone_number'); ?>
        			</div>
        		</div>
        		<div class="col-md-6">
        			<div class="form-group ps10">
        				<?php echo $form->labelEx($model,'linkedin',array('class'=>'control-label')); ?>
        				<?php echo $form->textField($model,'linkedin',array('class'=>'form-control')); ?>
        				<?php echo $form->error($model,'linkedin'); ?>
        			</div>
        		</div>
        	</div>
				</div>
			</div>
			
			<hr/>
			<div class="row">
				<div class="col-md-12">
					<div> 
					<?php 
						echo CHtml::ajaxSubmitButton('Update User Details',CHtml::normalizeUrl(array('users/update','id'=>$model->id)),
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
									} else{
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
					    ),
							array('id'=>'updateBtnUser','class'=>'btn btn-primary pull-right', 'style'=>'width:150px',
					    			'data-loading-text'=>'Updating ...','autocomplete'=>'off',
							)
					); 
					?>
					</div>
				</div>
			</div>

		</div>

		<?php $this->endWidget(); ?>

		</div>
	</div>
</div>

				<!-- <div class="row"> -->
					<!-- <div class="col-md-12"> -->
						<?php // echo $form->errorSummary($model); ?>
						
						<!-- <div class="hide-div alert alert-dismissible" role="alert"
						id="formResultDiv">
  						<span id="formResult"></span>
						</div> -->

						<!-- <h4>Basic Information</h4>
						<div class="form-group">
							<?php //echo $form->labelEx($model,'last_name',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php //echo $form->textField($model,'last_name',array('class'=>'form-control')); ?>
								<?php //echo $form->error($model,'last_name'); ?>
							</div>
						</div>

						<div class="form-group">
							<?php //echo $form->labelEx($model,'first_name',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php //echo $form->textField($model,'first_name',array('class'=>'form-control')); ?>
								<?php //echo $form->error($model,'first_name'); ?>
							</div>
						</div>
						
						<div class="form-group">
							<?php //echo $form->labelEx($model,'image',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
							<div class="input-group">
							<?php //echo $form->textField($model,'image',array('class'=>'form-control','readonly'=>'true','id'=>'image')); ?>
                            	<span class="input-group-btn ">
                                <div class="btn btn-primary">
                                  <a href="javascript:void(0)" style="color:#FFF;text-decoration:none;" id="openBrow">Browse </a>
                                </div>
                              </span>
							</div>
							</div>
							<?php //echo $form->error($model,'image'); ?>
						</div>

						<div class="form-group">
							<?php //echo $form->labelEx($model,'company_name',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php //echo $form->textField($model,'company_name',array('size'=>60,'maxlength'=>200,'class'=>'form-control')); ?>
								<?php //echo $form->error($model,'company_name'); ?>
							</div>
						</div>

						<div class="form-group">
							<?php //echo $form->labelEx($model,'display_name',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php //echo $form->textField($model,'display_name',array('class'=>'form-control')); ?>
								<?php //echo $form->error($model,'display_name'); ?>
							</div>
						</div> -->

						
						<!-- <h4>Account Information</h4>

						<div class="form-group">
							<?php // echo $form->labelEx($model,'username',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php // echo $form->emailField($model,'username',array('class'=>'form-control')); ?>
								<?php // echo $form->error($model,'username'); ?>
							</div>
						</div>

						<div class="form-group">
							<?php // echo $form->labelEx($model,'password',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php // echo $form->textField($model,'password',array('class'=>'form-control','value'=>base64_decode($model->password))); ?>
								<?php // echo $form->error($model,'password'); ?>
							</div>
						</div>

						<div class="form-group">
							<?php // echo $form->labelEx($model,'role_id',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php 
								// echo $form->dropDownList($model,'role_id',array('1'=>'Admin','2'=>'Client','3'=>'Supplier'),array('class'=>'form-control'));
								?>
								<?php // echo $form->error($model,'role_id'); ?>
							</div>
						</div>
						
						<div class="form-group">
							<?php // echo $form->labelEx($model,'add_date',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php // echo $form->textField($model,'add_date',array('class'=>'form-control','disabled'=>'true')); ?>
								<?php // echo $form->error($model,'add_date'); ?>
							</div>
						</div>

						<div class="form-group">
							<?php // echo $form->labelEx($model,'last_login',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php // echo $form->textField($model,'last_login',array('class'=>'form-control','disabled'=>'true')); ?>
								<?php // echo $form->error($model,'last_login'); ?>
							</div>
						</div>


						<div class="form-group">
							<?php // echo $form->labelEx($model,'status',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php 
								//$status = CHtml::listData($model->role0->findAll(),'name','name');
								// echo $form->dropDownList($model,'status',array('1'=>'Verified','0'=>'Not-Verified'),array('class'=>'form-control'));
								?>
								<?php // echo $form->error($model,'status'); ?>
							</div>
						</div>

						<h4>Contact Information</h4>

						<div class="form-group">
							<?php // echo $form->labelEx($model,'phone_number',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php // echo $form->numberField($model,'phone_number',array('class'=>'form-control')); ?>
								<?php // echo $form->error($model,'phone_number'); ?>
							</div>
						</div>

						<div class="form-group">
							<?php // echo $form->labelEx($model,'linkedin',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php // echo $form->textField($model,'linkedin',array('class'=>'form-control')); ?>
								<?php // echo $form->error($model,'linkedin'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div> -->

<script>
$('#openBrow').click(function(){
	filepicker.setKey("AlqJxqOBnROGcRhBT1jPFz");
	filepicker.pick({mimetypes: ['image/*'],},
	function(InkBlob){
		var data =InkBlob.url;
		$('#user_pic').attr('src',data);
		$('#image').val(data);
	},
	function(FPError){
		console.log(FPError.toString());
  	}
	);
});
</script>