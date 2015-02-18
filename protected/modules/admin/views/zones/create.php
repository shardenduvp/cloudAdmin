<?php
/* @var $this ZonesController */
/* @var $model Zones */

$this->breadcrumbs=array(
	'Zones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Zones', 'url'=>array('index')),
	array('label'=>'Manage Zones', 'url'=>array('admin')),
);
?>

<h1>Create Zones</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>