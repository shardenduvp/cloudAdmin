<?php
/* @var $this ClientProjectDocumentsController */
/* @var $model ClientProjectDocuments */

$this->breadcrumbs=array(
	'Client Project Documents'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ClientProjectDocuments', 'url'=>array('index')),
	array('label'=>'Create ClientProjectDocuments', 'url'=>array('create')),
	array('label'=>'Update ClientProjectDocuments', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClientProjectDocuments', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClientProjectDocuments', 'url'=>array('admin')),
);
?>

<h1>View ClientProjectDocuments #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'path',
		'extension',
		'size',
		'type',
		'add_date',
		'status',
		'client_projects_id',
	),
)); ?>
