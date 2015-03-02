<?php
/* @var $this CalculatorUsersController */
/* @var $model CalculatorUsers */

$this->breadcrumbs=array(
	'Calculator Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CalculatorUsers', 'url'=>array('index')),
	array('label'=>'Create CalculatorUsers', 'url'=>array('create')),
	array('label'=>'Update CalculatorUsers', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CalculatorUsers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CalculatorUsers', 'url'=>array('admin')),
);
?>

<h1>View CalculatorUsers #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'total_price',
		'total_hour',
		'status',
		'created',
		'modified',
		'phone_number',
	),
)); ?>
