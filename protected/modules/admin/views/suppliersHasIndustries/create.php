<?php
/* @var $this SuppliersHasIndustriesController */
/* @var $model SuppliersHasIndustries */

$this->breadcrumbs=array(
	'Suppliers Has Industries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SuppliersHasIndustries', 'url'=>array('index')),
	array('label'=>'Manage SuppliersHasIndustries', 'url'=>array('admin')),
);
?>

<h1>Create SuppliersHasIndustries</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>