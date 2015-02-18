<?php
/* @var $this NotificationsController */
/* @var $model Notifications */

$this->breadcrumbs=array(
	'Notifications'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Notifications', 'url'=>array('index')),
	array('label'=>'Create Notifications', 'url'=>array('create')),
	array('label'=>'Update Notifications', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Notifications', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Notifications', 'url'=>array('admin')),
);
?>

<h1>View Notifications #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'status',
		'message',
		'add_date',
		'is_read',
		'users_id',
		'log_id',
	),
)); ?>
