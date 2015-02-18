<?php
/* @var $this CalculatorQuestionController */
/* @var $model CalculatorQuestion */

$this->breadcrumbs=array(
	'Calculator Questions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CalculatorQuestion', 'url'=>array('index')),
	array('label'=>'Manage CalculatorQuestion', 'url'=>array('admin')),
);
?>

<h1>Create CalculatorQuestion</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>