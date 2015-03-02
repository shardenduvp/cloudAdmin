<?php
/* @var $this CalculatorCategoryController */
/* @var $model CalculatorCategory */

$this->breadcrumbs=array(
	'Calculator Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CalculatorCategory', 'url'=>array('index')),
	array('label'=>'Manage CalculatorCategory', 'url'=>array('admin')),
);
?>

<h1>Create CalculatorCategory</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>