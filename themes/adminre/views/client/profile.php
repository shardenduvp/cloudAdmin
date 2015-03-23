<!-- Start: Header -->
<header class="navbar navbar-fixed-top bg-light np header-left">
	<ol class="breadcrumb p20">
		<li class="crumb-active">
			<?php echo CHtml::link('Edit Profile',array('/client/profile'),array('class'=>'fs24'));?>
		</li>				
	</ol>
	<ul class="nav navbar-nav navbar-right">
		<li>
			<p class="fs11 mt22"><span class="light_grey">Last saved</span>&nbsp; <span id="auto">5mins ago</span></p>
		</li>
		<li>
			<?php $form=$this->beginWidget('CActiveForm', array('enableAjaxValidation'=>true,'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('class'=>"forms",'data-parsley-validate'=>'data-parsley-validate','onsubmit'=>'return validate();'))); ?>
			<?php echo CHtml::ajaxSubmitButton('Save',CHtml::normalizeUrl(array('/client/profile')),array('success'=>'function(data){var dt = new Date(); var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();$("#auto").html(time);}'),array('id'=>'signup','class'=>'btn small-btn btn-orange pa5 mt15 fs13 font_bold','tabindex'=>'8')); ?>
		</li>
	</ul>
</header>
<!-- End: Header -->
<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn" style="">
<!-- begin: .tray-left -->
	<aside class="tray tray-left tray320 va-t pn" data-tray-height="match">
		<div id="nav-spy" class="animated-delay " data-animate='["100","fadeIn"]'>
			<ul class="fs14 font_newregular list-unstyled list-spacing-10 mb10 mt10 pr0 nav tray-nav tray-nav-border custom-nav-animation affix" data-spy="affix" data-offset-top="-1">
				<li class="pl25 pr20 pb30">
					<span class="fs14 ">Complete your profile.</span>
				</li>
				<li class="active">
					<a href="#p0"> Basic Information</a>
				</li>
				<li>
					<a href="#p1"> Payments</a>
				</li>
				<li>
					<a href="#p2" class="b-bottom"> Supplier Reviews</a>
				</li>
			</ul>
		</div>
	</aside>
<!-- end: .tray-left -->
<!-- begin: .tray-center -->
	<div class="tray tray-center va-t posr layout-left">
		<div class="admin-panels mn pn animated-waypoint pt25" data-animate="fadeIn">
			<div class="row">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-md-10 col-md-offset-1">	
							<?php
								$check = 0;
								if(isset($_POST) && !empty($_POST))
									$check = 1;
								$profile_img = Yii::app()->theme->baseUrl."/images/add-logo-icon.png";
								if(!empty($client_profile->image))
									$profile_img = $client_profile->image;
							?>
							<div class="panel-transparent" id="pt0">
								<h4 class="pb15 dark_blue_new border-bottom font_regular fs14 font_newregular dark_blue_new"> Basic Information</h4>
							</div>
							<div class="col-md-12 mt20 mb50 sort-disable pl0" id="p0" data-panel-color="false" data-panel-remove="false" data-panel-title="false" data-panel-collapse="false" >
								<div class="col-md-2 col-md-offset-5 mb50 ">
									<div class="col-md-2 pa10 mr10 mb50 pb20 text-center ">
										<a href="#" id="openBrow" class="tm-logo">
											<img src="<?php echo $profile_img; ?>" id="profile_img" class="img-circle" width="" alt="Team Member" />
											<h5 class="fs14 font_newregular orange-new mt5">Logo</h5>
										</a>
									</div>
								</div>
								<div class="col-md-12 form-horizontal admin-form theme-primary">
									<div class="form-group">
										<label class="col-sm-2 control-label pl0 pr0" for="">Company Name:</label>
										<div class="col-sm-10 pr0">
											<?php echo $form->textField($users,'company_name',array('placeholder'=>"Company Name",'title'=>"Company Name",'data-parsley-minlength'=>"2",'data-parsley-pattern'=>"^[a-zA-Z0-9,.@&!#'_*+\- ]+$",'class'=>'gui-input alphanum minlength','length'=>"2",'tabindex'=>'1'));?>
											<?php if($check == 1)echo $form->error($users,'company_name'); ?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label pl0 pr0" for="">Founded In:</label>
										<div class="col-sm-10 pr0">
											<label class="field prepend-icon">
												<?php echo $form->textField($client_profile,'foundation_year',array('placeholder'=>"Founded In",'title'=>"Founded In",'data-parsley-type'=>"number",'data-parsley-minlength'=>"4",'class'=>'gui-input minlength','length'=>"4",'tabindex'=>'2'));?>
												<?php if($check == 1)echo $form->error($client_profile,'foundation_year'); ?>
												<label for="Founded In" class="field-icon"><span class="icon-calendar" aria-hidden="true"></span></label>
											</label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label pl0 pr0" for="">No. of Employees:</label>
										<div class="col-sm-10 pr0">
											<label class="field prepend-icon">
												<?php echo $form->textField($client_profile,'team_size',array('placeholder'=>"Type an approximate number eg. 15",'title'=>"No. of Employees",'data-parsley-type'=>"number",'data-parsley-minlength'=>"1",'class'=>'gui-input number minlength','length'=>"1",'tabindex'=>'3'));?>
												<?php if($check == 1)echo $form->error($client_profile,'team_size'); ?>
												<label for="No. of Employees" class="field-icon"><span class="icon-user" aria-hidden="true"></span></label>
											</label>
										</div>
									</div> 
									<div class="form-group">
										<label class="col-sm-2 control-label pl0 pr0" for="">Location: </label>
										<?php
										$city_name	=	"";
										$city_id	=	"";
										$city = ClientProfilesHasCities::model()->findByAttributes(array("client_profiles_id"=>$client_profile->id,'is_main'=>1));
										if(!empty($city))
										{
											$city_name	=	$city->cities->name.' ('.$city->cities->countries->name.')';
											$city_id	=	$city->cities->id;
										}
										else{
											foreach($client_profile->users->usersHasCities as $cit){
												$city_id	=	$cit->cities_id;
												$city_name	=	$cit->cities->name.' ('.$cit->cities->countries->name.')';
											}
										}
										$city = "";
										if(isset($_POST['city']) && !empty($_POST['city']))
											$city = $_POST['city'];
										?>
										<div class="col-sm-10 pr0">
											<label class="field prepend-icon">
												<?php echo $form->textField($client_profile,'city',array('placeholder'=>"eg. New York, USA",'title'=>"Location (Required)",'class'=>'gui-input required','length'=>"1",'tabindex'=>'4','id'=>"citySelect",'spellcheck'=>"true"));?>
												<?php if($check == 1) echo $form->error($users,'city');?>
												<label for="Location" class="field-icon"><span class="icon-pointer" aria-hidden="true"></span></label>
											</label>
										</div>
									</div>
									<div class="form-group mb30 form-horizontal admin-form theme-primary">
										<label class="col-sm-2 control-label pl0 pr0 fs14" for="concept">Category:</label>
										<div class="col-sm-10 pr0">
											<label class="field">
												<?php echo $form->textField($client_profile,'category',array('placeholder'=>"eg. Software Development",'title'=>"Category",'data-parsley-pattern'=>"^[a-zA-Z ]+$",'data-parsley-minlength'=>"2",'class'=>'gui-input alphanum minlength','length'=>"2",'tabindex'=>'5'));?>
												<?php if($check == 1)echo $form->error($client_profile,'category'); ?>
											</label>
										</div>
									</div>
									<div class="form-group mb30 form-horizontal admin-form theme-primary">
										<label class="col-sm-2 control-label pl0 pr0 fs14" for="concept">Company Link:</label>
										<div class="col-sm-10 pr0">
											<label class="field">
												<?php echo $form->textField($client_profile,'company_link',array('placeholder'=>"Company Link",'title'=>"Company Link",'data-parsley-type'=>"url",'class'=>'url gui-input','tabindex'=>'6'));?>
												<?php if($check == 1)echo $form->error($client_profile,'company_link'); ?>
											</label>
										</div>
									</div>
									<div class="form-group mb30 form-horizontal admin-form theme-primary">
										<label class="col-sm-2 control-label pl0 pr0 fs14" for="concept">Skype Id:</label>
										<div class="col-sm-10 pr0">
											<label class="field">
												<?php echo $form->textField($client_profile,'skype_id',array('placeholder'=>"Skype Id",'title'=>"Skype Id",'data-parsley-minlength'=>"2",'class'=>'gui-input minlength','length'=>"2",'tabindex'=>'7'));?>
												<?php if($check == 1)echo $form->error($client_profile,'category'); ?>
											</label>
										</div>
									</div>
									<?php echo $form->hiddenField($client_profile,'cities_id',array('id'=>'cityId')); ?>
									<?php echo $form->hiddenField($client_profile,'image',array('id'=>"profilePicUser")); ?>
									<?php echo CHtml::hiddenField('CityOld','',array('id'=>'cityOldId'));  ?>
									<?php $this->endWidget(); ?>
								</div>
							</div>
							<div class="panel-transparent animated-waypoint" data-animate="fadeIn" id="pt1">
								<div class="pb15 dark_blue_new border-bottom font_regular fs14"> 
									<h4 class="nm display_inline font_newregular fs14 dark_blue_new"> Payments<br/></h4>													
								</div>
							</div>
							<div class="col-md-12 np mb50 sort-disable animated-waypoint" data-animate="fadeIn" id="p1" data-panel-color="false" data-panel-remove="false" data-panel-title="false" data-panel-collapse="false">
								<div class="col-md-12 mt15 pl0 pr0 bgwhite">
									<div class="col-md-9">
										<p class="fs12 pt20 pb20 pl10 pr0 mb5 mt5">
										To improve the suppliers interest, we suggest you to add a secure payment in Escrow.
										</p>
									</div>
									<div class="col-md-3 mt15 pt2">
										<button type="submit" class="btn btn-orange pa5 fs12 font_bold btn-block">Add a Verified Payment</button>
									</div>
								</div>
							</div>
							<div class="panel-transparent animated-waypoint" data-animate="fadeIn" id="pt2">
								<div class="pb15 dark_blue_new border-bottom font_regular fs14">  
									<h4 class="nm display_inline font_newregular fs14 dark_blue_new">Supplier Reviews<br/></h4>													  
								</div>
							</div>
							<div class="col-md-12 np mb50 sort-disable animated-waypoint" data-animate="fadeIn" id="p2" data-panel-color="false" data-panel-remove="false" data-panel-title="false" data-panel-collapse="false">
								<div class="col-sm-12 col-md-12 user-details">
									<?php if(empty($references))
										echo "You don't have any reference requests at this moment.";
									?>
									<?php foreach($references as $reference){ ?>
									<?php $supplier			=	Suppliers::model()->findBYPk($reference->suppliers_id); ?>
									<?php $default_logo 	= 	Yii::app()->theme->baseUrl."/style/images/avatar.png"; ?>
										<div class="col-md-12 bb pt10 pb10">
											<div class="col-md-3 pa10 text-center pl0">
												<a href="#" class="tm-hover">
													<div class="tm-show2"><span class="fa fa-linkedin-square fa-lg mt5"></span></div>
													<img width="70" height="70" alt="logo" class="tag-img-border1 image-circle" src="<?php echo !empty($supplier->image)?$supplier->image:$default_logo ?>">
													<h5 class="fs14 display_block font_newregular mb5 team-text-blue"><?php echo $supplier->users->company_name; ?></h5>
													<?php if($reference->status == 1){ ?>
													<label class="label-sm-blue mt5 mb5">Non Verified</label>
													<?php }else if($reference->status == 2){ ?>
													<label class="label-sm mt5 mb5">Verified</label>
													<?php } ?>
												</a>
											</div>
											<div class="col-md-9 pa10">
												<div class="col-md-12 pl0 pr0">
													<div class="col-md-8 pl0 pr0">
														<h3 class="mt0 display_inline mr5 font_newregular"><?php echo $reference->suppliersHasPortfolio->project_name; ?></h3>																
														<?php
														$link = $reference->client_email.",".$reference->client_profiles_id.",".$reference->suppliers_id.",".$reference->id ;
														$link = base64_encode($link);
														$now = time();
														$dt = new DateTime($reference->add_date);
														$your_date = strtotime($dt->format('d-m-Y'));
														$datediff = $now - $your_date;
														?>
														<span class="grey-text display_inline fs12"><?php echo floor($datediff/(60*60*24)); ?> days ago</span>
													</div>
													<?php if($reference->status > 0){ ?>
													<div class="col-md-4 pl0 pr0">
														<a class=" mr20" href="<?php echo Yii::app()->createAbsoluteUrl('client/supplierReference', array('link' => $link));?>"><span class="pull-right grey fs14 orange-new"><span aria-hidden="true" class="icon-note"></span> Edit</span></a> 
													</div>
													<?php } ?>
												</div>
												<?php if($reference->status > 0){ ?>
												<p class="tsm-text fs14 mb15">
													Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis feugiat tortor. Sed ornare turpis libero, vel cursus enim vulputate nec. Etiam ut eros massa. Maecenas dictum condimentum justo, non pulvinar lorem congue ut. Nullam aliquet varius ultricies. 
												</p>
												<a href="" class="orange-new fs14 font_newregular mt5">More</a>
												<?php }else{ ?>
												<div class="col-md-12 pl0 pr0 pt10">
													<a href="<?php echo Yii::app()->createAbsoluteUrl('client/supplierReference', array('link' => $link));?>" class="btn btn-default1 pa5 mt15 fs12 highlight bg-none">
														<span aria-hidden="true" class="icon-note"></span> Write a Review
													</a>
												</div>
												<?php } ?>													
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- end: .tray-center -->
</section>
<!-- End: Content -->
			
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
	
	$(":input").focusout(function(){
		if($(this).parsley().validate()==true)
			$('#signup').trigger('click');
	});
	
	//Algolio City init
	var algolia = new AlgoliaSearch('L8YWR0XFJ6', '4bba2c1bb6dc58cdac2c3a02780bc9e0');
	var index = algolia.initIndex('city');
	$('#citySelect').typeahead({ hint: false },{source:index.ttAdapter({ "hitsPerPage": 10 }),displayKey:'label'}).on('typeahead:selected', function($e,datum){
		$('#citySelect').val(datum.label);
		$('#cityId').val(datum.id);
		$('#cityOldId').val(datum.id);
		$('#ClientProfiles_category').focus();
	});
	
	$("#cityId").val("<?php echo $city_id; ?>");
	$("#cityOldId").val("<?php echo $city_id; ?>");
	
	$("#citySelect").val("<?php echo $city_name; ?>");
	$("#citySelect").click(function(){
		$("#citySelect").select();
	});
	
	$('#openBrow').click(function(){
		filepicker.setKey("AlqJxqOBnROGcRhBT1jPFz");
		filepicker.pickMultiple({mimetypes: ['image/*'],container: 'window'},
			function(InkBlob){
				for(i in InkBlob){
					$('#profilePicUser').val(InkBlob[i].url);
					$("#profile_img").attr("src",InkBlob[i].url+'/convert?w=150&h=115&fit=crop');
					$('#signup').trigger('click');
				}
			},
			function(FPError){
				console.log(FPError.toString());
			}
		);
	});
});
</script>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/algoliasearch.min.js',CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/typeahead.bundle.min.js',CClientScript::POS_END); ?>