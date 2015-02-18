<?php
/* @var $this ClientProjectStatusController */
/* @var $model ClientProjectStatus */

$this->breadcrumbs=array(
	'Client Project Statuses'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ClientProjectStatus', 'url'=>array('index')),
	array('label'=>'Create ClientProjectStatus', 'url'=>array('create')),
	array('label'=>'Update ClientProjectStatus', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClientProjectStatus', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClientProjectStatus', 'url'=>array('admin')),
);
?>

<h1>View ClientProjectStatus #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'client_portfolio_id',
		'name',
		'desc',
		'add_date',
		'status',
	),
)); ?>
