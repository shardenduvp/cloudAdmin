<?php
/* @var $this SuppliersReferencesQuestionsController */
/* @var $data SuppliersReferencesQuestions */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('review_questions_id')); ?>:</b>
	<?php echo CHtml::encode($data->review_questions_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('suppliers_has_references_id')); ?>:</b>
	<?php echo CHtml::encode($data->suppliers_has_references_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('answers')); ?>:</b>
	<?php echo CHtml::encode($data->answers); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rating')); ?>:</b>
	<?php echo CHtml::encode($data->rating); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('add_date')); ?>:</b>
	<?php echo CHtml::encode($data->add_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>