<?php
/* @var $this UpdateLogsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Update Logs',
);

$this->menu=array(
	array('label'=>'Create UpdateLogs', 'url'=>array('create')),
	array('label'=>'Manage UpdateLogs', 'url'=>array('admin')),
);
?>

<h1>Update Logs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
