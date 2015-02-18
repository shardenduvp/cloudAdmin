<?php
/* @var $this PriceZoneController */
/* @var $model PriceZone */

$this->breadcrumbs=array(
	'Price Zones'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PriceZone', 'url'=>array('index')),
	array('label'=>'Create PriceZone', 'url'=>array('create')),
	array('label'=>'View PriceZone', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PriceZone', 'url'=>array('admin')),
);
?>

<h1>Update PriceZone <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>