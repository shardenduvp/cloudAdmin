<?php
/* @var $this ZonesController */
/* @var $model Zones */

$this->breadcrumbs=array(
	'Zones'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Zones', 'url'=>array('index')),
	array('label'=>'Create Zones', 'url'=>array('create')),
	array('label'=>'View Zones', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Zones', 'url'=>array('admin')),
);
?>

<h1>Update Zones <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>