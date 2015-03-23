<header class="navbar navbar-fixed-top bg-light np header-left">
	<ol class="breadcrumb p20">
		<li class="crumb-active">
			<a href="dashboard.html" class="fs24 font_newlight"><?php echo $client_project->name; ?></a>
		</li>
		<li class="crumb-active">
			<?php echo CHtml::link('<span aria-hidden="true" class="icon-users fs12 mr5" style=""></span> Introductions',array('client/introductions'),array('class'=>'fs12 font_newlight breadcrum-color'))?>
		</li>
	</ol>
</header>
<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn" style="">
	<!-- begin: .tray-left -->
	<aside class="tray tray-left tray320 va-t pn" data-tray-height="match">
		<div>
			<ul id="test" class="fs14 font_newregular list-unstyled list-spacing-10 mb10 mt10 pr0 nav tray-nav tray-nav-border custom-nav-animation affix" data-spy="affix" data-offset-top="-1">
				<li class="pl25 pb35">
					<span class="fs14 font_newlight ">You have tried to get in touch with suppliers for the following projects</span>
				</li>
				<?php foreach($supplier_projects as $project){?>
				<?php 
				$notification = "";
				if($project->status==2){
					$notification = '<div class="tab-icon-cont"><span class="icon-envelope fs28 tab-icon-color display_inline mr5" aria-hidden="true"></span><span class="tab-notification mb10"></span></div>';
				}elseif($project->status>2){
					$notification = '<div class="tab-icon-cont"><span class="fs28 tab-icon-color display_inline font_newlight mr10">$</span><span class="tab-notification mb5"></span></div>';
				} 
				?>
				<li class="<?php echo ($pId == $project->id)?'active':'';?>">
				<?php $date = new DateTime("now", new DateTimeZone($project->suppliers->users->time_zone) );
					echo CHtml::ajaxLink($project->suppliers->users->company_name.$notification.'<span class="fs10 display_block font_newlight tab-color">Current time: '.$date->format('d M H:i').'</span><span class="fs10 display_block font_newbold tab-color">Skype ID: '.$project->suppliers->skype_id.'</span>', array('/client/introduction','pId'=>$project->id),array('type' =>'GET','success'=>'js:function(html){$("#intro-content").html(html);$("#ProposalPitches_suppliers_projects_id").val("'.$project->id.'");initJs();}')); ?>
				</li>
				<?php }?>							
			</ul>
		</div>
	</aside>
	<!-- end: .tray-left -->
	<!-- begin: .tray-center -->
	<div class="tray tray-center va-t posr pl0 pr0 ">
		<div class="admin-panels mn pn ui-sortable" data-animate="fadeIn">
			<div class="row">
				<div class="col-sm-12">
					<div class="tab-block-new">
						<div class="tab-content tab-content-new animated-waypoint" data-animate="fadeIn" id='intro-content'>
							<?php $this->renderPartial('introduction',array('pId'=>$pId)); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end: .tray-center -->
</section>
<!-- End: Content -->
<!-- Modal Make an Offer Start -->
<div class="modal fade" id="create-pitch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xlg">
		<div class="modal-content col-md-12 np">
			<div class="modal-header pa20">		   
				<h2 class="modal-title fs24 text-center" id="myModalLabel"> Create / Edit Your Offer </h2>
			</div>
			<div class="modal-body col-md-12 np mt30 slimscroll" id="offer-content">
			<?php $form=$this->beginWidget('CActiveForm', array('enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('id'=>'offer','class'=>"forms"))); ?>
				<div class="col-md-12 mb20 mt20">
					<div class="col-md-1"></div>
					<div class="col-md-10 posr">
						<div class="col-md-12 pl0">
							<div class="col-sm-1 circle-blue"><span class="fs14 font-newbold">1</span></div>
							<h3 class="col-sm-11 mt5 font_newregular fs18">How will you like to pay?</h3>
						</div>	
						<?php echo $form->hiddenField($pitch,'billing_type'); ?>
						<?php echo $form->hiddenField($pitch,'suppliers_projects_id',array('value'=>$pId)); ?>
						<div class="col-md-12 tab-slide-white pt20 pb20 mt20 form-horizontal admin-form theme-primary" >
							<div class="col-sm-11" id="slidetoggle">
								<h3 class="font_newregular team-text-blue nm mt5 fs18">Time &amp; Material</h3>
								<p class="fs14 mt10">You have the option to select from weekly and monthly billing options</p>
							</div>
							<div class="col-sm-1 text-center mt10">
								<div id="checkboxExample" class="check-circle-base"></div>
							</div>
							<div class="col-md-12 slidetoggle tab-slide-white pt20 pb20 mt20 form-horizontal admin-form theme-primary time-box">
                                <div class="col-md-12 admin-form theme-primary mt20 pl0">
									<?php
									echo $form->radioButtonList($pitch,'tm_billing_schedule_type',array('0'=>'Weekly Billing ','1'=>'Monthly Billing',),array('separator'=>' ',
									'template'=>'<div class="col-md-4 mr10">
										<div class="radio-custom radio-danger mb5">
											{input}
											{label}	
										</div>
									</div>'));?>
    							</div>
                                <div class="col-md-12 mt10">
									<div class="col-md-4 pl0">
										<label class="field prepend-icon" id="input-wb">
											<?php echo $form->textField($pitch,'tm_amount',array('disabled'=>'disabled','placeholder'=>"Enter Amount",'title'=>"Enter Amount",'data-parsley-type'=>"number",'class'=>'gui-input','tabindex'=>'1'));?>
											<label class="field-icon" for="firstname"><i class="fa fa-usd"></i>
											</label>
										</label>
									</div>
									<div class="col-md-4 pl0 ml15">
										<label class="field prepend-icon" id="input-mb">
											<?php echo $form->textField($pitch,'tm_amount',array('disabled'=>'disabled','placeholder'=>"Enter Amount",'title'=>"Enter Amount",'data-parsley-type'=>"number",'class'=>'gui-input','tabindex'=>'2'));?>
											<label class="field-icon" for="firstname"><i class="fa fa-usd"></i>
											</label>
										</label>
									</div>
								</div>
							</div>
						</div>	
					</div>
					<div class="col-md-1"></div>
				</div>
				<div class="col-md-12 mb30 posr">
					<div class="col-md-1"></div>
					<div class="col-md-10">						
						<div class="col-md-12 tab-slide-white pt20 pb20 mt10 form-horizontal admin-form theme-primary">
							<div class="col-sm-11" id="slidetoggle2">
								<h3 class="font_newregular team-text-blue nm mt5 fs18">Fixed Price</h3>
								<p class="fs14 mt10">You can create milestones for doing the payments</p>
							</div>
							<div class="col-sm-1 text-center mt10">
								<div id="checkboxExample1" class="check-circle-base"></div>
							</div>
							<div class="col-md-12 tab-slide-white pt20 mt20 form-horizontal admin-form theme-primary fixed-box">
								<div class="col-md-12 admin-form theme-primary mt20 pl0">
									<div class="col-md-12">
										<div class="col-md-5 pl0">
											<label for="checkbox-wb" class="fs14 mb10">Total Price</label>
											<label class="field prepend-icon">
												<?php echo $form->textField($pitch,'fp_total_price',array('placeholder'=>"Enter total amount",'data-parsley-required'=>"true",'title'=>"Enter total amount",'data-parsley-type'=>"number",'class'=>'gui-input','tabindex'=>'3'));?>
												<label class="field-icon" for="firstname"><i class="fa fa-usd"></i>
												</label>
											</label>
										</div>
										<div class="col-md-4 mt30">
										  <a id="break" class="orange-new fs14 display_inline mt10" href="#"><span aria-hidden="true" class="icon-calculator"></span> &nbsp;Break into Milestones</a>
										</div>										
									</div>
								</div>
								<div id="showMilestone" class="col-md-12 admin-form theme-primary pt30 mt40 pb10 bt pl0 hide">
									<div class="col-md-12">
										<div class="col-md-5 pl0">
											<label for="checkbox-wb" class="fs14 mb10">Milestone</label>
											<label class="field prepend-icon">
												<?php echo $form->textField($milestone,'overview[]',array('placeholder'=>"Milestone description",'title'=>"Milestone description",'class'=>'gui-input','tabindex'=>'4'));?>
												<label class="field-icon" for="firstname"><i class="icon-bubbles"></i>
												</label>
											</label>
										</div>
										<div class="col-md-3 pl0">
											<label for="checkbox-wb" class="fs14 mb10">Amount</label>
											<label class="field prepend-icon">
												<?php echo $form->textField($milestone,'amount[]',array('placeholder'=>"Enter amount",'title'=>"Enter amount",'data-parsley-type'=>"number",'class'=>'gui-input','tabindex'=>'5'));?>
												<label class="field-icon" for="firstname"><i class="fa fa-usd"></i>
												</label>
											</label>
										</div>
										<div class="col-sm-1 mt30" id="addMilestone">
											<a href="#"><img alt="Add" class="mt5" src="<?php echo Yii::app()->theme->baseUrl."/images/add_icon.png"; ?>"></a>
										</div>
									</div>
								</div>
								<div id="errorMilestone" class="col-md-12 admin-form theme-primary mt20 pl0 hide">
									<span class="errorMessage">Milestone Sum should be equal to or less then Total Price</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-1"></div>
				</div>
				<div class="col-md-12 mt30 mb20">
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div class="col-md-12 pl0">
							<div class="col-sm-1 circle-blue"><span class="fs14 font-newbold">2</span></div>
							<h3 class="col-sm-11 mt5 font_newregular fs18">What will be the project duration?</h3>
						</div>							
						<div class="col-md-12 tab-slide-white pt20 pb20 mt20 form-horizontal admin-form theme-primary">
							<div class="col-sm-11">
								<div class="col-md-3 np">
									<?php echo $form->textField($pitch,'duration',array('placeholder'=>"Enter duration",'data-parsley-required'=>"true",'title'=>"Enter duration",'data-parsley-type'=>"digits",'class'=>'gui-input','tabindex'=>'6'));?>
								</div>
								<div class="dropdown col-sm-2 np">		
									<?php $options = array ('0' => 'Days', '1' => 'Weeks', '2'=>'Months'); ?>
									<?php echo $form->dropDownList($pitch,'fp_total_price_interval',$options,array('class'=>'selectpicker show-tick form-control','data-live-search'=>'false'));?>
								</div>
							</div>
							<div class="col-sm-1 text-center mt10">
								<div id="checkboxExample2" class="check-circle-base"></div>
							</div>
						</div>
					</div>
					<div class="col-md-1"></div>
				</div>
				<div class="col-md-12 mt30 mb20">
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div class="col-md-12 pl0">
							<div class="col-sm-1 circle-blue"><span class="fs14 font-newbold">3</span></div>
							<h3 class="col-sm-11 mt5 font_newregular fs18">By when do you plan to start?</h3>
						</div>							
						<div class="col-md-12 tab-slide-white pt20 pb20 mt20 form-horizontal admin-form theme-primary">
							<div class="col-sm-11">
								<div class="col-md-5 np">
									<label class="field prepend-icon">
										<?php echo $form->textField($pitch,'start_date',array('placeholder'=>"Select an estimated start date",'data-parsley-required'=>"true",'title'=>"Select an estimated start date",'class'=>'gui-input','tabindex'=>'8'));?>
										<label class="field-icon" for="firstname"><span aria-hidden="true" class="icon-calendar"></span>
										</label>
									</label>
								</div>
							</div>
							<div class="col-sm-1 text-center mt10">
								<div id="checkboxExample3" class="check-circle-base"></div>
							</div>
						</div>
					</div>
					<div class="col-md-1"></div>
				</div>
				<div class="col-md-12 mt30 mb20">
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div class="col-md-12 pl0">
							<div class="col-sm-1 circle-blue"><span class="fs14 font-newbold">4</span></div>
							<h3 class="col-sm-11 mt5 font_newregular fs18">Will you like to provide a trial period?</h3>
						</div>							
						<div class="col-md-12 tab-slide-white pt20 pb20 mt20 form-horizontal admin-form theme-primary">
							<div class="col-sm-11">
								<div class="col-md-4 np">
									<?php echo $form->textField($pitch,'trial',array('placeholder'=>"Enter a period",'title'=>"Enter a period",'class'=>'gui-input','tabindex'=>'9','data-parsley-type'=>"digits"));?>
								</div>
								<div class="col-md-1 np">		
									<button class="button button-grey" type="">Days</button>
								</div>
							</div>
							<div class="col-sm-1 text-center mt10">
								<div id="checkboxExample4" class="check-circle-base"></div>
							</div>
						</div>
					</div>
					<div class="col-md-1"></div>
				</div>
				<div class="col-md-12 mt30 mb20">
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div class="col-md-12 pl0">
							<div class="col-sm-1 circle-blue"><span class="fs14 font-newbold">5</span></div>
							<h3 class="col-sm-11 mt5 font_newregular fs18">Why did you choose this supplier?</h3>
						</div>							
						<div class="col-md-12 tab-slide-white pt20 pb20 mt20 form-horizontal admin-form theme-primary mb30">
							<div class="col-sm-11">
								<div class="col-md-12 np">
									<label class="field prepend-icon">
										<?php echo $form->textArea($pitch,'client_comment',array('placeholder'=>"Comments",'title'=>"Comments",'class'=>'gui-input','tabindex'=>'10'));?>
										<label class="field-icon" for="comment"><span class="icon-bubbles" aria-hidden="true"></span> </label>
									</label>
								</div>
							</div>
							<div class="col-sm-1 text-center mt10">
								<div id="checkboxExample5" class="check-circle-base"></div>
							</div>
						</div>
					</div>
					<div class="col-md-1"></div>
				</div>
			
			</div>
			<div class="modal-footer pt20 pb20 pr20 col-md-12">
                <span id="messageResponse" class="hide"></span>
				<button type="button" class="btn btn-orange big-btn fs14 pt5 pb5 font_newregular" id="passButSat">Send My Offer</button>
				<button type="button" class="btn btn-default2 fs14 font_newregular" data-dismiss="modal">Cancel</button>
			</div>
			<?php $this->endWidget(); ?>
		</div>
	</div>
</div>
<input type="hidden" id="milehidden" value="0">
<!-- Modal Make an Offer End -->
<script>
jQuery(document).ready(function() {
	$( "#test li " ).click(function() {
		var ele = $(this);
		$("#test li ").each(function(){
			$(this).removeClass( "active" );
		});
		ele.addClass( "active" );
	});
	
	$('.slimscroll-long').slimscroll();
	$('.selectpicker').selectpicker();
			
	$(document).on('click','#slidetoggle',function(e) {
		$('.time-box').slideToggle(500);
		$('.fixed-box').slideUp(500);
		$('#ProposalPitches_billing_type').val('1');
		$('#ProposalPitches_fp_total_price').removeAttr('data-parsley-required');
		//$('#showMilestone :input').each(function(){$(this).removeAttr('data-parsley-required');});
		$('#ProposalPitches_tm_billing_schedule_type_0').attr('data-parsley-required','true');
		$('#ProposalPitches_tm_billing_schedule_type_1').attr('data-parsley-required','true');
		checkProgress();
		$("#checkboxExample1").removeClass("check-circle-active");
		$("#checkboxExample1").addClass("check-circle-base");
	});
			
	$(document).on('click','#slidetoggle2',function(e) {
		$('.fixed-box').slideToggle(500);
		$('.time-box').slideUp(500);
		$('#ProposalPitches_billing_type').val('2');
		$('#ProposalPitches_tm_billing_schedule_type_0').removeAttr('data-parsley-required');
		$('#ProposalPitches_tm_billing_schedule_type_1').removeAttr('data-parsley-required');
		$('#input-wb').find('input[type=text]').removeAttr('data-parsley-required');
		$('#input-mb').find('input[type=text]').removeAttr('data-parsley-required');
		$('#ProposalPitches_fp_total_price').attr('data-parsley-required','true');
		checkProgress();
		$("#checkboxExample").removeClass("check-circle-active");
		$("#checkboxExample").addClass("check-circle-base");
	});
	
	$(document).on('click','#break',function(e) {
		$('#showMilestone').show();
		$('#showMilestone').removeClass('hide');
		//$('#showMilestone :input').each(function(){$(this).attr('data-parsley-required','true');});
	});

	$(document).on('click','#addMilestone',function(e) {
        var hidden_val = $("#milehidden").val();
        hidden_val = parseInt(hidden_val) + 1;
        $("#milehidden").val(hidden_val);
        var htm = '<div class="col-md-12 mt10" id="mileDiv_' + hidden_val +'" ><div class="col-md-5 pl0"><label class="field prepend-icon"><input placeholder="Milestone description" title="Milestone description" class="gui-input" tabindex="4" name="PitchHasMilestones[overview][]" id="PitchHasMilestones_overview" type="text"><label class="field-icon" for="firstname"><i class="icon-bubbles"></i></label></label></div><div class="col-md-3 pl0"><label class="field prepend-icon"><input placeholder="Enter amount" title="Enter amount" data-parsley-type="number" class="gui-input" tabindex="5"  name="PitchHasMilestones[amount][]" id="PitchHasMilestones_amount" type="text"><label class="field-icon" for="firstname"><i class="fa fa-usd"></i>	</label></label></div><div class="col-sm-1 mt10"><a class="orange-new fs24 display_inline pl2" href="#" onclick="remove_milestone(' + hidden_val + ')"><img class="mt5" src="<?php echo Yii::app()->theme->baseUrl."/images/del_icon.png"; ?>" ></a></div></div>';
        $("#showMilestone").append(htm);
	});
	
	$(document).on('click','#passButSat',function(e) {
		if($('#offer').parsley().validate() == true && checkTotalAmount()){
			var data = $('#offer').serialize();
			$('#passButSat').val('Please Wait');
			$.ajax({
				type: 'POST',
				url:"<?php echo CController::createUrl('/client/introdetail');?>",
				data:data,
				success :function(data){
					var response = JSON.parse(data);
					if(response.hasOwnProperty('error')){
						alert("Error in Offer");
						$('#passButSat').val('Done');
					}
					else{
						//alert("Offer Success");
						sendPitch($('#offer').serializeObject(),1,response.id);
						$('#passButSat').val('Done');
						$('#offer').trigger("reset");
						$('.fixed-box').slideUp(500);
						$('.time-box').slideUp(500);
						checkProgress();
						$('.slimscroll').slimScroll({ scrollTo : '0px' });
						$('#create-pitch').modal('toggle');
					}
				}
			});
		}
		else{
			e.preventDefault();
		}
	});
	
	$(document).on('click','#ProposalPitches_tm_billing_schedule_type_0',function(e) {
		$('#input-wb').find('input[type=text]').removeAttr('disabled').attr('data-parsley-required','true');
		$('#input-mb').find('input[type=text]').attr('disabled','disabled').removeAttr('data-parsley-required');
		$('#input-mb').find('input[type=text]').parent().find("ul.parsley-errors-list").html("");
		$('#input-wb').find('input[type=text]').parsley().reset();
	});
	
	$(document).on('click','#ProposalPitches_tm_billing_schedule_type_1',function(e) {
		$('#input-mb').find('input[type=text]').removeAttr('disabled').attr('data-parsley-required','true');
		$('#input-wb').find('input[type=text]').attr('disabled','disabled').removeAttr('data-parsley-required');
		$('#input-wb').find('input[type=text]').parent().find("ul.parsley-errors-list").html("");
		$('#input-mb').find('input[type=text]').parsley().reset();
	});
	
	$(document).on('focusout','#offer :input',function(e) {
		$(this).parsley().validate();
		checkProgress();
		removeSumError();
	});
	
	$(document).on('focusout','#ProposalPitches_client_comment',function(e) {
		checkProgress();
	});
	
	$("#ProposalPitches_start_date").datepicker({
		prevText: '<i class="fa fa-chevron-left"></i>',
		nextText: '<i class="fa fa-chevron-right"></i>',
		showButtonPanel: false,
		dateFormat: 'yy-mm-dd',
		onSelect: function(date) {$("#ProposalPitches_start_date").parsley().validate();checkProgress();},
	});
	
	$('#create-pitch').on('hidden.bs.modal', function () {
		$('#offer').trigger("reset");
		$('#passButSat').val("Done");
		$('.fixed-box').slideUp(500);
		$('.time-box').slideUp(500);
		var fromTop = $('#myModalLabel').position().top;
		$('.slimscroll').slimScroll({scrollTo: fromTop+'px'});
		//$('.slimscroll').slimScroll({ scrollTo : '0px' });
		checkProgress();
	});
	
	$('#create-pitch').on('shown.bs.modal', function() { 
		var fromTop = $('#myModalLabel').position().top;
		$('.slimscroll').slimScroll({scrollTo: fromTop+'px'});
	});
	
	$('.slimscroll').slimscroll({	
		height : $( window ).height()+'px',
	});
});

function remove_milestone(id)
{
   $("#mileDiv_" + id).hide();
   $("#mileDiv_" + id).remove();
}

function checkProgress()
{	
	if($('#ProposalPitches_billing_type').val() == 1){
		var length1 = $('#input-mb').find('input[type=text]').val().length;
		var length2 = $('#input-wb').find('input[type=text]').val().length;
		if((length1 > 0) || (length2 > 0))
		{	
			$("#checkboxExample").removeClass("check-circle-base");
			$("#checkboxExample").addClass("check-circle-active");
		}
		else
		{
			$("#checkboxExample").removeClass("check-circle-active");
			$("#checkboxExample").addClass("check-circle-base");
		}
	}
	if($("#ProposalPitches_trial").val().length > 0 && $("#ProposalPitches_trial").parsley().validate()==true)
	{	
		$("#checkboxExample4").removeClass("check-circle-base");
		$("#checkboxExample4").addClass("check-circle-active");
	}
	else
	{
		$("#checkboxExample4").removeClass("check-circle-active");
		$("#checkboxExample4").addClass("check-circle-base");
	}
	if($("#ProposalPitches_start_date").val().length > 0 && $("#ProposalPitches_start_date").parsley().validate()==true)
	{	
		$("#checkboxExample3").removeClass("check-circle-base");
		$("#checkboxExample3").addClass("check-circle-active");
	}
	else
	{
		$("#checkboxExample3").removeClass("check-circle-active");
		$("#checkboxExample3").addClass("check-circle-base");
	}
	if($("#ProposalPitches_duration").val().length > 0 && $("#ProposalPitches_duration").parsley().validate()==true)
	{	
		$("#checkboxExample2").removeClass("check-circle-base");
		$("#checkboxExample2").addClass("check-circle-active");
	}
	else
	{
		$("#checkboxExample2").removeClass("check-circle-active");
		$("#checkboxExample2").addClass("check-circle-base");
	}
	if($('#ProposalPitches_billing_type').val() == 2){
		if($("#ProposalPitches_fp_total_price").val().length > 0 && $("#ProposalPitches_fp_total_price").parsley().validate()==true)
		{	
			$("#checkboxExample1").removeClass("check-circle-base");
			$("#checkboxExample1").addClass("check-circle-active");
		}
		else
		{
			$("#checkboxExample1").removeClass("check-circle-active");
			$("#checkboxExample1").addClass("check-circle-base");
		}
	}
	if($("#ProposalPitches_client_comment").val().length > 0)
	{	
		$("#checkboxExample5").removeClass("check-circle-base");
		$("#checkboxExample5").addClass("check-circle-active");
	}
	else
	{
		$("#checkboxExample5").removeClass("check-circle-active");
		$("#checkboxExample5").addClass("check-circle-base");
	}
}

function checkTotalAmount()
{
	var milestoneSum = 0;
	$('#showMilestone :input').each(function(){
		if ($(this).attr('data-parsley-type') == 'number')
			milestoneSum = milestoneSum +  parseInt($(this).val());
	});
	console.log("Amount= "+milestoneSum);
	if($('#ProposalPitches_billing_type').val()==2 && !isNaN(milestoneSum)){
		if(milestoneSum <= $("#ProposalPitches_fp_total_price").val())
		{
			$("#errorMilestone").hide();
			$("#errorMilestone").addClass("hide");
			return true;
		}
		else
		{
			$("#errorMilestone").show();
			$("#errorMilestone").removeClass("hide");
			return false;
		}
	}
	return true;
}

function removeSumError()
{
	var milestoneSum = 0;
	$('#showMilestone :input').each(function(){
		if ($(this).attr('data-parsley-type') == 'number')
			milestoneSum = milestoneSum +  parseInt($(this).val());
	});
	if(milestoneSum <= $("#ProposalPitches_fp_total_price").val())
	{
		$("#errorMilestone").hide();
		$("#errorMilestone").addClass("hide");
	}
}

function bind_datePicker()
{
	$("#ProposalPitches_start_date").datepicker({
		prevText: '<i class="fa fa-chevron-left"></i>',
		nextText: '<i class="fa fa-chevron-right"></i>',
		showButtonPanel: false,
		dateFormat: 'yy-mm-dd',
		onSelect: function(date) {$("#ProposalPitches_start_date").parsley().validate();checkProgress();},
	});
}

$(document).on('click','.btnEditPitch',function(e) {
	var qId = $(this).data('id');
	var pId = <?php echo $pId; ?>;
	console.log($(this).data('id'));
	console.log(qId +" "+pId);
	$.ajax({
		type: 'GET',
		url:"<?php echo CController::createUrl('/client/ajaxOffer');?>",
		data: { qId: qId, pId: pId },
		success :function(data){
			$("#offer-content").html(data);
			bind_datePicker();
			checkProgress();
			$("#create-pitch").modal("toggle");
			if($("#ProposalPitches_billing_type").val()==1)
			{
				$("#slidetoggle").trigger("click");
				$('#offer input[type=radio]:checked').trigger('click');
			}
			else
				$("#slidetoggle2").trigger("click");
		}
	});
});
</script>			