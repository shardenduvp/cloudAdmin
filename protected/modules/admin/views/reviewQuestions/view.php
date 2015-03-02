<?php
/* @var $this ReviewQuestionsController */
/* @var $model ReviewQuestions */

$this->breadcrumbs=array(
	'Review Questions'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List ReviewQuestions', 'url'=>array('index')),
	array('label'=>'Create ReviewQuestions', 'url'=>array('create')),
	array('label'=>'Update ReviewQuestions', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ReviewQuestions', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ReviewQuestions', 'url'=>array('admin')),
);
?>

<h1>View ReviewQuestions #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
		'add_date',
		'status',
		'review_category_id',
	),
)); ?>
