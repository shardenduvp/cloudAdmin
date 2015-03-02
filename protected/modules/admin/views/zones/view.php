<?php
/* @var $this ZonesController */
/* @var $model Zones */

$this->breadcrumbs=array(
	'Zones'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Zones', 'url'=>array('index')),
	array('label'=>'Create Zones', 'url'=>array('create')),
	array('label'=>'Update Zones', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Zones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Zones', 'url'=>array('admin')),
);
?>

<h1>View Zones #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'gmt',
		'save_hour',
		'zonescol',
		'status',
	),
)); ?>
