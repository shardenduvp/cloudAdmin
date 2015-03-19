<?php
/* @var $this EmailLogsController */
/* @var $model EmailLogs */
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
							<?php echo $form->labelEx($model,'username', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'username',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
			</div>

<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'ipaddress', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'ipaddress',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
			</div>

<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'logtime', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'logtime',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
			</div>
	

<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'controller', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'controller',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
			</div>
	
	
<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'action', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'action',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
			</div>
	
	
	<div class="row">
	            	<div class="col-sm-4 tr-align"></div>
	            	<div class="col-sm-6 col-offset-sm-2 search-button">
						<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-primary')); ?>
					</div>
				</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->