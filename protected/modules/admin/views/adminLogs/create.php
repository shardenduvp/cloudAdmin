<?php
/* @var $this AdminLogsController */
/* @var $model AdminLogs */

$this->breadcrumbs=array(
	'Admin Logs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AdminLogs', 'url'=>array('index')),
	array('label'=>'Manage AdminLogs', 'url'=>array('admin')),
);
?>

<h1>Create AdminLogs</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>