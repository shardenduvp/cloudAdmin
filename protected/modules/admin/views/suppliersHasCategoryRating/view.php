<?php
/* @var $this SuppliersHasCategoryRatingController */
/* @var $model SuppliersHasCategoryRating */

$this->breadcrumbs=array(
	'Suppliers Has Category Ratings'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SuppliersHasCategoryRating', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasCategoryRating', 'url'=>array('create')),
	array('label'=>'Update SuppliersHasCategoryRating', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SuppliersHasCategoryRating', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SuppliersHasCategoryRating', 'url'=>array('admin')),
);
?>

<h1>View SuppliersHasCategoryRating #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'suppliers_has_references_id',
		'review_category_id',
		'rating',
		'add_date',
		'status',
	),
)); ?>
