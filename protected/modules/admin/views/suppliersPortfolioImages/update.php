<?php
/* @var $this SuppliersPortfolioImagesController */
/* @var $model SuppliersPortfolioImages */

$this->breadcrumbs=array(
	'Suppliers Portfolio Images'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SuppliersPortfolioImages', 'url'=>array('index')),
	array('label'=>'Create SuppliersPortfolioImages', 'url'=>array('create')),
	array('label'=>'View SuppliersPortfolioImages', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SuppliersPortfolioImages', 'url'=>array('admin')),
);
?>

<h1>Update SuppliersPortfolioImages <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>