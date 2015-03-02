<?php
/* @var $this ClientProjectsQuestionsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Client Projects Questions',
);

$this->menu=array(
	array('label'=>'Create ClientProjectsQuestions', 'url'=>array('create')),
	array('label'=>'Manage ClientProjectsQuestions', 'url'=>array('admin')),
);
?>

<h1>Client Projects Questions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
