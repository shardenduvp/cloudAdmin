<?php
/* @var $this ClientProjectsQuestionsController */
/* @var $model ClientProjectsQuestions */

$this->breadcrumbs=array(
	'Client Projects Questions'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClientProjectsQuestions', 'url'=>array('index')),
	array('label'=>'Create ClientProjectsQuestions', 'url'=>array('create')),
	array('label'=>'View ClientProjectsQuestions', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ClientProjectsQuestions', 'url'=>array('admin')),
);
?>

<h1>Update ClientProjectsQuestions <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>