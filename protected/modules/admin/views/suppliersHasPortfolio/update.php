<?php
/* @var $this SuppliersHasPortfolioController */
/* @var $model SuppliersHasPortfolio */

$this->breadcrumbs=array(
	'Suppliers Has Portfolios'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SuppliersHasPortfolio', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasPortfolio', 'url'=>array('create')),
	array('label'=>'View SuppliersHasPortfolio', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SuppliersHasPortfolio', 'url'=>array('admin')),
);
?>

<h1>Update SuppliersHasPortfolio <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>