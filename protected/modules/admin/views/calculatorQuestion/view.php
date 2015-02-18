<?php
/* @var $this CalculatorQuestionController */
/* @var $model CalculatorQuestion */

$this->breadcrumbs=array(
	'Calculator Questions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CalculatorQuestion', 'url'=>array('index')),
	array('label'=>'Create CalculatorQuestion', 'url'=>array('create')),
	array('label'=>'Update CalculatorQuestion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CalculatorQuestion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CalculatorQuestion', 'url'=>array('admin')),
);
?>

<h1>View CalculatorQuestion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'parent',
		'category_id',
		'question',
		'created',
		'modified',
	),
)); ?>
