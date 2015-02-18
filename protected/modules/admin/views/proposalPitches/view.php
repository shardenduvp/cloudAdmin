<?php
/* @var $this ProposalPitchesController */
/* @var $model ProposalPitches */

$this->breadcrumbs=array(
	'Proposal Pitches'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProposalPitches', 'url'=>array('index')),
	array('label'=>'Create ProposalPitches', 'url'=>array('create')),
	array('label'=>'Update ProposalPitches', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProposalPitches', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProposalPitches', 'url'=>array('admin')),
);
?>

<h1>View ProposalPitches #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'trial_period',
		'estimated_cost',
		'estimated_time',
		'min_price',
		'max_price',
		'time_material',
		'billing_schedule',
		'status',
		'add_date',
		'remarks',
		'added_by',
		'users_id',
		'suppliers_projects_id',
	),
)); ?>
