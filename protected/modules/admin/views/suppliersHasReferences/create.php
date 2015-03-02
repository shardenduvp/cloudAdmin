<?php
/* @var $this SuppliersHasReferencesController */
/* @var $model SuppliersHasReferences */

$this->breadcrumbs=array(
	'Suppliers Has References'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SuppliersHasReferences', 'url'=>array('index')),
	array('label'=>'Manage SuppliersHasReferences', 'url'=>array('admin')),
);
?>

<h1>Create SuppliersHasReferences</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>