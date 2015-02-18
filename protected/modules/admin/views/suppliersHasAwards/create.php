<?php
/* @var $this SuppliersHasAwardsController */
/* @var $model SuppliersHasAwards */

$this->breadcrumbs=array(
	'Suppliers Has Awards'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SuppliersHasAwards', 'url'=>array('index')),
	array('label'=>'Manage SuppliersHasAwards', 'url'=>array('admin')),
);
?>

<h1>Create SuppliersHasAwards</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>