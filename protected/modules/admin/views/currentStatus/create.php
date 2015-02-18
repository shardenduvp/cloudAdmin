<?php
/* @var $this CurrentStatusController */
/* @var $model CurrentStatus */

$this->breadcrumbs=array(
	'Current Statuses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CurrentStatus', 'url'=>array('index')),
	array('label'=>'Manage CurrentStatus', 'url'=>array('admin')),
);
?>

<h1>Create CurrentStatus</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>