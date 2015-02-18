<?php
/* @var $this CallSchedulesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Call Schedules',
);

$this->menu=array(
	array('label'=>'Create CallSchedules', 'url'=>array('create')),
	array('label'=>'Manage CallSchedules', 'url'=>array('admin')),
);
?>

<h1>Call Schedules</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
