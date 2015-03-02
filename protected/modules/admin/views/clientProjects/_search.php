<?php
/* @var $this ClientProjectsController */
/* @var $model ClientProjects */
/* @var $form CActiveForm */
?>

<div class="form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row">
		<div class="col-md-12">
			<div class="box border inverse mb0">
				<div class="box-title">
					<h4><i class="fa fa-search"></i>Advanced Search</h4>
					<div class="tools hidden-xs">
						<a href="javascript:;" class="expand">
							<i class="fa fa-chevron-down"></i>
						</a>
					</div>
				</div>
				<div class="box-body big" style="display:none;">
				<?php echo $form->errorSummary($model); ?>

	        <div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'name', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
			</div>

			<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'team_size', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'team_size',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
			</div>


	<!--<div class="row">
		<?php echo $form->label($model,'summary'); ?>
		<?php echo $form->textArea($model,'summary',array('rows'=>6, 'cols'=>50)); ?>
	</div>-->

	<!--<div class="row">
		<?php echo $form->label($model,'unique_features'); ?>
		<?php echo $form->textArea($model,'unique_features',array('rows'=>6, 'cols'=>50)); ?>
	</div>-->
			<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'min_budget', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'min_budget',array('size'=>25,'maxlength'=>25,'class'=>'form-control')); ?>
					</div>
			</div>

			<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'max_budget', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'max_budget',array('size'=>25,'maxlength'=>25,'class'=>'form-control')); ?>
					</div>
			</div>

			<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'start_date', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php
							$form->widget('zii.widgets.jui.CJuiDatePicker', array(
								'model' => $model,
								'attribute' => 'start_date',
								'htmlOptions' => array(
									'size' => '25',         // textField size
									'maxlength' => '25', 
									'class'=>'form-control'   // textField maxlength
								),
							));
						?>
						</div>
			</div>

	<!--<div class="row">
		<?php echo $form->label($model,'regions'); ?>
		<?php echo $form->textField($model,'regions',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tier'); ?>
		<?php echo $form->textField($model,'tier',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'absolute_necessary_language'); ?>
		<?php echo $form->textField($model,'absolute_necessary_language',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'good_know_language'); ?>
		<?php echo $form->textField($model,'good_know_language',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'which_one_is_inportant'); ?>
		<?php echo $form->textField($model,'which_one_is_inportant',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'questions_for_supplier'); ?>
		<?php echo $form->textArea($model,'questions_for_supplier',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'requirement_change_scale'); ?>
		<?php echo $form->textField($model,'requirement_change_scale',array('size'=>45,'maxlength'=>45)); ?>
	</div>-->

         <div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'add_date', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php
							$form->widget('zii.widgets.jui.CJuiDatePicker', array(
								'model' => $model,
								'attribute' => 'add_date',
								'htmlOptions' => array(
									'size' => '25',         // textField size
									'maxlength' => '25', 
									'class'=>'form-control'   // textField maxlength
								),
							));
						?>
						</div>
			</div>

	<!--<div class="row">
		<?php echo $form->label($model,'modify_date'); ?>
		<?php echo $form->textField($model,'modify_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_call_scheduled'); ?>
		<?php echo $form->textField($model,'is_call_scheduled',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'other_status'); ?>
		<?php echo $form->textField($model,'other_status',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'current_status'); ?>
		<?php echo $form->textField($model,'current_status',array('size'=>45,'maxlength'=>45)); ?>
	</div>-->

	<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->label($model,'status', array(
							'class'=>'control-label'   
						)); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					    <?php //echo $form->textField($model,'role_id'); 
							echo CHtml::activeDropDownList($model, 'status', array(
								    '1'=>'Awaiting Approval','2'=>'Information Sent'
								), array(
									'empty'=>'Select Status',
									"",
									'class'=>'form-control'
								)
							);
						?>
					</div>
				</div>

	<!--<div class="row">
		<?php echo $form->label($model,'client_profiles_id'); ?>
		<?php echo $form->textField($model,'client_profiles_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'current_status_id'); ?>
		<?php echo $form->textField($model,'current_status_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'other_current_status'); ?>
		<?php echo $form->textField($model,'other_current_status',array('size'=>60,'maxlength'=>100)); ?>
	</div>-->

	        <div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'state', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'state',array('size'=>25,'maxlength'=>25,'class'=>'form-control')); ?>
					</div>
			</div>

                <div class="row">
	            	<div class="col-sm-4 tr-align"></div>
	            	<div class="col-sm-6 col-offset-sm-2 search-button">
						<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-primary')); ?>
					</div>
				</div>
              <?php $this->endWidget(); ?>

        </div>
     </div>
   </div>
</div>   
