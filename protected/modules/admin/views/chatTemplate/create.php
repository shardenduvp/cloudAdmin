<?php
/* @var $this ChatTemplateController */
/* @var $model ChatTemplate */

$this->breadcrumbs=array(
	'Chat Templates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ChatTemplate', 'url'=>array('index')),
	array('label'=>'Manage ChatTemplate', 'url'=>array('admin')),
);
?>

<h1>Create ChatTemplate</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>