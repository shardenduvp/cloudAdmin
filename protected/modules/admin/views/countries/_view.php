<?php
/* @var $this CountriesController */
/* @var $data Countries */
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code2')); ?>:</b>
	<?php echo CHtml::encode($data->code2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('geo_lat')); ?>:</b>
	<?php echo CHtml::encode($data->geo_lat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('geo_lng')); ?>:</b>
	<?php echo CHtml::encode($data->geo_lng); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('regions_id')); ?>:</b>
	<?php echo CHtml::encode($data->regions_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price_zone_id')); ?>:</b>
	<?php echo CHtml::encode($data->price_zone_id); ?>
	<br />

	*/ ?>

</div>