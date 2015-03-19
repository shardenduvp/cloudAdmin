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
		'billing_type',
		'tm_billing_schedule_type',
		'tm_amount',
		'fp_total_price',
		'fp_total_price_interval',
		'duration',
		'start_date',
		'trial',
		'add_date',
		'status',
		'remarks',
		'client_note',
		'client_comment',
		'notes',
		'admin_note',
		'users_id',
		'suppliers_projects_id',
	),
)); ?>
