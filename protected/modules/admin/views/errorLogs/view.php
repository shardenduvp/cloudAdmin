<?php
/* @var $this ErrorLogsController */
/* @var $model ErrorLogs */

$this->breadcrumbs=array(
	'Error Logs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ErrorLogs', 'url'=>array('index')),
	array('label'=>'Create ErrorLogs', 'url'=>array('create')),
	array('label'=>'Update ErrorLogs', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ErrorLogs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ErrorLogs', 'url'=>array('admin')),
);
?>

<h1>View ErrorLogs #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_type',
		'user_name',
		'error_code',
		'message',
		'request_url',
		'query_string',
		'file_name',
		'line_number',
		'error_type',
		'time',
		'reference_url',
		'ipaddress',
		'browser',
		'user_id',
	),
)); ?>
