<?php
/* @var $this ClientProjectStatusController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Client Project Statuses',
);

$this->menu=array(
	array('label'=>'Create ClientProjectStatus', 'url'=>array('create')),
	array('label'=>'Manage ClientProjectStatus', 'url'=>array('admin')),
);
?>

<h1>Client Project Statuses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
