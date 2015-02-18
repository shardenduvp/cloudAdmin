<?php
/* @var $this AdminLogsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Admin Logs',
);

$this->menu=array(
	array('label'=>'Create AdminLogs', 'url'=>array('create')),
	array('label'=>'Manage AdminLogs', 'url'=>array('admin')),
);
?>

<h1>Admin Logs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
