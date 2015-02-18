<?php
/* @var $this PriceZoneController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Price Zones',
);

$this->menu=array(
	array('label'=>'Create PriceZone', 'url'=>array('create')),
	array('label'=>'Manage PriceZone', 'url'=>array('admin')),
);
?>

<h1>Price Zones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
