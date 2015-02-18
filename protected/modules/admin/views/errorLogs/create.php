<?php
/* @var $this ErrorLogsController */
/* @var $model ErrorLogs */

$this->breadcrumbs=array(
	'Error Logs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ErrorLogs', 'url'=>array('index')),
	array('label'=>'Manage ErrorLogs', 'url'=>array('admin')),
);
?>

<h1>Create ErrorLogs</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>