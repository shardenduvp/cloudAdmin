<?php
/* @var $this UpdateLogsController */
/* @var $model UpdateLogs */

$this->breadcrumbs=array(
	'Update Logs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UpdateLogs', 'url'=>array('index')),
	array('label'=>'Create UpdateLogs', 'url'=>array('create')),
	array('label'=>'Update UpdateLogs', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UpdateLogs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UpdateLogs', 'url'=>array('admin')),
);
?>

<h1>View UpdateLogs #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'action',
		'controller',
		'description',
		'user_ip',
		'datetime',
		'user_id',
	),
)); ?>
