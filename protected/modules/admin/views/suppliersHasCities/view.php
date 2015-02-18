<?php
/* @var $this SuppliersHasCitiesController */
/* @var $model SuppliersHasCities */

$this->breadcrumbs=array(
	'Suppliers Has Cities'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SuppliersHasCities', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasCities', 'url'=>array('create')),
	array('label'=>'Update SuppliersHasCities', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SuppliersHasCities', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SuppliersHasCities', 'url'=>array('admin')),
);
?>

<h1>View SuppliersHasCities #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'suppliers_id',
		'cities_id',
		'is_main',
		'add_date',
		'status',
	),
)); ?>
