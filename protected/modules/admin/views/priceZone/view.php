<?php
/* @var $this PriceZoneController */
/* @var $model PriceZone */

$this->breadcrumbs=array(
	'Price Zones'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List PriceZone', 'url'=>array('index')),
	array('label'=>'Create PriceZone', 'url'=>array('create')),
	array('label'=>'Update PriceZone', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PriceZone', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PriceZone', 'url'=>array('admin')),
);
?>

<h1>View PriceZone #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'min_price',
		'max_price',
		'title',
		'description',
		'status',
	),
)); ?>
