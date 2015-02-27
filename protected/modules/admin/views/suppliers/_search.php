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
							<?php echo $form->labelEx($model,'id', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'id',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
			</div>

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
							<?php echo $form->labelEx($model,'email', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'email',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
			</div>


			<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'modification_date', array('class'=>'control-label','label'=>'Updated On')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php
							$form->widget('zii.widgets.jui.CJuiDatePicker', array(
								'model' => $model,
								'attribute' => 'modification_date',

								'options'=>array(
									'dateFormat'=>'yy-mm-dd',
									'showAnim' => 'fold'
								),
								'htmlOptions' => array(
									'size' => '25',         // textField size
									'maxlength' => '25', 
									'class'=>'form-control'   // textField maxlength
								),
							));
						?>
						    </div>
						</div>

					<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'skype_id', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'skype_id',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
					</div>
					</div>
			

			<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'website', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'website',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
			</div>
            <div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'location', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'location',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
			</div>

			<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'number_of_employee', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'number_of_employee',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
					</div>
			</div>
			<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'profile_status', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'profile_status',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
			</div>
			<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'per_hour_rate', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'per_hour_rate',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
					</div>
			</div>
			<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'project_size', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'project_size',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
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
</div>