<?php
/* @var $this SuppliersHasAwardsController */
/* @var $model SuppliersHasAwards */

$this->breadcrumbs=array(
	'Suppliers Has Awards'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List SuppliersHasAwards', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasAwards', 'url'=>array('create')),
	array('label'=>'Update SuppliersHasAwards', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SuppliersHasAwards', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SuppliersHasAwards', 'url'=>array('admin')),
);
?>

<h1>View SuppliersHasAwards #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'suppliers_id',
		'title',
		'description',
		'image',
	),
)); ?>
