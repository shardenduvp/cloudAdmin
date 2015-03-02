<?php
/* @var $this ReviewQuestionsController */
/* @var $model ReviewQuestions */

$this->breadcrumbs=array(
	'Review Questions'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ReviewQuestions', 'url'=>array('index')),
	array('label'=>'Create ReviewQuestions', 'url'=>array('create')),
	array('label'=>'View ReviewQuestions', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ReviewQuestions', 'url'=>array('admin')),
);
?>

<h1>Update ReviewQuestions <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>