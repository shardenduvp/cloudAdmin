<?php
/* @var $this SuppliersHasCategoryRatingController */
/* @var $model SuppliersHasCategoryRating */

$this->breadcrumbs=array(
	'Suppliers Has Category Ratings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SuppliersHasCategoryRating', 'url'=>array('index')),
	array('label'=>'Manage SuppliersHasCategoryRating', 'url'=>array('admin')),
);
?>

<h1>Create SuppliersHasCategoryRating</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>