<?php
/* @var $this SuppliersPortfolioHasSkillsController */
/* @var $data SuppliersPortfolioHasSkills */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('portfolio_id')); ?>:</b>
	<?php echo CHtml::encode($data->portfolio_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skills_id')); ?>:</b>
	<?php echo CHtml::encode($data->skills_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('add_date')); ?>:</b>
	<?php echo CHtml::encode($data->add_date); ?>
	<br />


</div>