<?php
/* @var $this ClientProjectsQuestionsController */
/* @var $model ClientProjectsQuestions */

$this->breadcrumbs=array(
	'Client Projects Questions'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List ClientProjectsQuestions', 'url'=>array('index')),
	array('label'=>'Create ClientProjectsQuestions', 'url'=>array('create')),
	array('label'=>'Update ClientProjectsQuestions', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClientProjectsQuestions', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClientProjectsQuestions', 'url'=>array('admin')),
);
?>

<h1>View ClientProjectsQuestions #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'question',
		'description',
		'title',
		'add_date',
		'status',
		'client_projects_id',
	),
)); ?>
