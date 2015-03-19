<!-- Start: Header -->
<header class="navbar navbar-fixed-top bg-light np header-left">
	<ol class="breadcrumb p20">
		<li class="crumb-active">
			<?php echo CHtml::link('Account Settings',array('/client/account'),array('class'=>'fs24'));?>
		</li>				
	</ol>
	<ul class="nav navbar-nav navbar-right">
		<li>
			<p class="fs11 mt22"><span class="light_grey">Last saved</span>&nbsp; <span id="auto">5mins ago</span></p>
		</li>
		<li>
			<?php $form=$this->beginWidget('CActiveForm', array('enableAjaxValidation'=>true,'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('class'=>"forms",'data-parsley-validate'=>'data-parsley-validate','onsubmit'=>'return validate();'))); ?>
			<?php echo CHtml::ajaxSubmitButton('Save',CHtml::normalizeUrl(array('/client/account')),array('success'=>'function(data){var dt = new Date(); var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();$("#auto").html(time);$("#repsoneRest").removeClass("alert-danger");$("#repsoneRest").addClass("alert-success");$("#messageResponse").html("Your data has been saved.");$("#repsoneRest").fadeIn();setTimeout(function(){$("#repsoneRest").fadeOut();},5000);}'),array('id'=>'signup','class'=>'btn small-btn btn-orange pa5 mt15 fs13 font_bold','tabindex'=>'9')); ?>
		</li>
	</ul>
</header>
<!-- End: Header -->
<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">
<!-- begin: .tray-left -->
	<aside class="tray tray-left tray320 va-t pn" data-tray-height="match">
		<div id="nav-spy" class="animated-delay " data-animate='["100","fadeIn"]'>
			<ul class="fs14 font_newregular list-unstyled list-spacing-10 mb10 mt10 pr0 nav tray-nav tray-nav-border custom-nav-animation affix" data-spy="affix" data-offset-top="-1">
				<li class="pl25 pr20 pb30">
					<span class="fs14 ">Setup Your Account to get Connected with our Suppliers</span>
				</li>
				<li class="active">
					<a href="#p0"> My Account Details </a>
				</li>
				<li >
					<a href="#p1"> Company Information</a>
				</li>
				<li>
					<a href="#p2"> Users</a>
				</li>
				<li>
					<a href="#p3" class="b-bottom"> Partner Reviews</a>
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
							<div class="alert alert-success" id="repsoneRest">
								<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
								<p id="messageResponse"></p>
							</div>
							<div class="panel-transparent" id="pt0">
								<h4 class="pb15 dark_blue_new border-bottom font_regular fs14 font_newregular dark_blue_new"> My Account Details</h4>
							</div>
							<?php
								$check = 0;
								if(isset($_POST) && !empty($_POST))
									$check = 1;
								$profile_img = Yii::app()->theme->baseUrl."/images/client-account-img.png";
								if(!empty($users->image))
									$profile_img = $users->image;
							?>
							<div class="col-md-12 mt20 mb50 sort-disable pl0" id="p0" data-panel-color="false" data-panel-remove="false" data-panel-title="false" data-panel-collapse="false" >
								<div class="col-md-2 col-md-offset-5 mb50 ">
									<div class="col-md-2 pa10 mr10 mb50 pb20 text-center">
										<a href="#" id="openBrow" class="tm-logo">
											<img src="<?php echo $profile_img; ?>" width="" alt="Team Member" id="profile_img" class="img-circle" />
										</a>
									</div>
								</div>
								<div class="col-md-12 form-horizontal admin-form theme-primary">
									<div class="form-group mb30 form-horizontal admin-form theme-primary">
										<label class="col-sm-2 control-label pl0 pr0 fs14" for="concept">LinkedIn:</label>
										<div class="col-sm-10 pr0">
											<?php 
												if(empty($users->linkedin))
													echo CHtml::link('<i class="fa fa-linkedin-square"></i> Connect to LinkedIn', array('/site/linkedin','lType'=>'initiate','role'=>2),array('class'=>'btn  btn-default3 pa5 mt15 fs13 font_bold bthight32'));
												else
													echo CHtml::link('<i class="fa fa-linkedin-square"></i> Connected','',array('class'=>'btn  btn-default3 pa5 mt15 fs13 font_bold bthight32'));
											?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label pl0 pr0" for="">Name:</label>
										<div class="col-sm-10 pr0">
											<label class="field prepend-icon">
												<?php echo $form->textField($users,'first_name',array('placeholder'=>"Name",'required'=>'required','title'=>"Name",'data-parsley-pattern'=>"^[a-zA-Z ]+$",'data-parsley-minlength'=>"2",'class'=>'gui-input required minlength','length'=>"2",'tabindex'=>'1'));?>
												<?php if($check == 1)echo $form->error($users,'first_name'); ?>
												<label for="firstname" class="field-icon"><span class="icon-user" aria-hidden="true"></span></label>
											</label>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-2 control-label pl0 pr0" for="">Email:</label>
										<div class="col-sm-10 pr0">
											<label class="field prepend-icon">
												<?php echo $form->emailField($users,'username',array('disabled'=>'disabled','placeholder'=>"Email",'required'=>'required','data-parsley-type'=>"email",'title'=>"Email",'class'=>'gui-input required email','tabindex'=>'2')); ?>
												<?php if($check == 1)echo $form->error($users,'username'); ?>
												<label class="field-icon" for="Email"><span aria-hidden="true" class="icon-envelope"></span></label>
											</label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label pl0 pr0" for="">Designation:</label>
										<div class="col-sm-10 pr0">
												<?php echo $form->textField($users,'role',array('placeholder'=>"Designation",'title'=>"Designation",'data-parsley-pattern'=>"^[a-zA-Z ]+$",'class'=>'gui-input','tabindex'=>'3')); ?>
												<?php if($check == 1)echo $form->error($users,'role'); ?>
										</div>
									</div>
									<div class="form-group mb10">
										<label class="col-sm-2 control-label pl0 pr0" for="">Password:</label>
										<div class="col-sm-10 pr0">
											<label class="field prepend-icon">
												<?php echo $form->passwordField($users,'password',array('value'=>base64_decode($users->password),'disabled'=>'disabled','placeholder'=>"Password",'tabindex'=>'4','class'=>'gui-input password')); ?>
												<?php if($check == 1) echo $form->error($users,'password'); ?>
												<label for="Password" class="field-icon"><span class="icon-lock" aria-hidden="true"></span></label>
											</label>
										</div>
									</div>
									<div class="form-group pt0 <?php if($users->is_linkedin_user == 1){echo "hide";} ?>">
										<label class="col-sm-2 control-label pl0 pr0" for=""></label>
										<div class="col-sm-10 pl15">
											<a href="#" data-toggle="modal" data-target="#change-password" class="orange-new">Change Password</a>
										</div>
									</div>
								</div>
							</div>
							<?php 
								$users->role_id=2;
								echo $form->hiddenField($users,'role_id');
								echo $form->hiddenField($users,'image',array('id'=>"profilePicUser"));
							?>
							<?php $this->endWidget(); ?>
							<div class="panel-transparent animated-waypoint" data-animate="fadeIn" id="pt1">
								<div class="pb15 dark_blue_new border-bottom font_regular fs14"> 
									<h4 class="nm display_inline font_newregular fs14 dark_blue_new">Company Information<br/></h4>													
								</div>
							</div>
							<div class="col-md-12 mt20 mb50 sort-disable pl0" id="p1" data-panel-color="false" data-panel-remove="false" data-panel-title="false" data-panel-collapse="false" >
								<div class="col-md-12 form-horizontal admin-form theme-primary">
									<?php $form=$this->beginWidget('CActiveForm', array('enableAjaxValidation'=>true,'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('class'=>"forms",'data-parsley-validate'=>'data-parsley-validate','onsubmit'=>'return validate();'))); ?>
									<div class="form-group">
										<label class="col-sm-2 control-label pl0 pr0" for="">Company Name:</label>
										<div class="col-sm-10 pr0">
											<?php echo $form->textField($users,'company_name',array('placeholder'=>"Add your company name",'title'=>"Add your company name",'data-parsley-minlength'=>"2",'data-parsley-pattern'=>"^[a-zA-Z0-9,.@&!#'_*+\- ]+$",'class'=>'gui-input alphanum minlength','length'=>"2",'tabindex'=>'5'));?>
											<?php if($check == 1)echo $form->error($users,'company_name'); ?>
										</div>
									</div>
									<!--<div class="form-group hide">
										<label class="col-sm-2 control-label pl0 pr0" for="">Founded In:</label>
										<div class="col-sm-10 pr0">
											<label class="field prepend-icon">
												<?php //echo $form->textField($clients,'foundation_year',array('placeholder'=>"Founded In",'title'=>"Founded In",'data-parsley-type'=>"number",'data-parsley-minlength'=>"4",'class'=>'gui-input minlength','length'=>"4",'tabindex'=>'6'));?>
												<?php //if($check == 1)echo $form->error($clients,'foundation_year'); ?>
												<label for="Founded In" class="field-icon"><span class="icon-calendar" aria-hidden="true"></span></label>
											</label>
										</div>
									</div>-->
									<div class="form-group">
										<label class="col-sm-2 control-label pl0 pr0" for="">No. of Employees:</label>
										<div class="col-sm-10 pr0">
											<label class="field prepend-icon">
												<?php echo $form->textField($clients,'team_size',array('placeholder'=>"Type an approximate number eg. 15",'title'=>"Type an approximate number eg. 15",'data-parsley-type'=>"number",'data-parsley-minlength'=>"1",'class'=>'gui-input number minlength','length'=>"1",'tabindex'=>'6'));?>
												<?php if($check == 1)echo $form->error($clients,'team_size'); ?>
												<label for="No. of Employees" class="field-icon"><span class="icon-user" aria-hidden="true"></span></label>
											</label>
										</div>
									</div> 
									<div class="form-group">
										<label class="col-sm-2 control-label pl0 pr0" for="">Location: </label>
										<?php
										$city_name	=	"";
										$city_id	=	"";
										$city = ClientProfilesHasCities::model()->findByAttributes(array("client_profiles_id"=>$clients->id,'is_main'=>1));
										if(!empty($city))
										{
											$city_name	=	$city->cities->name.' ('.$city->cities->countries->name.')';
											$city_id	=	$city->cities->id;
										}
										else{
											foreach($clients->users->usersHasCities as $cit){
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
												<?php echo $form->textField($clients,'city',array('placeholder'=>"eg. New York, USA",'title'=>"eg. New York, USA",'class'=>'gui-input required','length'=>"1",'tabindex'=>'7','id'=>"citySelect",'spellcheck'=>"true"));?>
												<?php if($check == 1) echo $form->error($users,'city');?>
												<label for="Location" class="field-icon"><span class="icon-pointer" aria-hidden="true"></span></label>
											</label>
										</div>
									</div>
									<!--<div class="form-group mb30 form-horizontal admin-form theme-primary hide">
										<label class="col-sm-2 control-label pl0 pr0 fs14" for="concept">Category:</label>
										<div class="col-sm-10 pr0">
											<label class="field">
												<?php //echo $form->textField($clients,'category',array('placeholder'=>"eg. Software Development",'title'=>"Category",'data-parsley-pattern'=>"^[a-zA-Z ]+$",'data-parsley-minlength'=>"2",'class'=>'gui-input alphanum minlength','length'=>"2",'tabindex'=>'9'));?>
												<?php //if($check == 1)echo $form->error($clients,'category'); ?>
											</label>
										</div>
									</div>-->
									<div class="form-group mb30 form-horizontal admin-form theme-primary">
										<label class="col-sm-2 control-label pl0 pr0 fs14" for="concept">Company Link:</label>
										<div class="col-sm-10 pr0">
											<label class="field prepend-icon">
												<?php echo $form->textField($clients,'company_link',array('placeholder'=>"Company Link",'title'=>"Company Link",'data-parsley-type'=>"url",'class'=>'url gui-input','tabindex'=>'8'));?>
												<?php if($check == 1)echo $form->error($clients,'company_link'); ?>
												<label for="Location" class="field-icon"><span class="icon-globe" aria-hidden="true"></span></label>
											</label>
										</div>
									</div>
									<!--<div class="form-group mb30 form-horizontal admin-form theme-primary hide">
										<label class="col-sm-2 control-label pl0 pr0 fs14" for="concept">Skype Id:</label>
										<div class="col-sm-10 pr0">
											<label class="field">
												<?php //echo $form->textField($clients,'skype_id',array('placeholder'=>"Skype Id",'title'=>"Skype Id",'data-parsley-minlength'=>"2",'class'=>'gui-input minlength','length'=>"2",'tabindex'=>'11'));?>
												<?php //if($check == 1)echo $form->error($clients,'category'); ?>
											</label>
										</div>
									</div>-->
									<?php echo $form->hiddenField($clients,'cities_id',array('id'=>'cityId')); ?>
									<?php //echo $form->hiddenField($clients,'image',array('id'=>"profilePicUser")); ?>
									<?php echo CHtml::hiddenField('CityOld','',array('id'=>'cityOldId'));  ?>
									<?php echo CHtml::ajaxSubmitButton('Save',CHtml::normalizeUrl(array('/client/profile')),array('success'=>'function(data){var dt = new Date(); var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();$("#auto").html(time);}'),array('id'=>'signup1','class'=>'hide btn small-btn btn-orange pa5 mt15 fs13 font_bold','tabindex'=>'10')); ?>
									<?php $this->endWidget(); ?>
								</div>
							</div>
							<div class="panel-transparent animated-waypoint" data-animate="fadeIn" id="pt2">
								<div class="pb15 dark_blue_new font_regular fs14">  
									<h4 class="nm display_inline font_newregular fs14 dark_blue_new">Users<br/></h4>
									 <a href="#"  data-toggle="modal" data-target="#add_user" ><span class="pull-right grey fs14 pb5 orange-new"><img src="<?php echo Yii::app()->theme->baseUrl."/images/add_icon.png"; ?>" width="20"  alt="add-link" /> Add Users</span></a> 
								</div>
							</div>
							<div class="col-md-12 np mb50 sort-disable animated-waypoint" data-animate="fadeIn" id="p2" data-panel-color="false" data-panel-remove="false" data-panel-title="false" data-panel-collapse="false">
								<div class="col-md-12 bt pt20 pb10" id="ajaxUser">
									<?php if(count($user_listing) > 0){ ?>
										<?php for($i=0;$i<count($user_listing);$i++){ ?>
											<?php
												$role = "";
												$memberRec = Users::model()->findByAttributes(array('id'=>$user_listing[$i]->users_id));
												$user_profile_img =  Yii::app()->theme->baseUrl."/style/images/avatar.png";
													if($memberRec->image!="")
														$user_profile_img = $memberRec->image;
											?>
											<div class="col-md-3 pa10 text-center" id="<?php echo $memberRec->id; ?>">
												<div class="tm-hover1">
													<div class="tm-show1">
														<a href="#" data-toggle="modal" data-target="#add_user" data-id="<?php echo base64_encode($memberRec->id); ?>" data-username="<?php echo $memberRec->username; ?>" <?php echo (!empty($memberRec->image))?'data-image="'.$memberRec->image.'"':''; ?> data-first="<?php echo $memberRec->first_name; ?>" data-role="<?php echo $memberRec->role; ?>" class="editUser text_white font_newregular" title="Edit" ><span class="icon-pencil fs16  mr10 " aria-hidden="true"></span></a>
														<a href="#" data-change="<?php echo $memberRec->id; ?>" data-id="<?php echo base64_encode($memberRec->id); ?>" class="delete hide text_white font_newregular" title="Delete"><span class="icon-trash  fs16 mr5" aria-hidden="true"></span></a>	
													</div>
													<img src="<?php echo $user_profile_img;?>" alt="Team Member" class="img-circle" height="70" width="70"/>
												</div>
												<h5 class="fs12 display_block font_newregular mb5 team-text-blue"><?php echo $memberRec->first_name; ?></h5>
												<h6 class="fs10 display_block mt5 nm"><?php echo $memberRec->role; ?></h6>
											</div>
										<?php } ?>
									<?php }else{ ?>
									<div class="blank-box">
										<div class="pr0 add-mem">
											<h4 class="nm display_block  fs14 dark_blue_new">No Member Added<br></h4>
											<button type="button" data-toggle="modal" data-target="#add_user" class="btn  btn-default3 pa5 mt15 fs13 font_bold bthight32"><i class="icon-plus mr10"></i> Add Member</button>
										</div>
									</div>
									<?php }?>
								</div>
							</div>
							<div class="panel-transparent animated-waypoint" data-animate="fadeIn" id="pt3">
								<div class="pb15 dark_blue_new border-bottom font_regular fs14">  
									<h4 class="nm display_inline font_newregular fs14 dark_blue_new">Partner Reviews<br/></h4>													  
								</div>
							</div>
							<div class="col-md-12 np mb50 sort-disable animated-waypoint" data-animate="fadeIn" id="p3" data-panel-color="false" data-panel-remove="false" data-panel-title="false" data-panel-collapse="false">
								<div class="col-sm-12 col-md-12 user-details" id="review-list">
									<!-- Ajax Loaded Content for Reviews -->
									<?php $this->renderPartial('_reviews', array("references"=>$references));?>
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
<!-- Modal change password-->
<div class="modal fade " id="change-password" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title fs24 text-center ">Change Password</h4>
			</div>
			<div class="modal-body form-horizontal admin-form theme-primary">

			<div class="alert alert-success mt15" id="repsoneRestError1" style="width:96%; margin:0 auto; display:none;">
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
					<p id="messageResponseError1"></p>
			</div>
			<?php $form=$this->beginWidget('CActiveForm', array('id'=>'pass','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('class'=>"forms",'data-parsley-validate'=>'data-parsley-validate','onsubmit'=>'return validate();'))); ?>
				<div class="form-group mb0 ">
					<div class="col-md-12 pl20 pr20 mt20">
						<label class="col-md-3 control-label pl0 pr0" for="">Old Password:</label>
						<div class="col-md-9 pr0">
							<label class="field prepend-icon">
							<?php echo CHtml::passwordField('old_Pass','',array('placeholder'=>"Old Password (Required)",'required'=>'required','title'=>"Old Password (Required)",'class'=>'gui-input required firstEdit minlength','id'=>'oldPass'));?>
								<!--<input type="text" name="Password" id="Password" class="gui-input" placeholder="Password">-->
								<label for="Password" class="field-icon"><span class="icon-lock" aria-hidden="true"></span></label>
							</label>
						</div>
					</div>
					<div class="col-md-12 pl20 pr20 mt20 mb20">
						<label class="col-md-3 control-label pl0 pr0" for="">New Password:</label>
						<div class="col-md-9 pr0">
							<label class="field prepend-icon">
							<?php echo CHtml::passwordField('new_Pass','',array('placeholder'=>"New Password (Required)",'required'=>'required','data-parsley-minlength'=>"6",'title'=>"New Password (Required)",'class'=>'gui-input required firstEdit minlength','id'=>'newPass'));?>
								<label for="Password" class="field-icon"><span class="icon-lock" aria-hidden="true"></span></label>
							</label>
						</div>
					</div>
					<div class="modal-footer pt20 col-md-12 pl20 pr20 mt20">
					<?php echo CHtml::button('Reset',array('id'=>'resetPassBut','class'=>'btn btn-orange small-btn fs12')); ?>
						<button type="button" class="btn btn-default2 fs12" data-dismiss="modal">Cancel</button>
					</div>
				</div>
				<?php $this->endWidget(); ?>
			</div>
		</div>
	</div>
</div>
<!-- Modal change password End-->
<!-- Modal Add Member -->
<div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog ">
		<div class="modal-content col-md-12 np">
			<div class="alert alert-success hide mt15" id="repsoneRestError" style="width:96%; margin:0 auto;">
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
					<p id="messageResponseError"></p>
			</div>
			<div class="modal-header pa20 add_member_p_head">
				<h2 class="modal-title fs24 text-center " id="myModalLabel"> Add User </h2>
			</div>
			<div class="modal-body col-md-12 np">
				<?php $form=$this->beginWidget('CActiveForm', array('id'=>'add','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('class'=>"forms",'data-parsley-validate'=>'data-parsley-validate','onsubmit'=>'return validate();'))); ?>
				<?php echo CHtml::hiddenField('uid','',array('id'=>'uid'));  ?>
				<div class="col-md-12 pt10 mb30 text-center">
					<div class="col-md-2 col-md-offset-5 pa10 mt10 mb50 pb50  text-center ">
						<a href="#" id="openBrowUser" class="tm-logo">
							<img src="<?php echo Yii::app()->theme->baseUrl."/images/client-addt-img.png"; ?>" width="" alt="Team Member" id="profile_img1" class="img-circle" />
						</a>
					</div>
				</div>
				<div class="col-md-12 mb20 admin-form theme-primary" >
					<div class="col-md-6 ">
						<label class="field prepend-icon">
							<?php echo $form->textField($user1,'first_name',array('placeholder'=>"Name (Required)",'required'=>'required','title'=>"Name (Required)",'data-parsley-pattern'=>"^[a-zA-Z ]+$",'data-parsley-minlength'=>"2",'class'=>'gui-input required firstEdit minlength','length'=>"2",'tabindex'=>'15'));?>
							<?php if($check == 1)echo $form->error($user1,'first_name'); ?>
							<label for="firstname" class="field-icon"><span class="icon-user" aria-hidden="true"></span></label>
						</label>
					</div>
					<div class="col-md-6 ">
						<label class="field prepend-icon">
							<?php echo $form->emailField($user1,'username',array('placeholder'=>"Email (Required)",'required'=>'required','data-parsley-type'=>"email",'title'=>"Email (Required)",'class'=>'gui-input required email emailEdit','tabindex'=>'16'));?>
							<?php if($check == 1)echo $form->error($user1,'username'); ?>
							<label for="firstname" class="field-icon"><span aria-hidden="true" class="icon-envelope"></span></label>
						</label>
					</div>
				</div>
				<div class="col-md-12 mb10 admin-form theme-primary" >
					<div class="col-md-12">
						<?php echo $form->textField($user1,'role',array('placeholder'=>"Designation (Required)",'required'=>'required','title'=>"Designation (Required)",'data-parsley-pattern'=>"^[a-zA-Z ]+$",'class'=>'gui-input required email roleEdit','tabindex'=>'17')); ?>
						<?php if($check == 1)echo $form->error($user1,'email'); ?>
					</div>
				</div>
				<?php echo $form->hiddenField($user1,'image',array('id'=>"profilePicUser1")); ?>
				<?php 
					$user1->password = time();
					echo $form->hiddenField($user1,'password');
					$user1->addUser = 1;
					echo $form->hiddenField($user1,'addUser');
				?>
			</div>
			<div class="modal-footer pt20 pb20 col-md-12 pl20 pr20">
				<?php echo CHtml::button('Done',array('id'=>'passButSat','class'=>'btn btn-orange small-btn fs12','tabindex'=>'18')); ?>
				<?php $this->endWidget(); ?>
				<button type="button" class="btn btn-default2 fs12 small-btn" id="modelCan" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal Add Member End-->
<!-- Review Modal Start -->
<div class="modal fade edit-review"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  id="review-content">
	<!-- Render Partial Model Content corresponding to Reference -->
</div>
<!-- Review Modal End-->
<!-- View Review Modal Start -->
<div id="view_review">
	<!-- Ajax Loaded Content for View Reviews -->
	<?php $this->renderPartial('_viewreview', array("references"=>$references));?>
</div>
<!-- View Review Modal End -->
<script>
$(document).ready(function(){
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
	
	$("#repsoneRest").fadeOut();
	
	$(":input").focusout(function(){
		if($(this).parsley().validate()==true)
		{
			$('#signup').trigger('click');
			$('#signup1').trigger('click');
		}
	});
	
	$(document).on("click",".delete",function(e){
		var conf = confirm("Are you sure? You want to delete this User?");
		if(!conf)
		{
			e.preventDefault();
		}
		else
		{
			var uid		=	'uid='+$(this).attr('data-id');
			var did 	=	'#'+$(this).attr('data-change');
			$.ajax({
				type: 'POST',
				url:"<?php echo CController::createUrl('/client/deleteteamuser');?>",
				data:uid,
				success :function(data){
					var response = JSON.parse(data);
					if(response.hasOwnProperty('error')){
						//$('#repsoneRest').show();
						//$('#repsoneRest').addClass('hide');
						//$('#repsoneRest').removeClass('hide');
						$('#repsoneRest').removeClass('alert-success');
						$('#repsoneRest').addClass('alert-danger');
						$('#messageResponse').html(response.error);
						$('#repsoneRest').fadeIn();
						//setTimeout(function(){$('#repsoneRest').addClass('hide');},5000);
						setTimeout(function(){$('#repsoneRest').fadeOut();},5000);
					}
					else{
						//$('#repsoneRest').show();
						//$('#repsoneRest').addClass('hide');
						//$('#repsoneRest').removeClass('hide');
						$('#repsoneRest').removeClass('alert-danger');
						$('#repsoneRest').addClass('alert-success');
						$('#messageResponse').html(response.success);
						$('#repsoneRest').fadeIn();
						$(did).remove();
						//setTimeout(function(){$('#repsoneRest').addClass('hide');},5000);
						setTimeout(function(){$('#repsoneRest').fadeOut();},5000);
					}
				}
			});
		}
	});
	
	$('#openBrow').click(function(){
		filepicker.setKey("ANQWcFDQRUiGfBqjfgINQz");
		filepicker.pick({mimetypes: ['image/*'],container: 'window'},
			function(InkBlob){
				$('#profilePicUser').val(InkBlob.url);
				$("#profile_img").attr("src",InkBlob.url+'/convert?w=150&h=115&fit=crop');
				$('#signup').trigger('click');
			},
			function(FPError){
				console.log(FPError.toString());
			}
		);
	});

	$('#openBrowUser').click(function(){
		filepicker.setKey("ANQWcFDQRUiGfBqjfgINQz");
		filepicker.pick({mimetypes: ['image/*'],container: 'window'},
			function(InkBlob){
				$('#profilePicUser1').val(InkBlob.url);
				$("#profile_img1").attr("src",InkBlob.url+'/convert?w=150&h=115&fit=crop');
			},
			function(FPError){
				console.log(FPError.toString());
			}
		);
	});

	$('#NewpasswordForm1_new_password').keyup(function(){
		var value = $('#NewpasswordForm1_new_password').val();
		if(value[0] === " ")
		{
			$('#NewpasswordForm1_new_password').val("");
		}
	});

	$('#Team_email').keyup(function(){
		var email = $('#Team_email').val();
		if(typeof email[0] === "undefined")
		{
			$('#Team_email').val("");
		}
	});

	$('#passButSat').on("click",function(){
		if($('#add').parsley().validate() == true){
			var data = $('#add').serialize();
			$('#passButSat').val('Please Wait');
			$.ajax({
				type: 'POST',
				url:"<?php echo CController::createUrl('/client/account');?>",
				data:data,
				success :function(data){
					var response = JSON.parse(data);
					if(response.hasOwnProperty('error')){
						$('#repsoneRestError').show();
						$('#repsoneRestError').addClass('hide');
						$('#repsoneRestError').removeClass('hide');
						$('#repsoneRestError').removeClass('alert-success');
						$('#repsoneRestError').addClass('alert-danger');
						$('#messageResponseError').html(response.error);
						//$('#repsoneRestError').fadeIn();
						$('#passButSat').val('Done');
					}
					else{
						//$('#repsoneRest').show();
						//$('#repsoneRest').addClass('hide');
						//$('#repsoneRest').removeClass('hide');
						$('#repsoneRest').removeClass('alert-danger');
						$('#repsoneRest').addClass('alert-success');
						$('#messageResponse').html(response.success);
						$('#repsoneRest').fadeIn();
						$('#passButSat').val('Done');
						$('#add').trigger("reset");
						$('#profile_img1').attr('src','<?php echo Yii::app()->theme->baseUrl."/images/client-addt-img.png"; ?>');
						$('#uid').val('');
						$('#profilePicUser1').val("");
						//changeClearSelect();
						if(!response.hasOwnProperty('edit')){
							var newHTML = '<div class="col-md-3 pa10 text-center" id="'+response.id+'"><div class="tm-hover1"><div class="tm-show1"><a href="#" data-toggle="modal" data-target="#add_user" data-id="'+response.eid+'" data-username="'+response.email+'" data-first="'+response.first+'" data-image="'+response.image+'" data-role="'+response.designation+'" class="editUser text_white font_newregular" title="Edit" ><span class="icon-pencil fs16  mr10 " aria-hidden="true"></span></a><a href="#" class="hide text_white font_newregular delete" data-change="'+response.id+'" data-id="'+response.eid+'" title="Delete"><span class="icon-trash  fs16 mr5" aria-hidden="true"></span></a></div><img src="'+response.image+'" alt="Team Member" class="img-circle" height="70" width="70"/></div><h5 class="fs12 display_block font_newregular mb5 team-text-blue">'+response.first+'</h5><h6 class="fs10 display_block mt5 nm">'+response.designation+'</h6></div>';
							$('#ajaxUser').append(newHTML);
						}
						else{
							var newHTML = '<div class="tm-hover1"><div class="tm-show1"><a href="#" data-toggle="modal" data-target="#add_user" data-id="'+response.eid+'" data-username="'+response.email+'" data-first="'+response.first+'" data-image="'+response.image+'" data-role="'+response.designation+'" class="editUser text_white font_newregular" title="Edit" ><span class="icon-pencil fs16  mr10 " aria-hidden="true"></span></a><a href="#" data-change="'+response.id+'" data-id="'+response.eid+'" class="hide delete text_white font_newregular" title="Delete"><span class="icon-trash  fs16 mr5" aria-hidden="true"></span></a></div><img src="'+response.image+'" alt="Team Member" class="img-circle" height="70" width="70"/></div><h5 class="fs12 display_block font_newregular mb5 team-text-blue">'+response.first+'</h5><h6 class="fs10 display_block mt5 nm">'+response.designation+'</h6>';
							var newDiv	= '#'+response.id; 
							$(newDiv).html(newHTML);
						}
						$('#add_user').modal('toggle');
						//setTimeout(function(){$('#repsoneRest').addClass('hide');},5000);
						setTimeout(function(){$('#repsoneRest').fadeOut();},5000);
					}
				}
			});
		}
	});
	
	$('#oldPass').val('');
	
	$('#oldPass').focusout(function(){
		if($("#Users_password").val()===$(this).val() ||  $(this).val()==''){
			$('#repsoneRestError1').fadeOut();
		}
		else if($("#Users_password").val()!==$(this).val() && $(this).val()!=''){
			$('#repsoneRestError1').addClass('alert-danger');
			$('#messageResponseError1').html('<strong>Error! </strong>Enter Valid Old Password.');
			$('#repsoneRestError1').fadeIn();
		}
	});

	$('#resetPassBut').on("click",function(){
		if($('#pass').parsley().validate() == true && $("#Users_password").val()===$("#oldPass").val()){
			var data = $('#pass').serialize();
			$('#resetPassBut').val('Reseting ...');
			$.ajax({
				type: 'POST',
				url:"<?php echo CController::createUrl('/client/account');?>",
				data:data,
				success :function(data){
					var response = JSON.parse(data);
					if(response.hasOwnProperty('error')){
						$('#repsoneRestError1').removeClass('alert-success');
						$('#repsoneRestError1').addClass('alert-danger');
						$('#messageResponseError1').html(response.error);
						$('#repsoneRest').fadeIn();
						$('#resetPassBut').val('Reset');
					}
					else{
						$('#Users_password').attr('value',$("#newPass").val());
						$('#repsoneRestError1').fadeOut();
						$('#repsoneRest').removeClass('alert-danger');
						$('#repsoneRest').addClass('alert-success');
						$('#messageResponse').html(response.success);
						$('#repsoneRest').fadeIn();
						$('#resetPassBut').val('Reset');
						$('#pass').trigger("reset");
						$('#change-password').modal('toggle');
						setTimeout(function(){$('#repsoneRest').fadeOut();},5000);
					}
				}
			});
		}
		else if($("#Users_password").val()!==$("#oldPass").val() && $("#oldPass").val()!=''){
			$('#repsoneRestError1').addClass('alert-danger');
			$('#messageResponseError1').html('<strong>Error! </strong>Enter Valid Old Password.');
			$('#repsoneRestError1').fadeIn();
		}
	});
	
	//Review Ajax Save
	$(document).on("click","#reviewSave",function(e){
		if($('#reviewData').parsley().validate() == true){
			var data = $('#reviewData').serialize();
			$('#reviewSave').val('Please Wait');
			$.ajax({
				type: 'POST',
				url:"<?php echo CController::createUrl('/client/references');?>",
				data:data,
				success :function(data){
					console.log("Success");
					$("#review-list").html(data);
					$(".edit-review").modal("toggle");
					$.ajax({
						type: 'POST',
						url:"<?php echo CController::createUrl('/client/ajaxviewreview');?>",
						success :function(data){
							console.log("Success");
							$("#view_review").html(data);
						}
					});
				}
			});
		}
	});
	
	// Edit user ajax functionality	
	$(document).on("click",".editUser",function(e){
		e.preventDefault();
		$('#uid').val($(this).attr('data-id'));
		$('.firstEdit').val($(this).attr('data-first'));
		$('.emailEdit').val($(this).attr('data-username'));
		$('#profile_img1').attr('src',$(this).attr('data-image'));
		$('.roleEdit').val($(this).attr('data-role'));
		$('#passButSat').val("Update");
		/*$('.lastEdit').val($(this).attr('data-last'));
		var role = $(this).attr('data-role');
		$('.roleEdit').prop('selectedIndex',role-3);
		$("button.selectpicker[type=button]").find("span:first").html($(this).attr('data-rolename'));
		$('ul.dropdown-menu').find('li').each(function(){
			var value = $(this).attr('data-original-index');
			if(value == role-3)
				$(this).addClass('selected');
			else
				$(this).removeClass('selected');
		});*/
	});
	
	$('#modelCan').click(function(){
		$('#add').trigger("reset");
		$('#add').parsley().reset();
		$('#uid').val('');
		//$('.roleEdit').prop('selectedIndex',0);
		$('#passButSat').val("Done");
		$('#repsoneRestError').addClass('hide');
		$('#profile_img1').attr('src','<?php echo Yii::app()->theme->baseUrl."/images/client-addt-img.png"; ?>');
		//changeClearSelect();
	});

	$('#add_user').on('hidden.bs.modal', function () {
		$('#add').trigger("reset");
		$('#add').parsley().reset();
		$('#uid').val('');
		//$('.roleEdit').prop('selectedIndex',0);
		$('#passButSat').val("Done");
		$('#repsoneRestError').addClass('hide');
		$('#profile_img1').attr('src','<?php echo Yii::app()->theme->baseUrl."/images/client-addt-img.png"; ?>');
		//changeClearSelect();
	});
	
	$('#change-password').on('hidden.bs.modal', function () {
		$('#pass').trigger("reset");
		$('#pass').parsley().reset();
		$('#passButSat').val("Done");
		$('#repsoneRestError1').fadeOut();
	});

	function changeClearSelect(){
		$("button.selectpicker[type=button]").find("span:first").html('Select Role');
		$('ul.dropdown-menu').find('li').each(function(){
			var value = $(this).attr('data-original-index');
			if(value == 0)
				$(this).addClass('selected');
			else
				$(this).removeClass('selected');
		});
	}
	
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
	
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/algoliasearch.min.js',CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/typeahead.bundle.min.js',CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/rangeslider.js',CClientScript::POS_END); ?>