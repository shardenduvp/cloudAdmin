<?php
/* @var $this CurrentStatusController */
/* @var $model CurrentStatus */

$this->breadcrumbs=array(
	'Current Statuses'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CurrentStatus', 'url'=>array('index')),
	array('label'=>'Create CurrentStatus', 'url'=>array('create')),
	array('label'=>'Update CurrentStatus', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CurrentStatus', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CurrentStatus', 'url'=>array('admin')),
);
?>

<h1>View CurrentStatus #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'position',
		'status',
	),
)); ?>
