<?php
/* @var $this ClientProfilesController */
/* @var $model ClientProfiles */
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
							<?php echo $form->labelEx($model,'id', array(
								'class'=>'control-label'
							)); ?>
						</div>
						<div class="col-sm-2 col-offset-sm-2">
							<?php
								echo CHtml::activeDropDownList($model, 'id', array(
									    '<'=>'<','>'=>'>','<>'=>'<>','<='=>'<=','>='=>'>='
									), array(
										'empty'=>'Operator',
										"",
										'class'=>'form-control operatorID'
									)
								);
							?>
						</div>
						<div class="col-sm-4 col-offset-sm-2">
						<?php echo $form->textField($model,'id',array('class'=>'form-control IDUser')); ?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'user_firstname', array(
								'class'=>'control-label'
							)); ?>
						</div>
						<div class="col-sm-6 col-offset-sm-2">
						<?php echo $form->textField($model,'user_firstname',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'user_lastname', array(
								'class'=>'control-label'
							)); ?>
						</div>
						<div class="col-sm-6 col-offset-sm-2">
						<?php echo $form->textField($model,'user_lastname',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'user_company', array(
								'class'=>'control-label'
							)); ?>
						</div>
						<div class="col-sm-6 col-offset-sm-2">
						<?php echo $form->textField($model,'user_company',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'user_email', array(
								'class'=>'control-label'
							)); ?>
						</div>
						<div class="col-sm-6 col-offset-sm-2">
						<?php echo $form->textField($model,'user_email',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'skype_id', array(
								'class'=>'control-label'
							)); ?>
						</div>
						<div class="col-sm-6 col-offset-sm-2">
						<?php echo $form->textField($model,'skype_id',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-4 tr-align">
							<?php echo $form->label($model,'add_date', array(
								'class'=>'control-label'   
							)); ?>
						</div>
						<div class="col-sm-2">
							<?php 
								echo CHtml::dropDownList("Operators['add_date']","",array(
								    	'>'=>'>',
								    	'<'=>'<',
								    	'='=>'=',
								    	'<='=>'<=',
								    	'>='=>'>=',
								    	'<>'=>'<>',
								    ),
									array('empty'=>'Operators', 'class'=>'form-control', 'id'=>'add_date_op')
								);
							?>
						</div>
						<div class="col-sm-4 col-offset-sm-2">
							<?php
								$form->widget('zii.widgets.jui.CJuiDatePicker', array(
									'model' => $model,
									'attribute' => 'add_date',
									'htmlOptions' => array(
									    'dateFormat' => 'yy-mm-dd',
										'size' => '52',         // textField size
										'maxlength' => '100' ,
										'class'=>'form-control',   // textField maxlength
									),
									'options' => array(
										'dateFormat'=>'yy-mm-dd',
										'changeMonth'=>true,
	        							'changeYear'=>true,
									),
								));
							?>

							<?php echo $form->error($model,'add_date'); ?>
						</div>			
					</div>

					<div class="row">
		            	<div class="col-sm-4 tr-align"></div>
		            	<div class="col-sm-6 col-offset-sm-2 btn-box">
							<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-primary')); ?>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<?php $this->endWidget(); ?>
</div>