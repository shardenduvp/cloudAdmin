<?php
/* @var $this CallSchedulesController */
/* @var $data CallSchedules */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_phone')); ?>:</b>
	<?php echo CHtml::encode($data->client_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('call_time')); ?>:</b>
	<?php echo CHtml::encode($data->call_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('add_date')); ?>:</b>
	<?php echo CHtml::encode($data->add_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_projects_id')); ?>:</b>
	<?php echo CHtml::encode($data->client_projects_id); ?>
	<br />


</div>