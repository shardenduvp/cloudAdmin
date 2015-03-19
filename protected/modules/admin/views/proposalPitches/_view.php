<?php
/* @var $this ProposalPitchesController */
/* @var $data ProposalPitches */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('billing_type')); ?>:</b>
	<?php echo CHtml::encode($data->billing_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tm_billing_schedule_type')); ?>:</b>
	<?php echo CHtml::encode($data->tm_billing_schedule_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tm_amount')); ?>:</b>
	<?php echo CHtml::encode($data->tm_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fp_total_price')); ?>:</b>
	<?php echo CHtml::encode($data->fp_total_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fp_total_price_interval')); ?>:</b>
	<?php echo CHtml::encode($data->fp_total_price_interval); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('duration')); ?>:</b>
	<?php echo CHtml::encode($data->duration); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('start_date')); ?>:</b>
	<?php echo CHtml::encode($data->start_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trial')); ?>:</b>
	<?php echo CHtml::encode($data->trial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('add_date')); ?>:</b>
	<?php echo CHtml::encode($data->add_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remarks')); ?>:</b>
	<?php echo CHtml::encode($data->remarks); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_note')); ?>:</b>
	<?php echo CHtml::encode($data->client_note); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_comment')); ?>:</b>
	<?php echo CHtml::encode($data->client_comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notes')); ?>:</b>
	<?php echo CHtml::encode($data->notes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('admin_note')); ?>:</b>
	<?php echo CHtml::encode($data->admin_note); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('users_id')); ?>:</b>
	<?php echo CHtml::encode($data->users_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('suppliers_projects_id')); ?>:</b>
	<?php echo CHtml::encode($data->suppliers_projects_id); ?>
	<br />
	
</div>