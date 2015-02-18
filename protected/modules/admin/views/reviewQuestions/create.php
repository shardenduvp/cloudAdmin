<?php
/* @var $this ReviewQuestionsController */
/* @var $model ReviewQuestions */

$this->breadcrumbs=array(
	'Review Questions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ReviewQuestions', 'url'=>array('index')),
	array('label'=>'Manage ReviewQuestions', 'url'=>array('admin')),
);
?>

<h1>Create ReviewQuestions</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>