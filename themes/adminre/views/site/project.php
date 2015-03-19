<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/selectize/css/selectize.css" />
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/selectize/js/selectize.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/page1.js"></script>
<?php 
$form=$this->beginWidget('CActiveForm', array('id'=>'login-form', 'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('id'=>'project-form','enctype' => 'multipart/form-data','onsubmit'=>'return validate();'))); ?>
<?php 
if(isset($_REQUEST['id']))
	echo CHtml::hiddenField('id' ,$_REQUEST['id'], array('id'=>'id')); 
else
	echo CHtml::hiddenField('docs' ,'', array('id'=>'docs')); 
?>
<!-- START Get Started Template Container -->
 <section id="main" class="container-fluid">
	<div class="page-header" style="border:none;"> <!-- For Top Margin --> </div>
 	<!-- Get Started Form Start -->
    <div  id="project">
    	<!-- Basic Form-->
         <div class="row">
       		 <div class="col-md-12">
             <!-- panel body  BASIC FORM START -->
			 
				<div class="panel-body pb0" id="basicProject"> 
						
                       <!--Title -->
					   
                       	<div class="form-group pa10">
                        
                            <label class="col-sm-4 control-label">Q. Please give your job a title.<span class="text-danger">*</span></label>
                            <div class="col-sm-8" id="pss">
                            <?php echo $form->textField($project,'name',array('required'=>'required','placeholder'=>"Ex: e-Commerce app for fashion brand",'class'=>'form-control required','data-parsley-minlength'=>"2",'data-parsley-pattern'=>"^[a-zA-Z ]+$",'data-parsley-id'=>'123')); ?>
                            <?php //echo $form->error($project,'name'); ?>
                            <?php 	echo $form->hiddenField($project,'id'); ?>

                                    <ul class="parsley-errors-list" id="parsley-id-123"></ul>
                            </div>
                        </div>
                       
                        <!-- Skills -->
                        <div class="form-group pa10 border-top" >
                            <label class="col-sm-4 control-label">Q. Do you have a Language or skill preference. <span class="text-danger">*</span></label>
                            <div class="col-sm-8">

								<select id="satnam-skills" class="form-control required" placeholder="Yii, Rails, Oracle SQL" multiple name="Skills[]" data-parsley-id='226'>
									<?php foreach($skills as $skill){
										//if($skill->skillcol !=0){?>
									<option value="<?php echo $skill->id;?>" <?php echo (in_array($skill->id,$selecetedSkills))?'selected="selected"':'';?> >
										<?php echo $skill->name;?>
                                    </option>
									<?php } ?>
								</select>
                                <div><ul class="parsley-errors-list" id="parsley-id-226"></ul>
                                <small class="help-block">If the job requires work on an existing application, select the language its built in. If you need design, select 'Design' as well. Select 'Not sure' if you are unsure.</small>
                                </div>
                            </div>
                        </div>
                        
                        
                       <!--Service Type-->
                        <div class="form-group border-top pa10" id="teamPart">
                            <label class="col-sm-4 control-label">Q.Please select a category. <span class="text-danger">*</span></label>
                            <div class="col-sm-8">

                                <select id="satnam-services" class="form-control required" placeholder="Web app, iOS app, ERP" multiple name="Services[]" data-parsley-id='126'>
                                <option default>Select a Service</option>
                                <?php foreach($services as $service){?>
                                <option value=" <?php echo $service->id;?>" <?php echo (in_array($service->id,$selecetedServices))?'selected="selected"':'';?> ><?php echo $service->name;?> </option>
                                <?php } ?>
                                </select>
                                <div><ul class="parsley-errors-list" id="parsley-id-126"></ul>
                                </div>
                            </div>
                        </div>
                        
                        <!--Industry-->
                          <div class="form-group border-top pa10" id="teamPart">
                            <label class="col-sm-4 control-label">Q.Please select industry. <span class="text-danger">*</span></label>
                            <div class="col-sm-8">

								<select id="satnam-industry" class="form-control required" placeholder="Web app, iOS app, ERP" multiple name="Industries[]" data-parsley-id='426'>
									<option default>Select a Industry</option>
									<?php foreach($industries as $industry){?>
									 <option value=" <?php echo $industry->id;?>" <?php echo (in_array($industry->id,$selecetedIndustries))?'selected="selected"':'';?>  ><?php echo $industry->name;?> </option>
									<?php } ?>
								</select>
                                <div><ul class="parsley-errors-list" id="parsley-id-426"></ul>
                                </div>
                            </div>
                        </div>
						 
                       <!-- Choice-->
                		<div class="form-group pa10">
                        <label class="col-md-4   ">Q. Stage of the Project? <span class="text-danger">*</span></label>
                        <div class="col-md-8">
                      	<?php 
						$lit = CHtml::listData($currentStatus,'id','name');
						echo $form->radioButtonList($project,'current_status_id',$lit,array('separator'=>'','template'=>'<div class="radio-inline">{input} {label}</div>')); ?>   
	                    </div>
                    </div>
               	                   
                       <div class="clearfix "></div>
                       <!-- Start Date-->
                        <div class="form-group pa10">
                            <label class="col-sm-4 control-label">Q. Expected start Date. <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                            	<?php
								echo $form->radioButtonList($project,'project_start_preference',array('1'=>'Immediately','2'=>'Within the next 30 days','3'=>'No Hurry'),array('separator'=>'','template'=>'<div class="radio-inline">{input} {label}</div>')); ?>   
                            </div>
                        </div>          
                        
                       <!-- Summery--> 
						 <div class="form-group border-top pb0 pa10">
                            <label class="col-sm-4 control-label">Q. Please summarize the job. <span class="text-danger">*</span></label>

                            <div class="col-sm-8">
                               <?php echo $form->textArea($project,'description',array('placeholder'=>"Ex: We want to build an ecommerce web application selling women's purses online. We need a landing page, a product listings page, a product page and a standard checkout process. Budget permitting, we may build social logins and referral programs. The site will be design heavy as it is a fashion website.",'class'=>'form-control required','required'=>'required','rows'=>'6', 'data-parsley-maxlength'=>"3000",'maxlength'=>"3000",'data-parsley-id'=>'125','data-container'=>"body",'id'=>"bsummary")); ?>
                                    <ul class="parsley-errors-list" id="parsley-id-125"></ul>
                               <small class="help-block">Try to outline the job, the business problem at hand & your expectations. Please limit your response to 50-150 words.</small>                              
                            </div>
                        </div>                
                </div>
                
             
               <!-- Budget Q1 -->
                <div class="form-group pa10  border-top">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-4 pl0">Q. Where do you want your developer(s) to be located? <span class="text-danger">*</span></label>
                        <div class="col-sm-8 pt5 ">
                       
                        
                        
                        	<span class="radio-inline">
                                    <label>
                                     <input type="radio" data-parsley-id="5322" data-parsley-multiple="a" name="ClientProjects[preferences]" id="customradio1" value="no-preferences"  <?php echo ($project->preferences=='no-preferences')?'checked="checked"':'';?> class="budgetClass myRadio" >
                                     No preference
                                    </label>
                                    <ul class="parsley-errors-list" id="parsley-id-multiple-a"></ul>
                            		<ul id="parsley-id-multiple-a" class="parsley-errors-list"></ul>
                            </span>
                            
                            <span class="radio-inline">
                            	<label>
                                	<input type="radio" data-parsley-id="4433" data-parsley-multiple="a" value="city" name="ClientProjects[preferences]" id="customradio2" class="budgetClass myRadio disabled" <?php echo ($project->preferences=='city')?'checked="checked"':'';?> data-toggle="modal" data-target="#bs_new">In my city</label>
                                    <ul class="parsley-errors-list" id="parsley-id-multiple-a"></ul>
                                    <ul id="parsley-id-multiple-a" class="parsley-errors-list"></ul>
                            </span>
                            
                            
                            <span class="radio-inline">
                            	<label for="customradio3"><input type="radio" data-parsley-id="3557" data-parsley-multiple="a" value="country" name="ClientProjects[preferences]" id="customradio3" class="myRadio budgetClass"  <?php echo ($project->preferences=='country')?'checked="checked"':'';?> data-toggle="modal" data-target="#bs_new">In my country</label>
                                <ul class="parsley-errors-list" id="parsley-id-multiple-a"></ul>
                    	        <ul id="parsley-id-multiple-a" class="parsley-errors-list"></ul>
                            </span>
                            
                            <span class="radio-inline">
									
                                   <label for="customradio4"><input type="radio" data-parsley-id="3557" data-parsley-multiple="a" value="regoin" name="ClientProjects[preferences]" id="customradio4" class="budgetClass myRadio" <?php echo ($project->preferences=='regoin')?'checked="checked"':'';?> >In these regions</label>
								</span>
                                <div style="height: auto;" id="regions" class="col-sm-12 <?php echo ($project->preferences=='regoin')?'':'hide';?>">
                                        <div class="panel-body mt0 pl0 satnamAction">
										<?php $regions	=	Regions::model()->findAllBYAttributes(array('status'=>'1'));
											foreach($regions as $region){?>
                                            <div data-toggle="buttons" class="btn-group mb10 mr10"> 
                                                <label class="btn btn-sm btn-default active_success btn_new btn_rounded <?php echo (in_array($region->id,$selecetedRegions))?'active':'';?>" >
                                                <input type="checkbox" id="option<?php echo $region->id;?>" name="options[]" value="<?php echo $region->id;?>"  <?php echo (in_array($region->id,$selecetedRegions))?'checked="checked"':'';?> class="tireSelectuion" /><?php echo $region->name;?></label>
                                            </div>
                                            <?php }?>
                                            
                                        </div>
                                    </div>
                                    
                            </div>
						
                            
					</div>
                </div>
                <!-- Budget Q2 -->
                <div class="form-group pt0">    
                    <div class="col-md-12 mt15">
                            <div class="panel-toolbar pl0 pt5 pb5 border-none bg-none">
                                <div class="panel-toolbar">
                                    <label class="control-label mb-15">Q. Given your geographical preferences, the following pricings are available. Please select those that match your budget. <span class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div novalidate action="" data-parsley-validate="" class="panel panel-default mt10">
                                
                                <div id="satnamBugdet">
                                
                                <?php $this->renderPartial('_budget', array('list'=>$list,'sel'=>$selecetedTier,'preference'=>$project->preferences,'city'=>$city,'countryName'=>$countryName,'current_status'=>$project->current_status));?>
                                </div>
                            </div>
                            <ul class="parsley-errors-list" id="parsley-id-tier-224"></ul>
                    </div>
                </div>
                <!-- Budget Q3 -->
                <div class="form-group" id="teamBudget">            
                    <div class="col-md-12">
                                <div class="form-group mt20 mb100">
                                    <label class="col-sm-4 control-label">Q. Given your selection above, what is the range of your TOTAL budget? <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <div class="col-md-3 pl0">
                                        	<div class="col-md-2 input-group">
                                                <span class="input-group-addon">$</span>
                                                <?php echo $form->textField($project,'min_budget',array('placeholder'=>"Min",'class'=>'form-control number required from width160','data-parsley-type'=>"integer",'data-parsley-required'=>"true",'data-parsley-id'=>'129')); ?>
                                   
                                            </div>
                                            <ul class="parsley-errors-list" id="parsley-id-129"></ul>
                                        </div>
                                        <div class="col-md-3 pl0">
                                            <div class="col-md-2 input-group">
                                                <span class="input-group-addon">$</span>
                                                <?php echo $form->textField($project,'max_budget',array('placeholder'=>"Max",'class'=>'form-control number required to width160','data-parsley-type'=>"integer",'data-parsley-required'=>"true",'data-parsley-id'=>'130')); ?>
                                           </div>
                                           <ul class="parsley-errors-list" id="parsley-id-130"></ul>
                                        </div>
                                        <div class="col-md-12 pl0 pr0">
                                        	<small class="help-block">If you are not sure about your budget, feel free to <script id="timelyScript" src="https://book.gettimely.com/widget/book-button.js"> </script><div style="display:none;"><script id="hideScript">var hideButton = new timelyButton('vp', { buttonId: 'hideScript' });</script></div><a href="#" onclick="hideButton.start();">Schedule a Call</a> to talk to a software architect and get an estimate.</here></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
                <!-- MockUp-->
                <div class="form-group pa10">
                            <label class="col-sm-4 control-label ">Q. Please upload any mockups, designs or other documentation that will help us better understand your needs. <span class="text-danger"></span></label>
                            
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <input type="text" readonly class="form-control" data-parsley-id="3057" name="attachment1[]" id="client-proj-doc">
                                    <ul class="parsley-errors-list" id="parsley-id-3057"></ul>
                                    <span class="input-group-btn ">
                                        <div class="  btn btn-primary btn-file">
                                            <span class="icon iconmoon-file-3"></span> <a href="javascript:void(0)" style="color:#FFF;" id="openBrow">Browse </a>
                                            
                                        </div>
                                    </span>
                                </div>
                               
                            </div>
                            <div class="col-sm-6">
                            	<small class="help-block">
                                                Your IP will remain secure. Please note the following in this regard:
                                                <ul>
												<li class="list">All service providers on VenturePact are legally bound by a Non-Disclosure Agreement for any client information they receive on VenturePact's marketplace.</li>
                                                <li class="list">The information you provide will only be shared with 2-5 service providers that VenturePact deems to be a good fit.</li>
                                                <li class="list">You can review the Non-Disclosure <a href="#" data-toggle="modal" data-target="#bs-modal-agreement">Agreement here</a></li>                                                 
                                                </ul>
                                </small>
                                            </div>
                            <div class="col-sm-8 pull-right mt15">
                              <table class="table table-striped">
                                                    <tbody id="ClientProjects_mockup">
                                                        
                             	<?php 
											if(count($project->clientProjectDocuments)>0){
												foreach($project->clientProjectDocuments as $doc){?>
													<tr>
                                                    <td>
                                                       <span class="label label-success"><?php echo $doc->type;?></span> <?php echo $doc->name;?> (<?php echo round($doc->size/(1024));?> KB)
                                                    </td>
                                                    <td><a href="javascript:OpenFile('<?php echo $doc->path;?>',400,500)">View</a></td>
                                                    <td><a href="javascript:void(0);" class="removeImg" rel="<?php echo $doc->id;?>">Delete</a></td>
                                                        </tr>
                                             	<?php }
											}?>
                                    </tbody></table>                                
                            </div>
						</div>  
				
				<div class="form-group pa10">
					 <div class="col-sm-12 mb10">
					<div class="col-sm-6"></div>
					<div class="col-sm-6">
				
					<input type="hidden" value="" id="savePrefName" />
					<input type="hidden" value="" name="city_pref" id="pref-city" />
					<?php echo CHtml::button('Submit', array('class'=>'btn btn-primary','id'=>'projectSave'));?> 
					</div>
					</div>
				</div>
				
			<?php $this->endWidget(); ?>	
			<!-- panel body BASIC FORM END -->
				  
          
       		 </div>
    	 </div>
	</div>
    <!-- Get Started Form End -->
	
<!-- City Country Modal-->
<div id="bs_new"class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header bgcolor-teal border-radius">
		<button type="button" class="close" data-dismiss="modal" id="closeCity">×</button>
		<h4 class=" modal-title">Select Your City</h4>
		</div>
			<div class="modal-body" style="min-height:100px;">
				<div class="col-sm-6 ">
				<label class="control-label">Country <span class="text-danger">*</span></label>
				<div class="has-icon pull-right mb10"><?php echo CHtml::dropDownList('ClientProjects[country]','',CHtml::listData(Countries::model()->findAll(array('condition'=>'status = 1','order'=>'name ASC')),'id', 'name'),array('class'=>"form-control required pr10",'data-parsley-id'=>'4077','data-parsley-type'=>"alphanum",'prompt' =>'Select Country','id'=>"satnam",'tabindex'=>'12', 'style'=>"width:150px",'ajax'=>array(
				'type'=>'POST',
				'url' => CController::createUrl('/site/dynamicCity'),
				'data'=> array('country'=>'js:this.value'),
				'success'=>'function(data){loadcity1(data);}'
				)
				));?>
				<ul class="parsley-errors-list" id="parsley-id-4077"></ul>
				</div>
				</div>
				<div class="col-sm-6 ">
				<label class="control-label">City <span class="text-danger">*</span></label>
				<div class="has-icon pull-right">
				<select id="sandeep" name="ClientProjects[cities_id]" placeholder="Select City"  class="form-control required pr10 selectized" tabindex="13" data-parsley-id='4078' style="width:150px">
				<option value="" selected="selected"></option>
				</select>
				</div>
				<ul class="parsley-errors-list" id="parsley-id-4078"></ul>
				</div>
			</div>
				<div class="modal-footer">
				<button class="btn btn-teal" onclick="saveCity()" data-dismiss="model">Save</button>
				</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!-- City Country Modal End -->
<!----SignUp Popup Start------->
<div id="signup_popup" class="modal fade"  style="z-index: 1050;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        	<div class="modal-header bgcolor-teal border-radius">
                                <button data-dismiss="modal" class="close mt5" type="button">×</button>
                                <div style="font-size:16px;" class="pull-left ico-user22 mr10 mt5"></div>
                                <h4 class="semibold modal-title">Sign Up to get proposals</h4>
                            </div>
                           
	<?php $form=$this->beginWidget('CActiveForm', array('id'=>'Signup-form', 'enableClientValidation'=>true,'action'=>Yii::app()->createUrl("/site/signup"),'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('class'=>"panel-default",'data-parsley-validate'=>'data-parsley-validate'))); ?>
                            <div class="modal-body">
								<div class="col-sm-12">
											<div class="col-sm-2"></div>
											<div class="col-sm-8">
											<?php echo	CHtml::link('<i class="ico-linkedin2 mr5"></i>Sign Up with LinkedIn',array('/site/linkedin','lType'=>'initiate','role'=>'2'),array('class'=>"btn btn-social btn-block btn-linkedin"));?>
											</div>
											<div class="col-sm-2"></div>
										</div>
                                <div class="col-sm-12 text-center mb15">
                                    <h4 class="title text-grey9 text-size13 pt0">or</h4>           
                                    <span class="text-muted ">Sign up with E-mail: </span>
                        		</div>
<div class="col-md-12">
			<div class="alert alert-danger signup_error_container hide" id="repsoneRest2">
				<button type="button" class="close" onclick="$('#repsoneRest2').hide();">×</button>
				<div id="signup_errors"></div>
			</div>
		</div>
				<div class="form-group mb10">
		

		<div class="row">
			<div class="col-sm-6 mb5">
				<label class="control-label">First Name <span class="text-danger">*</span></label>
				<div class="has-icon pull-right">
					<?php echo $form->textField($users,'first_name',array('placeholder'=>"First Name (Required)",'title'=>"First Name (Required)",'data-parsley-required'=>'true','data-parsley-pattern'=>"^[a-zA-Z]+$",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText','tabindex'=>'1'));?>
				</div>
                  <ul class="parsley-errors-list" id="parsley-id-3048"></ul>
			</div>
			<div class="col-sm-6 mb5">
			  <label class="control-label">Last Name <span class="text-danger"></span></label>
                <div class="has-icon pull-right">
              <?php echo $form->textField($users,'last_name',array('placeholder'=>"Last Name (Required)",'title'=>"Last Name (Required)",'data-parsley-required'=>'true','data-parsley-pattern'=>"^[a-zA-Z]+$",'data-parsley-minlength'=>"1",'class'=>'form-control text-input defaultText','tabindex'=>'2'));?>
                </div>
			</div>
		</div>
	</div>
				<div class="form-group mb10">
        <div class="row">
            <div class="col-sm-6 mb5">
                <label class="control-label">E-mail <span class="text-danger">*</span></label>
                <div class="has-icon pull-right">
                  <?php echo $form->emailField($users,'username',array('placeholder'=>"Email (Required)",'data-parsley-required'=>'true','data-parsley-type'=>"email",'title'=>"Email (Required)",'class'=>'form-control text-input defaultText','tabindex'=>'3')); ?>
					<i class="ico-user2 form-control-icon"></i>
                </div>
                <ul class="parsley-errors-list" id="parsley-id-3099"></ul>
             </div>
            <div class="col-sm-6 mb5">
                <label class="control-label">Password <span class="text-danger">*</span></label>
                <div class="has-icon pull-right">
                    <?php echo $form->passwordField($users,'password',array('placeholder'=>"Password (Required)",'title'=>"Password (Required)",'data-parsley-minlength'=>"6",'data-parsley-required'=>'true','class'=>'form-control text-input defaultText','tabindex'=>'4'));?>
						<i class="ico-lock4 form-control-icon"></i>
                </div>
                <ul class="parsley-errors-list" id="parsley-id-3177"></ul>
            </div>
        </div>
    </div>
        
    <p class="clearfix text-center">
												<span class="text-muted">Already Have Account ? <?php echo CHtml::link('Click Here.', array('/site/login'), array('class' => 'semibold')); ?></span>
											</p>
    <p class="text-center text-grey9">By clicking on "Sign Up" below, you agree to the <a tabindex="14" href="javascript:void(0);" data-toggle="modal" data-target="#bs-modal-lg">Terms &amp; Conditions</a>.</p>
	<div class="form-group mb10">
        <div class="row">
			<div class="col-sm-6 col-md-offset-5">
			<input type="hidden" value="" id="projectData" name="ClientProjects">
			
			<?php $users->role_id=2;
			echo $form->hiddenField($users,'role_id');?>
			
	<?php echo CHtml::submitButton('Sign Up',array('id'=>'signup','class'=>'btn btn-primary bm0 pull-left','tabindex'=>'5')); ?>
	</div></div></div>
	
	<?php $this->endWidget(); ?>
	
</div>
<!----SignUp Popup End------->	
</section>

<script type="text/javascript">
function validateForm(){
	var user_type="<?php echo isset(Yii::app()->user->role)?Yii::app()->user->role:Yii::app()->user->name;?>";
	if(sessionStorage){
		var data = $('#project-form').serialize(); /* In case of LinkedIn SignUp Whole Data Stored in Session */
		sessionStorage.setItem("projectInfo", data);	 
	}
	if(user_type=="Guest"){
		if(!validate('basicProject') && specialVal()){
			$('#bs-modal-signup').modal('show');
		}
		else{
			if(!specialVal())
				$('html,body').scrollTop(700);

			var top=$('.parsley-error:first').offset().top;
			$('html,body').scrollTop(top-1000);
			$('.parsley-error:first').focus();
			
		}
	}
	else{ /* Right Now this case is not applicable for Application Enable this code if already logged In user want to submit project*/
		if(!validate('basicProject'))
			$('#project-form').submit();
		return true;
	}
}

//previous code for project validation and submission Start here
function specialVal(){
	errorList	=	1;
	if($('.require-one1:checked').size() == 0){
		$('#parsley-id-tier-224').html('<li>Please select required field</li>');
		$('#parsley-id-tier-224').addClass('filled');
		errorList	=	0;
	}else{
		$('#parsley-id-tier-224').removeClass('filled');
		$('#parsley-id-tier-224').html('');
	}
	return	errorList;
}

$("#projectSave").on("click", function (event) {
	var el= $(this);
	if(!validate('project') && specialVal()){
		bootbox.dialog({
			message: "There are some required fields that have not been completed. Please complete those in order to get a good estimate from our service providers.",
            title: "Confirm Submission",
			buttons: {
				danger: {
					label: "Cancel",
					className: "btn-danger",
					callback: function(){}
				},
                
                success: {
					label: "Confirm",
					className: "btn-success",
					callback: function() {
						$.ajax({
							type: "POST",
							url: "<?php echo Yii::app()->createUrl("/site/newProject");?>",
							data: $('#project-form').serialize(),
							sucess:function(){console.log('done save');}
						});
						$('#signup_popup').modal('toggle');
					}
				}
			}
		});
	 }else{
		bootbox.confirm("Some required fields in the job scope are not filled. Please complete them before moving forward.", function (result) {return true;}).find("div.modal-body").addClass("bgcolor-teal");
		if(!specialVal())
			$('html,body').scrollTop(700);
		
		var top=$('.parsley-error:first').offset().top;
		$('html,body').scrollTop(top-1000);
		$('.parsley-error:first').focus();
	}
	return false;
	event.preventDefault();
});

//Validate on change any field
$('#project-form').on('change',function(){changeValidate('project-form');});
//previous code for project validation and submission Ends here

//Select box function for design Starts
$("#satnam-skills").selectize({delimiter: ",",persist: false,create: function (input) {$.ajax({type:'POST',url:"<?php echo CController::createUrl("/site/createSkill");?>",data : 'name='+input,	success: function(id){}});return {value: input,text: input}}});
$("#satnam-services").selectize({delimiter: ",",persist: false,});
$("#satnam-industry").selectize({delimiter: ",",persist: false,});
//Select box function for design Ends


//Add and Delete attachments Start
$('#openBrow').click(function(){
	filepicker.setKey("AlqJxqOBnROGcRhBT1jPFz");
	filepicker.pickMultiple({mimetypes: ['image/*', 'text/plain', 'application/pdf'],},
	function(InkBlob){
		for(i in InkBlob){
			var docs = $('#docs').val();
			docs = docs+InkBlob[i].mimetype+"|"+InkBlob[i].filename+"|"+InkBlob[i].size+"|"+InkBlob[i].url+",";
    		$('#docs').val(docs);
			var data = '<tr><td><span class="label label-success">'+InkBlob[i].mimetype+'</span>'+InkBlob[i].filename+'('+Math.round(((InkBlob[i].size)/1024),2)+' KB)</td><td><a href="'+InkBlob[i].url+'" target="_blank">View</a></td></tr>';
			$('#ClientProjects_mockup').append(data);
		}
		console.log($('#docs').val());
	},
	function(FPError){
		console.log(FPError.toString());
  	}
	);
});
$('#ClientProjects_mockup').delegate('.removeImg','click',function(){
	var that	=	$(this);
	$.ajax({
		type:'POST',
		url:"<?php echo CController::createUrl("/client/mockup",array('id'=>$project->id));?>",
		data : 'action=delete&imageId='+that.attr('rel'),
		success:function(data){
			if(data==1){
				that.parent().parent().hide();
			}
		}
	});
});
//Add and Delete attachments Ends

//Preference selection Start here
(function($){
	$('#customradio1').on('change', function(){$('#savePrefName').val('');$('#regions').hide();getData($(this).val(),'');})
	$('#customradio2').on('change', function(){$('#savePrefName').val('city');$('#regions').hide();getData($(this).val(),'');})
	$('#customradio3').on('change', function(){$('#savePrefName').val('country');$('#regions').hide();getData($(this).val(),'');});
	$("#customradio4").on("change", function(){
		$('#savePrefName').val('');
		if($("#customradio4").is(":checked")){
			$("#regions").removeClass('hide');
			$("#regions").show();
			var regions	=	[];
			$("input[name='options[]']:checked").each(function (){regions.push($(this).val());});
			getData($(this).val(),regions);
		}
	})
	$('.satnamAction').delegate('.tireSelectuion','change', function(){
		var regions	=	[];
		$("input[name='options[]']:checked").each(function(){regions.push($(this).val());});
		getData('region',regions);
	})
	
	function getData(val,list){
		//new start
		var projectId='00';
		projectId=$('#sandeep option:selected').val();
		//var urlClient="<?php echo Yii::app()->createUrl('/site/calculate');?>&id="+projectId+'&pref='+val;
		var urlClient="<?php echo Yii::app()->createUrl('/site/calculate');?>/id/"+projectId+'/pref/'+val;
		var option = 'option='+list; 
		//new end
		$.ajax({
			type: "POST",
			//url: "<?php echo Yii::app()->createUrl('/site/calculate');?>"+"/id//pref/"+val,
			url: urlClient,
			data : $('#project-form').serialize()+'&'+option,
			success: function(respose){
				$('#satnamBugdet').html(respose);
			}
		})
	}
	$("#ajaxLoadingDiv" ).hide();
	$( document ).ajaxStart(function(){$( "#ajaxLoadingDiv" ).show();});
	$( document ).ajaxStop(function() {$( "#ajaxLoadingDiv" ).hide();});
})(jQuery);
//Preference selection Ends here

//Code for city pop drop downs start here
var xhr;
var select_state, $select_state;
var select_city, $select_city;
function loadcity1(data)
{
	$("#sandeep").html(data);
	var selectJson = {};
	selectJson = new Array();
	var select = document.getElementById("sandeep");
	for(var i=0;i<select.options.length;i++){
		var option = select.options[i];
		var optionJson = {};
		optionJson = {value: option.value, name: option.text};
		selectJson.push(optionJson);
	}
	$("#sandeep").html('<option value="" selected="selected"></option>');
	$select_state= $('#satnam').selectize({
		selectOnTab:true,
		valueField: 'value',
		labelField: 'name',
		searchField: ['name'],
		sortField: 'name',
	});
	select_city.disable();
	select_city.clearOptions();
	select_city.load(function(callback){
		select_city.enable();
		callback(selectJson);
	});
}
$(document).ready(function(){
	
	$(":input").focusout(function(){
			$(this).parsley().validate();
	});
	
    $select_state= $('#satnam').selectize({
        selectOnTab:true,
		valueField: 'value',
		labelField: 'name',
		searchField: ['name'],
		sortField: 'name',

	});
	$select_city = $('#sandeep').selectize({
		valueField: 'value',
		labelField: 'name',
		searchField: ['name'],
		sortField: 'name',
		selectOnTab:true
	});
	select_city  = $select_city[0].selectize;
	select_city.disable();
    select_state = $select_state[0].selectize;
});
function saveCity(){
	 if(!validate('bs_new'))
	 {
		 $('#showCity').html($('#hideCity').html());
		 var country	=	$('#satnam').val();
		 var city 		=	$('#sandeep').val();
		 $('#sign-up-country').val(country);
		 $('#sign-up-city').val(city);
		 $('#pref-city').val(city);
		 $('#bs_new').modal('toggle');
		 $('#customradio2').attr( 'data-target','#');
		 $('#customradio3').attr( 'data-target','#');
		 if($('#savePrefName').val()=='country')
		 {
			$('#customradio3').prop("checked", true);
			getData1(country,'','country');
		 }
		 else
		 {
			$('#customradio2').prop("checked", true)
			getData1(city,'','city');
		 }
	 	
	 }
}

/* This getData1 is used for updating the grid just after selection of country and city Event occur after Submit*/
function getData1(val,list,pref){
		var projectId='00';
		if(pref=='city')
				projectId=$('#sandeep option:selected').val();
			else if(pref=='country')
				projectId=$('#sandeep option:selected').val();
				else if(pref=='region')
				 projectId=$('#sandeep option:selected').val();
		else
		 projectId=$('#sandeep option:selected').val();
	 	console.log(projectId);
		console.log(list);
		var urlClient="<?php echo Yii::app()->createUrl('/site/calculate');?>/id/"+projectId+'/pref/'+pref;
		console.log(urlClient);
		$.ajax({
			type: "POST",
			url: urlClient,
			data : $('#project-form').serialize(),
			success: function(respose){
				$('#satnamBugdet').html(respose);
			}
		});
	}
/* This method is to save City Country on click of Submit in modal */ 
</script>

