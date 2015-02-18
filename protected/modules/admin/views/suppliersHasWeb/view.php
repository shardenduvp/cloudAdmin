<?php
/* @var $this SuppliersHasWebController */
/* @var $model SuppliersHasWeb */

$this->breadcrumbs=array(
	'Suppliers Has Webs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SuppliersHasWeb', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasWeb', 'url'=>array('create')),
	array('label'=>'Update SuppliersHasWeb', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SuppliersHasWeb', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SuppliersHasWeb', 'url'=>array('admin')),
);
?>

<h1>View SuppliersHasWeb #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'suppliers_id',
		'social_site',
		'link',
	),
)); ?>
