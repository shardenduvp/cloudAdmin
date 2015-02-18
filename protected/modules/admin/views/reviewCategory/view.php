<?php
/* @var $this ReviewCategoryController */
/* @var $model ReviewCategory */

$this->breadcrumbs=array(
	'Review Categories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ReviewCategory', 'url'=>array('index')),
	array('label'=>'Create ReviewCategory', 'url'=>array('create')),
	array('label'=>'Update ReviewCategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ReviewCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ReviewCategory', 'url'=>array('admin')),
);
?>

<h1>View ReviewCategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'add_date',
		'status',
	),
)); ?>
