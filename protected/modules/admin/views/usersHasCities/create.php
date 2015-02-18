<?php
/* @var $this UsersHasCitiesController */
/* @var $model UsersHasCities */

$this->breadcrumbs=array(
	'Users Has Cities'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UsersHasCities', 'url'=>array('index')),
	array('label'=>'Manage UsersHasCities', 'url'=>array('admin')),
);
?>

<h1>Create UsersHasCities</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>