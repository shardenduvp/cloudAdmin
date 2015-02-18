<?php
/* @var $this SuppliersPortfolioHasIndustriesController */
/* @var $model SuppliersPortfolioHasIndustries */

$this->breadcrumbs=array(
	'Suppliers Portfolio Has Industries'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SuppliersPortfolioHasIndustries', 'url'=>array('index')),
	array('label'=>'Create SuppliersPortfolioHasIndustries', 'url'=>array('create')),
	array('label'=>'View SuppliersPortfolioHasIndustries', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SuppliersPortfolioHasIndustries', 'url'=>array('admin')),
);
?>

<h1>Update SuppliersPortfolioHasIndustries <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>