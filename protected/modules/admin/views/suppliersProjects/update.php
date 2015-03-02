<?php
/* @var $this SuppliersProjectsController */
/* @var $model SuppliersProjects */

$this->breadcrumbs=array(
	'Suppliers Projects'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SuppliersProjects', 'url'=>array('index')),
	array('label'=>'Create SuppliersProjects', 'url'=>array('create')),
	array('label'=>'View SuppliersProjects', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SuppliersProjects', 'url'=>array('admin')),
);
?>

<h1>Update SuppliersProjects <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>