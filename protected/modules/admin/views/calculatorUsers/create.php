<?php
/* @var $this CalculatorUsersController */
/* @var $model CalculatorUsers */

$this->breadcrumbs=array(
	'Calculator Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CalculatorUsers', 'url'=>array('index')),
	array('label'=>'Manage CalculatorUsers', 'url'=>array('admin')),
);
?>

<h1>Create CalculatorUsers</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>