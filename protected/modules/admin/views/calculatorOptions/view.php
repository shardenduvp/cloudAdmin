<?php
/* @var $this CalculatorOptionsController */
/* @var $model CalculatorOptions */

$this->breadcrumbs=array(
	'Calculator Options'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CalculatorOptions', 'url'=>array('index')),
	array('label'=>'Create CalculatorOptions', 'url'=>array('create')),
	array('label'=>'Update CalculatorOptions', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CalculatorOptions', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CalculatorOptions', 'url'=>array('admin')),
);
?>

<h1>View CalculatorOptions #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'question_id',
		'options',
		'hour',
		'price',
		'created',
		'modified',
	),
)); ?>
