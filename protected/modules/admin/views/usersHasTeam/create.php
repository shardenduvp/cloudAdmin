<?php
/* @var $this UsersHasTeamController */
/* @var $model UsersHasTeam */

$this->breadcrumbs=array(
	'Users Has Teams'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UsersHasTeam', 'url'=>array('index')),
	array('label'=>'Manage UsersHasTeam', 'url'=>array('admin')),
);
?>

<h1>Create UsersHasTeam</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>