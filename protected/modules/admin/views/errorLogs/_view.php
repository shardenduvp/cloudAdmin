<?php
/* @var $this ErrorLogsController */
/* @var $data ErrorLogs */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_type')); ?>:</b>
	<?php echo CHtml::encode($data->user_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_name')); ?>:</b>
	<?php echo CHtml::encode($data->user_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('error_code')); ?>:</b>
	<?php echo CHtml::encode($data->error_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('message')); ?>:</b>
	<?php echo CHtml::encode($data->message); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('request_url')); ?>:</b>
	<?php echo CHtml::encode($data->request_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('query_string')); ?>:</b>
	<?php echo CHtml::encode($data->query_string); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('file_name')); ?>:</b>
	<?php echo CHtml::encode($data->file_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('line_number')); ?>:</b>
	<?php echo CHtml::encode($data->line_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('error_type')); ?>:</b>
	<?php echo CHtml::encode($data->error_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time')); ?>:</b>
	<?php echo CHtml::encode($data->time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reference_url')); ?>:</b>
	<?php echo CHtml::encode($data->reference_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ipaddress')); ?>:</b>
	<?php echo CHtml::encode($data->ipaddress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('browser')); ?>:</b>
	<?php echo CHtml::encode($data->browser); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	*/ ?>

</div>