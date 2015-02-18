<?php
/* @var $this SuppliersHasWebController */
/* @var $model SuppliersHasWeb */

$this->breadcrumbs=array(
	'Suppliers Has Webs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SuppliersHasWeb', 'url'=>array('index')),
	array('label'=>'Manage SuppliersHasWeb', 'url'=>array('admin')),
);
?>

<h1>Create SuppliersHasWeb</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>