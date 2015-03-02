<?php
/* @var $this UsersHasCitiesController */
/* @var $model UsersHasCities */

$this->breadcrumbs=array(
	'Users Has Cities'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UsersHasCities', 'url'=>array('index')),
	array('label'=>'Create UsersHasCities', 'url'=>array('create')),
	array('label'=>'Update UsersHasCities', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UsersHasCities', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UsersHasCities', 'url'=>array('admin')),
);
?>

<h1>View UsersHasCities #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'users_id',
		'cities_id',
		'details',
		'is_main',
		'add_date',
		'status',
	),
)); ?>
