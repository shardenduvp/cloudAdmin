<?php
/* @var $this ClientProjectFlowsController */
/* @var $model ClientProjectFlows */

$this->breadcrumbs=array(
	'Client Project Flows'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClientProjectFlows', 'url'=>array('index')),
	array('label'=>'Manage ClientProjectFlows', 'url'=>array('admin')),
);
?>

<h1>Create ClientProjectFlows</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>