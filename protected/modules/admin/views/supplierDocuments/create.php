<?php
/* @var $this SupplierDocumentsController */
/* @var $model SupplierDocuments */

$this->breadcrumbs=array(
	'Supplier Documents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SupplierDocuments', 'url'=>array('index')),
	array('label'=>'Manage SupplierDocuments', 'url'=>array('admin')),
);
?>

<h1>Create SupplierDocuments</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>