<?php
/* @var $this SupplierHasMilestonesController */
/* @var $data SupplierHasMilestones */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('module')); ?>:</b>
	<?php echo CHtml::encode($data->module); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_date')); ?>:</b>
	<?php echo CHtml::encode($data->start_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end_date')); ?>:</b>
	<?php echo CHtml::encode($data->end_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('transaction')); ?>:</b>
	<?php echo CHtml::encode($data->transaction); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('note')); ?>:</b>
	<?php echo CHtml::encode($data->note); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reminder_date')); ?>:</b>
	<?php echo CHtml::encode($data->reminder_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('milestone_title')); ?>:</b>
	<?php echo CHtml::encode($data->milestone_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('overview')); ?>:</b>
	<?php echo CHtml::encode($data->overview); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('due_date')); ?>:</b>
	<?php echo CHtml::encode($data->due_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_schedule_payment')); ?>:</b>
	<?php echo CHtml::encode($data->is_schedule_payment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('suppliers_id')); ?>:</b>
	<?php echo CHtml::encode($data->suppliers_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('supplier_proposal_id')); ?>:</b>
	<?php echo CHtml::encode($data->supplier_proposal_id); ?>
	<br />

	*/ ?>

</div>