<?php
/* @var $this ClientProjectProgressController */
/* @var $model ClientProjectProgress */

$this->breadcrumbs=array(
	'Client Project Progresses'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ClientProjectProgress', 'url'=>array('index')),
	array('label'=>'Create ClientProjectProgress', 'url'=>array('create')),
	array('label'=>'Update ClientProjectProgress', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClientProjectProgress', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClientProjectProgress', 'url'=>array('admin')),
);
?>

<h1>View ClientProjectProgress #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'details',
		'status',
		'client_projects_id',
	),
)); ?>
