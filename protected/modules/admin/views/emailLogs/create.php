<?php
/* @var $this EmailLogsController */
/* @var $model EmailLogs */

$this->breadcrumbs=array(
	'Email Logs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EmailLogs', 'url'=>array('index')),
	array('label'=>'Manage EmailLogs', 'url'=>array('admin')),
);
?>

<h1>Create EmailLogs</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>