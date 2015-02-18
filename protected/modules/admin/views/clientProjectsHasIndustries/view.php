<?php
/* @var $this ClientProjectsHasIndustriesController */
/* @var $model ClientProjectsHasIndustries */

$this->breadcrumbs=array(
	'Client Projects Has Industries'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ClientProjectsHasIndustries', 'url'=>array('index')),
	array('label'=>'Create ClientProjectsHasIndustries', 'url'=>array('create')),
	array('label'=>'Update ClientProjectsHasIndustries', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClientProjectsHasIndustries', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClientProjectsHasIndustries', 'url'=>array('admin')),
);
?>

<h1>View ClientProjectsHasIndustries #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'client_projects_id',
		'industries_id',
		'add_date',
		'status',
	),
)); ?>
