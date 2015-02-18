<?php
/* @var $this ClientProjectsController */
/* @var $model ClientProjects */

$this->breadcrumbs=array(
	'Client Projects'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClientProjects', 'url'=>array('index')),
	array('label'=>'Create ClientProjects', 'url'=>array('create')),
	array('label'=>'View ClientProjects', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ClientProjects', 'url'=>array('admin')),
);
?>

<h1>Update ClientProjects <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>