<?php
/* @var $this ClientProjectStatusController */
/* @var $model ClientProjectStatus */

$this->breadcrumbs=array(
	'Client Project Statuses'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClientProjectStatus', 'url'=>array('index')),
	array('label'=>'Create ClientProjectStatus', 'url'=>array('create')),
	array('label'=>'View ClientProjectStatus', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ClientProjectStatus', 'url'=>array('admin')),
);
?>

<h1>Update ClientProjectStatus <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>