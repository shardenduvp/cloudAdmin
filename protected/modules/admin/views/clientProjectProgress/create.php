<?php
/* @var $this ClientProjectProgressController */
/* @var $model ClientProjectProgress */

$this->breadcrumbs=array(
	'Client Project Progresses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClientProjectProgress', 'url'=>array('index')),
	array('label'=>'Manage ClientProjectProgress', 'url'=>array('admin')),
);
?>

<h1>Create ClientProjectProgress</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>