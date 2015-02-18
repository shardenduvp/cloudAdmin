<?php
/* @var $this SuppliersHasPortfolioHasServicesController */
/* @var $model SuppliersHasPortfolioHasServices */

$this->breadcrumbs=array(
	'Suppliers Has Portfolio Has Services'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SuppliersHasPortfolioHasServices', 'url'=>array('index')),
	array('label'=>'Manage SuppliersHasPortfolioHasServices', 'url'=>array('admin')),
);
?>

<h1>Create SuppliersHasPortfolioHasServices</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>