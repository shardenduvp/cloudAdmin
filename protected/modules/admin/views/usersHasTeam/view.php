<?php
/* @var $this UsersHasTeamController */
/* @var $model UsersHasTeam */

$this->breadcrumbs=array(
	'Users Has Teams'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UsersHasTeam', 'url'=>array('index')),
	array('label'=>'Create UsersHasTeam', 'url'=>array('create')),
	array('label'=>'Update UsersHasTeam', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UsersHasTeam', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UsersHasTeam', 'url'=>array('admin')),
);
?>

<h1>View UsersHasTeam #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'users_id',
		'team_id',
		'status',
		'add_date',
	),
)); ?>
