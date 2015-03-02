<?php
/* @var $this SuppliersPortfolioHasIndustriesController */
/* @var $model SuppliersPortfolioHasIndustries */

$this->breadcrumbs=array(
	'Suppliers Portfolio Has Industries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SuppliersPortfolioHasIndustries', 'url'=>array('index')),
	array('label'=>'Manage SuppliersPortfolioHasIndustries', 'url'=>array('admin')),
);
?>

<h1>Create SuppliersPortfolioHasIndustries</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>