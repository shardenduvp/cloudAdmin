<?php
/* @var $this UsersTeamMembersController */
/* @var $model UsersTeamMembers */

$this->breadcrumbs=array(
	'Users Team Members'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UsersTeamMembers', 'url'=>array('index')),
	array('label'=>'Manage UsersTeamMembers', 'url'=>array('admin')),
);
?>

<h1>Create UsersTeamMembers</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>