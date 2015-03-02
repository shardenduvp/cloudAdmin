<?php
/* @var $this CalculatorResultController */
/* @var $model CalculatorResult */

$this->breadcrumbs=array(
	'Calculator Results'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CalculatorResult', 'url'=>array('index')),
	array('label'=>'Create CalculatorResult', 'url'=>array('create')),
	array('label'=>'Update CalculatorResult', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CalculatorResult', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CalculatorResult', 'url'=>array('admin')),
);
?>

<h1>View CalculatorResult #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'users_id',
		'question_id',
		'option_id',
		'created',
		'modified',
	),
)); ?>
