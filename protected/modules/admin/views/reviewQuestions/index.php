<?php
/* @var $this ReviewQuestionsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Review Questions',
);

$this->menu=array(
	array('label'=>'Create ReviewQuestions', 'url'=>array('create')),
	array('label'=>'Manage ReviewQuestions', 'url'=>array('admin')),
);
?>

<h1>Review Questions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
