<?php
/* @var $this SuppliersFaqAnswersController */
/* @var $model SuppliersFaqAnswers */

$this->breadcrumbs=array(
	'Suppliers Faq Answers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SuppliersFaqAnswers', 'url'=>array('index')),
	array('label'=>'Manage SuppliersFaqAnswers', 'url'=>array('admin')),
);
?>

<h1>Create SuppliersFaqAnswers</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>