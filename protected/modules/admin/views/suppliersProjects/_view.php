<?php
/* @var $this SuppliersProjectsController */
/* @var $data SuppliersProjects */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pitch')); ?>:</b>
	<?php echo CHtml::encode($data->pitch); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('about_project')); ?>:</b>
	<?php echo CHtml::encode($data->about_project); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('why_you')); ?>:</b>
	<?php echo CHtml::encode($data->why_you); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estimated_cost')); ?>:</b>
	<?php echo CHtml::encode($data->estimated_cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estimated_time')); ?>:</b>
	<?php echo CHtml::encode($data->estimated_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trial_period')); ?>:</b>
	<?php echo CHtml::encode($data->trial_period); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('chat_room_id')); ?>:</b>
	<?php echo CHtml::encode($data->chat_room_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comments')); ?>:</b>
	<?php echo CHtml::encode($data->comments); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('billing_schedule')); ?>:</b>
	<?php echo CHtml::encode($data->billing_schedule); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_date')); ?>:</b>
	<?php echo CHtml::encode($data->start_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('note')); ?>:</b>
	<?php echo CHtml::encode($data->note); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_escrow')); ?>:</b>
	<?php echo CHtml::encode($data->is_escrow); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('others')); ?>:</b>
	<?php echo CHtml::encode($data->others); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('add_date')); ?>:</b>
	<?php echo CHtml::encode($data->add_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_projects_id')); ?>:</b>
	<?php echo CHtml::encode($data->client_projects_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('suppliers_id')); ?>:</b>
	<?php echo CHtml::encode($data->suppliers_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('default_q1_ans')); ?>:</b>
	<?php echo CHtml::encode($data->default_q1_ans); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('default_q2_ans')); ?>:</b>
	<?php echo CHtml::encode($data->default_q2_ans); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('default_q3_ans')); ?>:</b>
	<?php echo CHtml::encode($data->default_q3_ans); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('default_q4_ans')); ?>:</b>
	<?php echo CHtml::encode($data->default_q4_ans); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('default_q5_ans')); ?>:</b>
	<?php echo CHtml::encode($data->default_q5_ans); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('default_q6_ans')); ?>:</b>
	<?php echo CHtml::encode($data->default_q6_ans); ?>
	<br />

	*/ ?>

</div>