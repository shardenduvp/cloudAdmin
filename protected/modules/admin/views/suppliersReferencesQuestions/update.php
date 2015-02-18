<?php
/* @var $this SuppliersReferencesQuestionsController */
/* @var $model SuppliersReferencesQuestions */

$this->breadcrumbs=array(
	'Suppliers References Questions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SuppliersReferencesQuestions', 'url'=>array('index')),
	array('label'=>'Create SuppliersReferencesQuestions', 'url'=>array('create')),
	array('label'=>'View SuppliersReferencesQuestions', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SuppliersReferencesQuestions', 'url'=>array('admin')),
);
?>

<h1>Update SuppliersReferencesQuestions <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>