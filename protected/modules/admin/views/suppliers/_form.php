<?php
/* @var $this SuppliersController */
/* @var $model Suppliers */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'suppliers-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cover'); ?>
		<?php echo $form->textField($model,'cover',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'cover'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'skype_id'); ?>
		<?php echo $form->textField($model,'skype_id',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'skype_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'website'); ?>
		<?php echo $form->textField($model,'website',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'website'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_number'); ?>
		<?php echo $form->textField($model,'phone_number',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'phone_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tagline'); ?>
		<?php echo $form->textField($model,'tagline',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'tagline'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'about_company'); ?>
		<?php echo $form->textArea($model,'about_company',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'about_company'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'foundation_year'); ?>
		<?php echo $form->textField($model,'foundation_year',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'foundation_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'short_description'); ?>
		<?php echo $form->textField($model,'short_description',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'short_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'details'); ?>
		<?php echo $form->textArea($model,'details',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'details'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location'); ?>
		<?php echo $form->textField($model,'location',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pricing_details'); ?>
		<?php echo $form->textField($model,'pricing_details',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'pricing_details'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'min_price'); ?>
		<?php echo $form->textField($model,'min_price',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'min_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'number_of_employee'); ?>
		<?php echo $form->textField($model,'number_of_employee',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'number_of_employee'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_available_employee'); ?>
		<?php echo $form->textField($model,'total_available_employee',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'total_available_employee'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'consultation_description'); ?>
		<?php echo $form->textArea($model,'consultation_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'consultation_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'standard_pitch'); ?>
		<?php echo $form->textField($model,'standard_pitch',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'standard_pitch'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'standard_service_agreement'); ?>
		<?php echo $form->textField($model,'standard_service_agreement',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'standard_service_agreement'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'profile_status'); ?>
		<?php echo $form->textField($model,'profile_status'); ?>
		<?php echo $form->error($model,'profile_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'add_date'); ?>
		<?php echo $form->textField($model,'add_date'); ?>
		<?php echo $form->error($model,'add_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modification_date'); ?>
		<?php echo $form->textField($model,'modification_date'); ?>
		<?php echo $form->error($model,'modification_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rough_estimate'); ?>
		<?php echo $form->textArea($model,'rough_estimate',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'rough_estimate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'linkedin'); ?>
		<?php echo $form->textField($model,'linkedin',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'linkedin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'facebook'); ?>
		<?php echo $form->textField($model,'facebook',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'facebook'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'google'); ?>
		<?php echo $form->textField($model,'google',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'google'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'twitter'); ?>
		<?php echo $form->textField($model,'twitter',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'twitter'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'you_tube'); ?>
		<?php echo $form->textField($model,'you_tube',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'you_tube'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'per_hour_rate'); ?>
		<?php echo $form->textField($model,'per_hour_rate',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'per_hour_rate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'project_size'); ?>
		<?php echo $form->textField($model,'project_size',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'project_size'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'web_references'); ?>
		<?php echo $form->textField($model,'web_references',array('size'=>60,'maxlength'=>490)); ?>
		<?php echo $form->error($model,'web_references'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'development_location'); ?>
		<?php echo $form->textField($model,'development_location',array('size'=>60,'maxlength'=>490)); ?>
		<?php echo $form->error($model,'development_location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sales_location'); ?>
		<?php echo $form->textField($model,'sales_location',array('size'=>60,'maxlength'=>490)); ?>
		<?php echo $form->error($model,'sales_location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'response_time'); ?>
		<?php echo $form->textField($model,'response_time',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'response_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_faq_completed'); ?>
		<?php echo $form->textField($model,'is_faq_completed'); ?>
		<?php echo $form->error($model,'is_faq_completed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_application_submit'); ?>
		<?php echo $form->textField($model,'is_application_submit'); ?>
		<?php echo $form->error($model,'is_application_submit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'users_id'); ?>
		<?php echo $form->textField($model,'users_id'); ?>
		<?php echo $form->error($model,'users_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'logo'); ?>
		<?php echo $form->textField($model,'logo',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'logo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'default_q3_ans'); ?>
		<?php echo $form->textArea($model,'default_q3_ans',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'default_q3_ans'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'default_q2_ans'); ?>
		<?php echo $form->textArea($model,'default_q2_ans',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'default_q2_ans'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'default_q1_ans'); ?>
		<?php echo $form->textArea($model,'default_q1_ans',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'default_q1_ans'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'default_q4_ans'); ?>
		<?php echo $form->textArea($model,'default_q4_ans',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'default_q4_ans'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'accept_new_project_date'); ?>
		<?php echo $form->textField($model,'accept_new_project_date'); ?>
		<?php echo $form->error($model,'accept_new_project_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_profile_complete'); ?>
		<?php echo $form->textField($model,'is_profile_complete'); ?>
		<?php echo $form->error($model,'is_profile_complete'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price_tier_id'); ?>
		<?php echo $form->textField($model,'price_tier_id'); ?>
		<?php echo $form->error($model,'price_tier_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payoneer_payee'); ?>
		<?php echo $form->textField($model,'payoneer_payee',array('size'=>60,'maxlength'=>145)); ?>
		<?php echo $form->error($model,'payoneer_payee'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payoneer_token'); ?>
		<?php echo $form->textField($model,'payoneer_token',array('size'=>60,'maxlength'=>145)); ?>
		<?php echo $form->error($model,'payoneer_token'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link_status'); ?>
		<?php echo $form->textField($model,'link_status'); ?>
		<?php echo $form->error($model,'link_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'offers'); ?>
		<?php echo $form->textField($model,'offers',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'offers'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->