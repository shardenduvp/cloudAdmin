<?php
/* @var $this ClientProjectsHasServicesController */
/* @var $model ClientProjectsHasServices */

$this->breadcrumbs=array(
	'Client Projects Has Services'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClientProjectsHasServices', 'url'=>array('index')),
	array('label'=>'Manage ClientProjectsHasServices', 'url'=>array('admin')),
);
?>

<h1>Create ClientProjectsHasServices</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>