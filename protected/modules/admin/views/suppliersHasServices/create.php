<?php
/* @var $this SuppliersHasServicesController */
/* @var $model SuppliersHasServices */

$this->breadcrumbs=array(
	'Suppliers Has Services'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SuppliersHasServices', 'url'=>array('index')),
	array('label'=>'Manage SuppliersHasServices', 'url'=>array('admin')),
);
?>

<h1>Create SuppliersHasServices</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>