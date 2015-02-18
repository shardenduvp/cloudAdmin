<?php
/* @var $this SuppliersPortfolioImagesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Suppliers Portfolio Images',
);

$this->menu=array(
	array('label'=>'Create SuppliersPortfolioImages', 'url'=>array('create')),
	array('label'=>'Manage SuppliersPortfolioImages', 'url'=>array('admin')),
);
?>

<h1>Suppliers Portfolio Images</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
