<?php
/* @var $this ClientProjectsHasIndustriesController */
/* @var $data ClientProjectsHasIndustries */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_projects_id')); ?>:</b>
	<?php echo CHtml::encode($data->client_projects_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('industries_id')); ?>:</b>
	<?php echo CHtml::encode($data->industries_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('add_date')); ?>:</b>
	<?php echo CHtml::encode($data->add_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>