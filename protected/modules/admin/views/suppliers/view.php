<?php
/* @var $this SuppliersController */
/* @var $model Suppliers */

$this->breadcrumbs=array(
	'Suppliers'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Suppliers', 'url'=>array('index')),
	array('label'=>'Create Suppliers', 'url'=>array('create')),
	array('label'=>'Update Suppliers', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Suppliers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Suppliers', 'url'=>array('admin')),
);
?>

<h1>View Suppliers #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'first_name',
		'last_name',
		'cover',
		'name',
		'image',
		'email',
		'skype_id',
		'website',
		'phone_number',
		'tagline',
		'about_company',
		'foundation_year',
		'short_description',
		'details',
		'location',
		'pricing_details',
		'min_price',
		'number_of_employee',
		'total_available_employee',
		'consultation_description',
		'standard_pitch',
		'standard_service_agreement',
		'profile_status',
		'add_date',
		'modification_date',
		'rough_estimate',
		'linkedin',
		'facebook',
		'google',
		'twitter',
		'you_tube',
		'per_hour_rate',
		'project_size',
		'web_references',
		'development_location',
		'sales_location',
		'response_time',
		'is_faq_completed',
		'is_application_submit',
		'status',
		'users_id',
		'logo',
		'default_q3_ans',
		'default_q2_ans',
		'default_q1_ans',
		'default_q4_ans',
		'accept_new_project_date',
		'is_profile_complete',
		'price_tier_id',
		'payoneer_payee',
		'payoneer_token',
		'link_status',
		'offers',
	),
)); ?>
