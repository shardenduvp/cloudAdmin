<?php
/* @var $this ProposalPitchesController */
/* @var $data ProposalPitches */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trial_period')); ?>:</b>
	<?php echo CHtml::encode($data->trial_period); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estimated_cost')); ?>:</b>
	<?php echo CHtml::encode($data->estimated_cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estimated_time')); ?>:</b>
	<?php echo CHtml::encode($data->estimated_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('min_price')); ?>:</b>
	<?php echo CHtml::encode($data->min_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('max_price')); ?>:</b>
	<?php echo CHtml::encode($data->max_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_material')); ?>:</b>
	<?php echo CHtml::encode($data->time_material); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('billing_schedule')); ?>:</b>
	<?php echo CHtml::encode($data->billing_schedule); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('add_date')); ?>:</b>
	<?php echo CHtml::encode($data->add_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remarks')); ?>:</b>
	<?php echo CHtml::encode($data->remarks); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('added_by')); ?>:</b>
	<?php echo CHtml::encode($data->added_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('users_id')); ?>:</b>
	<?php echo CHtml::encode($data->users_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('suppliers_projects_id')); ?>:</b>
	<?php echo CHtml::encode($data->suppliers_projects_id); ?>
	<br />

	*/ ?>

</div>