<?php
/* @var $this ClientProfilesController */
/* @var $model ClientProfiles */

$this->breadcrumbs=array(
	'Client Profiles'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ClientProfiles', 'url'=>array('index')),
	array('label'=>'Create ClientProfiles', 'url'=>array('create')),
	array('label'=>'Update ClientProfiles', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClientProfiles', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClientProfiles', 'url'=>array('admin')),
);
?>

<h1>View ClientProfiles #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'users_id',
		'first_name',
		'last_name',
		'company_name',
		'company_link',
		'skype_id',
		'email',
		'phone_number',
		'address1',
		'team_size',
		'category',
		'foundation_year',
		'image',
		'description',
		'add_date',
		'status',
	),
)); ?>
