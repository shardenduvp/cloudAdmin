<?php
/* @var $this SuppliersPortfolioImagesController */
/* @var $model SuppliersPortfolioImages */

$this->breadcrumbs=array(
	'Suppliers Portfolio Images'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SuppliersPortfolioImages', 'url'=>array('index')),
	array('label'=>'Manage SuppliersPortfolioImages', 'url'=>array('admin')),
);
?>

<h1>Create SuppliersPortfolioImages</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>