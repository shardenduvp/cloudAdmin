<?php
/* @var $this PriceZoneController */
/* @var $model PriceZone */

$this->breadcrumbs=array(
	'Price Zones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PriceZone', 'url'=>array('index')),
	array('label'=>'Manage PriceZone', 'url'=>array('admin')),
);
?>

<h1>Create PriceZone</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>