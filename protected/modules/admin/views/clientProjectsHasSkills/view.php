<?php
/* @var $this ClientProjectsHasSkillsController */
/* @var $model ClientProjectsHasSkills */

$this->breadcrumbs=array(
	'Client Projects Has Skills'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ClientProjectsHasSkills', 'url'=>array('index')),
	array('label'=>'Create ClientProjectsHasSkills', 'url'=>array('create')),
	array('label'=>'Update ClientProjectsHasSkills', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClientProjectsHasSkills', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClientProjectsHasSkills', 'url'=>array('admin')),
);
?>

<h1>View ClientProjectsHasSkills #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'client_projects_id',
		'skills_id',
		'status',
		'add_date',
	),
)); ?>
