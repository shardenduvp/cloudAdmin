<?php
/* @var $this CallSchedulesController */
/* @var $model CallSchedules */

$this->breadcrumbs=array(
	'Call Schedules'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CallSchedules', 'url'=>array('index')),
	array('label'=>'Manage CallSchedules', 'url'=>array('admin')),
);
?>

<h1>Create CallSchedules</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>