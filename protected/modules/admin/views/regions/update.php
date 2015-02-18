<?php
/* @var $this RegionsController */
/* @var $model Regions */

$this->breadcrumbs=array(
	'Regions'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Regions', 'url'=>array('index')),
	array('label'=>'Create Regions', 'url'=>array('create')),
	array('label'=>'View Regions', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Regions', 'url'=>array('admin')),
);
?>

<h1>Update Regions <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>