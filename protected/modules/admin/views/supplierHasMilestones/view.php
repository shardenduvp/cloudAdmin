<?php
/* @var $this SupplierHasMilestonesController */
/* @var $model SupplierHasMilestones */

$this->breadcrumbs=array(
	'Supplier Has Milestones'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SupplierHasMilestones', 'url'=>array('index')),
	array('label'=>'Create SupplierHasMilestones', 'url'=>array('create')),
	array('label'=>'Update SupplierHasMilestones', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SupplierHasMilestones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SupplierHasMilestones', 'url'=>array('admin')),
);
?>

<h1>View SupplierHasMilestones #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'module',
		'start_date',
		'end_date',
		'amount',
		'date',
		'status',
		'transaction',
		'note',
		'reminder_date',
		'milestone_title',
		'overview',
		'due_date',
		'is_schedule_payment',
		'suppliers_id',
		'supplier_proposal_id',
	),
)); ?>
