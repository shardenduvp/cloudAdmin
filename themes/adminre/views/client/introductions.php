<?php $count=0; ?>
<!-- Start: Header -->
<header class="navbar navbar-fixed-top bg-light np header-left">
	<ol class="breadcrumb p20">
		<li class="crumb-active">
			<?php echo CHtml::link('Introductions',array('/client/introductions'),array('class'=>'fs24 font_newlight'));?>
		</li>				
	</ol>
</header>
<!-- End: Header -->
<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn" style="">
<!-- begin: .tray-left -->
	<aside class="tray tray-left tray320 va-t pn" data-tray-height="match">
		<div id="nav-spy" class="animated-delay " data-animate='["100","fadeIn"]'>
			<ul class="fs14 font_newregular list-unstyled list-spacing-10 mb10 mt10 pr0 nav tray-nav tray-nav-border custom-nav-animation affix" data-spy="affix" data-offset-top="-1">
				<li class="pl25 pb35">
					<span class="fs14 font_newlight ">You have tried to get in touch with suppliers for the following projects</span>
				</li>
				<?php foreach($client_projects as $project){ ?>
				<?php if($count==0) {?>
				<li class="active">
					<a data-toggle="tab" href="#tab14_<?php echo ++$count; ?>" aria-expanded="true"> 
						<?php echo $project->name; ?>
						<?php 
						foreach($project->suppliersProjects as $proposal){
						if($proposal->status==2){?>
						<div class="tab-icon-cont">
						<span class="icon-envelope fs28 tab-icon-color display_inline mr5" aria-hidden="true"></span>
						<span class="tab-notification"></span>
						</div>
						<?php }elseif($proposal->status>2){?>
						<div class="tab-icon-cont">
						<span class="fs28 tab-icon-color display_inline font_newlight mr10">$</span>
						<span class="tab-notification"></span>
						</div>
						<?php } 
						break;
						}
						?>
						<span class="fs10 display_block  font_newlight tab-color"><?php echo count($project->suppliersProjects); ?> Introduced</span>
					</a>
				</li>	
				<?php }else{ ?>
				<li>
					<a data-toggle="tab" href="#tab14_<?php echo ++$count; ?>" aria-expanded="false"> 
						<?php echo $project->name; ?>
						<?php 
						foreach($project->suppliersProjects as $proposal){
						if($proposal->status==2){?>
						<div class="tab-icon-cont">
						<span class="icon-envelope fs28 tab-icon-color display_inline mr5" aria-hidden="true"></span>
						<span class="tab-notification"></span>
						</div>
						<?php }elseif($proposal->status>2){?>
						<div class="tab-icon-cont">
						<span class="fs28 tab-icon-color display_inline font_newlight mr10">$</span>
						<span class="tab-notification"></span>
						</div>
						<?php } 
						break;
						}
						?>
						<span class="fs10 display_block  font_newlight tab-color"><?php echo count($project->suppliersProjects); ?> Introduced</span>
					</a>
				</li>
				<?php } ?>
				<?php } ?>
			</ul>
		</div>
	</aside>
<!-- end: .tray-left -->
<?php $count=0; $iCount=0; ?>
<!-- begin: .tray-center -->
	<div class="tray tray-center va-t posr pl0 pr0 layout-left">
		<div class="admin-panels mn pn ui-sortable pl20 pr20 pt25" data-animate="fadeIn">
			<div class="row">
				<div class="col-sm-12">
					<div class="tab-block-new">
						<div class="tab-content tab-content-new animated-waypoint" data-animate="fadeIn">
							<?php foreach($client_projects as $project){ ?>
							<?php if($count==0) {?>
							<div class="tab-pane active animated-waypoint" data-animate="fadeIn" id="tab14_<?php echo ++$count; ?>">
								<div class="col-md-12 tab-top-heading animated-waypoint" data-animate="fadeIn">
									<h2 class="display_inline mr10"><?php echo $project->name; ?></h2>
									<h4 class="display_inline fs18 text-color-navy">(<?php echo count($project->suppliersProjects); ?> introductions)</h4>
									<a class="btn tab-btn-new fs12 highlight pull-right mt10" href="<?php echo CController::createUrl('/client/project',array("id"=>$project->id));?>">Project Details &nbsp;  > </a>
								</div>
							<?php } else{ ?>
							<div class="tab-pane animated-waypoint" data-animate="fadeIn" id="tab14_<?php echo ++$count; ?>">
								<div class="col-md-12 tab-top-heading animated-waypoint" data-animate="fadeIn">
									<h2 class="display_inline mr10"><?php echo $project->name; ?></h2>
									<h4 class="display_inline fs18 text-color-navy">(<?php echo count($project->suppliersProjects); ?> introductions)</h4>
									<a class="btn tab-btn-new fs12 highlight pull-right mt10" href="<?php echo CController::createUrl('/client/project',array("id"=>$project->id));?>">Project Details &nbsp;  > </a>
								</div>
							<?php } ?>
							<?php foreach($project->suppliersProjects as $sProject){ ?>
							<?php
							$storyCount = 0;
							foreach($sProject->suppliers->suppliersHasPortfolios as $pcount)
								if($pcount->status != 0)
									$storyCount++;
							$refCount = 0;
							foreach($sProject->suppliers->suppliersHasReferences as $rating)
							{
								$checkStatus = SuppliersHasCategoryRating::model()->findAllByAttributes(array("suppliers_has_references_id"=>$rating->id));
								if(!empty($checkStatus))
									$refCount++;
							}
							$totalOfRating=0;
							if($refCount>0)
							{
								foreach($sProject->suppliers->suppliersHasReferences as $rating)
									foreach($rating->suppliersHasCategoryRatings as $rate)
										$totalOfRating	+=	$rate->rating;
								$avgRating = number_format((float)((((float)$totalOfRating))/($refCount*4)),1);
							}
							else
								$avgRating=0;
							$city="";
							foreach($sProject->suppliers->users->usersOffices as $office)
							{
								if($office->dep_id == 1)
								{
									$city	=	$office->city->name.", ".$office->city->countries->name;
									break;
								}
							}
							$criteria 			=	new CDbCriteria();
							$criteria->order 	=	'id DESC';
							$qoute				=	ProposalPitches::model()->findByAttributes(array("suppliers_projects_id"=>$sProject->id),$criteria);
							?>
							<div class="col-md-12 animated-waypoint" data-animate="fadeIn">
								<a href="<?php echo Yii::app()->createUrl("/client/introdetail",array("projectId"=>$sProject->client_projects_id,'pId'=>$sProject->id)); ?>" class="pa10 pt25 pb15 col-md-12 np tab-top-heading highlight-bg">
									<div class="col-md-3 text-center">
										<?php if(empty($qoute)){ ?>
										<span style="" class="icon-users fs30 display_block mb10 team-text-blue" aria-hidden="true"></span>
										<span class="fs14 display_block mb5 team-text-blue">Introduced</span>
										<span class="fs10 display_block font_newlight tab-color"><?php echo date('d M Y',strtotime($sProject->add_date));?></span>
										<?php }else{ ?>
										<span style="" class="fs30 display_block mb10 team-text-blue">$</span>
										<span class="fs14 display_block mb5 team-text-blue">Quotation</span>
										<span class="fs10 display_block font_newlight tab-color"><?php echo date('d M Y',strtotime($qoute->add_date));?></span>
										<?php } ?>
									</div>
									<div class="col-md-5">
										<h4 class="nm font_newregular fs18 mb5 ellipsis"><?php echo $sProject->suppliers->users->company_name; ?> </h4>
										<span class="mr10 col-sm-5 np mt5 mb5 loc-gray ellipsis"><span class="icon-pointer icon-grey-color" aria-hidden="true"></span><?php echo $city; ?> </span>
										<?php if(!empty($sProject->suppliers->response_time)){ ?><span class="mr10 col-sm-5 np mt5 mb5 loc-gray ellipsis"><span class="icon-refresh icon-grey-color" aria-hidden="true"></span> <?php echo $sProject->suppliers->response_time; ?>hrs Response </span><?php } ?>
										<span class="mr10 col-sm-5 np mt5 mb5 loc-gray ellipsis"><span class="icon-user icon-grey-color" aria-hidden="true"></span> <?php echo $sProject->suppliers->number_of_employee; ?> Employee </span>
										<span class="mr10 col-sm-5 np mt5 mb5 loc-gray ellipsis"><span class="icon-calendar icon-grey-color" aria-hidden="true"></span> Founded in <?php echo $sProject->suppliers->foundation_year;?> </span>
									</div>
									<div class="col-md-4">
										<span class="tab-circle-new ml20"><h4 class="font_newregular orange-new fs16 mb0"><?php echo $avgRating;?></h4><span class="grey-text fs10">Rating</span></span>
										<span class="tab-circle-new ml20"><h4 class="font_newregular orange-new fs16 mb0"><?php echo $storyCount; ?></h4><span class="grey-text fs10">Clients</span></span>
										<span class="tab-circle-new ml20"><h4 class="font_newregular orange-new fs16 mb0"><?php echo (!empty($sProject->suppliers->per_hour_rate))?$sProject->suppliers->per_hour_rate:"Not Set";?></h4><span class="grey-text fs10">PerHr($)</span></span>
									</div>
								</a>	
									<?php if(!empty($qoute)){
										$buttonText		=	($qoute->status==1)?"Make an Offer":"Edit Offer";
										$qoute_type 	=	"";
										$qoute_price	=	0;
										$duration		=	"";
										if($qoute->billing_type == 2)
										{
											$qoute_type 	=	"Fixed Price";
											$qoute_price	=	$qoute->fp_total_price;
										}
										else
										{
											$qoute_type = "Time & Material | ";
											if($qoute->tm_billing_schedule_type == 0)
												$qoute_type = $qoute_type."Weekly Billing";
											else
												$qoute_type = $qoute_type."Monthly Billing";
											$qoute_price	=	$qoute->tm_amount;
										}
										if($qoute->fp_total_price_interval == 0)
											$duration	=	$qoute->duration." Days";
										elseif($qoute->fp_total_price_interval == 1)
											$duration	=	$qoute->duration." Weeks";
										else
											$duration	=	$qoute->duration." Months";
										?>
										<div class="tab-slide col-md-12 pa10">
											<span class="tab-arrow"><img src="<?php echo Yii::app()->theme->baseUrl."/images/arrow-up.png";?>" alt="up arrow" /></span>
											<div class="col-sm-1 pl0">
												<img src="<?php echo Yii::app()->theme->baseUrl."/images/dots-icon.png"; ?>" alt="Dots icon" />
											</div>
											<div class="col-sm-8 pl0">
												<div class="col-sm-4 pt10 pb10 mt20 tab-price-div">
													<span class="fs10"><?php echo $qoute_type; ?>:</span>
													<h3 class="font_newregular team-text-blue nm mt5">$<?php echo $qoute_price; ?></h3>
												</div>
												<div class="col-sm-3 pt10 pb10 mt20 tab-price-div">
													<span class="fs10">Start Date:</span>
													<h3 class="font_newregular team-text-blue nm mt5"><?php echo date('d M Y',strtotime($qoute->start_date));?></h3>
												</div>
												<div class="col-sm-3 pt10 pb10 mt20 tab-price-div">
													<span class="fs10">Duration:</span>
													<h3 class="font_newregular team-text-blue nm mt5"><?php echo $duration; ?></h3>
												</div>
												<div class="col-sm-2 pt10 pb10 mt20 tab-price-div-last">
													<span class="fs10">Trial:</span>
													<h3 class="font_newregular team-text-blue nm mt5"><?php echo $qoute->trial; ?> Days</h3>
												</div>
											</div>	
											<div class="col-md-3 pr0">
												<?php echo CHtml::ajaxLink($buttonText, array('/client/ajaxoffer','pId'=>$sProject->id,'qId'=>$qoute->id),array('type' =>'GET','success'=>'js:function(html){$("#offer-content").html(html);bind_datePicker();checkProgress();$("#create-pitch").modal("toggle");if($("#ProposalPitches_billing_type").val()==1){$("#slidetoggle").trigger("click");}else{$("#slidetoggle2").trigger("click");}}'),array("data-toggle"=>"modal","data-target"=>"#create-pitch","class"=>"btn tab-btn-orange font_newregular fs12")); ?>
												
												<img src="<?php echo Yii::app()->theme->baseUrl."/images/dots-icon.png"; ?>" alt="Dots icon" class="pull-right" />
											</div>
										</div>
									<?php } ?>
							</div>
							<?php } $iCount=0; ?>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12 mt30 pt30 not-happy">
			<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/smile-icon.png" alt="Not Happy" />
			<span class="display_block font_newregular fs18 mt20 mb15">Not Happy with the above Suppliers?</span>
			<a href="javascript:void(0);" class="fs14 orange-new font_newregular">View More Partners </a>
			<span>|</span>
			<script id="timelyScript" src="https://book.gettimely.com/widget/book-button.js"> </script>
			<div class="hide">
				<script type="text/javascript" id="hideScript">var hideButton = new timelyButton("vp", { buttonId: "hideScript" });</script>
				<a href="javascript:void(0)"><img src="http://book.gettimely.com/images/book-buttons/book-now-light.png" border="0"></a>
			</div>
			<a href="javascript:void(0);" onclick="hideButton.start();" class="fs14 orange-new font_newregular">Schedule a Call Now</a>
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
				<!-- Ajax loaded content here -->
			</div>
			<div class="modal-footer pt20 pb20 pr20 col-md-12">
                <span id="messageResponse" class="hide"></span>
				<button type="button" class="btn btn-orange big-btn fs14 pt5 pb5 font_newregular" id="passButSat">Send My Offer</button>
				<button type="button" class="btn btn-default2 fs14 font_newregular" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>
<!-- <div class="row" id="chat-box" data-room="<?php //echo base64_encode($project->chat_room_id); ?>" data-user="<?php //echo base64_encode($roomUser->id); ?>" data-u="<?php //echo base64_encode($project->id); ?>">
</div> -->
<!-- Modal Make an Offer End -->
<script type="text/javascript">
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
	"use strict";
	// Init Theme Core
	Core.init();
	// Init Theme Core    
	Demo.init();
	// Init custom navigation animation
	setTimeout(function() {
		$('.custom-nav-animation li').each(function(i, e) {
			var This = $(this);
			var timer = setTimeout(function() {
				This.addClass('animated animated-short zoomIn');
			}, 50 * i);
		});
	}, 500);
	$('.admin-panels').adminpanel({
		grid: '.admin-grid',
		draggable: true,
		mobile: true,
		callback: function() {
			bootbox.confirm('<h3>A Custom Callback!</h3>', function() {});
		},
		onFinish: function() {
			$('.admin-panels').addClass('animated fadeIn').removeClass('fade-onload');
			// Init Demo settings 
			$('#p0 .panel-control-color').click();
			// Init Demo settings 
			$('#p1 .panel-control-title').click();
			// Init Demo smoothscroll
			$('.tray-nav a').smoothScroll({
				offset: -145
			});
			// Create an example admin panel filter
			$('#admin-panel-filter a').on('click', function() {
				var This = $(this);
				var Value = This.attr('data-filter');
				// Toggle any elements whos name matches
				// that of the buttons attr value
				$('.admin-filter-panels').find($(Value)).each(function(i, e) {
					if (This.hasClass('active')) {
						$(this).slideDown('fast').removeClass('panel-filtered');
					} else {
						$(this).slideUp().addClass('panel-filtered');
					}
				});
				This.toggleClass('active');
			});
		},
		onSave: function() {
			$(window).trigger('resize');
		}
	});
	
	$(".tab-slide").slideDown(1500);
	
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
        var htm = '<div class="col-md-12 mt10" id="mileDiv_' + hidden_val +'" ><div class="col-md-5 pl0"><label class="field prepend-icon"><input placeholder="Milestone description" title="Milestone description" class="gui-input" tabindex="4" name="PitchHasMilestones[overview][]" id="PitchHasMilestones_overview" type="text"><label class="field-icon" for="firstname"><i class="fa fa-usd"></i></label></label></div><div class="col-md-3 pl0"><label class="field prepend-icon"><input placeholder="Enter amount" title="Enter amount" data-parsley-type="number" class="gui-input" tabindex="5"  name="PitchHasMilestones[amount][]" id="PitchHasMilestones_amount" type="text"><label class="field-icon" for="firstname"><i class="fa fa-usd"></i>	</label></label></div><div class="col-sm-1 mt10"><a class="orange-new fs24 display_inline pl2" href="#" onclick="remove_milestone(' + hidden_val + ')"><img class="mt5" src="<?php echo Yii::app()->theme->baseUrl."/images/del_icon.png"; ?>" ></a></div></div>';
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
</script>
<?php $chatTemplates=ChatTemplate::model()->findAllByAttributes(array('status'=>1)); ?>
 <script type="text/javascript">
    var username = "hi";
    var templates = <?php echo CJSON::encode($chatTemplates); ?>;
    var url = "https://www.filepicker.io/api/file/A9r6eU3JQOxoJXvAWPgY";

 </script>