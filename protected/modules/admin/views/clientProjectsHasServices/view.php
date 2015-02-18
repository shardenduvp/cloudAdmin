<?php
/* @var $this ClientProjectsHasServicesController */
/* @var $model ClientProjectsHasServices */

$this->breadcrumbs=array(
	'Client Projects Has Services'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ClientProjectsHasServices', 'url'=>array('index')),
	array('label'=>'Create ClientProjectsHasServices', 'url'=>array('create')),
	array('label'=>'Update ClientProjectsHasServices', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClientProjectsHasServices', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClientProjectsHasServices', 'url'=>array('admin')),
);
?>

<h1>View ClientProjectsHasServices #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'client_projects_id',
		'services_id',
		'status',
		'add_date',
	),
)); ?>
