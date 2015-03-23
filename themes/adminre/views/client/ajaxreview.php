<?php
$now = time();
$dt = new DateTime($reference->add_date);
$your_date = strtotime($dt->format('d-m-Y'));
$datediff = $now - $your_date;
$checkDay = floor($datediff/(60*60*24));
$avgRating = 0;
?>
<div class="modal-dialog modal-xlg ">
	<div class="modal-content col-md-12 np">
		<div class="modal-header pa10 new-modal-bg ">
			<h2 class="modal-title fs28 text-center" id="myModalLabel"><?php echo $reference->suppliersHasPortfolio->project_name; ?> - Testimonial</h2>
			<h5 class="fs12 text-center grey-light mt5 mb5"><?php echo (($checkDay==0)?"Today":$checkDay." days ago"); ?></h5>
		</div>
		<div class="modal-body col-md-12 np new-modal-bg slimscroll h_set">
			<?php $categories = ReviewCategory::model()->findAll(); ?>
			<?php
			foreach($categories as $category){
				if(isset($editrate[$category->id]))
					$avgRating = $avgRating + $editrate[$category->id];
			}
			$avgRating = round((float)((((float)$avgRating))/(4)),1);
			?>
			<?php $form=$this->beginWidget('CActiveForm', array('enableClientValidation'=>true,'htmlOptions'=>array('id'=>'reviewData','data-parsley-validate'=>"data-parsley-validate",'class'=>"form-horizontal form-bordered forms",'onsubmit'=>'return validate();'))); ?>
			<?php echo CHtml::hiddenField('id',$reference->id,array('id'=>'id')); ?>
			<div class="col-md-9">
				<div class="col-md-12  mt10 np">
					<div class="col-md-12 pb30 mt10">
						<div class="col-md-12 pt10 pb10">
							<div class="col-md-2 pa10 text-center pl0">
								<!--Remove Hyper link-->
								<img width="70" height="70" src="<?php echo $reference->suppliers->image; ?>" class="img-circle tag-img-border1" alt="">
								<h5 class="fs14 display_block font_newregular mb5 team-text-blue"><?php echo $reference->suppliers->users->company_name; ?></h5>
								<?php $city="";
								foreach($reference->suppliers->users->usersOffices as $office){
									if($office->dep_id == 1){
										$city	=	$office->city->name.", ".$office->city->countries->name;
										break;
									}
								}?>
								<span class="fs12 mr10 display_block loc-gray"><span class="icon-pointer mr5 icon-grey-color" aria-hidden="true"></span><?php echo $city; ?></span>
							</div>
							<div class="col-md-10  admin-form theme-primary pl25 ">
								<?php foreach($categories as $category){ ?>
								<?php foreach($category->reviewQuestions as $question){ ?>
								<div class="col-md-12 mt10 np  ">
									<h3 class="mt0 display_inline mr5 fs18 blue-new font_newregular"><?php echo $question->title;  ?></h3>
									<label class="field prepend-icon mt10">
									<?php echo $form->textArea($answers,'answers['.$question->id.']',array('value'=>isset($editdata[$question->id])?$editdata[$question->id]:"",'class'=>'gui-textarea form-control','data-parsley-required'=>'true','placeholder'=>'Comments')); ?>
									<label class="field-icon" for="comment"><span class="icon-bubbles" aria-hidden="true"></span></label>
									</label>
								</div>
								<?php } ?>
								<?php } ?>								
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 ">
				<div class="col-md-12 mt20 pa10 pl0 text-center mb20">
					<div class="rating-testimonial-small">
						<h1 class="fs24 nm font_newregular" id='avgRate'><?php echo $avgRating; ?></h1>
						<span class="fs12">Rating</span>
					</div>
					<h3 class="font_newregular mb5 team-text-blue fs14">Overall Summary</h3>
				</div>
				<div class="col-md-11 mb15 np">
					<?php foreach($categories as $category){ ?>	
					<div class="col-sm-12 np mt10 mb10">
						<div class="col-md-12 blue-new np font_newregular fs14"><?php echo $category->name; ?>:</div>
						<div class="col-md-9 np">
							<div class=" mt5">
								<input type="range" min="0" max="5.0" step="0.2" value="<?php echo isset($editrate[$category->id])?$editrate[$category->id]:"0"; ?>" name="rating[<?php echo $category->id;?>]" id="rating[<?php echo $category->id;?>]" data-rangeslider>
								<output  class="col-md-3 np text-center font_newregular fs14 blue-new calrate"></output>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
			<div class="col-md-10 col-md-offset-2 np">
				<div class="col-md-11 bg-white as_t  np border-all">
					<div class="col-md-4 border-right white_active t_set">
						<div  class=" col-md-12 checkbox custom-checkbox custom-checkbox-orange ">
							<?php echo $form->checkBox($reference,'follow_venturepact',array('id'=>'customcheckbox11')); ?>
							<label class=" fs12 grey " for="customcheckbox11">&nbsp;&nbsp; Follow VenturePact
							<p class="small_heading pl10 fs10">I would like to follow VenturePact</p></label>
						</div>
					</div>
					<div class="col-md-4 border-right white1 t_set">
						<div  class=" col-md-12 checkbox custom-checkbox custom-checkbox-orange ">
							<?php echo $form->checkBox($reference,'is_unattributed',array('id'=>'customcheckbox22')); ?>
							<label class="fs12 grey " for="customcheckbox22">&nbsp;&nbsp; Appear Unattributed
							<p class="small_heading pl10 fs10">Do not show my name and picture to the VenturePact community</p></label>
						</div>
					</div>
					<div class="col-md-4 white1 t_set">
						<div  class=" col-md-12 checkbox custom-checkbox custom-checkbox-orange ">
							<?php echo $form->checkBox($reference,'email_hide',array('id'=>'customcheckbox33')); ?>
							<label class="fs12 grey " for="customcheckbox33">&nbsp;&nbsp; Get Connected
							<p class="small_heading pl10 fs10">Allow future clients of <?php echo $reference->suppliers->users->company_name; ?> to connect with me via Venturepact. Your email will not be disclosed</p></label>
						</div>
					</div>  													   
				</div>
				<div class="col-md-11  white_active  mb30 border-all mt30">
					<div  class=" col-md-12 checkbox custom-checkbox custom-checkbox-orange pb10 ">
						<input type="checkbox" id="customcheckbox4" name="customcheckbox16" checked>
						<label class=" fs12 " for="customcheckbox44">&nbsp;&nbsp; I certify that this review is based on my own experience and is my genuine opinion of the supplier submitted <br/><span class="pl10">in accordance with the Terms of Use. I am not an employee of this vendor or one of its direct competitors.</span></label>
					 </div>        
				</div>
			</div>
			<?php $this->endWidget(); ?>
		</div>
		<div class="modal-footer col-md-12">
			<button type="button" class="btn btn-orange fs12" id="reviewSave">Done</button>
			<button type="button" class="btn btn-default2 fs12" data-dismiss="modal">Cancel</button>
		</div>
	</div>
</div>
<script>
$(function() {
	
	var $document   = $(document),
	selector    = '[data-rangeslider]',
	$element    = $(selector);

	// Example functionality to demonstrate a value feedback
	function valueOutput(element) {
		var value = element.value,
		output = element.parentNode.getElementsByTagName('output')[0];
		output.innerHTML = value;
	}
	for (var i = $element.length - 1; i >= 0; i--) {
		valueOutput($element[i]);
	};
	$document.on('input', 'input[type="range"]', function(e) {
		valueOutput(e.target);
	});

	// Example functionality to demonstrate disabled functionality
	$document .on('click', '#js-example-disabled button[data-behaviour="toggle"]', function(e) {
		var $inputRange = $('input[type="range"]', e.target.parentNode);
		if ($inputRange[0].disabled) {
			$inputRange.prop("disabled", false);
		}
		else {
			$inputRange.prop("disabled", true);
		}
		$inputRange.rangeslider('update');
	});

	// Example functionality to demonstrate programmatic value changes
	$document.on('click', '#js-example-change-value button', function(e) {
		var $inputRange = $('input[type="range"]', e.target.parentNode),
		value = $('input[type="number"]', e.target.parentNode)[0].value;
		$inputRange.val(value).change();
	});

	// Example functionality to demonstrate destroy functionality
	$document
	.on('click', '#js-example-destroy button[data-behaviour="destroy"]', function(e) {
		$('input[type="range"]', e.target.parentNode).rangeslider('destroy');
	})
	.on('click', '#js-example-destroy button[data-behaviour="initialize"]', function(e) {
		$('input[type="range"]', e.target.parentNode).rangeslider({ polyfill: false });
	});

	// Example functionality to test initialisation on hidden elements
	$document
	.on('click', '#js-example-hidden button[data-behaviour="toggle"]', function(e) {
		var $container = $(e.target.previousElementSibling);
		$container.toggle();
	});

	// Basic rangeslider initialization
	$element.rangeslider({
		// Deactivate the feature detection
		polyfill: false,
		// Callback function
		onInit: function() {},
		// Callback function
		onSlide: function(position, value) {
			//console.log('onSlide');
			//console.log('position: ' + position, 'value: ' + value);
		},
		// Callback function
		onSlideEnd: function(position, value) {
			var avg	=	0;
			$('.calrate').each(function(){avg = avg+parseFloat($(this).html());});
			//avg	= parseFloat(avg/4).toFixed(1);
			avg	= +(Math.round((avg/4) + "e+1") + "e-1");
			$('#avgRate').html(avg);
		}
	});
	$('.slimscroll').slimscroll({height : $( window ).height()+'px',});
});

$("document").ready(function(){
	// Init Theme Core
	Core.init();
	// Init Theme Core    
	Demo.init();
});
</script>