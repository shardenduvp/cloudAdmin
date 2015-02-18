<?php
/* @var $this ClientProjectFlowsController */
/* @var $model ClientProjectFlows */

$this->breadcrumbs=array(
	'Client Project Flows'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ClientProjectFlows', 'url'=>array('index')),
	array('label'=>'Create ClientProjectFlows', 'url'=>array('create')),
	array('label'=>'Update ClientProjectFlows', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClientProjectFlows', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClientProjectFlows', 'url'=>array('admin')),
);
?>

<h1>View ClientProjectFlows #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'step',
		'description',
		'status',
		'client_projects_id',
	),
)); ?>
