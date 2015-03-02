<?php
/* @var $this RegionsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Regions',
);

$this->menu=array(
	array('label'=>'Create Regions', 'url'=>array('create')),
	array('label'=>'Manage Regions', 'url'=>array('admin')),
);
?>

<h1>Regions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
