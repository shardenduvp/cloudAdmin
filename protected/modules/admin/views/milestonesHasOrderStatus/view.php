<?php
/* @var $this MilestonesHasOrderStatusController */
/* @var $model MilestonesHasOrderStatus */

$this->breadcrumbs=array(
	'Milestones Has Order Statuses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MilestonesHasOrderStatus', 'url'=>array('index')),
	array('label'=>'Create MilestonesHasOrderStatus', 'url'=>array('create')),
	array('label'=>'Update MilestonesHasOrderStatus', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MilestonesHasOrderStatus', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MilestonesHasOrderStatus', 'url'=>array('admin')),
);
?>

<h1>View MilestonesHasOrderStatus #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'supplier_milestones_id',
		'old_status',
		'new_status',
		'date',
		'note',
	),
)); ?>
