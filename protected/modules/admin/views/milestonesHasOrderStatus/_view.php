<?php
/* @var $this MilestonesHasOrderStatusController */
/* @var $data MilestonesHasOrderStatus */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('supplier_milestones_id')); ?>:</b>
	<?php echo CHtml::encode($data->supplier_milestones_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('old_status')); ?>:</b>
	<?php echo CHtml::encode($data->old_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('new_status')); ?>:</b>
	<?php echo CHtml::encode($data->new_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('note')); ?>:</b>
	<?php echo CHtml::encode($data->note); ?>
	<br />


</div>