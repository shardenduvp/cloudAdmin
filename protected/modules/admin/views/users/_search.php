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
						<?php echo $form->labelEx($model,'id', array(
							'class'=>'control-label'
						)); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'id',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-4 tr-align">
						<?php echo $form->labelEx($model,'last_name', array(
							'class'=>'control-label'
						)); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'last_name',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-4 tr-align">
						<?php echo $form->labelEx($model,'first_name', array(
							'class'=>'control-label'
						)); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'first_name',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-4 tr-align">
						<?php echo $form->labelEx($model,'company_name', array(
							'class'=>'control-label'
						)); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'company_name',array('size'=>60,'maxlength'=>200,'class'=>'form-control')); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-4 tr-align">
						<?php echo $form->label($model,'display_name', array(
							'class'=>'control-label'   
						)); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
						<?php echo $form->textField($model,'display_name',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
					</div>
				</div>
  
				<div class="form-group">
					<div class="col-sm-4 tr-align">
						<?php echo $form->label($model,'username', array(
							'class'=>'control-label'   
						)); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
						<?php echo $form->textField($model,'username',array('size'=>30,'maxlength'=>30,'class'=>'form-control')); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-4 tr-align">
						<?php echo $form->label($model,'phone_number', array(
							'class'=>'control-label'   
						)); ?>
					</div>
						
					<div class="col-sm-6 col-offset-sm-2">
						<?php echo $form->textField($model,'phone_number',array('size'=>25,'maxlength'=>25,'class'=>'form-control')); ?>
					</div>
				</div>

				

				<div class="form-group">
					<div class="col-sm-4 tr-align">
						<?php echo $form->label($model,'add_date', array(
							'class'=>'control-label'   
						)); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
						<?php
							$form->widget('zii.widgets.jui.CJuiDatePicker', array(
								'model' => $model,
								'attribute' => 'add_date',
								'htmlOptions' => array(
									'size' => '10',         // textField size
									'maxlength' => '10', 
									'class'=>'form-control'   // textField maxlength
								),
							));
						?>

						<?php echo $form->error($model,'add_date'); ?>
					</div>			
				</div>

				<div class="col-sm-6 col-offset-sm-2">
						<?php
							$form->widget('zii.widgets.jui.CJuiDatePicker', array(
								'model' => $model,
								'attribute' => 'last_login',
								'htmlOptions' => array(
									'size' => '10',         // textField size
									'maxlength' => '10', 
									'class'=>'form-control'   // textField maxlength
								),
							));
						?>

						<?php echo $form->error($model,'last_login'); ?>
					</div>			
				</div>

				

				<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->label($model,'status', array(
							'class'=>'control-label'   
						)); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					    <?php //echo $form->textField($model,'role_id'); 
							echo CHtml::activeDropDownList($model, 'status', array(
								    '0'=>'Not Verified','1'=>'Verified'
								), array(
									'empty'=>'Select Status',
									"",
									'class'=>'form-control'
								)
							);
						?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->label($model,'role_id', array(
							'class'=>'control-label'   
						)); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					    <?php //echo $form->textField($model,'role_id'); 
							echo CHtml::activeDropDownList($model, 'role_id', array(
								    '1'=>'Admin','2'=>'Client','3'=>'Supplier'
								), array(
									'empty'=>'Select Role',
									"",
									'class'=>'form-control'
								)
							);
						?>
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
</div><!-- search-form -->