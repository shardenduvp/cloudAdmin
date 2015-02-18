<?php
/* @var $this SuppliersHasCitiesController */
/* @var $model SuppliersHasCities */

$this->breadcrumbs=array(
	'Suppliers Has Cities'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SuppliersHasCities', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasCities', 'url'=>array('create')),
	array('label'=>'View SuppliersHasCities', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SuppliersHasCities', 'url'=>array('admin')),
);
?>

<h1>Update SuppliersHasCities <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>