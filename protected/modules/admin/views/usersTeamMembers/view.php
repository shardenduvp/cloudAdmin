<?php
/* @var $this UsersTeamMembersController */
/* @var $model UsersTeamMembers */

$this->breadcrumbs=array(
	'Users Team Members'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List UsersTeamMembers', 'url'=>array('index')),
	array('label'=>'Create UsersTeamMembers', 'url'=>array('create')),
	array('label'=>'Update UsersTeamMembers', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UsersTeamMembers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UsersTeamMembers', 'url'=>array('admin')),
);
?>

<h1>View UsersTeamMembers #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'name',
		'designation',
		'dep',
		'image',
		'linkedin',
		'facebook',
		'twitter',
		'add_date',
		'status',
	),
)); ?>
