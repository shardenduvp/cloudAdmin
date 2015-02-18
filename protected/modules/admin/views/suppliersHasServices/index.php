<?php
/* @var $this SuppliersHasServicesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Suppliers Has Services',
);

$this->menu=array(
	array('label'=>'Create SuppliersHasServices', 'url'=>array('create')),
	array('label'=>'Manage SuppliersHasServices', 'url'=>array('admin')),
);
?>

<h1>Suppliers Has Services</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
