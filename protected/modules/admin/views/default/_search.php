<?php
/* @var $this ClientProjectsController */
/* @var $model ClientProjects */
/* @var $form CActiveForm */
?>
<div class="box border inverse">
	<div class="box-title">
		<h4><i class="fa fa-bars"></i>Input groups</h4>
		<div class="tools">
		<a href="#box-config" data-toggle="modal" class="config">
		<i class="fa fa-cog"></i>
		</a>
		<a href="javascript:;" class="reload">
		<i class="fa fa-refresh"></i>
		</a>
		<a href="javascript:;" class="collapse">
		<i class="fa fa-chevron-up"></i>
		</a>
		<a href="javascript:;" class="remove">
		<i class="fa fa-times"></i>
		</a>
	</div>
</div>
	<div class="box-body big">
<form class="form-horizontal" role="form">

<div class="form-group">
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
	<label class="control-label col-sm-2">
		<?php echo $form->label($model,'id'); ?></label>
		<?php echo $form->textField($model,'id', array('size'=>52,'maxlength'=>100)); ?>
	</div>
	<div class="row">
	<label class="control-label col-sm-2">
		<?php echo $form->label($model,'name'); ?></label>
		<?php echo $form->textField($model,'name',array('size'=>52,'maxlength'=>100)); ?>
	</div>

	<div class="row">
	<label class="control-label col-sm-2">
		<?php echo $form->label($model,'description'); ?></label>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
	<label class="control-label col-sm-2">
		<?php echo $form->label($model,'tag_line'); ?></label>
		<?php echo $form->textField($model,'tag_line',array('size'=>52,'maxlength'=>100)); ?>
	</div>

	<div class="row">
	<label class="control-label col-sm-2">
		<?php echo $form->label($model,'business_problem'); ?></label>
		<?php echo $form->textArea($model,'business_problem',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
	<label class="control-label col-sm-2">
		<?php echo $form->label($model,'about_company'); ?></label>
		<?php echo $form->textArea($model,'about_company',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
	<label class="control-label col-sm-2">
		<?php echo $form->label($model,'team_size'); ?></label>
		<?php echo $form->textField($model,'team_size',array('size'=>52,'maxlength'=>100)); ?>
	</div>

	<div class="row">
	<label class="control-label col-sm-2">
		<?php echo $form->label($model,'summary'); ?></label>
		<?php echo $form->textArea($model,'summary',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
	<label class="control-label col-sm-2">
		<?php echo $form->label($model,'unique_features'); ?></label>
		<?php echo $form->textArea($model,'unique_features',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
	<label class="control-label col-sm-2">
		<?php echo $form->label($model,'min_budget'); ?></label>
		<?php echo $form->textField($model,'min_budget',array('size'=>52,'maxlength'=>100)); ?>
	</div>

	<div class="row">
	<label class="control-label col-sm-2">
		<?php echo $form->label($model,'max_budget'); ?></label>
		<?php echo $form->textField($model,'max_budget',array('size'=>52,'maxlength'=>100)); ?>
	</div>

	<div class="row">
	<label class="control-label col-sm-2">
		<?php echo $form->label($model,'custom_budget_range'); ?></label>
		<?php echo $form->textField($model,'custom_budget_range',array('size'=>52,'maxlength'=>100)); ?>
	</div>

	<div class="row">
	<label class="control-label col-sm-2">
		<?php echo $form->label($model,'start_date'); ?></label>
		<?php echo $form->textField($model,'start_date',array('size'=>52,'maxlength'=>100)); ?>
		</div>

	<div class="row">
	<label class="control-label col-sm-2">
		<?php echo $form->label($model,'project_start_preference'); ?></label>
		<?php echo $form->textField($model,'project_start_preference',array('size'=>52,'maxlength'=>100)); ?>
	</div>

	<div class="row">
	<label class="control-label col-sm-2">
		<?php echo $form->label($model,'preferences'); ?></label>
		<?php echo $form->textField($model,'preferences',array('size'=>52,'maxlength'=>100)); ?>
	</div>

	<div class="row">
	<label class="control-label col-sm-2">
		<?php echo $form->label($model,'regions'); ?></label>
		<?php echo $form->textField($model,'regions',array('size'=>52,'maxlength'=>100)); ?>
	</div>

	<div class="row">
	<label class="control-label col-sm-2">
		<?php echo $form->label($model,'tier'); ?></label>
		<?php echo $form->textField($model,'tier',array('size'=>52,'maxlength'=>100)); ?>
	</div>

	<div class="row">
	<label class="control-label col-sm-2">
		<?php echo $form->label($model,'absolute_necessary_language'); ?></label>
		<?php echo $form->textField($model,'absolute_necessary_language',array('size'=>52,'maxlength'=>100)); ?>
	</div>

	<div class="row">
	<label class="control-label col-sm-2">
		<?php echo $form->label($model,'good_know_language'); ?></label>
		<?php echo $form->textField($model,'good_know_language',array('size'=>52,'maxlength'=>100)); ?>
	</div>

	<div class="row">
	<label class="control-label col-sm-2">
		<?php echo $form->label($model,'which_one_is_inportant'); ?></label>
		<?php echo $form->textField($model,'which_one_is_inportant',array('size'=>52,'maxlength'=>100)); ?>
	</div>

	<div class="row">
	<label class="control-label col-sm-2">
		<?php echo $form->label($model,'questions_for_supplier'); ?></label>
		<?php echo $form->textArea($model,'questions_for_supplier',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
	<label class="control-label col-sm-2">
		<?php echo $form->label($model,'requirement_change_scale'); ?></label>
		<?php echo $form->textField($model,'requirement_change_scale',array('size'=>52,'maxlength'=>100)); ?>
	</div>

	<div class="row">
	<label class="control-label col-sm-2">
		<?php echo $form->label($model,'add_date'); ?></label>
		<?php echo $form->textField($model,'add_date',array('size'=>52,'maxlength'=>100)); ?>
	</div>

	<div class="row">
	<label class="control-label col-sm-2">
		<?php echo $form->label($model,'modify_date'); ?></label>
		<?php echo $form->textField($model,'modify_date',array('size'=>52,'maxlength'=>100)); ?>
	</div>

	<div class="row">
	<label class="control-label col-sm-2">
		<?php echo $form->label($model,'is_call_scheduled'); ?></label>
		<?php echo $form->textField($model,'is_call_scheduled',array('size'=>52,'maxlength'=>100)); ?>
	</div>

	<div class="row">
	<label class="control-label col-sm-2">
		<?php echo $form->label($model,'other_status'); ?></label>
		<?php echo $form->textField($model,'other_status',array('size'=>52,'maxlength'=>100)); ?>
	</div>

	<div class="row">
	<label class="control-label col-sm-2">
		<?php echo $form->label($model,'current_status'); ?></label>
		<?php echo $form->textField($model,'current_status',array('size'=>52,'maxlength'=>100)); ?>
	</div>

	<div class="row">
	<label class="control-label col-sm-2">
		<?php echo $form->label($model,'status'); ?></label>
		<?php echo $form->textField($model,'status',array('size'=>52,'maxlength'=>100)); ?>
	</div>

	<div class="row">
	<label class="control-label col-sm-2">
		<?php echo $form->label($model,'client_profiles_id'); ?></label>
		<?php echo $form->textField($model,'client_profiles_id',array('size'=>52,'maxlength'=>100)); ?>
	</div>

	<div class="row">
	<label class="control-label col-sm-2">
		<?php echo $form->label($model,'current_status_id'); ?></label>
		<?php echo $form->textField($model,'current_status_id',array('size'=>52,'maxlength'=>100)); ?>
	</div>

	<div class="row">
	<label class="control-label col-sm-2">
		<?php echo $form->label($model,'other_current_status'); ?></label>
		<?php echo $form->textField($model,'other_current_status',array('size'=>52,'maxlength'=>100)); ?>
	</div>

	<div class="row">
	<label class="control-label col-sm-2">
		<?php echo $form->label($model,'state'); ?></label>
		<?php echo $form->textField($model,'state',array('size'=>52,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>
</div>
<?php $this->endWidget(); ?>
</div>
</div><!-- search-form -->