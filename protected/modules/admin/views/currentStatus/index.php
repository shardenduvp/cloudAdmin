<?php
/* @var $this CurrentStatusController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Current Statuses',
);

$this->menu=array(
	array('label'=>'Create CurrentStatus', 'url'=>array('create')),
	array('label'=>'Manage CurrentStatus', 'url'=>array('admin')),
);
?>

<h1>Current Statuses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
