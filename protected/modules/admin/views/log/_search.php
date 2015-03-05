<?php
/* @var $this LogController */
/* @var $model Log */
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
							<?php echo $form->labelEx($model,'proposal_id', array(
								'class'=>'control-label'
							)); ?>
						</div>
						<div class="col-sm-6 col-offset-sm-2">
						<?php echo $form->textField($model,'proposal_id',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
						</div>
					</div>
				
				<div class="form-group">
					<div class="col-sm-4 tr-align">
						<?php echo $form->labelEx($model,'project_status', array(
							'class'=>'control-label'
						)); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
						<?php echo $form->textField($model,'project_status',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-4 tr-align">
						<?php echo $form->labelEx($model,'is_checked', array(
							'class'=>'control-label'
						)); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
						<?php echo $form->textField($model,'is_checked',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-4 tr-align">
						<?php echo $form->labelEx($model,'title', array(
							'class'=>'control-label'
						)); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
						<?php echo $form->textField($model,'title',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-4 tr-align">
						<?php echo $form->labelEx($model,'description', array(
							'class'=>'control-label'
						)); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
						<?php echo $form->textField($model,'description',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-4 tr-align">
						<?php echo $form->labelEx($model,'add_date', array(
							'class'=>'control-label'
						)); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
						<?php echo $form->textField($model,'add_date',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-4 tr-align">
						<?php echo $form->labelEx($model,'update_date', array(
							'class'=>'control-label'
						)); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
						<?php echo $form->textField($model,'update_date',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-4 tr-align">
						<?php echo $form->labelEx($model,'status', array(
							'class'=>'control-label'
						)); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
						<?php echo $form->textField($model,'status',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-4 tr-align">
						<?php echo $form->labelEx($model,'is_read', array(
							'class'=>'control-label'
						)); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
						<?php echo $form->textField($model,'is_read',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-4 tr-align">
						<?php echo $form->labelEx($model,'is_active', array(
							'class'=>'control-label'
						)); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
						<?php echo $form->textField($model,'is_active',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-4 tr-align">
						<?php echo $form->labelEx($model,'login_id', array(
							'class'=>'control-label'
						)); ?>
					</div>
					<div class="col-sm-6 col-offset-sm-2">
						<?php echo $form->textField($model,'login_id',array('size'=>45,'maxlength'=>45,'class'=>'form-control')); ?>
					</div>
				</div>

			<div class="row">
	            	<div class="col-sm-4 tr-align"></div>
	            	<div class="col-sm-6 col-offset-sm-2 search-button">
						<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-primary buttonh')); ?>
					</div>
				</div>
			<?php $this->endWidget(); ?>
		</div>
	</div>
</div>
</div><!-- search-form -->
