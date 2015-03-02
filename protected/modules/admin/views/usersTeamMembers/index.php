<?php
/* @var $this UsersTeamMembersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users Team Members',
);

$this->menu=array(
	array('label'=>'Create UsersTeamMembers', 'url'=>array('create')),
	array('label'=>'Manage UsersTeamMembers', 'url'=>array('admin')),
);
?>

<h1>Users Team Members</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
