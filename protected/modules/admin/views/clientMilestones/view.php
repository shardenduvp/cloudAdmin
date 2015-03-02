<?php
/* @var $this ClientMilestonesController */
/* @var $model ClientMilestones */

$this->breadcrumbs=array(
	'Client Milestones'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ClientMilestones', 'url'=>array('index')),
	array('label'=>'Create ClientMilestones', 'url'=>array('create')),
	array('label'=>'Update ClientMilestones', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClientMilestones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClientMilestones', 'url'=>array('admin')),
);
?>

<h1>View ClientMilestones #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'client_profiles_id',
		'name',
		'desc',
		'payment',
		'mod_date',
		'payment_date',
		'add_date',
		'status',
	),
)); ?>
