<?php
/* @var $this SuppliersProjectTeamController */
/* @var $model SuppliersProjectTeam */

$this->breadcrumbs=array(
	'Suppliers Project Teams'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SuppliersProjectTeam', 'url'=>array('index')),
	array('label'=>'Manage SuppliersProjectTeam', 'url'=>array('admin')),
);
?>

<h1>Create SuppliersProjectTeam</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>