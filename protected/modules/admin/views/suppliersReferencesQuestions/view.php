<?php
/* @var $this SuppliersReferencesQuestionsController */
/* @var $model SuppliersReferencesQuestions */

$this->breadcrumbs=array(
	'Suppliers References Questions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SuppliersReferencesQuestions', 'url'=>array('index')),
	array('label'=>'Create SuppliersReferencesQuestions', 'url'=>array('create')),
	array('label'=>'Update SuppliersReferencesQuestions', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SuppliersReferencesQuestions', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SuppliersReferencesQuestions', 'url'=>array('admin')),
);
?>

<h1>View SuppliersReferencesQuestions #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'review_questions_id',
		'suppliers_has_references_id',
		'answers',
		'rating',
		'add_date',
		'status',
	),
)); ?>
