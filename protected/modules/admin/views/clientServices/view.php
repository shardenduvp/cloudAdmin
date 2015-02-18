<?php
/* @var $this ClientServicesController */
/* @var $model ClientServices */

$this->breadcrumbs=array(
	'Client Services'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ClientServices', 'url'=>array('index')),
	array('label'=>'Create ClientServices', 'url'=>array('create')),
	array('label'=>'Update ClientServices', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClientServices', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClientServices', 'url'=>array('admin')),
);
?>

<h1>View ClientServices #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'client_profiles_id',
		'services_id',
		'add_date',
		'status',
		'active',
	),
)); ?>
