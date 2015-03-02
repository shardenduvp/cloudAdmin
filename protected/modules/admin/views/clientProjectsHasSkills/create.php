<?php
/* @var $this ClientProjectsHasSkillsController */
/* @var $model ClientProjectsHasSkills */

$this->breadcrumbs=array(
	'Client Projects Has Skills'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClientProjectsHasSkills', 'url'=>array('index')),
	array('label'=>'Manage ClientProjectsHasSkills', 'url'=>array('admin')),
);
?>

<h1>Create ClientProjectsHasSkills</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>