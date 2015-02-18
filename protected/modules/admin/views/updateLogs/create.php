<?php
/* @var $this UpdateLogsController */
/* @var $model UpdateLogs */

$this->breadcrumbs=array(
	'Update Logs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UpdateLogs', 'url'=>array('index')),
	array('label'=>'Manage UpdateLogs', 'url'=>array('admin')),
);
?>

<h1>Create UpdateLogs</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>