<?php
/* @var $this ClientServicesController */
/* @var $model ClientServices */

$this->breadcrumbs=array(
	'Client Services'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClientServices', 'url'=>array('index')),
	array('label'=>'Manage ClientServices', 'url'=>array('admin')),
);
?>

<h1>Create ClientServices</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>