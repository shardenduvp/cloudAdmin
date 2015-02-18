<?php
/* @var $this ChatTemplateController */
/* @var $model ChatTemplate */

$this->breadcrumbs=array(
	'Chat Templates'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ChatTemplate', 'url'=>array('index')),
	array('label'=>'Create ChatTemplate', 'url'=>array('create')),
	array('label'=>'Update ChatTemplate', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ChatTemplate', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ChatTemplate', 'url'=>array('admin')),
);
?>

<h1>View ChatTemplate #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'template',
		'add_date',
		'status',
	),
)); ?>
