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
			<div class="box border-custom inverse mb0">
				
				<div class="box-title"><h3>Advance Search</h3></div>

				<div class="box-body big">
					<?php echo $form->errorSummary($model); ?>


		        	<div class="form-group">
						<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'name', array('class'=>'control-label')); ?>
						</div>
						<div class="col-sm-6 col-offset-sm-2">
							<?php
								echo $form->textField($model,'name',array(
									'size'=>45,
									'maxlength'=>45,
									'class'=>'form-control'
								));
							?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'team_size', array('class'=>'control-label')); ?>
						</div>
						<div class="col-sm-6 col-offset-sm-2">
							<?php
								echo $form->textField($model,'team_size',array(
									'size'=>45,
									'maxlength'=>45,
									'class'=>'form-control'
								));
							?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'min_budget', array('class'=>'control-label')); ?>
						</div>
						<div class="col-sm-6 col-offset-sm-2">
							<?php
								echo $form->textField($model,'min_budget',array(
									'size'=>25,
									'maxlength'=>25,
									'class'=>'form-control'
								));
							?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'max_budget', array('class'=>'control-label')); ?>
						</div>
						<div class="col-sm-6 col-offset-sm-2">
							<?php
								echo $form->textField($model,'max_budget',array(
									'size'=>25,
									'maxlength'=>25,
									'class'=>'form-control'
								));
							?>
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

		        	<div class="form-group">
						<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'state', array('class'=>'control-label')); ?>
						</div>
						<div class="col-sm-6 col-offset-sm-2">
							<?php
								echo $form->textField($model,'state', array(
									'size'=>25,
									'maxlength'=>25,
									'class'=>'form-control'
								));
							?>
						</div>
					</div>

	                <div class="row">
		            	<div class="col-sm-4 tr-align"></div>
		            	<div class="col-sm-6 col-offset-sm-2 search-button">
							<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-primary')); ?>
						</div>
					</div>
        		</div>
        	</div>
     	</div>
   	</div>
   	<?php $this->endWidget(); ?>
</div>   
