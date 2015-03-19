<?php
/* @var $this PitchHasMilestonesController */
/* @var $model PitchHasMilestones */

$this->breadcrumbs=array(
	'Pitch Has Milestones'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List PitchHasMilestones', 'url'=>array('index')),
	array('label'=>'Create PitchHasMilestones', 'url'=>array('create')),
	array('label'=>'Update PitchHasMilestones', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PitchHasMilestones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PitchHasMilestones', 'url'=>array('admin')),
);
?>

<h1>View PitchHasMilestones #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'overview',
		'start_date',
		'end_date',
		'due_date',
		'amount',
		'note',
		'is_schedule_payment',
		'transaction',
		'add_date',
		'status',
		'proposal_pitches_id',
		'users_id',
	),
)); ?>
