<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/selectize/css/selectize.css" />
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/selectize/js/selectize.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/page1.js"></script>

<?php 
$form=$this->beginWidget('CActiveForm', array('id'=>'login-form', 'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('class'=>'form-horizontal','id'=>'project-form','enctype' => 'multipart/form-data','onsubmit'=>'return validate();'))); ?>
<?php 
if(isset($_REQUEST['id']))
    echo CHtml::hiddenField('id' ,$_REQUEST['id'], array('id'=>'id')); 
else
    echo CHtml::hiddenField('docs' ,'', array('id'=>'docs')); 
?>
<!-- START Get Started Template Container -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-header">
            <h1>Project View</h1>
        </div>
    </div>
</div>

<p class="text ">Project Name: <strong><?php echo $project->name ?></strong></p>
                        <p class="text "> Client Name: <strong class="textColor"><?php echo CHtml::link($project->clientProfiles->users->first_name, array("/admin/users/view", "id"=>$project->clientProfiles->users->id)); ?></strong></p>


 <div class="row" id="main">
        <div class="col-md-12 full-width">
<div class="box  border custom-table" >
 <div class="box-body clearfix">
       
    <!-- Get Started Form Start -->
    <div  id="project">
        <!-- Basic Form-->
          <!-- <div class="row"> -->
            
             <!-- panel body  BASIC FORM START -->
                <div class="panel-body pb0" id="basicProject"> 
                    <!-- Skills -->
                    <div class="row form-group">
                        <div class="col-sm-6">
                        <label >Language and Skills</label>
                       
                            
                            
                            <select id="satnam-start" class="colortext" multiple name="Skills[]" data-parsley-id='226' disabled="true" >
                                <?php foreach($skills as $skill){
                                        //if($skill->skillcol !=0){?>
                                    <option value="<?php echo $skill->id;?>" <?php echo (in_array($skill->id,$selecetedSkills))?'selected="selected"':'';?> >
                                        <?php echo $skill->name;?>
                                    </option>
                                <?php } ?>
                            </select>
                             
                        </div>   
                    

                        
                        
                    <!--Service Type-->
                    
                    <div class="col-sm-6">
                        <label>Category </label>
                        

                                <select id="satnam-services" class="form-control required" multiple name="Services[]" data-parsley-id='126' disabled="true">
                                <option default>Select a Service</option>
                                <?php foreach($services as $service){?>
                                <option value=" <?php echo $service->id;?>" <?php echo (in_array($service->id,$selecetedServices))?'selected="selected"':'';?> ><?php echo $service->name;?> </option>
                                <?php } ?>
                                </select>
                                
                        </div>
                    </div>
                     
                        
                        
                    <!--Industry-->
                    <div class="row form-group" id="teamPart">
                    <div class="col-sm-4">
                        <label >Industry</label>
                        

                                <select id="satnam-industry" class="form-control required"  multiple name="Industries[]" data-parsley-id='426' disabled="true">
                                    <option default>Select a Industry</option>
                                    <?php foreach($industries as $industry){?>
                                     <option value=" <?php echo $industry->id;?>" <?php echo (in_array($industry->id,$selecetedIndustries))?'selected="selected"':'';?>  ><?php echo $industry->name;?> </option>
                                    <?php } ?>
                                </select>
                                
                        </div>
                    
                         
                       
                    <!-- Choice-->
                   <div class="col-sm-4">
                        <label >Stage of the Project </label>
                        
                        <?php 
                         $lit = CHtml::listData($currentStatus,'id','name');
                         if($project->current_status_id==1)
                         {
                           echo CHtml::textField('','Idea/Concept',array('class'=>'form-control','disabled'=>'true'));  
                        }
                         else if($project->current_status_id==2)
                         {
                            echo CHtml::textField('','Prototype Ready',array('class'=>'form-control','disabled'=>'true'));
                         }
                          else if($project->current_status_id==3)
                         {
                            echo CHtml::textField('','New Features/modules to existing product',array('class'=>'form-control','disabled'=>'true'));
                         }
                         else
                                 {
                                    echo CHtml::textField('','Not Provided',array('class'=>'form-control','disabled'=>'true'));
                                 }

                        ?> 
                        </div>
                    <!-- Start Date-->
                      <div class="col-sm-4">
                            <label>Expected start Date</label>
                            
                            <?php 
                                
                                 if($project->project_start_preference==1)
                                 {
                                   echo CHtml::textField('','Immediately',array('class'=>'form-control','disabled'=>'true'));  
                                }
                                 else if($project->project_start_preference==2)
                                 {
                                    echo CHtml::textField('','Within the next 30 days',array('class'=>'form-control','disabled'=>'true'));
                                 }
                                  else if($project->project_start_preference==3)
                                 {
                                    echo CHtml::textField('','No Hurry',array('class'=>'form-control','disabled'=>'true'));
                                 }
                                 else
                                 {
                                    echo CHtml::textField('','Not Provided',array('class'=>'form-control','disabled'=>'true'));
                                 }

                            ?>   
                            </div>
                    </div>          
                        
                    <!-- Summery--> 
                    <div class="row form-group">
                            <label class="col-sm-6">Description</label>

                            <div class="col-sm-12">
                               <?php echo $form->textArea($project,'description',array('class'=>'form-control required','required'=>'required','rows'=>'2', 'data-parsley-maxlength'=>"3000",'maxlength'=>"3000",'data-parsley-id'=>'125','data-container'=>"body",'id'=>"bsummary",'disabled'=>'true')); ?>
                                    
                                                            
                            </div>
                    </div>               
            <br>
                
                <div id="productScope">
                <!-- Budget Q1 -->
                <div class="row form-group">
                 <div class="col-sm-6 ">
                        <label>Developer(s) are Located at</label>
                            <div class="row">
                                <div class="col-sm-6">
                                   
                                               
                                      <?php if($project->preferences=='no-preferences'){ 
                                      echo CHtml::textField('','No Preference',array('class'=>'form-control','disabled'=>'true'));
                                       }?>
                                             
                                   
                                    
                                       <?php if($project->preferences=='city'){
                                        echo CHtml::textField('','In My City',array('class'=>'form-control','disabled'=>'true'));
                                         }?>
                                    
                                    
                                      <?php if($project->preferences=='country'){ 
                                        echo CHtml::textField('','In My Country',array('class'=>'form-control','disabled'=>'true')); }?>
                                
                                    <div style="height: auto;" id="regions" class=" <?php echo ($project->preferences=='regoin')?'':'hide';?>">
                                        <div>
                                        <?php $regions  =   Regions::model()->findAllBYAttributes(array('status'=>'1'));
                                            foreach($regions as $region){?>
                                            <div data-toggle="buttons"  class="btn-group mb10 mr10 "> 
                                                <label class="btn btn-sm btn-default active_success btn_new btn_rounded <?php echo (in_array($region->id,$selecetedRegions))?'active':'hide';?>" >
                                                <input type="checkbox"  id="option<?php echo $region->id;?>" name="options[]" value="<?php echo $region->id;?>"  <?php echo (in_array($region->id,$selecetedRegions))?'checked="checked"':'';?> class="tireSelectuion" /><?php echo $region->name;?></label>
                                            </div>
                                            <?php }?>
                                            
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                
                
                <!-- Budget Q2 -->
                    
                    <div class="col-sm-6">
                                <div class="panel-toolbar">
                                    <label>Geographical preferences,according to Pricings and Budget</label>
                                </div>
                            
                    
                            
                           <?php
                           $selected_tier=explode(',',$project->tier);
                           foreach ($selected_tier as $tier) 
                           {
                               $tiers=PriceTier::model()->findByPk($tier); ?>
                             <span class="label label-default textLabel">  Zone <?php  echo $tiers->price_zone_id ?>: $<?php  echo $tiers->min_price; ?>- $<?php  echo $tiers->max_price; ?></span>
                          <?php  }
                           ?>
                           </div>
                            
                 </div>
                
                <!-- Budget Q3 -->
                <div class="form-group" id="teamBudget">            
                    <div class="col-md-6">
                                    <label>Range of total Budget </label>
                                    <div class="row">
                                      
                                        <div class="col-md-3">
                                              <div class="col-md-12 input-group">
                                                   <span class="input-group-addon">$</span>
                                                
                                                <?php echo $form->textField($project,'min_budget',array('placeholder'=>"Min",'class'=>'form-control number required from width160','data-parsley-type'=>"integer",'data-parsley-required'=>"true",'data-parsley-id'=>'129','disabled'=>'true')); ?>
                                                </div>
                                          </div>

                                        <div class="col-md-3">
                                                <div class="col-md-12 input-group">

                                                       <span class="input-group-addon">$</span>
                                                        <?php echo $form->textField($project,'max_budget',array('placeholder'=>"Max",'class'=>'form-control number required to width160','data-parsley-type'=>"integer",'data-parsley-required'=>"true",'data-parsley-id'=>'130','disabled'=>'true')); ?>
                                                   </div>
                                           </div>
                               
                          </div>
                          </div>
                    
                         
                            
            
                <!-- MockUp-->
               <div class="col-sm-6">
                            <label >Mockups, Designs or other Documentation</label>
                            
                            <!-- <div class="col-sm-6">
                                <div class="input-group form-control">
                                    <input type="text" readonly class="form-control" data-parsley-id="3057" name="attachment1[]" id="client-proj-doc" disabled="true">
                                    
                                </div>
                               
                            </div> -->
                            
                            
                              <table class="table table-striped">
                                 <tbody id="ClientProjects_mockup">
                                                        
                                          <?php 
                                            if(count($project->clientProjectDocuments)>0){
                                                foreach($project->clientProjectDocuments as $doc){?>
                                                    <tr>
                                                    <td>
                                                       <span class="label label-success"><?php echo $doc->type;?></span> <?php echo $doc->name;?> (<?php echo round($doc->size/(1024));?> KB)
                                                    </td>
                                                    <td><a href="<?php echo $doc->path;?>" target="_blank">View</a></td>
                                                    </tr>
                                                <?php }
                                            } else if(count($project->clientProjectDocuments)==0)
                                            { 
                                                echo CHtml::textField('','Not Provided',array('class'=>'form-control','disabled'=>'true')); 
                                             } ?>
                                    </tbody>
                                </table>                                
                            
                        </div>
                    </div>  
             <!-- </div> -->
                <!-- panel body BASIC FORM END -->
                  
          <div class="form-group panel-body pb0" id="teamBudget"> 
              <div class="row">           
                    <div class="col-md-2">
                      <label >List of Suppliers:</label>
                    </div>
                    <div class="col-md-10">

                       <?php
                       if(!empty($model))
                       {
                           foreach($model as $projSupp)
                            { ?> 
                                    <div class="col-xs-3">
                                       <p>Name: <?php echo CHtml::link($projSupp->suppliers->users->company_name, array("/admin/users/view", "id"=>$projSupp->suppliers->users->id, "view"=>"supplier")); ?>
                                        </p>Status:<?php if($projSupp->status==1) { ?>
                                        <span  class="label label-info textLabel">Awaiting Approval</span>
                                        <?php } else { ?>
                                        <span  class="label label-success textLabel">Introduction Sent</span>
                                        <?php }  ?>
                                        
                                    </div>
                           <?php }
                       } else { ?>
                                <p><strong>Not Provided</strong> </p>
                      <?php   }?>
                    </div>
             </div>
          </div>
             </div>
         </div>
         </div>
        <!-- Budget-->
              
      <?php $this->endWidget(); ?>
       </div>        
    </div>
    </div>
    </div>
    
    <!-- Get Started Form End -->


<script type="text/javascript">
$('#basicProject').delegate('.otherOption','change',function(){
    if($('#stanmOther').hasClass('hide'))
        $('#stanmOther').removeClass('hide');
    else
        $('#stanmOther').addClass('hide');
});


$("#satnam-start").selectize({
    delimiter: ",",
    persist: false,
    create: function (input) {
        $.ajax({
            type:'POST',
            url:"<?php echo CController::createUrl("/client/createSkill");?>",
            data : 'name='+input,
            success: function(id){      }
        });
        return {
            value: input,
            text: input
        }
    }
});


// $('#ClientProjects_mockup').delegate('.removeImg','click',function(){
//     var that    =   $(this);
//     $.ajax({
//         type:'POST',
//         url:"<?php echo CController::createUrl("/client/mockup",array('id'=>$project->id));?>",
//         data : 'action=delete&imageId='+that.attr('rel'),
//         success:function(data){
//             if(data==1){
//                 that.parent().parent().hide();
//             }
//         }
//     });
// });


$('#project-form').on('change',function(){changeValidate('project-form');});

function specialVal(){
    errorList   =   1;
    if($('.require-one1:checked').size() == 0){
        $('#parsley-id-tier-224').html('<li>Please select required field</li>');
        $('#parsley-id-tier-224').addClass('filled');
        errorList   =   0;
    }else{
        $('#parsley-id-tier-224').removeClass('filled');
        $('#parsley-id-tier-224').html('');
    }
    return  errorList;
}

(function($){
    
$("#satnam-services").selectize({delimiter: ",",persist: false,});
$("#satnam-industry").selectize({delimiter: ",",persist: false,});

    $("#customradio4").on("change", function(){
        if($("#customradio4").is(":checked")){
            $("#regions").removeClass('hide');
            $("#regions").show();
            var regions =   [];
            $("input[name='options[]']:checked").each( function () {
                regions.push($(this).val());
            });
            getData($(this).val(),regions);
        }
    })

    $("#ajaxLoadingDiv" ).hide();
    $( document ).ajaxStart(function() {
        $( "#ajaxLoadingDiv" ).show();
    });
    $( document ).ajaxStop(function() {
        $( "#ajaxLoadingDiv" ).hide();
    });

})(jQuery);

</script>

