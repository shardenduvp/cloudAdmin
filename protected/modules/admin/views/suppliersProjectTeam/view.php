<?php
/* @var $this SuppliersProjectTeamController */
/* @var $model SuppliersProjectTeam */

$this->breadcrumbs=array(
	'Suppliers Project Teams'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List SuppliersProjectTeam', 'url'=>array('index')),
	array('label'=>'Create SuppliersProjectTeam', 'url'=>array('create')),
	array('label'=>'Update SuppliersProjectTeam', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SuppliersProjectTeam', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SuppliersProjectTeam', 'url'=>array('admin')),
);
?>

<h1>View SuppliersProjectTeam #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'project_proposal_id',
		'name',
		'description',
		'image',
		'created',
		'modified',
	),
)); ?>
