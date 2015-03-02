<?php
/* @var $this SuppliersHasCitiesController */
/* @var $model SuppliersHasCities */

$this->breadcrumbs=array(
	'Suppliers Has Cities'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SuppliersHasCities', 'url'=>array('index')),
	array('label'=>'Manage SuppliersHasCities', 'url'=>array('admin')),
);
?>

<h1>Create SuppliersHasCities</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>