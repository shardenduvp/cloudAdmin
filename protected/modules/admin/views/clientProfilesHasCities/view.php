<?php
/* @var $this ClientProfilesHasCitiesController */
/* @var $model ClientProfilesHasCities */

$this->breadcrumbs=array(
	'Client Profiles Has Cities'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ClientProfilesHasCities', 'url'=>array('index')),
	array('label'=>'Create ClientProfilesHasCities', 'url'=>array('create')),
	array('label'=>'Update ClientProfilesHasCities', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClientProfilesHasCities', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClientProfilesHasCities', 'url'=>array('admin')),
);
?>

<h1>View ClientProfilesHasCities #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'client_profiles_id',
		'cities_id',
		'is_main',
		'add_date',
		'status',
	),
)); ?>
