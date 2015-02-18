<?php
/* @var $this SuppliersPortfolioHasIndustriesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Suppliers Portfolio Has Industries',
);

$this->menu=array(
	array('label'=>'Create SuppliersPortfolioHasIndustries', 'url'=>array('create')),
	array('label'=>'Manage SuppliersPortfolioHasIndustries', 'url'=>array('admin')),
);
?>

<h1>Suppliers Portfolio Has Industries</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
