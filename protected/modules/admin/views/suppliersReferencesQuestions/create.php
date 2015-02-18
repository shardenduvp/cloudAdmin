<?php
/* @var $this SuppliersReferencesQuestionsController */
/* @var $model SuppliersReferencesQuestions */

$this->breadcrumbs=array(
	'Suppliers References Questions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SuppliersReferencesQuestions', 'url'=>array('index')),
	array('label'=>'Manage SuppliersReferencesQuestions', 'url'=>array('admin')),
);
?>

<h1>Create SuppliersReferencesQuestions</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>