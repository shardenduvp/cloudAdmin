<?php
/* @var $this EmailLogsController */
/* @var $model EmailLogs */

$this->breadcrumbs=array(
	'Email Logs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EmailLogs', 'url'=>array('index')),
	array('label'=>'Create EmailLogs', 'url'=>array('create')),
	array('label'=>'Update EmailLogs', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EmailLogs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EmailLogs', 'url'=>array('admin')),
);
?>

<h1>View EmailLogs #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'reciver',
		'templete',
		'esubject',
		'body',
		'time',
		'status',
		'other_info',
		'user_id',
	),
)); ?>
