<link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/css/star-rating.min.css" rel="stylesheet">
<div class="white_outer">
	<div class="container">
		<div class="row">
			<div class="col-md-12 "><h3>My Profile</h3></div>
		</div>
	</div>
</div>  

<div class="dark-wrapper">
	<div class="container inner">
		<div class="row">
			<div role="tabpanel">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Company Details</a></li>
					<!-- <li role="presentation"><a href="#payment" aria-controls="payment" role="tab" data-toggle="tab">Payments</a></li> -->
					<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Supplier Reviews</a></li>
				</ul>
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="home">
						<div class="row"><br />
							<?php if(Yii::app()->user->hasFlash('success')){?>
								<div class="alert alert-success" id="repsoneRest2">
									<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
									<p id="messageResponse2">
									<strong><?php echo Yii::app()->user->getFlash('success'); ?></strong></p>
								</div>
							<?php } ?>
							<?php if(Yii::app()->user->hasFlash('error')){?>
								<div class="alert alert-danger" id="repsoneRest2">
									<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
									<p id="messageResponse2">
									<strong><?php echo Yii::app()->user->getFlash('error'); ?></strong></p>
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
									$profile_img = Yii::app()->theme->baseUrl."/style/images/avatar.png";
									if(!empty($client_profile->image))
									{
										$profile_img = $client_profile->image;
									}
								?>
								<img src="<?php echo $profile_img; ?>" id="profile_img" style="border-radius:100px" width="150" height="115" />
								<div style="width: 88%;text-align: center;">
									<a href="#" style="text-align: center;" id="openBrow">Edit Image</a>
								</div>
							</div>
							<div class="col-sm-6">
								<?php $form=$this->beginWidget('CActiveForm', array('id'=>'satnam','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('class'=>"forms",'data-parsley-validate'=>'data-parsley-validate','onsubmit'=>'return validate();'))); ?>
								<div class="form-group col-md-12 pa0 mt10">
									<label for="linkedin">Company Name</label>
									<?php echo $form->textField($users,'company_name',array('placeholder'=>"Company Name",'title'=>"Company Name",'data-parsley-minlength'=>"2",'data-parsley-pattern'=>"^[a-zA-Z ]+$",'class'=>'form-control text-input defaultText alphanum minlength','length'=>"2",'tabindex'=>'1'));?>
									<?php if($check == 1)echo $form->error($users,'company_name'); ?>
								</div>
								<div class="form-group col-md-12 pa0">
									<div class="col-md-6 pl0">
										<label for="name1">Founded In</label>
										<?php echo $form->textField($client_profile,'foundation_year',array('placeholder'=>"Founded In",'title'=>"Founded In",'data-parsley-type'=>"number",'data-parsley-minlength'=>"4",'class'=>'form-control text-input defaultText minlength','length'=>"4",'tabindex'=>'2'));?>
										<?php if($check == 1)echo $form->error($client_profile,'foundation_year'); ?>
									</div>
									<div class="col-md-6 pl0">
										<label for="name2">No. of Employees</label>
										<?php echo $form->textField($client_profile,'team_size',array('placeholder'=>"No. of Employees",'title'=>"No. of Employees",'data-parsley-type'=>"number",'data-parsley-minlength'=>"1",'class'=>'form-control text-input defaultText number minlength','length'=>"1",'tabindex'=>'3'));?>
										<?php if($check == 1)echo $form->error($client_profile,'team_size'); ?>
									</div>
								</div>
								<div class="form-group col-md-12 pa0">
									<div class="col-md-6 pl0">
                                    	<label for="name1">Location</label>
										<div class="demo">
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
										echo $form->textField($client_profile,'city',array('placeholder'=>"Location (Required)",'title'=>"Location (Required)",'class'=>'form-control text-input defaultText required','length'=>"1",'tabindex'=>'4','id'=>"citySelect",'spellcheck'=>"true"));?>
										<?php if($check == 1) echo $form->error($users,'city');?>
										</div>
									</div>
									<div class="col-md-6 pl0">
										<label for="name2">Category</label>
										<?php echo $form->textField($client_profile,'category',array('placeholder'=>"Category",'title'=>"Category",'data-parsley-pattern'=>"^[a-zA-Z ]+$",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText alphanum minlength','length'=>"2",'tabindex'=>'5'));?>
										<?php if($check == 1)echo $form->error($client_profile,'category'); ?>
									</div>
								</div>
                                <div class="form-group col-md-12 pa0">
									<div class="col-md-6 pl0">
										<label for="name1">Company Link</label>
										<?php echo $form->textField($client_profile,'company_link',array('placeholder'=>"Company Link",'title'=>"Company Link",'data-parsley-type'=>"url",'class'=>'url form-control text-input defaultText alphanum minlength','length'=>"2",'tabindex'=>'6'));?>
									<?php if($check == 1)echo $form->error($client_profile,'company_link'); ?>

									</div>
									<div class="col-md-6 pl0">
										<label for="name2">Skype Id</label>
										<?php echo $form->textField($client_profile,'skype_id',array('placeholder'=>"Skype Id",'title'=>"Category",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText minlength','length'=>"2",'tabindex'=>'7'));?>
										<?php if($check == 1)echo $form->error($client_profile,'category'); ?>
									</div>
								</div>
								<?php echo $form->hiddenField($client_profile,'cities_id',array('id'=>'cityId')); ?>
								<?php echo $form->hiddenField($client_profile,'image',array('id'=>"profilePicUser")); ?>
								<div class="form-group">
									<div class="col-md-4">Last saved:  <span id="auto"></span></div>
									<div class="col-md-2">
										<?php echo CHtml::ajaxSubmitButton('Save',CHtml::normalizeUrl(array('/client/profile')),array('success'=>'function(data){var dt = new Date(); var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();$("#auto").html(time);}'),array('id'=>'signup','class'=>'btn btn-primary bm0 pull-left','tabindex'=>'8')); ?>
									</div>
								</div>
								<input type="hidden" name='CityOld' value="" id='cityOldId'/>
								<?php $this->endWidget(); ?>
							</div>
						</div>
					</div>
					<!-- <div role="tabpanel" class="tab-pane" id="payment">
						<div class="row"><br />
							Payment Gateway will be added later on.
						</div>
					</div> -->
					<div role="tabpanel" class="tab-pane" id="profile">
						<div class="row"><br />
							<h4>All Reviews</h4>
							<?php if(Yii::app()->user->hasFlash('linkedinError')){?>
								<div class="alert alert-danger" id="repsoneRest2">
									<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
									<p id="messageResponse2">
									<strong><?php echo Yii::app()->user->getFlash('linkedinError'); ?></strong></p>
								</div>
							<?php } ?>
							<?php if(Yii::app()->user->hasFlash('reviewDelete')){?>
								<div class="alert alert-danger" id="repsoneRest2">
									<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
									<p id="messageResponse2">
									<strong><?php echo Yii::app()->user->getFlash('reviewDelete'); ?></strong></p>
								</div>
							<?php } ?>
							<?php if(Yii::app()->user->hasFlash('successR')){?>
								<div class="alert alert-success" id="repsoneRest2">
									<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
									<p id="messageResponse2">
									<strong><?php echo Yii::app()->user->getFlash('successR'); ?></strong></p>
								</div>
							<?php } ?>
							<?php if(Yii::app()->user->hasFlash('errorR')){?>
								<div class="alert alert-danger" id="repsoneRest2">
									<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
									<p id="messageResponse2">
									<strong><?php echo Yii::app()->user->getFlash('errorR'); ?></strong></p>
								</div>
							<?php } ?>
							<?php
								if(empty($references))
								{
									echo "You don't have any reference requests at this moment.";
								}
								foreach($references as $reference)
								{
									$supplier		=	Suppliers::model()->findBYPk($reference->suppliers_id);
									$default_logo 	= 	Yii::app()->theme->baseUrl."/style/images/avatar.png";
									$sumref			=	 0;
									$avgref			=	 0;
									if($reference->status == 1 || $reference->status == 2)
									{
										$editratings	=	SuppliersHasCategoryRating::model()->findAllByAttributes(array('suppliers_has_references_id'=>$reference->id));
										foreach($editratings as $rate)
											$sumref		=	(int)$sumref + (int)$rate->rating;
										$avgref 		=	 number_format((float)((((int)$sumref))/(4)),1);
									}
							?>
								<div class="col-md-12 outline mt15 pa0 mb15">
									<div class="col-md-12 outline pt5 pb5">
										<strong>Project: <?php echo $reference->suppliersHasPortfolio->project_name; ?></strong>
									</div>
									<div class="col-md-12 mt10 mb10">
										<div class="col-md-2 text-center outline ma10">
											<div class="col-md-12 mt10">
												<img src="<?php echo !empty($supplier->image)?$supplier->image:$default_logo ?>" id="supplier_logo" style="border-radius:100px" height="100" width="100"/>
											</div>
											<div class="col-md-12 pt10">
												Rating:- <?php echo $avgref; ?>
												<input readonly="readonly" id="input-21b" value="<?php echo $avgref; ?>" type="number" class="rating" min=0 max=5 step=0.2 data-size="sm">
											</div>
										</div>
										<div class="col-md-6">
											<div class="col-md-12 mt10">
												<?php echo $supplier->users->company_name; ?> <?php if($reference->is_unattributed == 1){echo "(Unattributed)";} if($reference->review_type == 1){echo "(Self Review)";} ?>
											</div>
											<div class="col-md-12">
												<?php
													if($reference->status == 1)
													{
														echo "Status: Review Un-Verified & published";
														echo "<br/>";
														$dt = new DateTime($reference->modified);
														echo "Last updated: ".$dt->format('m/d/Y');
													}
													else if($reference->status == 2)
													{
														echo "Status: Review Verified & published";
														echo "<br/>";
														$dt = new DateTime($reference->modified);
														echo "Last updated: ".$dt->format('m/d/Y');
													}
													else
													{
														$dt = new DateTime($reference->add_date);
														echo "Request for Review sent on ".$dt->format('m/d/Y');
													}
												?>
											</div>
										</div>
										<div class="col-md-3 text-center">
											<div class="col-md-12 mt10">
												<?php
													$link = $reference->client_email.",".$reference->client_profiles_id.",".$reference->suppliers_id.",".		 $reference->id ;
													$link = base64_encode($link);
													$id   = base64_encode($reference->id);
													if($reference->status == 1 || $reference->status == 2)
													{
													?>
														<a class='btn btn-primary share-linkedin' href='<?php echo Yii::app()->createAbsoluteUrl('client/supplierReference', array('link' => $link));?>'>Edit</a>
														<a class='delete btn btn-primary share-linkedin hide' href='<?php echo Yii::app()->createAbsoluteUrl('client/deletesupplierReference', array('id' => $id));?>'>Delete</a>
													<?php
													}
													else
													{
												?>
														<a class='btn btn-primary share-linkedin' href='<?php echo Yii::app()->createAbsoluteUrl('client/supplierReference', array('link' => $link));?>'>Write a Review</a>
												<?php
													}
												?>
											</div>
										</div>
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
</div>
<?php
if(isset($_REQUEST['page']) && $_REQUEST['page'] == 2){
	echo '<script>$(document).ready(function(){$(".nav-tabs a[href=#profile]").tab("show") ;});</script>';
}?>
<script type="text/javascript">
//var $CurrentCity	=	"<?php echo $city_id; ?>";
$(document).ready(function(){
	/*
	var auto = 0;
	$('#project-form').on('change',function(){auto = 1;});
	setInterval(function() {
		if(auto == 1)
		{
			$('#signup').trigger('click');
			auto = 0;
		}
	}, 5000);*/
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
	/*$(".delete").click(function(e){
		var conf = confirm("Are you sure? You want to delete this Review?");
		if(!conf)
				e.preventDefault();
	});*/
	//$('#satnam :input').focusout(function(){filedValidater($(this));});
	$("#cityId").val("<?php echo $city_id; ?>");
	$("#cityOldId").val("<?php echo $city_id; ?>");
	$("#signup").click(function(e){
		/*console.log($("#cityId").val());
		var city_id = $("#cityId").val();
		if(!city_id){
			alert(city_id);
			//$("#citySelect").val("");
		}*/	
	});
	$("#citySelect").val("<?php echo $city_name; ?>");
	$("#citySelect").click(function(){
		$("#citySelect").select();
		//$("#cityId").val('');
	});
	/*$("#citySelect").focusout(function(){
		if(!$("#cityId").val()){
			$("#cityId").val($("#cityOldId").val());
		}
	});
	*/
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
<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/style/css/custom.css');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/algolia.js',CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/algoliasearch.min.js',CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/typeahead.bundle.min.js',CClientScript::POS_END);
//Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/hogan.common.js',CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/style/js/star-rating.min.js',CClientScript::POS_END);
?>