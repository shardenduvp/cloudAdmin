<link href="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/rating-slider/bootstrap-slider.css" rel="stylesheet" />
<div class="white_outer">
	<div class="container">
		<div class="row">
			<div class="col-md-12 "><h3>References</h3></div>
		</div>
	</div>
</div>
<div class="dark-wrapper">
	<div class="container inner">
		<div class="row">
			 <div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
                        <h3 class="panel-title">
							Review for <?php
							$city="";
							foreach($model->suppliers->users->usersOffices as $office)
							{
								if($office->dep_id == 1)
								{
									$city	=	$office->city->name;
									break;
								}
							}
							echo $company;?>, <?php echo $city; ?>
							(
								<span>Project: <?php echo $model->suppliersHasPortfolio->project_name; ?></span>,
								<span>Team Size: <?php echo $model->suppliers->number_of_employee; ?></span>,
								<span>Hourly Rate: $<?php echo $model->suppliers->per_hour_rate; ?>/Hr</span>,
								<span>Response Time: <?php echo $model->suppliers->response_time; ?>-Hrs</span>
							)
						</h3>
                    </div>
					<?php $categories = ReviewCategory::model()->findAll(); ?>
					<?php $form=$this->beginWidget('CActiveForm', array('enableClientValidation'=>true,'htmlOptions'=>array('id'=>'wizard-validate','data-parsley-validate'=>"data-parsley-validate",'class'=>"form-horizontal form-bordered forms",'onsubmit'=>'return validate();'))); ?>
					<?php echo CHtml::hiddenField('status' ,'2', array('id'=>'status'));  ?>
					<?php echo CHtml::hiddenField('check' ,'0', array('id'=>'check'));  ?>
					<div class="wizard-container">
						<div class="panel-body">
							<div class="form-group">
                                <label class="col-md-12 text-center">How would you rate your service provider on the following criteria? <span class="text-muted">&nbsp;&nbsp;&nbsp; 5: Excellent, 3: Satisfactory, 1: Poor Experience</span></label>
                            </div>
							<div class="col-md-12">
							<?php foreach($categories as $category){ ?>		
								<div class="col-md-12">
									<h5><?php echo $category->name;  ?><span class="text-danger">*</span></h5>
								</div>
							<?php foreach($category->reviewQuestions as $question){ ?>
								<div class="form-group">
									<label for="name1"><?php echo $question->title;  ?></label>
									<?php echo $form->textArea($answers,'answers['.$question->id.']',array('value'=>isset($editdata[$question->id])?$editdata[$question->id]:"",'class'=>'form-control','placeholder'=>'Comments')); ?>
								</div>
							<?php } ?>    
								<div class="form-group text-center s1" id="pss">
									<h5>Overall Rating:</h5>
									<input class="ex6" type="text" data-slider-min="0" data-slider-max="5" data-slider-step="1" data-slider-value="<?php echo isset($editrate[$category->id])?$editrate[$category->id]:"0"; ?>" name="rating[<?php echo $category->id;?>]" id="rating[<?php echo $category->id;?>]" adjust="<?php echo isset($editrate[$category->id])?"true":"false"; ?>"/>
								</div>
							<?php } ?>
								<div class="checkbox hide">
									<label>
										<?php echo $form->checkBox($model,'follow_venturepact'); ?>
										I would like to follow VenturePact.
									</label>
								</div>
								<div class="checkbox hide">
									<label>
										<?php echo $form->checkBox($model,'is_unattributed'); ?>
										I would like this review to appear as Unattributed. Do not show my name and picture to the VenturePact community.
									</label>
								</div>
								<div class="form-group hide" id="tag_line">
									<label for="name1">Tell us something about yourself</label>
									<?php echo $form->textArea($model,'tag_line',array('class'=>'form-control','placeholder'=>'Tell us something about yourself')); ?>
								</div>
								<div class="checkbox hide">
									<label>
										<?php echo $form->checkBox($model,'email_hide'); ?>
										Allow future clients of <?php echo $company;?> to connect with me via VenturePact. Your email will not be disclosed.
									</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox" data-parsley-required="true" required="required">
										I certify that this review is based on my own experience and is my genuine opinion of the supplier and submitted in accordance with the Terms of Use. I am not an employee of this vendor or one of its direct competitors.
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="wizard-container">
						<div class="panel-body">
							<?php 
							echo CHtml::submitButton('Save',array('id'=>'signup','class'=>'btn btn-primary bm0 pull-left','tabindex'=>'7'));
							if($linkedin==0)
							{
								echo CHtml::button('Save',array('id'=>'verify','class'=>'btn btn-primary bm0 pull-left','tabindex'=>'7'));
								echo CHtml::link('Connect with Linkedin', array('/site/linkedin','lType'=>'initiate','role'=>2),array('id'=>'linkedin','class'=>'hide btn btn-lg btn-primary share-linkedin'));
								echo "<script>$('#signup').addClass('hide');$('#status').val('1');</script>";
							}
							?>
						</div>
					</div>
					<?php $this->endWidget(); ?>
				</div>
			 </div>
		</div>
	</div>
</div>
<script type="text/javascript">
      $(document).ready(function() {
			var condition = 0;
    		$(".ex6").slider();
			$(".ex6").on('slide', function(slideEvt) {
				$("#ex6SliderVal").text(slideEvt.value);
				$(this).attr("adjust","true");
				if($(this).attr("adjust") === "true")
				{
					$(this).parent().find('ul.parsley-errors-list').html('');
				}
			});
			$('.slider').click(function(){
				$(this).parent().find('input.ex6').attr("adjust","true");
				$(this).parent().find('ul.parsley-errors-list').html('');
			});
			$('.slider-track').click(function(){
				$(this).parent().parent().find('input.ex6').attr("adjust","true");
				$(this).parent().parent().find('ul.parsley-errors-list').html('');
			});
			$("#signup").click(function(e){
				$( ".ex6" ).each(function(index) {
					condition = 0;
					var value = $(this).attr("adjust");
					if( value === "false")
					{
						condition = 1;
						$(this).parent().find('ul.parsley-errors-list').css('display','block');
						$(this).parent().find('ul.parsley-errors-list').html('');
						$(this).parent().find('ul.parsley-errors-list').append('<li id="satPas">Rating cannot be empty</li>');						
					}
					else
					{
						$(this).parent().find('ul.parsley-errors-list').html('');
					}
				});
				if(condition == 1)
				{
					e.preventDefault();
				}
				if(!$('#tag_line').hasClass('hide')) {
					if($('#SuppliersHasReferences_tag_line').val() === ""){
						$('#tag_line ul.parsley-errors-list').css('display','block');
						$('#tag_line ul.parsley-errors-list').html('');
						$('#tag_line ul.parsley-errors-list').append('<li id="satPas">This value is required.</li>');
						e.preventDefault();
					}
					else
					{
						$('#tag_line ul.parsley-errors-list').html('');
					}
				}
			});
			$("#verify").click(function(){
				bootbox.confirm({
					title: 'Verify Review',
					message: 'Would you like to connect with LinkedIn to make the review verified?',
					buttons: {
						'cancel': {
							label: 'Skip',
							className: 'btn-danger pull-left'
						},
						'confirm': {
							label: 'Connect to LinkedIn',
							className: 'btn-primary pull-right'
						}
					},
					callback: function(result) {
						if(result){
							$('#status').val('2');
							$('#check').val('1');
							$("#signup").trigger("click");
						}
						else{
							$("#signup").trigger("click");
						}
					}
				});
			});
			$('#SuppliersHasReferences_is_unattributed').click(function () {
				if ($('#SuppliersHasReferences_is_unattributed').is(':checked')){
					$('#tag_line').removeClass('hide');
				}
				else{
					$('#tag_line').addClass('hide');
				}
			});
			if ($('#SuppliersHasReferences_is_unattributed').is(':checked')){
					$('#tag_line').removeClass('hide');
			}
			$("#SuppliersHasReferences_tag_line").keyup(function() {
				$('#tag_line ul.parsley-errors-list').html('');
			});
    	});
</script>
<?php 
if($model->review_type == 1)
{
echo "
<script>
	$('#SuppliersHasReferences_is_unattributed').attr('disabled','disabled');
	$('#SuppliersHasReferences_email_hide').attr('disabled','disabled');
</script>
";
}
?>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/rating-slider/bootstrap-slider.js"></script>