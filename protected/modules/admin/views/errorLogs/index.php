<?php
/* @var $this ErrorLogsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Error Logs',
);

$this->menu=array(
	array('label'=>'Create ErrorLogs', 'url'=>array('create')),
	array('label'=>'Manage ErrorLogs', 'url'=>array('admin')),
);
?>

<h1>Error Logs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
