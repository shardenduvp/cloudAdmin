<?php
/* @var $this SuppliersHasIndustriesController */
/* @var $model SuppliersHasIndustries */

$this->breadcrumbs=array(
	'Suppliers Has Industries'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SuppliersHasIndustries', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasIndustries', 'url'=>array('create')),
	array('label'=>'View SuppliersHasIndustries', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SuppliersHasIndustries', 'url'=>array('admin')),
);
?>

<h1>Update SuppliersHasIndustries <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>