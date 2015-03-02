<?php
/* @var $this SuppliersProjectsController */
/* @var $model SuppliersProjects */

$this->breadcrumbs=array(
	'Suppliers Projects'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SuppliersProjects', 'url'=>array('index')),
	array('label'=>'Manage SuppliersProjects', 'url'=>array('admin')),
);
?>

<h1>Create SuppliersProjects</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>