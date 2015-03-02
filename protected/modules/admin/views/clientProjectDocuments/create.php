<?php
/* @var $this ClientProjectDocumentsController */
/* @var $model ClientProjectDocuments */

$this->breadcrumbs=array(
	'Client Project Documents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClientProjectDocuments', 'url'=>array('index')),
	array('label'=>'Manage ClientProjectDocuments', 'url'=>array('admin')),
);
?>

<h1>Create ClientProjectDocuments</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>