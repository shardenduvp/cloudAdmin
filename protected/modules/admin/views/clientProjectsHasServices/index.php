<?php
/* @var $this ClientProjectsHasServicesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Client Projects Has Services',
);

$this->menu=array(
	array('label'=>'Create ClientProjectsHasServices', 'url'=>array('create')),
	array('label'=>'Manage ClientProjectsHasServices', 'url'=>array('admin')),
);
?>

<h1>Client Projects Has Services</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
