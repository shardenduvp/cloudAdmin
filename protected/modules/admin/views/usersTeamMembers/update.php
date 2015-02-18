<?php
/* @var $this UsersTeamMembersController */
/* @var $model UsersTeamMembers */

$this->breadcrumbs=array(
	'Users Team Members'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UsersTeamMembers', 'url'=>array('index')),
	array('label'=>'Create UsersTeamMembers', 'url'=>array('create')),
	array('label'=>'View UsersTeamMembers', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UsersTeamMembers', 'url'=>array('admin')),
);
?>

<h1>Update UsersTeamMembers <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>