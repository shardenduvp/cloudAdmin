<?php
/* @var $this ClientProjectsHasIndustriesController */
/* @var $model ClientProjectsHasIndustries */

$this->breadcrumbs=array(
	'Client Projects Has Industries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClientProjectsHasIndustries', 'url'=>array('index')),
	array('label'=>'Manage ClientProjectsHasIndustries', 'url'=>array('admin')),
);
?>

<h1>Create ClientProjectsHasIndustries</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>