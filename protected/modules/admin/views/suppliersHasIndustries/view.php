<?php
/* @var $this SuppliersHasIndustriesController */
/* @var $model SuppliersHasIndustries */

$this->breadcrumbs=array(
	'Suppliers Has Industries'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SuppliersHasIndustries', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasIndustries', 'url'=>array('create')),
	array('label'=>'Update SuppliersHasIndustries', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SuppliersHasIndustries', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SuppliersHasIndustries', 'url'=>array('admin')),
);
?>

<h1>View SuppliersHasIndustries #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'suppliers_id',
		'industries_id',
		'add_date',
		'status',
	),
)); ?>
