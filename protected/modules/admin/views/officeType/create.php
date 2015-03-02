<?php
/* @var $this OfficeTypeController */
/* @var $model OfficeType */

$this->breadcrumbs=array(
	'Office Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OfficeType', 'url'=>array('index')),
	array('label'=>'Manage OfficeType', 'url'=>array('admin')),
);
?>

<h1>Create OfficeType</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>