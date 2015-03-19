<style>
.selectize-control .selectize-input.disabled
{
    background-color: #eee!important;
    cursor: not-allowed!important;
}
#SuppliersHasPortfolio_discreet_desc
{
    display: none;
}
</style>

<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/style/js/bootstrap-datepicker.js"></script> 
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/selectize/css/selectize.css" />
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/selectize/js/selectize.min.js"></script>

<?php if(Yii::app()->user->hasFlash('record')){?>
<div class="alert alert-success" id="repsoneRest2">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
    <p id="messageResponse2">
        <strong><?php echo Yii::app()->user->getFlash('record'); ?></strong>
    </p>
</div>
<?php } ?>
<?php $form=$this->beginWidget('CActiveForm', array('enableClientValidation'=>true,'id'=>"client-form",'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('class'=>"forms",'data-parsley-validate'=>'data-parsley-validate'))); ?>
<div class="classsegments col-md-12">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="row">
            <div align="center">
                <?php   
                        if($model->image==null)
                            $avtar_img = Yii::app()->theme->baseUrl."/adminPanel/img/user.png";
                        else
                            $avtar_img =  $model->image;
                        $profile_img = $avtar_img; 
                 ?>
                <img src="<?php echo $profile_img; ?>" class="img-circle" id="profile_img1" width="150" height="150" /></br></br>
                <span class="btn btn-primary">
                    <a href="javascript:void(0)" style="color:#FFF;text-decoration:none;" id="openBrow1">Browse </a>
                </span>
                <?php echo $form->hiddenField($model,'image',array('id'=>"profilePicUser1")); ?>
                                
            </div>
        </div>
        <br>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="name1">Company Name</label>
                <?php echo $form->textField($model,'company_name',array('value'=>$model->company_name,'title'=>"Company Name",'data-parsley-minlength'=>"2",'data-parsley-pattern'=>"^[a-zA-Z0-9,.@&!#'_*+\- ]+$",'class'=>'form-control text-input defaultText minlength','length'=>"2",'tabindex'=>'1'));?>
            </div>
            <div class="form-group col-md-6" id="lang-client">
                <label for="name1">Client Name</label>
                <?php echo $form->textField($model,'client_name',array('value'=>$model->client_name,'title'=>"Project Size",'class'=>'form-control text-input defaultText','tabindex'=>'9'));?>
            </div>
            <div class="form-group col-md-6" id="par-loc">
                <label for="name1">Location</label></br>
                    <?php 
                    $city = "";
                    if(false)
                    {                
                        $city = "";
                        $this->widget('zii.widgets.jui.CJuiAutoComplete',array(
                            'model' => $model,
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
                            'options'=>array('class'=>'form-control text-input defaultText','placeholder'=>"Location",'title'=>'Location','tabindex'=>'5',
                            'select' => 'js:function(event, ui){ $("#cityId").val(ui.item.id);$("#testCity").attr("readonly","readonly")}',
                            'click'=>'js:function( event, ui){alert("test");return false;}',
                            ),
                            'htmlOptions'=>array('value'=>'Search',)
                            ));
                        }
                        
                        $city = Cities::model()->findByAttributes(array('id'=>$model->location));
                        if(!empty($city)){
                            $country = Countries::model()->findBYAttributes(array('id'=>$city->countries_id));
                            if(!empty($country)){
                                $region = Regions::model()->findBYAttributes(array('id'=>$country->regions_id));
                                echo $form->textField($model,'location',array('name'=>'city','value'=>$city->name.', '.$country->name.', '.$region->name,'title'=>"Location (Required)",'class'=>'form-control text-input defaultText','length'=>"1",'tabindex'=>'2','id'=>"citySelect",'spellcheck'=>"true"));
                            }
                        }
                        else
                            echo $form->textField($model,'location',array('name'=>'city','title'=>"Location (Required)",'class'=>'form-control text-input defaultText','length'=>"1",'tabindex'=>'2','id'=>"citySelect",'spellcheck'=>"true"));?>                          
            </div>
            
            <?php 
                echo $form->hiddenField($model,'location',array('id'=>'cityId'));
                echo $form->hiddenField($model,'portfolio_type',array('value'=>$model->portfolio_type));
                echo $form->hiddenField($model,'id',array('value'=>$model->id));
                echo $form->hiddenField($model,'discreet_desc',array('value'=>$model->discreet_desc));
            ?>
            <div class="form-group col-md-12">
                <label for="name1">Description</label>
                <?php echo $form->textArea($model,'description',array('value'=>$model->description,'title'=>"Description",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText alphanum minlength','length'=>"2",'tabindex'=>'4'));?>
            </div>
            <div class="form-group col-md-12" id="lang-client">
                <label for="name1">One Line Pitch</label>
                <?php echo $form->textField($model,'one_line_pitch',array('value'=>$model->one_line_pitch,'title'=>"Project Size",'class'=>'form-control text-input defaultText','tabindex'=>'9'));?>
            </div>
            <div class="form-group col-md-6">
                <label for="name1">Project URL/Demo Link</label>
                <?php echo $form->textField($model,'project_link',array('value'=>$model->project_link,'title'=>"Project URL/Demo Link ","data-parsley-type"=>"url",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText alphanum minlength','length'=>"2",'tabindex'=>'5'));?>
            </div>
            <div class="form-group col-md-6" id="par-date">
                <label for="name1">Project Start Date</label>
                <?php echo $form->textField($model,'start_date',array('autocomplete'=>'off','maxlength'=>'10','value'=>$model->start_date,'title'=>"11/11/1111",'class'=>'form-control date text-input defaultText datepicker','length'=>"2",'tabindex'=>'8'));?>
            </div>
            <div class="form-group col-md-12">
                <label for="name1">Screen Shots</label><br/>
                <a id="screenBrow-client">Choose Screenshots</a>
                <table id="screenshots-client"></table>
                <?php echo CHtml::hiddenField('docs' ,'', array('id'=>'docs-client')); ?>
                
            </div>
            <div class="form-group col-md-4">
                 <label for="name1">Project Size</label>
                 <?php echo $form->textField($model,'project_size',array('value'=>$model->project_size,'title'=>"Project Size",'class'=>'form-control text-input defaultText','tabindex'=>'6'));?>
            </div>

            <div class="form-group col-md-4">
                <label for="name1">Per Hour Rate ( $ )</label>
                <?php echo $form->textField($model,'per_hour_rate',array('valuer'=>$model->per_hour_rate,'title'=>"Per Hour Rate",'data-parsley-type'=>"number",'class'=>'form-control text-input defaultText minlength','aria-describedby'=>'basic-addon1','length'=>"2",'tabindex'=>'7'));?>
            </div>
            <div class="form-group col-md-4">
                <label for="name1">Project Duration</label>
                <?php echo $form->textField($model,'estimate_timeline',array('value'=>$model->estimate_timeline,'title'=>"Project Size",'class'=>'form-control text-input defaultText','tabindex'=>'9'));?>
            </div>
            <!-- Skills -->
            <div class="form-group col-md-12" >
                <label class="col-sm-4 control-label">Skills</label>
                <div class="col-sm-8">
                    <select id="satnam-start" class="form-control required" multiple name="Skills[]" data-parsley-id='226'>
                        <option default><?php echo $model->language_used?></option>
                        <?php foreach($skills as $skill){?>
                        <option value="<?php echo $skill->id;?>" <?php echo (in_array($skill->id,$selectedSkills))?'selected="selected"':'';?> >	<?php echo $skill->name;?>	</option>
                        <?php } ?>
                    </select>
                </div>
            </div>
                        
			<!--Service Type-->
            <div class="form-group col-md-12" id="teamPart">
                <label class="col-sm-4 control-label">Services</label>
                <div class="col-sm-8">
                   	<select id="satnam-services" class="form-control required" multiple name="Services[]" data-parsley-id='126'>
                        <option default><?php echo $model->markets?></option>
                        <?php foreach($services as $service){?>
                   		<option value=" <?php echo $service->id;?>" <?php echo (in_array($service->id,$selectedServices))?'selected="selected"':'';?>> <?php echo $service->name;?> </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
                        
            <!--Industry-->
            <div class="form-group col-md-12" id="teamPart">
                <label class="col-sm-4 control-label">Industries</label>
                <div class="col-sm-8">
					<select id="satnam-industry" class="form-control required" multiple name="Industries[]" data-parsley-id='426'>
                    	<option default>Select a Industry</option>
                        <?php foreach($industries as $industry){?>
                        <option value=" <?php echo $industry->id;?>" <?php echo (in_array($industry->id,$selectedIndustries))?'selected="selected"':'';?> ><?php echo $industry->name;?> </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-1 pull-right"><?php echo CHtml::submitButton('Save',array('id'=>'portfolio','class'=>'btn btn-primary bm0 pull-left','tabindex'=>'10')); ?>
            </div>
        </div>	
    </div>
</div>

 <?php $this->endWidget(); ?>
 <?php echo $this->renderPartial("newstories/_screenshots",array("is_view"=>true)); ?>

<?php
    Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/algoliasearch.min.js',CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/typeahead.bundle.min.js',CClientScript::POS_END);
?>

 <script>
 $('document').ready(function(){
    $('.datepicker').datepicker();
 	$("#satnam-start,#satnam-services,#satnam-industry").selectize({
		delimiter: ",",
		persist: false,
	});

    allscreenshots("screenBrow-client","docs-client","screenshots-client");

    $("#testCity").attr("tabindex","6");
    $("#testCity").addClass("form-control");
    $("#testCity").focus(function(){
        $this=$("#testCity");
        $this.removeAttr("readonly");
        $this.val('');
        $("#cityId").val('');
    });

    $("#cityId").val("<?php  echo $model->location; ?>");

    var algolia = new AlgoliaSearch('L8YWR0XFJ6', '4bba2c1bb6dc58cdac2c3a02780bc9e0');
    var index = algolia.initIndex('city');
    $('#citySelect').typeahead({ hint: false },{source:index.ttAdapter({ "hitsPerPage": 10 }),displayKey:'label'}).on('typeahead:selected', function($e,datum){
        $('#citySelect').val(datum.label);
        $('#cityId').val(datum.id);
    });

    <?php
        if(Yii::app()->request->getParam('sid')!="" && $model->portfolio_type=="0")
        {
            if(isset($model->location))
            {                        
               $city = Cities::model()->findByAttributes(array("id"=>$model->location));
               ?>
               $('#citySelect').val("<?php echo $city->name."( ".$city->countries->name." )"; ?>");
               //$("#testCity").val("<?php echo $city->name; ?>");               
               //$("#SuppliersHasPortfolio_discreet_desc").val("<?php echo $stories->discreet_desc; ?>")
               <?php
               if($model->is_discreet=="1")
               {
                    //echo ' $("#SuppliersHasPortfolio_discreet_desc").show();';
               }
                ?>
               <?php
           }           
          
        }
         ?>

 });

$(".datepicker").blur(function(){
            $('#par-date ul.parsley-errors-list').html('');
        });

$('.openBrow1').click(function(){
    filepicker.setKey("AlqJxqOBnROGcRhBT1jPFz");
    filepicker.pickMultiple({mimetypes: ['image/*'],},
    function(InkBlob){
        for(i in InkBlob){
            var docs = $('#profilePicUser1').val(InkBlob[i].url);
            var data =InkBlob[i].url;
            $('#image').val(data);
        }
        // console.log($('#docs').val());
    },
    function(FPError){
        console.log(FPError.toString());
    }
    );
});



// $("#testCity").blur(function(){
//             var textboxVal = $("#cityId").val();
//             if(textboxVal!="")
//             {
//                 $('#par-loc ul.parsley-errors-list').html('');
//             }
//         });
 </script>
