<?php
/* @var $this SuppliersController */
/* @var $data Suppliers */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
	<?php echo CHtml::encode($data->first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
	<?php echo CHtml::encode($data->last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cover')); ?>:</b>
	<?php echo CHtml::encode($data->cover); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('skype_id')); ?>:</b>
	<?php echo CHtml::encode($data->skype_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('website')); ?>:</b>
	<?php echo CHtml::encode($data->website); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_number')); ?>:</b>
	<?php echo CHtml::encode($data->phone_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tagline')); ?>:</b>
	<?php echo CHtml::encode($data->tagline); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('about_company')); ?>:</b>
	<?php echo CHtml::encode($data->about_company); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('foundation_year')); ?>:</b>
	<?php echo CHtml::encode($data->foundation_year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('short_description')); ?>:</b>
	<?php echo CHtml::encode($data->short_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('details')); ?>:</b>
	<?php echo CHtml::encode($data->details); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location')); ?>:</b>
	<?php echo CHtml::encode($data->location); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pricing_details')); ?>:</b>
	<?php echo CHtml::encode($data->pricing_details); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('min_price')); ?>:</b>
	<?php echo CHtml::encode($data->min_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('number_of_employee')); ?>:</b>
	<?php echo CHtml::encode($data->number_of_employee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_available_employee')); ?>:</b>
	<?php echo CHtml::encode($data->total_available_employee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('consultation_description')); ?>:</b>
	<?php echo CHtml::encode($data->consultation_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('standard_pitch')); ?>:</b>
	<?php echo CHtml::encode($data->standard_pitch); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('standard_service_agreement')); ?>:</b>
	<?php echo CHtml::encode($data->standard_service_agreement); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profile_status')); ?>:</b>
	<?php echo CHtml::encode($data->profile_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('add_date')); ?>:</b>
	<?php echo CHtml::encode($data->add_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modification_date')); ?>:</b>
	<?php echo CHtml::encode($data->modification_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rough_estimate')); ?>:</b>
	<?php echo CHtml::encode($data->rough_estimate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('linkedin')); ?>:</b>
	<?php echo CHtml::encode($data->linkedin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('facebook')); ?>:</b>
	<?php echo CHtml::encode($data->facebook); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('google')); ?>:</b>
	<?php echo CHtml::encode($data->google); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('twitter')); ?>:</b>
	<?php echo CHtml::encode($data->twitter); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('you_tube')); ?>:</b>
	<?php echo CHtml::encode($data->you_tube); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('per_hour_rate')); ?>:</b>
	<?php echo CHtml::encode($data->per_hour_rate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_size')); ?>:</b>
	<?php echo CHtml::encode($data->project_size); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('web_references')); ?>:</b>
	<?php echo CHtml::encode($data->web_references); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('development_location')); ?>:</b>
	<?php echo CHtml::encode($data->development_location); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sales_location')); ?>:</b>
	<?php echo CHtml::encode($data->sales_location); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('response_time')); ?>:</b>
	<?php echo CHtml::encode($data->response_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_faq_completed')); ?>:</b>
	<?php echo CHtml::encode($data->is_faq_completed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_application_submit')); ?>:</b>
	<?php echo CHtml::encode($data->is_application_submit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('users_id')); ?>:</b>
	<?php echo CHtml::encode($data->users_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logo')); ?>:</b>
	<?php echo CHtml::encode($data->logo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('default_q3_ans')); ?>:</b>
	<?php echo CHtml::encode($data->default_q3_ans); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('default_q2_ans')); ?>:</b>
	<?php echo CHtml::encode($data->default_q2_ans); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('default_q1_ans')); ?>:</b>
	<?php echo CHtml::encode($data->default_q1_ans); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('default_q4_ans')); ?>:</b>
	<?php echo CHtml::encode($data->default_q4_ans); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('accept_new_project_date')); ?>:</b>
	<?php echo CHtml::encode($data->accept_new_project_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_profile_complete')); ?>:</b>
	<?php echo CHtml::encode($data->is_profile_complete); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price_tier_id')); ?>:</b>
	<?php echo CHtml::encode($data->price_tier_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payoneer_payee')); ?>:</b>
	<?php echo CHtml::encode($data->payoneer_payee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payoneer_token')); ?>:</b>
	<?php echo CHtml::encode($data->payoneer_token); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link_status')); ?>:</b>
	<?php echo CHtml::encode($data->link_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('offers')); ?>:</b>
	<?php echo CHtml::encode($data->offers); ?>
	<br />

	*/ ?>

</div>