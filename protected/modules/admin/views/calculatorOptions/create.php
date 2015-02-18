<?php
/* @var $this CalculatorOptionsController */
/* @var $model CalculatorOptions */

$this->breadcrumbs=array(
	'Calculator Options'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CalculatorOptions', 'url'=>array('index')),
	array('label'=>'Manage CalculatorOptions', 'url'=>array('admin')),
);
?>

<h1>Create CalculatorOptions</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>