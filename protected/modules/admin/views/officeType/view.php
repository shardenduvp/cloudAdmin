<?php
/* @var $this OfficeTypeController */
/* @var $model OfficeType */

$this->breadcrumbs=array(
	'Office Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List OfficeType', 'url'=>array('index')),
	array('label'=>'Create OfficeType', 'url'=>array('create')),
	array('label'=>'Update OfficeType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OfficeType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OfficeType', 'url'=>array('admin')),
);
?>

<h1>View OfficeType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'status',
		'add_date',
	),
)); ?>
