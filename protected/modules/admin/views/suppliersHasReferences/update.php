<?php
/* @var $this SuppliersHasReferencesController */
/* @var $model SuppliersHasReferences */

$this->breadcrumbs=array(
	'Suppliers Has References'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SuppliersHasReferences', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasReferences', 'url'=>array('create')),
	array('label'=>'View SuppliersHasReferences', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SuppliersHasReferences', 'url'=>array('admin')),
);
?>

<h1>Update SuppliersHasReferences <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>