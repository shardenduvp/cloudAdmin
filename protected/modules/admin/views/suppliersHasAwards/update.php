<?php
/* @var $this SuppliersHasAwardsController */
/* @var $model SuppliersHasAwards */

$this->breadcrumbs=array(
	'Suppliers Has Awards'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SuppliersHasAwards', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasAwards', 'url'=>array('create')),
	array('label'=>'View SuppliersHasAwards', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SuppliersHasAwards', 'url'=>array('admin')),
);
?>

<h1>Update SuppliersHasAwards <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>