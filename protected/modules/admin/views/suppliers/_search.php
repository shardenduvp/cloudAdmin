<?php
/* @var $this SuppliersController */
/* @var $model Suppliers */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cover'); ?>
		<?php echo $form->textField($model,'cover',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'skype_id'); ?>
		<?php echo $form->textField($model,'skype_id',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'website'); ?>
		<?php echo $form->textField($model,'website',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone_number'); ?>
		<?php echo $form->textField($model,'phone_number',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tagline'); ?>
		<?php echo $form->textField($model,'tagline',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'about_company'); ?>
		<?php echo $form->textArea($model,'about_company',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'foundation_year'); ?>
		<?php echo $form->textField($model,'foundation_year',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'short_description'); ?>
		<?php echo $form->textField($model,'short_description',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'details'); ?>
		<?php echo $form->textArea($model,'details',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'location'); ?>
		<?php echo $form->textField($model,'location',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pricing_details'); ?>
		<?php echo $form->textField($model,'pricing_details',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'min_price'); ?>
		<?php echo $form->textField($model,'min_price',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'number_of_employee'); ?>
		<?php echo $form->textField($model,'number_of_employee',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_available_employee'); ?>
		<?php echo $form->textField($model,'total_available_employee',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'consultation_description'); ?>
		<?php echo $form->textArea($model,'consultation_description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'standard_pitch'); ?>
		<?php echo $form->textField($model,'standard_pitch',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'standard_service_agreement'); ?>
		<?php echo $form->textField($model,'standard_service_agreement',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'profile_status'); ?>
		<?php echo $form->textField($model,'profile_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'add_date'); ?>
		<?php echo $form->textField($model,'add_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modification_date'); ?>
		<?php echo $form->textField($model,'modification_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rough_estimate'); ?>
		<?php echo $form->textArea($model,'rough_estimate',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'linkedin'); ?>
		<?php echo $form->textField($model,'linkedin',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'facebook'); ?>
		<?php echo $form->textField($model,'facebook',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'google'); ?>
		<?php echo $form->textField($model,'google',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'twitter'); ?>
		<?php echo $form->textField($model,'twitter',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'you_tube'); ?>
		<?php echo $form->textField($model,'you_tube',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'per_hour_rate'); ?>
		<?php echo $form->textField($model,'per_hour_rate',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'project_size'); ?>
		<?php echo $form->textField($model,'project_size',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'web_references'); ?>
		<?php echo $form->textField($model,'web_references',array('size'=>60,'maxlength'=>490)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'development_location'); ?>
		<?php echo $form->textField($model,'development_location',array('size'=>60,'maxlength'=>490)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sales_location'); ?>
		<?php echo $form->textField($model,'sales_location',array('size'=>60,'maxlength'=>490)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'response_time'); ?>
		<?php echo $form->textField($model,'response_time',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_faq_completed'); ?>
		<?php echo $form->textField($model,'is_faq_completed'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_application_submit'); ?>
		<?php echo $form->textField($model,'is_application_submit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'users_id'); ?>
		<?php echo $form->textField($model,'users_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'logo'); ?>
		<?php echo $form->textField($model,'logo',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'default_q3_ans'); ?>
		<?php echo $form->textArea($model,'default_q3_ans',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'default_q2_ans'); ?>
		<?php echo $form->textArea($model,'default_q2_ans',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'default_q1_ans'); ?>
		<?php echo $form->textArea($model,'default_q1_ans',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'default_q4_ans'); ?>
		<?php echo $form->textArea($model,'default_q4_ans',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'accept_new_project_date'); ?>
		<?php echo $form->textField($model,'accept_new_project_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_profile_complete'); ?>
		<?php echo $form->textField($model,'is_profile_complete'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'price_tier_id'); ?>
		<?php echo $form->textField($model,'price_tier_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payoneer_payee'); ?>
		<?php echo $form->textField($model,'payoneer_payee',array('size'=>60,'maxlength'=>145)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payoneer_token'); ?>
		<?php echo $form->textField($model,'payoneer_token',array('size'=>60,'maxlength'=>145)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'link_status'); ?>
		<?php echo $form->textField($model,'link_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'offers'); ?>
		<?php echo $form->textField($model,'offers',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->