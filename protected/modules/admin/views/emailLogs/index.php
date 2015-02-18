<?php
/* @var $this EmailLogsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Email Logs',
);

$this->menu=array(
	array('label'=>'Create EmailLogs', 'url'=>array('create')),
	array('label'=>'Manage EmailLogs', 'url'=>array('admin')),
);
?>

<h1>Email Logs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
