<?php
/* @var $this SupplierDocumentsController */
/* @var $model SupplierDocuments */

$this->breadcrumbs=array(
	'Supplier Documents'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List SupplierDocuments', 'url'=>array('index')),
	array('label'=>'Create SupplierDocuments', 'url'=>array('create')),
	array('label'=>'Update SupplierDocuments', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SupplierDocuments', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SupplierDocuments', 'url'=>array('admin')),
);
?>

<h1>View SupplierDocuments #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'suppliers_propsal_id',
		'name',
		'path',
		'extension',
		'size',
		'type',
		'status',
		'add_date',
	),
)); ?>
