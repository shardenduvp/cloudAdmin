<?php
/* @var $this ClientProjectsController */
/* @var $data ClientProjects */
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('tag_line')); ?>:</b>
	<?php echo CHtml::encode($data->tag_line); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('business_problem')); ?>:</b>
	<?php echo CHtml::encode($data->business_problem); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('about_company')); ?>:</b>
	<?php echo CHtml::encode($data->about_company); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('team_size')); ?>:</b>
	<?php echo CHtml::encode($data->team_size); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('summary')); ?>:</b>
	<?php echo CHtml::encode($data->summary); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unique_features')); ?>:</b>
	<?php echo CHtml::encode($data->unique_features); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('min_budget')); ?>:</b>
	<?php echo CHtml::encode($data->min_budget); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('max_budget')); ?>:</b>
	<?php echo CHtml::encode($data->max_budget); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('custom_budget_range')); ?>:</b>
	<?php echo CHtml::encode($data->custom_budget_range); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_date')); ?>:</b>
	<?php echo CHtml::encode($data->start_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_start_preference')); ?>:</b>
	<?php echo CHtml::encode($data->project_start_preference); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('preferences')); ?>:</b>
	<?php echo CHtml::encode($data->preferences); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('regions')); ?>:</b>
	<?php echo CHtml::encode($data->regions); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tier')); ?>:</b>
	<?php echo CHtml::encode($data->tier); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('absolute_necessary_language')); ?>:</b>
	<?php echo CHtml::encode($data->absolute_necessary_language); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('good_know_language')); ?>:</b>
	<?php echo CHtml::encode($data->good_know_language); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('which_one_is_inportant')); ?>:</b>
	<?php echo CHtml::encode($data->which_one_is_inportant); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('questions_for_supplier')); ?>:</b>
	<?php echo CHtml::encode($data->questions_for_supplier); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('requirement_change_scale')); ?>:</b>
	<?php echo CHtml::encode($data->requirement_change_scale); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('add_date')); ?>:</b>
	<?php echo CHtml::encode($data->add_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modify_date')); ?>:</b>
	<?php echo CHtml::encode($data->modify_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_call_scheduled')); ?>:</b>
	<?php echo CHtml::encode($data->is_call_scheduled); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('other_status')); ?>:</b>
	<?php echo CHtml::encode($data->other_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('current_status')); ?>:</b>
	<?php echo CHtml::encode($data->current_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_profiles_id')); ?>:</b>
	<?php echo CHtml::encode($data->client_profiles_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('current_status_id')); ?>:</b>
	<?php echo CHtml::encode($data->current_status_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('other_current_status')); ?>:</b>
	<?php echo CHtml::encode($data->other_current_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->state); ?>
	<br />

	*/ ?>

</div>