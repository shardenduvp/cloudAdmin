<?php
/* @var $this ClientPaymentController */
/* @var $model ClientPayment */

$this->breadcrumbs=array(
	'Client Payments'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List ClientPayment', 'url'=>array('index')),
	array('label'=>'Create ClientPayment', 'url'=>array('create')),
	array('label'=>'Update ClientPayment', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClientPayment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClientPayment', 'url'=>array('admin')),
);
?>

<h1>View ClientPayment #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'client_milestones_id',
		'title',
		'desc',
		'add_date',
		'status',
		'note',
		'payment_status',
		'transaction_id',
		'transaction_status',
	),
)); ?>
