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
							<?php echo $form->labelEx($model,'reciver', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'reciver',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
			</div>

<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'templete', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'templete',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
			</div>
	
	<div class="form-group">
								<?php echo $form->labelEx($model,'esubject',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textArea($model,'esubject',array('rows'=>6, 'cols'=>50),array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'esubject'); ?>
								</div>
							</div>

<div class="form-group">
								<?php echo $form->labelEx($model,'body',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50),array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'body'); ?>
								</div>
							</div>



	
	
<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'time', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'time',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
			</div>

	
<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'status', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'status',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
			</div>
<div class="form-group">
								<?php echo $form->labelEx($model,'other_info',array('class'=>'col-md-4 control-label')); ?>
								<div class="col-md-8">
								<?php echo $form->textArea($model,'other_info',array('rows'=>6, 'cols'=>50),array('class'=>'form-control')); ?>
								<?php echo $form->error($model,'other_info'); ?>
								</div>
							</div>
	

	
<div class="form-group">
					<div class="col-sm-4 tr-align">
							<?php echo $form->labelEx($model,'user_id', array('class'=>'control-label')); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
					<?php echo $form->textField($model,'user_id',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
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
</div><!-- search-form -->