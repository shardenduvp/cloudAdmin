<?php
/* @var $this SuppliersHasSkillsController */
/* @var $model SuppliersHasSkills */

$this->breadcrumbs=array(
	'Suppliers Has Skills'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SuppliersHasSkills', 'url'=>array('index')),
	array('label'=>'Manage SuppliersHasSkills', 'url'=>array('admin')),
);
?>

<h1>Create SuppliersHasSkills</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>