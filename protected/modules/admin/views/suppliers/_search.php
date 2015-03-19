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
						<?php echo $form->labelEx($model,'id', array(
							'class'=>'control-label'
						)); ?>
					</div>
					<div class="col-sm-2 col-offset-sm-2">
					<?php //echo $form->textField($model,'role_id'); 
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
					<?php echo $form->textField($model,'id',array('size'=>45,'maxlength'=>45,'class'=>'form-control IDUser')); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-4 tr-align">
						<?php echo $form->labelEx($model,'user_name', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
						<?php echo $form->textField($model,'user_name',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-4 tr-align">
						<?php echo $form->labelEx($model,'user_company', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
						<?php echo $form->textField($model,'user_company',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
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
						<?php echo $form->label($model,'add_date', array(
							'class'=>'control-label'   
						)); ?>
					</div>
					<div class="col-sm-2 col-offset-sm-2">
					<?php 
							echo CHtml::DropDownList('','', array(
								    '<'=>'<','>'=>'>','<>'=>'<>','<='=>'<=','>='=>'>='
								), array(
									'empty'=>'Operator',
									"",
									'class'=>'form-control operatorIDforDate'
								)
							);
						?>
					</div>
					<div class="col-sm-4 col-offset-sm-2">
						<?php
							$form->widget('zii.widgets.jui.CJuiDatePicker', array(
								'model' => $model,
								'attribute' => 'add_date',
								'options'=>array(
									'dateFormat'=>'yy-mm-dd',
									'showAnim' => 'fold'
								),
								'htmlOptions' => array(
									'size' => '10',         // textField size
									'maxlength' => '10', 
									'class'=>'form-control add_dateUSER'   // textField maxlength
								),
							));
						?>

						<?php echo $form->error($model,'add_date'); ?>
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
							<?php echo $form->labelEx($model,'location', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'location',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
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
								    '0'=>'Deactivated','1'=>'Profile Submitted',
								    '2'=>'Approved', '3' => 'Verified',
								), array(
									'empty'=>'Select Status',
									"",
									'class'=>'form-control'
								)
							);
						?>
					</div>
				</div>


			
	        <div class="row">
	            	<div class="col-sm-4 tr-align"></div>
	            	<div class="col-sm-6 col-offset-sm-2">
						<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-primary')); ?>
					</div>
				</div>
              <?php $this->endWidget(); ?>

        </div>
     </div>
   </div>
</div>   
</div>