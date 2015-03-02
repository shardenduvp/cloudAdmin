<?php
/* @var $this SuppliersProjectAnswerController */
/* @var $model SuppliersProjectAnswer */

$this->breadcrumbs=array(
	'Suppliers Project Answers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SuppliersProjectAnswer', 'url'=>array('index')),
	array('label'=>'Create SuppliersProjectAnswer', 'url'=>array('create')),
	array('label'=>'Update SuppliersProjectAnswer', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SuppliersProjectAnswer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SuppliersProjectAnswer', 'url'=>array('admin')),
);
?>

<h1>View SuppliersProjectAnswer #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'question_id',
		'suppliers_id',
		'answer',
		'created',
	),
)); ?>
