<?php
/* @var $this SupplierDocumentsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Supplier Documents',
);

$this->menu=array(
	array('label'=>'Create SupplierDocuments', 'url'=>array('create')),
	array('label'=>'Manage SupplierDocuments', 'url'=>array('admin')),
);
?>

<h1>Supplier Documents</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
