<?php
/* @var $this UsersHasTeamController */
/* @var $model UsersHasTeam */

$this->breadcrumbs=array(
	'Users Has Teams'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UsersHasTeam', 'url'=>array('index')),
	array('label'=>'Create UsersHasTeam', 'url'=>array('create')),
	array('label'=>'View UsersHasTeam', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UsersHasTeam', 'url'=>array('admin')),
);
?>

<h1>Update UsersHasTeam <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>