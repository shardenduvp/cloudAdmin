<?php
/* @var $this ClientServicesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Client Services',
);

$this->menu=array(
	array('label'=>'Create ClientServices', 'url'=>array('create')),
	array('label'=>'Manage ClientServices', 'url'=>array('admin')),
);
?>

<h1>Client Services</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
