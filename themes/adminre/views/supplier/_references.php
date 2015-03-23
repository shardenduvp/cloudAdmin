<link href="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/rating-slider/bootstrap-slider.css" rel="stylesheet" />


		<div class="row">
			 <div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
                        <h3 class="panel-title">Review for <?php echo $company;?></h3>
                    </div>
					<?php $categories = ReviewCategory::model()->findAll(); ?>
					<?php $form=$this->beginWidget('CActiveForm', array('enableClientValidation'=>true,'htmlOptions'=>array('id'=>'wizard-validate','data-parsley-validate'=>"data-parsley-validate",'class'=>"form-horizontal form-bordered forms",'onsubmit'=>'return validate();'))); ?>
					<?php echo CHtml::hiddenField('status' ,'2', array('id'=>'status'));  ?>
					<div class="wizard-container">
						<div class="panel-body">
							<div class="form-group">

                            </div>
							<div class="col-md-12">
							<?php foreach($categories as $category){ ?>
								<div class="col-md-12">
									<h5><?php echo $category->name;  ?><span class="text-danger">*</span></h5>
								</div>
							<?php foreach($category->reviewQuestions as $question){ ?>
								<div class="form-group">
									<label for="name1"><?php echo $question->title;  ?></label>

									<?php echo $form->textArea($answers,'answers['.$question->id.']',array('value'=>isset($editdata[$question->id])?$editdata[$question->id]:"",'class'=>'form-control','placeholder'=>'Comments',"readonly"=>'readonly')); ?>
								</div>
							<?php } ?>
								<div class="form-group text-center s1" id="pss">
									<h5>Overall Rating:</h5>
								<!-- 	<input class="ex6" type="text" data-slider-min="0" data-slider-max="5" data-slider-step="1" data-slider-value="<?php echo isset($editrate[$category->id])?$editrate[$category->id]:"0"; ?>" name="rating[<?php echo $category->id;?>]" id="rating[<?php echo $category->id;?>]" adjust="<?php echo isset($editrate[$category->id])?"true":"false"; ?>"/> -->


									  <div class="progress progress-height nm">
                                <div class="progress-bar progress-bar-primary font_bold" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo isset($editrate[$category->id])?($editrate[$category->id]*20):"0"; ?>%;"><?php echo isset($editrate[$category->id])?($editrate[$category->id]):"0"; ?></div>
                            </div>
								</div>
							<?php } ?>
							</div>
						</div>
					</div>

					<?php $this->endWidget(); ?>
				</div>
			 </div>
		</div>

<script type="text/javascript">
      $(document).ready(function() {
			var condition = 0;
    		$(".ex6").slider();
			

    	});
</script>


