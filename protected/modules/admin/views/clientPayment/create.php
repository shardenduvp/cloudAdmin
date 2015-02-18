<?php
/* @var $this ClientPaymentController */
/* @var $model ClientPayment */

$this->breadcrumbs=array(
	'Client Payments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClientPayment', 'url'=>array('index')),
	array('label'=>'Manage ClientPayment', 'url'=>array('admin')),
);
?>

<h1>Create ClientPayment</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>