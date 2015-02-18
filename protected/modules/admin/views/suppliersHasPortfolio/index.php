<?php
/* @var $this SuppliersHasPortfolioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Suppliers Has Portfolios',
);

$this->menu=array(
	array('label'=>'Create SuppliersHasPortfolio', 'url'=>array('create')),
	array('label'=>'Manage SuppliersHasPortfolio', 'url'=>array('admin')),
);
?>

<h1>Suppliers Has Portfolios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
