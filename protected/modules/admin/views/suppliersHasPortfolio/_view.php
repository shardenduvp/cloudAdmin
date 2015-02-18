<?php
/* @var $this SuppliersHasPortfolioController */
/* @var $data SuppliersHasPortfolio */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('suppliers_id')); ?>:</b>
	<?php echo CHtml::encode($data->suppliers_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_name')); ?>:</b>
	<?php echo CHtml::encode($data->project_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_link')); ?>:</b>
	<?php echo CHtml::encode($data->project_link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('industry_id')); ?>:</b>
	<?php echo CHtml::encode($data->industry_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_id')); ?>:</b>
	<?php echo CHtml::encode($data->service_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('client_name')); ?>:</b>
	<?php echo CHtml::encode($data->client_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year_done')); ?>:</b>
	<?php echo CHtml::encode($data->year_done); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estimate_price')); ?>:</b>
	<?php echo CHtml::encode($data->estimate_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_date')); ?>:</b>
	<?php echo CHtml::encode($data->start_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estimate_timeline')); ?>:</b>
	<?php echo CHtml::encode($data->estimate_timeline); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('language_used')); ?>:</b>
	<?php echo CHtml::encode($data->language_used); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cover')); ?>:</b>
	<?php echo CHtml::encode($data->cover); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('add_date')); ?>:</b>
	<?php echo CHtml::encode($data->add_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('portfolio_type')); ?>:</b>
	<?php echo CHtml::encode($data->portfolio_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('one_line_pitch')); ?>:</b>
	<?php echo CHtml::encode($data->one_line_pitch); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('who_can')); ?>:</b>
	<?php echo CHtml::encode($data->who_can); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('markets')); ?>:</b>
	<?php echo CHtml::encode($data->markets); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('portfolio_status')); ?>:</b>
	<?php echo CHtml::encode($data->portfolio_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_of_customers')); ?>:</b>
	<?php echo CHtml::encode($data->no_of_customers); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('launched_in')); ?>:</b>
	<?php echo CHtml::encode($data->launched_in); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_of_users')); ?>:</b>
	<?php echo CHtml::encode($data->no_of_users); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deployment')); ?>:</b>
	<?php echo CHtml::encode($data->deployment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_free_trial')); ?>:</b>
	<?php echo CHtml::encode($data->is_free_trial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('project_size')); ?>:</b>
	<?php echo CHtml::encode($data->project_size); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('per_hour_rate')); ?>:</b>
	<?php echo CHtml::encode($data->per_hour_rate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('platform')); ?>:</b>
	<?php echo CHtml::encode($data->platform); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_name')); ?>:</b>
	<?php echo CHtml::encode($data->company_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_discreet')); ?>:</b>
	<?php echo CHtml::encode($data->is_discreet); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('discreet_desc')); ?>:</b>
	<?php echo CHtml::encode($data->discreet_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location')); ?>:</b>
	<?php echo CHtml::encode($data->location); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />

	*/ ?>

</div>