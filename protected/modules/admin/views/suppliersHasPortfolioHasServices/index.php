<?php
/* @var $this SuppliersHasPortfolioHasServicesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Suppliers Has Portfolio Has Services',
);

$this->menu=array(
	array('label'=>'Create SuppliersHasPortfolioHasServices', 'url'=>array('create')),
	array('label'=>'Manage SuppliersHasPortfolioHasServices', 'url'=>array('admin')),
);
?>

<h1>Suppliers Has Portfolio Has Services</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
