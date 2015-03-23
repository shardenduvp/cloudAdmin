<br /><br />
<?php
if($isOff)
{
    $formId = "open-form";    
}else{
    $formId = "off-form";
}

$is_view =false;

if(Yii::app()->request->getParam('view')!="")
{
    $is_view = true;
}
 
 ?>
<?php $form=$this->beginWidget('CActiveForm', array('enableClientValidation'=>true,'id'=>$formId,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('class'=>"forms",'data-parsley-validate'=>'data-parsley-validate'))); ?>
<div class="form-group">
    <label for="name1">Project Title</label>
    <?php echo $form->textField($stories,'project_name',array('placeholder'=>"Project Title (Required)",'required'=>'required','title'=>"Project Title (Required)",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText required minlength','length'=>"2",'tabindex'=>'1'));?>
</div>

<div class="form-group">
	<label for="name1">Description</label>
	<?php echo $form->textArea($stories,'description',array('placeholder'=>"Description",'title'=>"Description",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText minlength','length'=>"2",'tabindex'=>'2'));?>
</div>

<div class="form-group">
    <label for="name1">Who can use this?</label>
    <?php echo $form->textField($stories,'who_can',array('placeholder'=>"Who can use this? ",'title'=>"Who can use this?",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText minlength','length'=>"2",'tabindex'=>'3'));?>
</div>

<div class="form-group">
    <label for="name1">Markets</label>
    <?php echo $form->textField($stories,'markets',array('placeholder'=>"Markets",'title'=>"Markets",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText minlength','length'=>"2",'tabindex'=>'4'));?>
</div>


<div class="form-group" id="st-<?php echo $formId; ?>">
    <label for="name1">Status</label>
    <?php
     $portfolioStatus = array("Under Development"=>"Under Development",
                            "Beta"=>"Beta",
                            "Live"=>"Live"
                        ); 
     ?>
    <?php echo $form->dropDownList($stories,'portfolio_status', $portfolioStatus,array("empty"=>"Select Status",'class'=>'form-control text-input defaultText','tabindex'=>'5','id'=>'status-'.$formId),array('options' => array($stories->portfolio_status=>array('selected'=>true)))); ?>
</div>

<div class="form-group">
    <label for="name1">No of customers</label>
    <?php echo $form->textField($stories,'no_of_customers',array('placeholder'=>"No of Customers",'title'=>"No of Customers",'data-parsley-type'=>"number",'class'=>'form-control text-input defaultText minlength','length'=>"2",'tabindex'=>'6'));?>
</div>

<div class="form-group">
    <label for="name1">Launched In</label>
    <?php echo $form->textField($stories,'launched_in',array('placeholder'=>"Launched In",'title'=>"Launched In",'data-parsley-type'=>"number",'data-parsley-maxlength'=>"4",'data-parsley-minlength'=>"4",'class'=>'form-control text-input defaultText minlength','length'=>"2",'tabindex'=>'7'));?>
</div>

<div class="form-group">
    <label for="name1">No of Users</label>
    <?php echo $form->textField($stories,'no_of_users',array('placeholder'=>"No of Users",'title'=>"No of Users",'data-parsley-type'=>"number",'class'=>'form-control text-input defaultText minlength','length'=>"2",'tabindex'=>'8'));?>
</div>
<div class="form-group" id="pss-<?php echo $formId; ?>">
    <label for="name1">Deployment</label>
    <?php
     $deployment = array("Web Based"=>"Web Based",
                            "Desktop"=>"Desktop"
                          ); 
     ?>
    <?php echo $form->dropDownList($stories,'deployment', $deployment,array("empty"=>"Select Deployment",'class'=>'form-control text-input defaultText dropClass','tabindex'=>'9','id'=>"dep-".$formId),array('options' => array($stories->portfolio_status=>array('selected'=>true)))); ?>
</div>


<div class="form-group" id="ind-<?php echo $formId; ?>">
    <label for="name1">Industry</label>
    	<select id="satnam-industry-<?php echo $formId; ?>" class="form-control" placeholder="Education, Hardware, Call Center" multiple name="Industries[]">
			<option default>Select a Industry</option>
			<?php foreach($industries as $industry){?>
			 <option value=" <?php echo $industry->id;?>" <?php echo (in_array($industry->id,$selecetedIndustries))?'selected="selected"':'';?>  ><?php echo $industry->name;?> </option>
			<?php } ?>
		</select>
</div>

<div class="form-group" id="lan-<?php echo $formId; ?>">
    <label for="name1">Languages</label>
    <select id="satnam-start-<?php echo $formId; ?>" class="form-control" placeholder="Yii, Rails, Oracle SQL" multiple name="Skills[]">
		<?php foreach($skills as $skill){
			//if($skill->skillcol !=0){?>
		<option value="<?php echo $skill->id;?>" <?php echo (in_array($skill->id,$selecetedSkills))?'selected="selected"':'';?> >
			<?php echo $skill->name;?>
        </option>
		<?php } ?>
	</select>
</div>

<div class="form-group" id="plat-<?php echo $formId; ?>">
    <label for="name1">Platform</label>
    	<select id="satnam-service-<?php echo $formId; ?>" class="form-control" placeholder="Web app, iOS app, ERP" multiple name="Services[]" >
			<option default>Select a Service</option>
			<?php foreach($services as $service){?>
			 <option value=" <?php echo $service->id;?>" <?php echo (in_array($service->id,$selectedServices))?'selected="selected"':'';?>  ><?php echo $service->name;?> </option>
			<?php } ?>
		</select>
</div>

<?php echo $form->hiddenField($stories,'id',array("class"=>"class-".$formId));?>

<?php
if(!$isOff)
{
    echo $form->hiddenField($stories,'portfolio_type',array('value'=>"1"));
    ?>
    
    <div class="form-group">
          <div class="checkbox">
            <label>
                <?php echo $form->checkBox($stories,'is_free_trial',array('tabindex'=>'9')); ?> Free Trial available
            </label>
          </div>
    </div>
   <?php
}else
{
    echo $form->hiddenField($stories,'portfolio_type',array('value'=>"2"));
}
 ?>
 
 <div class="form-group">
    <label for="name1">Screen Shots</label><br/>
    <a id="screenBrow-<?php echo $formId; ?>">Choose Screenshots</a>
    <table id="screenshots-<?php echo $formId; ?>"></table>
    <?php echo CHtml::hiddenField('docs' ,'', array('id'=>'docs-'.$formId)); ?>
</div>
 <?php
$button_value = "Add";
if(Yii::app()->request->getParam('sid')!="")
{
    $button_value = "Save";
}
  ?>

<div class="form-group">                                
    <?php echo CHtml::submitButton($button_value,array('id'=>'portfolio-'.$formId,'class'=>'btn btn-primary bm0 pull-left','tabindex'=>'10')); ?>
    &nbsp;&nbsp;
    	<?php
	if(Yii::app()->request->getParam('sid')!="" && Yii::app()->request->getParam('view')=="")
	{
		echo CHtml::link('<button type="button" class="btn btn-primary  text-center model_text" >Cancel</button>', array('/supplier/editprofile'));
	}
	?>
</div>


 <?php $this->endWidget(); ?>

<?php echo $this->renderPartial("stories/_screenshots",array("is_view"=>$is_view)); ?>



<?php
    if(Yii::app()->request->getParam('sid')!="")
    {
        echo $this->renderPartial("stories/_reviews",array("is_view"=>$is_view));    
    } 
     
?>
 <script>
 $(document).ready(function(){
    //$("#satnam-services").selectize({delimiter: ",",persist: false,});
    $("#satnam-industry-open-form").selectize({delimiter: ",",persist: false,});
    $("#satnam-industry-off-form").selectize({delimiter: ",",persist: false,});

    $("#satnam-service-open-form").selectize({delimiter: ",",persist: false,});
    $("#satnam-service-off-form").selectize({delimiter: ",",persist: false,});

    //
    skillsSelectize("satnam-start-open-form");
    skillsSelectize("satnam-start-off-form");

   //
   allscreenshots("screenBrow-open-form","docs-open-form","open-form");
   allscreenshots("screenBrow-off-form","docs-off-form","off-form");
   
   
      
   selectizeValid("open-form");
   selectizeValid("off-form");
   dropdownValidation("dep-open-form","pss-open-form");
   dropdownValidation("dep-off-form","pss-off-form");
   dropdownValidation("status-open-form","st-open-form");
   dropdownValidation("status-off-form","st-off-form");
   dropdownValidation("satnam-industry-off-form","ind-off-form");    
   dropdownValidation("satnam-industry-open-form","ind-open-form");
   dropdownValidation("satnam-start-open-form","lan-open-form");
   dropdownValidation("satnam-start-off-form","lan-off-form");
   dropdownValidation("satnam-service-off-form","plat-off-form");
   dropdownValidation("satnam-service-open-form","plat-open-form");
 });

    /* $("#open-form" ).submit(function(  ) {
         var $form = $("#open-form");
         var supplier_has_portfolio = $form.parsley();
         
         if(supplier_has_portfolio.isValid())
         {
            alert("Yes");
         }else{
            alert("No");
         }
        return false;
     })*/
     
  
  function selectizeValid(form_id)
	{
	   return true;
	    var openForm = $("#" + form_id);
	    var openFormParsley = openForm.parsley();
	    openForm.on("submit",function(){
	    var ret=false;
	    console.log(openFormParsley.isValid());
	    // give id of selectize and it will validated
	    ret = selectizeFix("satnam-industry-" + form_id);
	    ret = selectizeFix("satnam-start-" + form_id);
	    ret = selectizeFix("satnam-service-" + form_id);
	    return ret;
	    });
	}
    
   
     


 </script>
