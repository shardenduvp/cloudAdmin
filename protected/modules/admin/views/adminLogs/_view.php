<?php
/* @var $this AdminLogsController */
/* @var $data AdminLogs */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ipaddress')); ?>:</b>
	<?php echo CHtml::encode($data->ipaddress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logtime')); ?>:</b>
	<?php echo CHtml::encode($data->logtime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('controller')); ?>:</b>
	<?php echo CHtml::encode($data->controller); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('action')); ?>:</b>
	<?php echo CHtml::encode($data->action); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('details')); ?>:</b>
	<?php echo CHtml::encode($data->details); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('action_param')); ?>:</b>
	<?php echo CHtml::encode($data->action_param); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('browser')); ?>:</b>
	<?php echo CHtml::encode($data->browser); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('query_string')); ?>:</b>
	<?php echo CHtml::encode($data->query_string); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('refer_url')); ?>:</b>
	<?php echo CHtml::encode($data->refer_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('request_url')); ?>:</b>
	<?php echo CHtml::encode($data->request_url); ?>
	<br />

	*/ ?>

</div>