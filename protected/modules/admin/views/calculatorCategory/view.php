<?php
/* @var $this CalculatorCategoryController */
/* @var $model CalculatorCategory */

$this->breadcrumbs=array(
	'Calculator Categories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CalculatorCategory', 'url'=>array('index')),
	array('label'=>'Create CalculatorCategory', 'url'=>array('create')),
	array('label'=>'Update CalculatorCategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CalculatorCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CalculatorCategory', 'url'=>array('admin')),
);
?>

<h1>View CalculatorCategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'created',
		'modified',
	),
)); ?>
