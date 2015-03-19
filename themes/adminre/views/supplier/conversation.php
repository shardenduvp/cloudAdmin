   <?php $pId		=	base64_decode(Yii::app()->request->getParam('pid'));  ?>
   <header class="navbar navbar-fixed-top bg-light np header-left">
   	<ol class="breadcrumb p20">
   		<li class="crumb-active">
   			<a href="#" class="fs24 font_newlight">Project Details</a>
   		</li>
   		<li class="crumb-active">
   			<a href="<?php echo Yii::app()->createUrl('/supplier/projectlisting'); ?>" class="fs12 font_newlight breadcrum-color"><span aria-hidden="true" class="icon-users fs12 mr5" style=""></span> Introduction</a>
   		</li>				
   	</ol>
   </header>
   <!-- Begin: Content -->
   <section id="content" class="table-layout animated fadeIn" style="">
   	<!-- begin: .tray-left -->
   	<aside class="aside-left-panel col-md-3 va-t pn">
   		<div class="animated-delay slimscroll-long layout-left" data-animate='["100","fadeIn"]'>
   			<div class="col-md-12 pl30 pr20 pt25">
   				<div class="col-md-4 np">
			    	<?php
					$avtar_img=Yii::app()->theme->baseUrl."/style/images/avatar.png";
					if($project->clientProjects->clientProfiles->users->image!="")
					{
						$avtar_img = $project->clientProjects->clientProfiles->users->image;
					}
					?>
					<img src="<?php echo $avtar_img; ?>" class="img-circle" alt="Team Member" id="profile_img" width="80" height="80" />
                    
   				</div>
   				<div class="col-md-8 np mt10">
   					<h3 class="font_newlight nm blue-new mb5 mt5"><?php echo $project->clientProjects->clientProfiles->users->first_name; ?> <?php echo $project->clientProjects->clientProfiles->users->last_name; ?></h3>
   					<span class="mr10 display_block"><?php echo $project->clientProjects->clientProfiles->users->role; ?> </span>
   				</div>
   			</div>
   			<div class="col-md-12 np mt30">
   				<h4 class="font_newregular pl30 fs12 blue-new mb5">Client Info</h4>
   				<div class="col-md-12 bt-dark pl30 pt20">
   					<a href="" class="fs18 font_newregular team-text-blue"><?php echo $project->clientProjects->clientProfiles->users->company_name; ?></a>
   					<div class="col-sm-12 np mt10">
   						<span class="col-sm-12 np mt5 mb5"><span aria-hidden="true" class="icon-pointer mr5 icon-grey-color"></span> 
                           <?php
							foreach($project->clientProjects->clientProfiles->cities as $city)
							{
								if($city->is_main == 1)
									echo $city->cities->name.", ".$city->cities->countries->name; 
								break;
							}
							?>
                           </span>
   						<span class="col-sm-12 np mt5 mb5"><span aria-hidden="true" class="icon-user mr5 icon-grey-color"></span> <?php echo $project->clientProjects->clientProfiles->team_size; ?> Employee </span>
   					</div>
   				</div>
   			</div>

   			<div class="col-md-12 np mt30">
   				<h4 class="font_newregular pl30 fs12 blue-new mb5">Project Info</h4>
   				<div class="col-md-12 bt-dark p30 pb20 pt20 vp-bg">
   					<div class="col-sm-11 np">
   						<a href="" class="fs18 font_newregular team-text-blue"><?php echo $project->clientProjects->name; ?></a>
   						<div class="col-sm-12 np mt10">
   							<span class="col-sm-12 np mt5 mb5 fs12 blue-new"><span class="mr5 loc-gray">Project Stage:</span> <?php echo $project->clientProjects->currentStatus->name; ?> </span>
   							<span class="col-sm-12 np mt5 mb5 fs12 blue-new"><span class="mr5 loc-gray">Expected To Start:</span> 
                                <?php
                                    $startPreference = array("1"=>"Immediatly","2"=>"Within the next 30 days","3"=>"No Hurry"); 
                                    echo $startPreference[$project->clientProjects->project_start_preference]; 
                                ?> 
                            </span>
   						</div>
   					</div>
   				</div>
   				<div class="col-md-12 bt-dark p30 pb20 pt10">
   					<h4 class="font_newregular fs12 mb10 text-color-navy">Venture Pact View</h4>
   					<div class="col-md-12 np">
   						<div class="fs12 lh-20">
   							<div class="col-sm-4 np">
   								<span class="circle-new " data-toggle="tooltip" data-placement="right" title="8 Score...."><h4 class="font_newregular orange-new fs18 mb0">8</h4><span class="grey-text fs10">Score</span></span>
   							</div>
   							<em class="commas">"</em>
   							Lorem ipsum dolor sit amet, pri duis appetere splendide ei. Ad vis graece lobortis, et odio liber molestiae duo. Nisl iudico causae cu eos, tollit vivendo glortur ea eos. Pro putant causae vivendo et. Ei officiis consulatu ius, pri lucilius mediocritatem ex, te est brute vidisse vituperata. Ius ei agam vivendum, vis 
   							vidisse viderer in.<em class="commas">"</em>
   						</div>
   					</div>
   				</div>
   				<div class="col-md-12 bt-dark p30 pb10 pt10">
   					<h4 class="font_newregular fs12 mb5 text-color-navy">Requirement</h4>
   					<div class="col-sm-12 np mt10">
                    <?php foreach($project->clientProjects->clientProjectsHasSkills as $skill){ ?>
                        <a class="btn-sm mb5" href=""><?php echo $skill->skills->name; ?></a>
                    <?php } ?>
                     <?php foreach($project->clientProjects->clientProjectsHasServices as $service){ ?>
                        <a class="btn-sm mb5" href=""><?php echo $service->services->name; ?></a>
                    <?php } ?>
                     <?php foreach($project->clientProjects->clientProjectsHasIndustries as $industry){ ?>
                        <a class="btn-sm mb5" href=""><?php echo $industry->industries->name; ?></a>
                    <?php } ?>
   					
   					</div>
   				</div>
   				<div class="col-md-12 bt-dark p30 pb10 pt10">
   					<h4 class="font_newregular fs12 mb5 text-color-navy">Summary</h4>
   					<div class="col-sm-12 np mt10">
   						<p class="fs12 lh-20">
   							<?php echo $project->clientProjects->description; ?>
   						</p>
   					</div>
   				</div>
				<?php if(count($project->clientProjects->clientProjectDocuments) > 0)
				{					?>
   				<div class="col-md-12 bt-dark p30 pb10 pt10">
   					<h4 class="font_newregular fs12 mb5 text-color-navy">Reference Files</h4>
   					<div class="col-sm-12 np mt10">
                        <?php
    					foreach($project->clientProjects->clientProjectDocuments as $ref)
    					{
    						//echo '<a target="_blank" href="'.$ref->path.'">'.$ref->name.'</a><br/>';
                            ?>
                            <a href="<?php echo $ref->path; ?>" target="_blank" class="orange-new fs12 display_block mb5"><?php echo $ref->name; ?></a>
                            <?php
    					}
    					?>
   					</div>
   				</div>
				<?php
				}
				?>
   			</div>
   		</div>
   	</aside>
   	<!-- end: .tray-left -->

  <section class="pa0">
  <?php $this->Widget('WidgetChatController',array('pid'=>Yii::app()->request->getParam('pid'))); ?>

  </section>
   	</section>
	 

<!-- Modal Make an Offer Start -->
<div class="modal fade" id="create-pitch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xlg">
		<div class="modal-content col-md-12 np">
			<div class="modal-header pa20">		   
				<h2 class="modal-title fs24 text-center" id="myModalLabel"> Create / Edit Your Pitch </h2>
			</div>
			<div class="modal-body col-md-12 np mt30 slimscroll" id="offer-content">
			<?php $form=$this->beginWidget('CActiveForm', array('enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('id'=>'pitch','class'=>"forms"))); ?>
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
									<!--<div class="col-md-4">
										<div class="radio-custom radio-danger mb5">
											<input type="radio" id="checkbox-wbcheckbox-wb" name="tm_billing_type" value="0" 'data-parsley-required'="true"/>
											<label class="fs14 pl25" for="checkbox-wb">&nbsp;Weekly Billing</label>
										</div>
									</div>
									<div class="col-md-4 ml10">
										<div class="radio-custom radio-danger mb5">
											<input type="radio" id="checkbox-mb" name="tm_billing_type" value="1" 'data-parsley-required'="true"/>
											<label class="fs14 pl25" for="checkbox-mb">&nbsp;Monthly Billing</label>
										</div>
									</div>-->
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
									<select name="duration_type" class="selectpicker show-tick form-control" data-live-search="false">
										<option value="0">Days</option>
										<option value="1">Weeks</option>
										<option value="2">Months</option>
									</select>
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

			
			</div>
			<div class="modal-footer pt20 pb20 pr20 col-md-12">
                <span id="messageResponse" class="hide"></span>
				<button type="button" class="btn btn-orange big-btn fs14 pt5 pb5 font_newregular" id="passButSat">Send My Pitch</button>
				<button type="button" class="btn btn-default2 fs14 font_newregular" data-dismiss="modal">Cancel</button>
			</div>
			<?php $this->endWidget(); ?>
		</div>
	</div>
</div>
<input type="hidden" id="milehidden" value="0">
<!-- Modal Make an Pitch End -->
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
		if($('#pitch').parsley().validate() == true && checkTotalAmount()){
			var data = $('#pitch').serialize();
			$('#passButSat').val('Please Wait');
			$.ajax({
				type: 'POST',
				url:"<?php echo CController::createUrl('/supplier/conversation');?>",
				data:data,
				success :function(data){
					var response = JSON.parse(data);
					if(response.hasOwnProperty('error')){
						alert("Error in Pitch");
						$('#passButSat').val('Done');
					}
					else{
						//alert("Offer Success");
						console.log(JSON.stringify(response));
						sendPitch($('#pitch').serializeObject(),0,response.lastInsertedId);
						$('#passButSat').val('Done');
						$('#pitch').trigger("reset");
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
	
	$(document).on('focusout','#pitch :input',function(e) {
		$(this).parsley().validate();
		checkProgress();
		removeSumError();
	});
	
	
	$("#ProposalPitches_start_date").datepicker({
		prevText: '<i class="fa fa-chevron-left"></i>',
		nextText: '<i class="fa fa-chevron-right"></i>',
		showButtonPanel: false,
		dateFormat: 'yy-mm-dd',
		onSelect: function(date) {$("#ProposalPitches_start_date").parsley().validate();checkProgress();},
	});
	
	$('#create-pitch').on('hidden.bs.modal', function () {
		$('#pitch').trigger("reset");
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
	
	$(document).on('click','.btnEditPitch',function(e) {
		var qId = $(this).data('id');
		var pId = <?php echo $project->id; ?>;
		console.log($(this).data('id'));
		console.log(qId +" "+pId);
		$.ajax({
			type: 'GET',
			url:"<?php echo CController::createUrl('/supplier/ajaxpitch');?>",
			data: { qId: qId, pId: pId },
			success :function(data){
				$("#offer-content").html(data);
				bind_datePicker();
				checkProgress();
				$("#create-pitch").modal("toggle");
				if($("#ProposalPitches_billing_type").val()==1)
					$("#slidetoggle").trigger("click");
				else
					$("#slidetoggle2").trigger("click");
			}
		});
	});
	
	$(document).on('click','.btnAcceptOffer',function(e) {
		var obj = $(this);
		var qId = $(this).data('id');
		var pId = <?php echo $project->id; ?>;
		console.log($(this).data('id'));
		console.log(qId +" "+pId);
		$.ajax({
			type: 'GET',
			url:"<?php echo CController::createUrl('/supplier/acceptoffer');?>",
			data: { qId: qId, pId: pId },
			success :function(data){
				var response = JSON.parse(data);
				OfferAccept(obj);
				var redirect = "<?php echo CController::createUrl('/supplier/activeproject');?>/pid/"+response.sId;
				window.location.href = redirect;
				console.log(data);
								
			}
		});
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
</script>