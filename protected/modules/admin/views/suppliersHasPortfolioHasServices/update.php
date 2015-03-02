<?php
/* @var $this SuppliersHasPortfolioHasServicesController */
/* @var $model SuppliersHasPortfolioHasServices */

$this->breadcrumbs=array(
	'Suppliers Has Portfolio Has Services'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SuppliersHasPortfolioHasServices', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasPortfolioHasServices', 'url'=>array('create')),
	array('label'=>'View SuppliersHasPortfolioHasServices', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SuppliersHasPortfolioHasServices', 'url'=>array('admin')),
);
?>

<h1>Update SuppliersHasPortfolioHasServices <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>