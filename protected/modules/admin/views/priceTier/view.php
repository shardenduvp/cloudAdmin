<?php
/* @var $this PriceTierController */
/* @var $model PriceTier */

$this->breadcrumbs=array(
	'Price Tiers'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List PriceTier', 'url'=>array('index')),
	array('label'=>'Create PriceTier', 'url'=>array('create')),
	array('label'=>'Update PriceTier', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PriceTier', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PriceTier', 'url'=>array('admin')),
);
?>

<h1>View PriceTier #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
		'min_price',
		'max_price',
		'd_min_price',
		'd_max_price',
		'd_description',
		'price_zone',
		'status',
		'price_zone_id',
	),
)); ?>
