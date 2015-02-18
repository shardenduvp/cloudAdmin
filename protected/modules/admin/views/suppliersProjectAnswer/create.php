<?php
/* @var $this SuppliersProjectAnswerController */
/* @var $model SuppliersProjectAnswer */

$this->breadcrumbs=array(
	'Suppliers Project Answers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SuppliersProjectAnswer', 'url'=>array('index')),
	array('label'=>'Manage SuppliersProjectAnswer', 'url'=>array('admin')),
);
?>

<h1>Create SuppliersProjectAnswer</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>