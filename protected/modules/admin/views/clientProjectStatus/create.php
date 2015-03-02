<?php
/* @var $this ClientProjectStatusController */
/* @var $model ClientProjectStatus */

$this->breadcrumbs=array(
	'Client Project Statuses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClientProjectStatus', 'url'=>array('index')),
	array('label'=>'Manage ClientProjectStatus', 'url'=>array('admin')),
);
?>

<h1>Create ClientProjectStatus</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>