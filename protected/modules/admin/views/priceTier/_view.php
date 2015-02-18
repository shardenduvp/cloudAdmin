<?php
/* @var $this PriceTierController */
/* @var $data PriceTier */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('min_price')); ?>:</b>
	<?php echo CHtml::encode($data->min_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('max_price')); ?>:</b>
	<?php echo CHtml::encode($data->max_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('d_min_price')); ?>:</b>
	<?php echo CHtml::encode($data->d_min_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('d_max_price')); ?>:</b>
	<?php echo CHtml::encode($data->d_max_price); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('d_description')); ?>:</b>
	<?php echo CHtml::encode($data->d_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price_zone')); ?>:</b>
	<?php echo CHtml::encode($data->price_zone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price_zone_id')); ?>:</b>
	<?php echo CHtml::encode($data->price_zone_id); ?>
	<br />

	*/ ?>

</div>