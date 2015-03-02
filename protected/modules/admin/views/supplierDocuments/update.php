<?php
/* @var $this SupplierDocumentsController */
/* @var $model SupplierDocuments */

$this->breadcrumbs=array(
	'Supplier Documents'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SupplierDocuments', 'url'=>array('index')),
	array('label'=>'Create SupplierDocuments', 'url'=>array('create')),
	array('label'=>'View SupplierDocuments', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SupplierDocuments', 'url'=>array('admin')),
);
?>

<h1>Update SupplierDocuments <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>