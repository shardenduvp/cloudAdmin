<?php
/* @var $this ZonesController */
/* @var $data Zones */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gmt')); ?>:</b>
	<?php echo CHtml::encode($data->gmt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('save_hour')); ?>:</b>
	<?php echo CHtml::encode($data->save_hour); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zonescol')); ?>:</b>
	<?php echo CHtml::encode($data->zonescol); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>