<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/js/jquery-ui.js"></script>
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/css/jquery-ui.css" rel="stylesheet">
<?php $officelist=CHtml::listData(OfficeType::model()->findAll(), 'id', 'name'); //CVarDumper::dump($officelist,10,1);die; ?>
<style>
.awardcerification
{
    height: auto!important;
    min-height: 185px!important;
}
</style>
<div class="white_outer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <h3>My Profile</h3>
            </div>
        </div>
    </div>
</div>
<?php $check=0 ; if(isset($_POST) && !empty($_POST)) { $check=1 ; } ?>

<div class="dark-wrapper">
    <div class="container inner">
        <?php echo CHtml::link( '<button type="button" class="btn btn-primary  text-center model_text" >View Profile</button>', array( '/supplier/profile'));?>
        <div class="row">
            <br />
            <?php if(Yii::app()->user->hasFlash('record')){?>
            <div class="alert alert-success" id="repsoneRest2">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                <p id="messageResponse2">
                    <strong><?php echo Yii::app()->user->getFlash('record'); ?></strong>
                </p>
            </div>
            <?php } ?>
			  <?php if(Yii::app()->user->hasFlash('success')){?>
            <div class="alert alert-success" id="repsoneRest2">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                <p id="messageResponse2">
                    <strong><?php echo Yii::app()->user->getFlash('success'); ?></strong>
                </p>
            </div>
            <?php } ?>
            <?php if(Yii::app()->user->hasFlash('error')){?>
            <div class="alert alert-danger" id="repsoneRest2">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                <p id="messageResponse2">
                    <strong><?php echo Yii::app()->user->getFlash('record'); ?></strong>
                </p>
            </div>
            <?php } ?>

            <!-- Basic Information -->
            <div class="col-md-4">
                <?php $widget_total=$widget[ 'basic_widget'] + $widget[ 'about_widget'] + $widget[ 'team_widget'] + $widget[ 'web_widget'] + $widget[ 'stories_widget'] + $widget[ 'reviews_widget']; ?>
                <div id="complete_profile">
                    <div class="col-md-12 bg-default">
                        <h4><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Complete your profile</h4>
                    </div>
                    <div class="col-md-12 mt15  border_b ">
                        <small>Complete your Profile and start showing up in the clients search results</small>
                        <div class="progress">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php echo $widget_total; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $widget_total; ?>%">
                                <span class="sr-only"><?php echo $widget_total; ?>% Complete (warning)</span>
                            </div>
                        </div>
                        <span class="pull-right"> <b><?php echo $widget_total; ?> %</b></span>
                    </div>
                    <div class="col-md-12 pa0">
                        <ul class="profile_ul">
                            <li><a href="#basic_link"><?php echo ($widget['basic_widget']==10)?'<span aria-hidden="true" class="glyphicon glyphicon-ok"></span> Basic Information':"Basic Information"; ?></a>  <span class="label label-success pull-right mt10 mr15 pa5">+10</span>
                            </li>
                            <li><a href="#about_link"><?php echo ($widget['about_widget']==10)?'<span aria-hidden="true" class="glyphicon glyphicon-ok"></span> About':"About"; ?></a>  <span class="label label-success pull-right mt10 mr15 pa5">+10</span>
                            </li>
                            <li><a href="#team_member_link"><?php echo ($widget['team_widget']==15)?'<span aria-hidden="true" class="glyphicon glyphicon-ok"></span> Team':"Team"; ?></a>  <span class="label label-success pull-right mt10 mr15 pa5">+15</span>
                            </li>
                            <li><a href="#onweb_link"><?php echo ($widget['web_widget']==15)?'<span aria-hidden="true" class="glyphicon glyphicon-ok"></span> On the web':"On the web"; ?></a>  <span class="label label-success pull-right mt10 mr15 pa5">+15</span>
                            </li>
                            <li><a href=""><?php echo ($widget['stories_widget']==30)?'<span aria-hidden="true" class="glyphicon glyphicon-ok"></span> Stories':"Stories"; ?></a>  <span class="label label-success pull-right mt10 mr15 pa5">+30</span>
                            </li>
                            <li><a href=""><?php echo ($widget['reviews_widget']==20)?'<span aria-hidden="true" class="glyphicon glyphicon-ok"></span> Reviews':"Reviews"; ?></a>  <span class="label label-success pull-right mt10 mr15 pa5">+20</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php $form=$this->beginWidget('CActiveForm', array('enableClientValidation'=>true,'id'=>'supplier-form','clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('class'=>"forms",'data-parsley-validate'=>'data-parsley-validate'))); ?>
            <div class="col-md-8 border_style_div">
				<span id="save-message" data-last=""></span>
				<?php echo CHtml::submitButton( 'Save',array( 'id'=>'update_profile','class'=>'btn btn-primary bm0 pull-right','tabindex'=>'5')); ?>
				</div>
            <div class="col-md-8 border_style_div" id="basic_link">
                <h4>Basic Information</h4>

                <div class="col-md-3" id="profilePhotoDiv">
                    <?php $avtar_img=Yii::app()->theme->baseUrl."/style/images/avatar.png"; $profile_img = $avtar_img; if(!empty($suppliers->image)) { $profile_img = $suppliers->image; } ?>
                    <img src="<?php echo $profile_img; ?>" class="img-circle" id="profile_img" width="150" height="115" />
                    <div style="width: 88%;text-align: center;">
                        <a href="#" style="text-align: center;" id="openBrow">Edit Image</a>
                    </div>
                    <?php echo $form->hiddenField($suppliers,'image',array('id'=>"profilePicUser",'required'=>'required','class'=>'required')); ?>
                </div>

                <div class="col-md-9">
                    <div class="col-6 pl0">
                        <div class="form-group">
                            <label for="name1">Company Name</label>
                            <?php echo $form->textField($users,'company_name',array('placeholder'=>"Company Name (Required)",'required'=>'required','title'=>"Company Name (Required)",'data-parsley-minlength'=>"2",'data-parsley-pattern'=>"^[a-zA-Z ]+$",'class'=>'form-control text-input defaultText required minlength','length'=>"2",'tabindex'=>'1'));?>
                            <?php if($check==1 )echo $form->error($users,'company_name'); ?>
                        </div>
                        <div class="form-group">

                            <label for="name1">Skype Id</label>

                            <?php echo $form->textField($suppliers,'skype_id',array('placeholder'=>"Skype (Required)",'required'=>'required','title'=>"Skype (Required)",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText required minlength','length'=>"2",'tabindex'=>'1'));?>
                            <?php if($check==1 )echo $form->error($suppliers,'skype_id'); ?>
                        </div>
                        <div class="form-group col-md-12 pa0 mt10">
                            <div class="col-md-6 pl0">
                                <label for="name1">Founded in</label>
                                <?php echo $form->textField($suppliers,'foundation_year',array('placeholder'=>"Founded In (Required)",'required'=>'required','title'=>"Founded In (Required)",'data-parsley-type'=>"number",'data-parsley-maxlength'=>"4",'data-parsley-minlength'=>"4",'class'=>'form-control text-input defaultText required minlength','length'=>"2",'tabindex'=>'2'));?>
                                <?php if($check==1 )echo $form->error($suppliers,'foundation_year'); ?>
                            </div>
                            <div class="col-md-6 pl0">
                                <label for="name2">No. of Employees</label>
                                <?php echo $form->textField($suppliers,'number_of_employee',array('placeholder'=>"No of Employees (Required)",'required'=>'required','title'=>"No of Employees (Required)",'data-parsley-type'=>"number",'class'=>'form-control text-input defaultText required minlength','length'=>"2",'tabindex'=>'3'));?>
                                <?php if($check==1 )echo $form->error($suppliers,'number_of_employee'); ?>
                            </div>
                        </div>
                        <div class="form-group col-md-12 pa0 mt10">
                            <div class="col-md-6 pl0">
                                <label for="name2">Avg. Project Size</label>
                                <?php echo $form->textField($suppliers,'project_size',array('placeholder'=>"Project Size (Required)",'required'=>'required','title'=>"Project Size (Required)",'data-parsley-type'=>"number",'class'=>'form-control text-input defaultText required','length'=>"2",'tabindex'=>'4'));?>
                                <?php if($check==1 )echo $form->error($suppliers,'project_size'); ?>
                            </div>
                            <div class="col-md-6 pl0">
                                <label for="name2">Avg. Per Hour Rate</label>
                                <?php echo $form->textField($suppliers,'per_hour_rate',array('placeholder'=>"Per Hour Rate (Required)",'required'=>'required','title'=>"Per hour Rate (Required)",'data-parsley-type'=>"number",'class'=>'form-control text-input defaultText required','length'=>"2",'tabindex'=>'5'));?>
                                <?php if($check==1 )echo $form->error($suppliers,'per_hour_rate'); ?>
                            </div>
                        </div>
                        <div class="form-group col-md-12 pa0 mt10">
                            <div class="hide" id="dummy_location">
                                <div class="location_info">
                                    <div class="col-md-6 pl0">
                                        <label for="name2">Location</label>
                                        <input type="text" class="form-control text-input" />
                                        <input type="hidden" name="location[0][id]" class="id" value />
                                        <input type="hidden" name="location[0][cityid]" class="cityid" value />

                                    </div>
                                    <div class="col-md-6 pl0">
                                        <label for="name2">Department</label>
                                        <select name="location[0][dep]" class="form-control">

                                            <?php foreach($officelist as $key=>$o){ ?>
												<?php if($key!=1){ ?>
												<option value="<?php echo $key; ?>">
													<?php echo $o; ?>
												</option>
												<?php } ?>
                                            <?php } ?>

                                        </select>
                                    </div>
                                    <a href="javascript:void(0)" class="location_delete" onclick="deletetlocation(this)">Delete</a>
                                </div>
                            </div>
                            <?php $oCount=1;if(!empty($offices)){ ?>
                            <?php foreach($offices as $key=>$office){ ?>
                            <div class="location_info">
                                <div class="col-md-6 pl0">
                                    <label for="name2">Location</label>
                                    <input type="text" class="form-control text-input" value="<?php echo $office->city->name; ?>" />
                                    <input type="hidden" name="location[<?php echo $oCount; ?>][id]" class="id" value="<?php echo $office->id; ?>" />
                                    <input type="hidden" name="location[<?php echo $oCount; ?>][cityid]" class="cityid" value="<?php echo $office->city_id; ?>" />

                                </div>
                                <div class="col-md-6 pl0">
                                    <label for="name2">Department</label>
                                    <select name="location[<?php echo $oCount; ?>][dep]" class="form-control" <?php echo ($office->dep->id==1? "disabled": ""); ?>>
                                        <?php foreach($officelist as $key=>$o){ ?>
										<?php if($office->dep->id==1){ ?>
										   <option value="<?php echo $key; ?>">
												<?php echo $o; ?>
											</option>
										<?php } ?>
										 <?php if($key!=1){ ?>
													<option value="<?php echo $key; ?>" <?php echo (($key==$office->dep_id)?"selected":""); ?>>
														<?php echo $o; ?>
													</option>
											<?php } ?>
                                        <?php } ?>
                                    </select>

                                </div>
                                <?php if($office->dep->id!=1){ ?>
                                <a href="<?php echo CController::createUrl('/supplier/deleteOffice',array('id'=>base64_encode($office->id),"action"=>'delete'));?>" class="">Delete</a>
                                <?php } ?>
                            </div>
                            <?php $oCount++; } ?>
                            <?php }else{ ?>
                            <div class="location_info">
                                <div class="col-md-6 pl0">
                                    <label for="name2">Location</label>
                                    <input type="text" class="form-control text-input required" />
                                    <input type="hidden" name="location[1][id]" class="id" value />
                                    <input type="hidden" name="location[1][cityid]" class="cityid" value />

                                </div>
                                <div class="col-md-6 pl0">
                                    <label for="name2">Department</label>
                                    <select name="location[1][dep]" class="form-control" disabled>
                                        <option value="1">Headquarter</option>
									</select>
                                </div>
                                <a href="javascript:void(0)" class="location_delete hide" onclick="deletetlocation(this)">Delete</a>
                            </div>
                            <?php $oCount++;
									   } ?>


                        </div>
                        <a onclick="locationaddNew()">Add Location</a>

                        <div class="form-group">

                            <?php //echo CHtml::submitButton( 'Update',array( 'id'=>'update_profile','class'=>'btn btn-primary bm0 pull-left','tabindex'=>'5')); ?>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Basic Information -->
            <!----------------------------------------------------------------------------------------------------------------------------->
            <!-- About -->
            <div class="col-md-4" id="about_link"></div>
            <div class="col-md-8 border_style_div mt15">
                <?php //$form=$this->beginWidget('CActiveForm', array('enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('class'=>"forms",'data-parsley-validate'=>'data-parsley-validate','onsubmit'=>'return validate();'))); ?>
                <h4>About</h4>
                <div class="col-md-3" id="coverPhotoDiv">


                    <?php $cover_img=$avtar_img; if(!empty($suppliers->cover)) { $cover_img = $suppliers->cover; } ?>
                    <img src="<?php echo $cover_img; ?>" class="img-circle" id="cover_img" width="150" height="115" />
                    <div style="width: 88%;text-align: center;">
                        <a href="#" style="text-align: center;" id="coveropenBrow">Edit Cover Image</a>
                    </div>
                    <?php echo $form->hiddenField($suppliers,'cover',array('id'=>"coverPicUser","required"=>"required")); ?>
                </div>
                <div class="col-md-9">

                    <div class="form-group">
                        <label for="name1">Description</label>
                        <?php echo $form->textArea($suppliers,'about_company',array('placeholder'=>"Description (Required)",'required'=>'required','title'=>"Description (Required)",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText required alphanum minlength','length'=>"2",'tabindex'=>'6'));?>
                        <?php if($check==1 )echo $form->error($suppliers,'about_company'); ?>
                    </div>
                    <div class="form-group">
                        <label for="name1">Offer</label>
                        <?php echo $form->textField($suppliers,'offers',array('placeholder'=>"e.g Free Trail for 20 Days",'title'=>" e.g Free Trail for 20 Days",'class'=>'form-control text-input defaultText ','length'=>"2",'tabindex'=>'7'));?>
                        <?php if($check==1 )echo $form->error($suppliers,'offers'); ?>
                    </div>

                    <div class="form-group">
                        <?php //echo CHtml::submitButton( 'Update',array( 'id'=>'update_profile','class'=>'btn btn-primary bm0 pull-left','tabindex'=>'5')); ?>
                    </div>
                    <?php //$this->endWidget(); ?>
                </div>
            </div>

            <!-- About -->

            <?php $this->endWidget(); ?>
            <!----------------------------------------------------------------------------------------------------------------------------->
            <!-- Team Members -->

            <div class="col-md-4" id="team_member_link"></div>
            <div class="col-md-8 border_style_div mt15">
                <h4>Team Members</h4>

                <?php echo $this->renderPartial("edit/_team_member"); ?>


            </div>

            <!-- Team Members -->

            <!----------------------------------------------------------------------------------------------------------------------------->

            <!-- On the web -->

            <div class="col-md-4" id="onweb_link"></div>
            <div class="col-md-8 border_style_div mt15">
                <h4>On the web</h4>
                <?php echo $this->renderPartial("edit/_web",array("web"=>$web)); ?>
            </div>

            <!-- On the web -->

            <!----------------------------------------------------------------------------------------------------------------------------->

            <!-- Stories -->

            <div class="col-md-4" id="onweb_link"></div>
            <div class="col-md-8 border_style_div mt15">
                <?php echo $this->renderPartial("stories/_storiesview",array("stories"=>$stories)); ?>
            </div>
            <div class="col-md-4" id="onweb_link"></div>
			<div class="col-md-8 border_style_div mt15">
                <?php echo $this->renderPartial("edit/_past_clients",array("suppliers"=>$suppliers)); ?>
            </div>



            <!-- Stories -->

        </div>
    </div>
</div>
</div>

<input type="hidden" id="location_hidden" value="1" />

<script>
    var locationcount = <?php echo $oCount; ?> ;
    var millisecondstime = 70000;
    var supplierForm = $("#supplier-form");
	var saveMessage = $("#save-message");

    window.setInterval("autoSave()", millisecondstime);



	$(document).ready(function() {


        doAutoComplete();
		$('#openBrow').click(function() {
            filepicker.setKey("<?php echo $this->filpickerKey; ?>");
            filepicker.pick({
                    mimetypes: ['image/*']
                },
                function(InkBlob) {
                    $('#profilePicUser').val(InkBlob.url);
                    $("#profile_img").attr("src", InkBlob.url + '/convert?w=150&h=115&fit=crop');
                    imgValidation("profilePicUser","profilePhotoDiv");
                },
                function(FPError) {
                    //alert("Error Uploading Files : " + FPError.toString());
                    console.log(FPError.toString());
                }
            );
        });


        $('#coveropenBrow').click(function() {
            filepicker.setKey("<?php echo $this->filpickerKey; ?>");
            filepicker.pick({
                    mimetypes: ['image/*'],
                },
                function(InkBlob) {
                        $('#coverPicUser').val(InkBlob.url);
                        $("#cover_img").attr("src", InkBlob.url + '/convert?w=1000&h=267&fit=crop');
                        imgValidation("coverPicUser","coverPhotoDiv");
                },
                function(FPError) {
                    console.log(FPError.toString());
                }
            );
        });
		var supplierFormParsley = supplierForm.parsley();


    });

	function updateAutoSaveTime()
	{
		console.log("updating time ");
		var lastupdated = saveMessage.data("last");
		saveMessage.html("<i>Auto saved data <small>"+moment(lastupdated).fromNow()+"</small></i>")
	}

    function autoSave() {
		console.log("auto saving form ");
		saveMessage.html("Saving..");
        $.ajax({
            type: 'POST',
            data: supplierForm.serialize(),
            url: "<?php echo CController::createUrl('/supplier/ajaxeditprofile'); ?>",
            datatype: "json",
            success: function(data) {
                console.log("data received" + data);
				data = $.parseJSON(data);
				console.log("data received" + data);
				if(data){
					$.each( data, function( index, value ){
						$("input[name='location["+index+"][id]']").val(value.id);

					});
					// update auto save interval
					window.setInterval("updateAutoSaveTime()", (millisecondstime -60000));
					saveMessage.data("last",Date());
					saveMessage.html("<i>Auto saved data <small>"+moment(Date()).fromNow()+"</small></i>");
				}else{
					saveMessage.data("last",Date());
					saveMessage.html("<i>Auto saved data :error </i>");
				}

                return false;
            },
            error: function(a, b, c) {
                console.log("Errors : " + JSON.stringify(a) + " | " + JSON.stringify(b) + " | " + JSON.stringify(c));
            }
        });
    }

    function doAutoComplete() {
		var cache = {};
       $(".location_info input:text").autocomplete({
            source: function(request, response) {
				var term = request.term;
				if ( term in cache ) {
				  response( cache[ term ] );
				  return;
				}
                $.ajax({
                    url: "<?php echo CController::createUrl('/site/autoCity');?>",
                    dataType: "json",
                    data: {
                        term: request.term
                    },
                    success: function(data) {
                        console.log(data);
						cache[ term ] = data;
                        response(data);
                    }
                });
            },
            minLength: 3,
            select: function(event, ui) {
                $(this).parent().find(".cityid").val(ui.item.id);
                console.log(ui.item.id);
                //console.log( ui.item ?
                // "Selected: " + ui.item.label :
                //"Nothing selected, input was " + this.value);
            },
            open: function() {
                $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
            },
            close: function() {
                $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
            }
        });
    }

    function locationaddNew() {
        $dummy = $("#dummy_location");
        $dummy.find(".id").attr("name", "location[" + locationcount + "][id]");
        $dummy.find(".cityid").attr("name", "location[" + locationcount + "][cityid]");
        $dummy.find("select").attr("name", "location[" + locationcount + "][dep]");
        console.log($dummy.find(".id").attr("name"));
        console.log($dummy.find(".cityid").attr("name"));
        $dummy.parent().append($dummy.html());
        locationcount++;
        doAutoComplete();
    }

    function hide_div(id) {
        $("#div_id_" + id).hide();
    }

    function deletetlocation(that) {
        console.log(typeof that);
        if (typeof that != 'undeinfed') {
            that.parentNode.innerHTML = "";
        }


    }


    function imgValidation(hiddenId,id)
    {

         if($("#" + hiddenId).val()!="")
         {

            $('#' + id + ' ul.parsley-errors-list').html('');
         }

    }

</script>
