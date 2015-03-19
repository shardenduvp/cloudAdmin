<?php
/* @var $this LogController */
/* @var $data Log */
?>

<div class="view">
<div class="big-body">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?><br>
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('proposal_id')); ?>
	<?php echo CHtml::encode($data->proposal_id); ?><br>
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_status')); ?>
	<?php echo CHtml::encode($data->project_status); ?><br>
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_checked')); ?>
	<?php echo CHtml::encode($data->is_checked); ?><br>
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>
	<?php echo CHtml::encode($data->title); ?><br>
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>
	<?php echo CHtml::encode($data->description); ?><br>
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('add_date')); ?>
	<?php echo CHtml::encode($data->add_date); ?><br>
	

	<?php echo CHtml::encode($data->getAttributeLabel('update_date')); ?>
	<?php echo CHtml::encode($data->update_date); ?><br>
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>
	<?php echo CHtml::encode($data->status); ?><br>
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('for_user')); ?>
	<?php echo CHtml::encode($data->for_user); ?><br>
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('notification')); ?>
	<?php echo CHtml::encode($data->notification); ?><br>
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_read')); ?>
	<?php echo CHtml::encode($data->is_read); ?><br>
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_active')); ?>
	<?php echo CHtml::encode($data->is_active); ?><br>
	

	<b><?php echo CHtml::encode($data->getAttributeLabel('login_id')); ?>
	<?php echo CHtml::encode($data->login_id); ?><br>
	

</div>