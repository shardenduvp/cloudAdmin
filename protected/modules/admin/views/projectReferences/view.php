<?php
/* @var $this ProjectReferencesController */
/* @var $model ProjectReferences */

$this->breadcrumbs=array(
	'Project References'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ProjectReferences', 'url'=>array('index')),
	array('label'=>'Create ProjectReferences', 'url'=>array('create')),
	array('label'=>'Update ProjectReferences', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProjectReferences', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProjectReferences', 'url'=>array('admin')),
);
?>

<h1>View ProjectReferences #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'link',
		'details',
		'add_date',
		'status',
		'client_projects_id',
		'reference_number',
	),
)); ?>
