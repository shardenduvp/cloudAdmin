<?php
/* @var $this SuppliersHasCategoryRatingController */
/* @var $model SuppliersHasCategoryRating */

$this->breadcrumbs=array(
	'Suppliers Has Category Ratings'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SuppliersHasCategoryRating', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasCategoryRating', 'url'=>array('create')),
	array('label'=>'View SuppliersHasCategoryRating', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SuppliersHasCategoryRating', 'url'=>array('admin')),
);
?>

<h1>Update SuppliersHasCategoryRating <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>