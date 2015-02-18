<?php
/* @var $this UsersHasCitiesController */
/* @var $model UsersHasCities */

$this->breadcrumbs=array(
	'Users Has Cities'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UsersHasCities', 'url'=>array('index')),
	array('label'=>'Create UsersHasCities', 'url'=>array('create')),
	array('label'=>'View UsersHasCities', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UsersHasCities', 'url'=>array('admin')),
);
?>

<h1>Update UsersHasCities <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>