<?php
/* @var $this ClientProjectsHasServicesController */
/* @var $model ClientProjectsHasServices */

$this->breadcrumbs=array(
	'Client Projects Has Services'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClientProjectsHasServices', 'url'=>array('index')),
	array('label'=>'Create ClientProjectsHasServices', 'url'=>array('create')),
	array('label'=>'View ClientProjectsHasServices', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ClientProjectsHasServices', 'url'=>array('admin')),
);
?>

<h1>Update ClientProjectsHasServices <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>