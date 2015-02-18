<?php
/* @var $this AdminLogsController */
/* @var $model AdminLogs */

$this->breadcrumbs=array(
	'Admin Logs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AdminLogs', 'url'=>array('index')),
	array('label'=>'Create AdminLogs', 'url'=>array('create')),
	array('label'=>'Update AdminLogs', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AdminLogs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AdminLogs', 'url'=>array('admin')),
);
?>

<h1>View AdminLogs #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'ipaddress',
		'logtime',
		'controller',
		'action',
		'details',
		'action_param',
		'browser',
		'query_string',
		'refer_url',
		'user_id',
		'request_url',
	),
)); ?>
