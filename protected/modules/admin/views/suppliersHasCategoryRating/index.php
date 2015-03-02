<?php
/* @var $this SuppliersHasCategoryRatingController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Suppliers Has Category Ratings',
);

$this->menu=array(
	array('label'=>'Create SuppliersHasCategoryRating', 'url'=>array('create')),
	array('label'=>'Manage SuppliersHasCategoryRating', 'url'=>array('admin')),
);
?>

<h1>Suppliers Has Category Ratings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
