<?php
/* @var $this SuppliersHasServicesController */
/* @var $model SuppliersHasServices */

$this->breadcrumbs=array(
	'Suppliers Has Services'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SuppliersHasServices', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasServices', 'url'=>array('create')),
	array('label'=>'Update SuppliersHasServices', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SuppliersHasServices', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SuppliersHasServices', 'url'=>array('admin')),
);
?>

<h1>View SuppliersHasServices #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'suppliers_id',
		'services_id',
		'add_date',
		'status',
	),
)); ?>
