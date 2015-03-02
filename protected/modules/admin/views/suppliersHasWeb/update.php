<?php
/* @var $this SuppliersHasWebController */
/* @var $model SuppliersHasWeb */

$this->breadcrumbs=array(
	'Suppliers Has Webs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SuppliersHasWeb', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasWeb', 'url'=>array('create')),
	array('label'=>'View SuppliersHasWeb', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SuppliersHasWeb', 'url'=>array('admin')),
);
?>

<h1>Update SuppliersHasWeb <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>