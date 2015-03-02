<?php
/* @var $this CalculatorResultController */
/* @var $model CalculatorResult */

$this->breadcrumbs=array(
	'Calculator Results'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CalculatorResult', 'url'=>array('index')),
	array('label'=>'Manage CalculatorResult', 'url'=>array('admin')),
);
?>

<h1>Create CalculatorResult</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>