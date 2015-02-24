
<?php
/* @var $this SuppliersController */
/* @var $model Suppliers */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'suppliers-form',
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
				<h4><i class="fa fa-bars"></i>Supplier Information</h4>
			</div>
			<div class="box-body big">
				<div class="row">
					<div class="col-md-12">
							<p class="note">Fields with <span class="required">*</span> are required.</p>

							<?php echo $form->errorSummary($model); ?>
							<div class="alert alert-dismissible hide-div" role="alert"
						id="formResultDivSupplier">
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  							<span aria-hidden="true">&times;</span>
  						</button>
  						<span id="formResultSupplier"></span>
						</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'id',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'id',array('class'=>'form-control','disabled'=>'true')); ?>
								<?php echo $form->error($model,'id'); ?>
								</div>
							</div>
						    
							<h4>Contact Information</h4>
							<div class="form-group">
								<?php echo $form->labelEx($model,'name',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'name',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'name'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'skype_id',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'skype_id',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'skype_id'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'website',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'website',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'website'); ?>
								</div>
							</div>
							

							<div class="form-group">
								<?php echo $form->labelEx($model,'facebook',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'facebook',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'facebook'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'google',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'google',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'google'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'twitter',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'twitter',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'twitter'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'you_tube',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'you_tube',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'you_tube'); ?>
								</div>
							</div>

							<h4>Company Information</h4>
							<div class="form-group">
								<?php echo $form->labelEx($model,'tagline',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'tagline',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'tagline'); ?>
								</div>
							</div>
							<div class="form-group">
								<?php echo $form->labelEx($model,'cover',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'cover',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'cover'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'logo',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'logo',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'logo'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'about_company',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textArea($model,'about_company',array('rows'=>6, 'cols'=>50),array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'about_company'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'foundation_year',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'foundation_year',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'foundation_year'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'short_description',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'short_description',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'short_description'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'details',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textArea($model,'details',array('rows'=>6, 'cols'=>50),array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'details'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'location',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'location',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'location'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'pricing_details',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'pricing_details',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'pricing_details'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'min_price',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'min_price',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'min_price'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'number_of_employee',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'number_of_employee',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'number_of_employee'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'total_available_employee',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'total_available_employee',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'total_available_employee'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'consultation_description',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textArea($model,'consultation_description',array('rows'=>6, 'cols'=>50),array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'consultation_description'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'standard_pitch',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'standard_pitch',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'standard_pitch'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'standard_service_agreement',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'standard_service_agreement',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'standard_service_agreement'); ?>
								</div>
							</div>


							<div class="form-group">
								<?php echo $form->labelEx($model,'rough_estimate',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textArea($model,'rough_estimate',array('rows'=>6, 'cols'=>50),array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'rough_estimate'); ?>
								</div>
							</div>

							
							<div class="form-group">
								<?php echo $form->labelEx($model,'per_hour_rate',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'per_hour_rate',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'per_hour_rate'); ?>
								</div>
							</div>
							<h4>Project Information</h4>
							<div class="form-group">
								<?php echo $form->labelEx($model,'project_size',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'project_size',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'project_size'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'web_references',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'web_references',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'web_references'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'development_location',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'development_location',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'development_location'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'sales_location',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'sales_location',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'sales_location'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'response_time',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'response_time',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'response_time'); ?>
								</div>
							</div>

							<h4>FAQ</h4>
							<div class="form-group">
								<?php echo $form->labelEx($model,'default_q3_ans',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textArea($model,'default_q3_ans',array('rows'=>6, 'cols'=>50),array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'default_q3_ans'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'default_q2_ans',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textArea($model,'default_q2_ans',array('rows'=>6, 'cols'=>50),array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'default_q2_ans'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'default_q1_ans',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textArea($model,'default_q1_ans',array('rows'=>6, 'cols'=>50),array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'default_q1_ans'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'default_q4_ans',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textArea($model,'default_q4_ans',array('rows'=>6, 'cols'=>50),array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'default_q4_ans'); ?>
								</div>
							</div>

							<!-- <div class="form-group">
								<?php echo $form->labelEx($model,'accept_new_project_date',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'accept_new_project_date',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'accept_new_project_date'); ?>
								</div>
							</div>
 -->
							
							<div class="form-group">
								<?php echo $form->labelEx($model,'price_tier_id',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'price_tier_id',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'price_tier_id'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'payoneer_payee',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'payoneer_payee',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'payoneer_payee'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'payoneer_token',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'payoneer_token',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'payoneer_token'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'link_status',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'link_status',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'link_status'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'offers',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textField($model,'offers',array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'offers'); ?>
								</div>
							</div>

							<h4>Status Of Profile</h4>

							<div class="form-group">
								<?php echo $form->labelEx($model,'is_faq_completed',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php 
								echo $form->dropDownList($model,'is_application_submit',array('1'=>'Completed','2'=>'Not-Completed',''=>'No Value'),array('class'=>'form-control'));
								?>
								<?php echo $form->error($model,'is_faq_completed'); ?>
								</div>
							</div>


							<div class="form-group">
								<?php echo $form->labelEx($model,'is_application_submit',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php 
								echo $form->dropDownList($model,'is_application_submit',array('1'=>'Submitted','2'=>'Not-Submitted',''=>'No Value'),array('class'=>'form-control'));
								?>
								<?php echo $form->error($model,'is_application_submit'); ?>
								</div>
							</div>


							<div class="form-group">
							<?php echo $form->labelEx($model,'is_profile_complete',array('class'=>'col-md-4 control-label')); ?>
							<div class="col-md-8">
								<?php 
								echo $form->dropDownList($model,'is_profile_complete',array('1'=>'Complete','2'=>'Not-Complete',''=>'No Value'),array('class'=>'form-control'));
								?>
								<?php echo $form->error($model,'is_profile_complete'); ?>
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

echo CHtml::ajaxSubmitButton('Update',CHtml::normalizeUrl(array('suppliers/update&id='.$model->id,'render'=>true)),
                 array(
                     'dataType'=>'json',
                     'type'=>'post',
                     'success'=>'function(data) { 
                        if(data.status == "success" ){
                        $("#formResultDivSupplier").removeClass("hide-div");
                        $("#formResultDivSupplier").removeClass("alert-warning");
                        $("#formResultDivSupplier").addClass("alert-success");
                        $("#formResultSupplier").html("Updated Successfully .");
                       
                    

                        }
                         else{
                         $("#formResultDivSupplier").removeClass("hide-div");
                         $("formResultDivSupplier").removeClass("alert-success");
                         $("formResultDivSupplier").addClass("alert-warning");
						 $("#formResultSupplier").html("Something Went Wrong .");
						
                        }    

                    }',
                    'error'=>'function(){
                    	$("#formResultDivSupplier").removeClass("hide-div");
                    	$("formResultDivSupplier").removeClass("alert-success");
                         $("formResultDivSupplier").addClass("alert-warning");
						 $("#formResultSupplier").html("Something Went Wrong .");
						

                    }'
                     ),array('id'=>'updateBtnSupplier','class'=>'btn btn-primary pull-right')); 
?>
	</div>


                     
                     <!-- -->

<?php $this->endWidget(); ?>

</div><!-- form -->
