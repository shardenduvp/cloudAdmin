<?php
/* @var $this UsersOfficesController */
/* @var $model UsersOffices */

$this->breadcrumbs=array(
	'Users Offices'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UsersOffices', 'url'=>array('index')),
	array('label'=>'Create UsersOffices', 'url'=>array('create')),
	array('label'=>'Update UsersOffices', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UsersOffices', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UsersOffices', 'url'=>array('admin')),
);
?>

<h1>View UsersOffices #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'city_id',
		'dep_id',
		'add_date',
		'status',
	),
)); ?>
