<?php
/* @var $this IndustriesController */
/* @var $model Industries */

$this->breadcrumbs=array(
	'Industries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Industries', 'url'=>array('index')),
	array('label'=>'Manage Industries', 'url'=>array('admin')),
);
?>

<h1>Create Industries</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>