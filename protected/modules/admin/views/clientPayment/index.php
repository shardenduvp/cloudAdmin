<?php
/* @var $this ClientPaymentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Client Payments',
);

$this->menu=array(
	array('label'=>'Create ClientPayment', 'url'=>array('create')),
	array('label'=>'Manage ClientPayment', 'url'=>array('admin')),
);
?>

<h1>Client Payments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
