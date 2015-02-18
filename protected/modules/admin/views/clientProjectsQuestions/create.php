<?php
/* @var $this ClientProjectsQuestionsController */
/* @var $model ClientProjectsQuestions */

$this->breadcrumbs=array(
	'Client Projects Questions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClientProjectsQuestions', 'url'=>array('index')),
	array('label'=>'Manage ClientProjectsQuestions', 'url'=>array('admin')),
);
?>

<h1>Create ClientProjectsQuestions</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>