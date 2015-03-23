<div class="white_outer">
	<div class="container">
		<div class="row">
			<div class="col-md-12 "><h3>My Account</h3></div>
		</div>
	</div>
</div>   

<div class="dark-wrapper">
	<div class="container inner">
		<div class="row">
			<div role="tabpanel">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">My Account</a></li>
					<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Users</a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="home">
						<div class="row"><br />
							<?php if(Yii::app()->user->hasFlash('updated')){?>
								<div class="alert alert-success" id="repsoneRest2">
									<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
									<p id="messageResponse2">
									<strong>Account details updated successfully</strong></p>
								</div>
							<?php } ?>
							<div class="col-sm-2">
								<?php
									$check = 0;
									if(isset($_POST) && !empty($_POST))
									{
										$check = 1;
									}
								?>
								<?php
									$city = "";
									if(isset($_POST['city']) && !empty($_POST['city']))
									{
										$city = $_POST['city'];
									}
								?>
								<?php
									$profile_img = Yii::app()->theme->baseUrl."/style/images/avatar.png";
									if(!empty($users->image))
										$profile_img = $users->image;
								?>
								 <img src="<?php echo $profile_img; ?>" id="profile_img" style="border-radius:100px" width="150" height="115" />
								 <div style="width: 88%;text-align: center;">
									<a href="#" style="text-align: center;" id="openBrow">Edit Image</a>
								 </div>
							</div>
							<div class="col-sm-6">
								<?php $form=$this->beginWidget('CActiveForm', array('enableAjaxValidation'=>true,'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('class'=>"forms",'data-parsley-validate'=>'data-parsley-validate','onsubmit'=>'return validate();'))); ?>
								<div class="form-group col-md-12 pa0 mt10">
									<label for="linkedin">Linkedin</label>
									<?php
										if(empty($users->linkedin)){
									?>
									<div class="connect">
										<?php echo CHtml::link('Connect with Linkedin', array('/site/linkedin','lType'=>'initiate','role'=>2),array('class'=>'btn btn-lg btn-primary share-linkedin'));?>
									</div>
									<?php
									}else{
									?>
									   <div class="connect"><h4 style="color:green;">Connected</h4> </div>
									<?php 
									}
									?>
								</div>
								<div class="form-group col-md-12 pa0 mt10">
									<div class="col-md-6 pl0">
										<label for="name1">First Name</label>
										<?php echo $form->textField($users,'first_name',array('placeholder'=>"First Name (Required)",'required'=>'required','title'=>"First Name (Required)",'data-parsley-pattern'=>"^[a-zA-Z]+$",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText required alphanum minlength','length'=>"2",'tabindex'=>'1'));?>
										<?php if($check == 1)echo $form->error($users,'first_name'); ?>
									</div>
									<div class="col-md-6 pl0">
										<label for="name2">Last Name</label>
										<?php echo $form->textField($users,'last_name',array('placeholder'=>"Last Name (Required)",'required'=>'required','title'=>"Last Name (Required)",'data-parsley-pattern'=>"^[a-zA-Z]+$",'data-parsley-minlength'=>"1",'class'=>'form-control text-input defaultText required alphanum minlength','length'=>"1",'tabindex'=>'2'));?>
										<?php if($check == 1)echo $form->error($users,'last_name'); ?>
									</div>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Email </label>
									<?php echo $form->emailField($users,'username',array('disabled'=>'disabled','placeholder'=>"Email (Required)",'required'=>'required','data-parsley-type'=>"email",'title'=>"Email (Required)",'class'=>'form-control text-input defaultText required email','tabindex'=>'3')); ?>
									<?php if($check == 1)echo $form->error($users,'username'); ?>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">New Password</label>
									<?php echo $form->passwordField($newpassword,'new_password',array('placeholder'=>"New Password",'tabindex'=>'4','class'=>'form-control text-input defaultText password')); ?>
									<?php if($check == 1) echo $form->error($newpassword,'new_password'); ?>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Confirm Password</label>
									<?php echo $form->passwordField($newpassword,'confirm_password',array('data-parsley-equalto'=>'#NewpasswordForm1_new_password','placeholder'=>"Confirm New Password",'tabindex'=>'5','class'=>'form-control text-input defaultText password')); ?>
									<?php if($check == 1) echo $form->error($newpassword,'confirm_password'); ?>
								</div>
								<div class="form-group hide">
									<label for="city">City</label>
									<?php
										$city = "";
										if(isset($_POST['city']) && !empty($_POST['city']))
											$city = $_POST['city'];
									?>
									<?php $this->widget('zii.widgets.jui.CJuiAutoComplete',array(
										'model' => $users,
										'value' => $city,
										'name' => 'city',
										'id'=>'testCity',
										'source'=>'js: function(request, response){
											$.ajax({
												url: "'.$this->createUrl('site/autoCity').'",
												dataType: "json",
												data: {
													term: request.term,
													brand: $("#type").val()
												},
												success: function (data) {response(data);}
											})
										}',
										'options'=>array('class'=>'form-control text-input defaultText required','required'=>'required','placeholder'=>"Location (Required)",'title'=>'Location (Required)','tabindex'=>'5',
										'select' => 'js:function(event, ui){ $("#cityId").val(ui.item.id);$("#testCity").attr("readonly","readonly")}',
										'click'=>'js:function( event, ui){alert("test");return false;}',
										),
										'htmlOptions'=>array('value'=>'Search',)
										));
									?>
									<?php if($check == 1) echo $form->error($users,'city'); ?>
								</div>
										<?php 
											$users->role_id=2;
											echo $form->hiddenField($users,'role_id');
											//echo $form->hiddenField($users,'cities_id',array('id'=>'cityId'));
											echo $form->hiddenField($users,'image',array('id'=>"profilePicUser"));
										?>
								<div class="form-group">
									<div class="col-md-4">Last saved:  <span id="auto"></span></div>
									<div class="col-md-2">
										<?php echo CHtml::ajaxSubmitButton('Save',CHtml::normalizeUrl(array('/client/account')),array('success'=>'function(data){var dt = new Date(); var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();$("#auto").html(time);}'),array('id'=>'signup','class'=>'btn btn-primary bm0 pull-left','tabindex'=>'5')); ?>
									</div>
								</div>
								<?php $this->endWidget(); ?>
							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="profile">
						<div class="row"><br />
							<?php if(Yii::app()->user->hasFlash('record')){?>
								<div class="alert alert-success" id="repsoneRest2">
									<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
									<p id="messageResponse2">
									<strong><?php echo Yii::app()->user->getFlash('record'); ?></strong></p>
								</div>
							<?php } ?>
							<?php if(Yii::app()->user->hasFlash('userError')){?>
								<div class="alert alert-danger" id="repsoneRest2">
									<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
									<p id="messageResponse2">
									<strong><?php echo Yii::app()->user->getFlash('userError'); ?></strong></p>
								</div>
							<?php } ?>
							<?php if(Yii::app()->user->hasFlash('userDelete')){?>
								<div class="alert alert-danger" id="repsoneRest2">
									<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
									<p id="messageResponse2">
									<strong><?php echo Yii::app()->user->getFlash('userDelete'); ?></strong></p>
								</div>
							<?php } ?>
							<?php if(Yii::app()->user->hasFlash('limit')){?>
								<div class="alert alert-danger" id="repsoneRest2">
									<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
									<p id="messageResponse2">
									<strong><?php echo Yii::app()->user->getFlash('limit'); ?></strong></p>
								</div>
							<?php } ?>
							<div class="col-sm-2">
								<?php
									$check = 0;
									if(isset($_POST) && !empty($_POST))
									{
										$check = 1;
									}
									$profile_img1 = Yii::app()->theme->baseUrl."/style/images/avatar.png";
									if(!empty($user1->image))
									{
										$profile_img1 = $user1->image;
									}
								?>
								 <img src="<?php echo $profile_img1; ?>" id="profile_img1" style="border-radius:100px" width="150" height="115" />
								 <div style="width: 88%;text-align: center;">
									<a href="#" style="text-align: center;" id="openBrowUser">Edit Image</a>
								 </div>
							</div>
							<div class="col-sm-6 ">         
								<?php $form=$this->beginWidget('CActiveForm', array('enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('class'=>"forms",'data-parsley-validate'=>'data-parsley-validate','onsubmit'=>'return validate();'))); ?>
									<div class="form-group col-md-12 pa0 mt10">
										<label for="name1">First Name</label>
										<?php echo $form->textField($user1,'first_name',array('placeholder'=>"First Name (Required)",'required'=>'required','title'=>"First Name (Required)",'data-parsley-pattern'=>"^[a-zA-Z]+$",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText required alphanum minlength','length'=>"2",'tabindex'=>'1'));?>
										<?php if($check == 1)echo $form->error($user1,'first_name'); ?>
										<label for="name1">Last Name</label>
										<?php echo $form->textField($user1,'last_name',array('placeholder'=>"Last Name (Required)",'required'=>'required','title'=>"Last Name (Required)",'data-parsley-pattern'=>"^[a-zA-Z]+$",'data-parsley-minlength'=>"1",'class'=>'form-control text-input defaultText required alphanum minlength','length'=>"1",'tabindex'=>'1'));?>
										<?php if($check == 1)echo $form->error($user1,'last_name'); ?>
									</div>
									<?php
										$user1->password = time();
										echo $form->hiddenField($user1,'password');
										$user1->addUser = 1;
										echo $form->hiddenField($user1,'addUser');
									?>
									<div class="form-group">
										<label for="exampleInputEmail1">Email </label>
										<?php
										$button_value = "Add";
										if(isset($_REQUEST['uid']))
										{
										    $button_value = "Save";
											echo $form->emailField($user1,'username',array('placeholder'=>"Email (Required)",'readonly'=>'readonly','required'=>'required','data-parsley-type'=>"email",'title'=>"Email (Required)",'class'=>'form-control text-input defaultText required email','tabindex'=>'3'));
											
										}else{
											echo $form->emailField($user1,'username',array('placeholder'=>"Email (Required)",'required'=>'required','data-parsley-type'=>"email",'title'=>"Email (Required)",'class'=>'form-control text-input defaultText required email','tabindex'=>'3'));
										}
										?>
										<?php if($check == 1)echo $form->error($user1,'email'); ?>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Role </label>
										<?php
											$role = array("4"=>"Admin","5"=>"Manager");
										?>
										<?php echo $form->dropDownList($user1,'role_id', $role,array("empty"=>"Select Role","class"=>"form-control text-input required",'required'=>'required','tabindex'=>'4')); ?>
									</div>
								<?php
									 echo $form->hiddenField($user1,'image',array('id'=>"profilePicUser1"));
								?>
								<?php echo CHtml::submitButton($button_value,array('id'=>'signup1','class'=>'btn btn-primary bm0 pull-left','tabindex'=>'5')); ?>
								<?php $this->endWidget(); ?>
								<?php
									if($button_value == "Save")
									echo CHtml::link('<button type="button" class="btn btn-primary ml10">Cancel</button>', array('/client/account','page'=>'2'));
								?>
							</div>
							<div class="col-sm-4"></div>
							<?php if(count($user_listing) > 0){?>
									<div class="col-md-12"> 
										<div class="col-md-2"></div>
										<div class="col-md-10 mt15">
											<?php
												for($i=0;$i<count($user_listing);$i++)
												{
													$role = "";
													$memberRec = Users::model()->findByAttributes(array('id'=>$user_listing[$i]->users_id));
													$user_profile_img =  Yii::app()->theme->baseUrl."/style/images/avatar.png";
													if($memberRec->image!="")
													{
														$user_profile_img = $memberRec->image; 
													}
													if($memberRec->role_id == 4)
													{
														$role = "Admin";
													}
													else
													{
														$role = "Manager";
													}
													?>
													<div class="col-md-3" style="border: 1px solid #e2e2e2;height: 200px;text-align: center;padding:4px;margin: 2px;">
														<img src="<?php echo $user_profile_img; ?>" id="user_profile_img" style="border-radius:100px" width="100"  />
														<br/><strong>Name: </strong><?php echo $memberRec->first_name." ".$memberRec->last_name;; ?> <br />
														<strong>Email: </strong><?php echo $memberRec->username; ?> <br />
														<strong>Role: </strong><?php echo $role; ?> <br />
														<?php echo CHtml::link('Edit', array('/client/account',"uid"=>base64_encode($memberRec->id),'page'=>'2'));?>
														&nbsp;| 
														<?php echo CHtml::link('Delete', array('/client/deleteteamuser',"uid"=>base64_encode($memberRec->id)),array('class'=>'delete'));?>
													</div>
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
				</div>
			</div>			
		</div>
	</div>
<!-- /.container --> 
</div>
<?php
	if(isset($_REQUEST['page']) && $_REQUEST['page'] == 2)
	{
		echo "
			<script>
				$(document).ready(function(){
					$('.nav-tabs a[href=#profile]').tab('show') ;
				});
			</script>
		";
	}
?>
<script>
    $(document).ready(function(){
		$(":input").focusout(function(){
			if($(this).parsley().validate()==true)
				$('#signup').trigger('click');
		});
		
		
		$(".delete").click(function(e){
			var conf = confirm("Are you sure? You want to delete this User?");
			if(!conf)
			{
				e.preventDefault();
			}
	   });
	
	   $("#signup").click(function(){
			var city_id = $("#cityId").val();
			if(!city_id)
				$("#testCity").val("");
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
    	);});
		
		$('#openBrowUser').click(function(){
    	filepicker.setKey("AlqJxqOBnROGcRhBT1jPFz");
    	filepicker.pickMultiple({mimetypes: ['image/*'],container: 'window'},
    		function(InkBlob){
    			for(i in InkBlob){
    				$('#profilePicUser1').val(InkBlob[i].url);
                    $("#profile_img1").attr("src",InkBlob[i].url+'/convert?w=150&h=115&fit=crop');
				}
    		},
    		function(FPError){
    			console.log(FPError.toString());
    		}
    	);});
       
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
		
		/*
		$('#Team_first_name').keyup(function(){
			var name = $('#Team_first_name').val();
			if(name.trim() === "")
			{
				$('#Team_first_name').val("");
			}
		});
		*/
    });
</script>