<?php
/* @var $this SuppliersReferencesQuestionsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Suppliers References Questions',
);

$this->menu=array(
	array('label'=>'Create SuppliersReferencesQuestions', 'url'=>array('create')),
	array('label'=>'Manage SuppliersReferencesQuestions', 'url'=>array('admin')),
);
?>

<h1>Suppliers References Questions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
