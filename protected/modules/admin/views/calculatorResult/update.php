<?php
/* @var $this CalculatorResultController */
/* @var $model CalculatorResult */

$this->breadcrumbs=array(
	'Calculator Results'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CalculatorResult', 'url'=>array('index')),
	array('label'=>'Create CalculatorResult', 'url'=>array('create')),
	array('label'=>'View CalculatorResult', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CalculatorResult', 'url'=>array('admin')),
);
?>

<h1>Update CalculatorResult <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>