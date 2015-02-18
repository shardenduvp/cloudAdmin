<?php
/* @var $this CallSchedulesController */
/* @var $model CallSchedules */

$this->breadcrumbs=array(
	'Call Schedules'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CallSchedules', 'url'=>array('index')),
	array('label'=>'Create CallSchedules', 'url'=>array('create')),
	array('label'=>'Update CallSchedules', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CallSchedules', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CallSchedules', 'url'=>array('admin')),
);
?>

<h1>View CallSchedules #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'client_phone',
		'call_time',
		'add_date',
		'client_projects_id',
	),
)); ?>
