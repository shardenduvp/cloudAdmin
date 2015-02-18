<?php
/* @var $this SuppliersFaqAnswersController */
/* @var $model SuppliersFaqAnswers */

$this->breadcrumbs=array(
	'Suppliers Faq Answers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SuppliersFaqAnswers', 'url'=>array('index')),
	array('label'=>'Create SuppliersFaqAnswers', 'url'=>array('create')),
	array('label'=>'Update SuppliersFaqAnswers', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SuppliersFaqAnswers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SuppliersFaqAnswers', 'url'=>array('admin')),
);
?>

<h1>View SuppliersFaqAnswers #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'suppliers_id',
		'faq_id',
		'status',
		'add_date',
		'answer',
		'publish',
	),
)); ?>
