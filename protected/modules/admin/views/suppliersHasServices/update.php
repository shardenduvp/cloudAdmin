<?php
/* @var $this SuppliersHasServicesController */
/* @var $model SuppliersHasServices */

$this->breadcrumbs=array(
	'Suppliers Has Services'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SuppliersHasServices', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasServices', 'url'=>array('create')),
	array('label'=>'View SuppliersHasServices', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SuppliersHasServices', 'url'=>array('admin')),
);
?>

<h1>Update SuppliersHasServices <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>