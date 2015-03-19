<?php $form=$this->beginWidget('CActiveForm', array('enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('class'=>"forms",'data-parsley-validate'=>'data-parsley-validate','onsubmit'=>'return validate();'))); ?>
<div class="col-md-3">
	<?php
        
        $button_value = "Add";
        if(isset($_REQUEST['aid']))
        {
            $button_value = "Save";    
        }
		$check = 0;
		if(isset($_POST) && !empty($_POST))
		{
			$check = 1;
		}
		$profile_img1 = Yii::app()->theme->baseUrl."/style/images/avatar.png";
		if(!empty($awards->image))
		{
			$profile_img1 = $awards->image;
		}
	?>
	 <img src="<?php echo $profile_img1; ?>" id="profile_img1" style="border-radius:100px" width="150" height="115" />
	 <div style="width: 88%;text-align: center;">
		<a href="#" style="text-align: center;" id="openBrowUser">Edit Image</a>
	 </div>
     <?php
		 echo $form->hiddenField($awards,'image',array('id'=>"profilePicUser1"));
	?>
</div>

<div class="col-md-9 ">
      
	
		<div class="form-group">
			<label for="name1">Title</label>
			<?php echo $form->textField($awards,'title',array('placeholder'=>"Title (Required)",'required'=>'required','title'=>"Title (Required)",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText required minlength','length'=>"2",'tabindex'=>'1'));?>
			<?php if($check == 1)echo $form->error($awards,'title'); ?>
		
		</div>
        <div class="form-group">
			<label for="name1">Description</label>
			<?php echo $form->textArea($awards,'description',array('placeholder'=>"Description (Required)",'required'=>'required','title'=>"Description (Required)",'data-parsley-maxlength'=>"100",'class'=>'form-control text-input defaultText required ','tabindex'=>'2'));?>
			<?php if($check == 1)echo $form->error($awards,'description'); ?>
		
		</div>
	
	

	
	<?php echo CHtml::submitButton($button_value,array('id'=>'signup1','class'=>'btn btn-primary bm0 pull-left','tabindex'=>'5')); ?>
	&nbsp;&nbsp;
	<?php
	if(isset($_REQUEST['aid']))
	{
		echo CHtml::link('<button type="button" class="btn btn-primary  text-center model_text" >Cancel</button>', array('/supplier/profile&page=2'));
	}
	?>
	<?php $this->endWidget(); ?>
	
    
     <?php
   
	if(count($awards_listing) > 0)
	{
	?>
		<div class="col-md-12 pa0"> 
            <div class="mt15" >
				<?php
					for($i=0;$i<count($awards_listing);$i++)
					{
					
						$award_image =  Yii::app()->theme->baseUrl."/style/images/avatar.png";
						if($awards_listing[$i]->image!="")
						{
							$award_image = $awards_listing[$i]->image; 
						}          
						?>
						<div class="col-md-3 mr15 ma5 awardcerification" id="id_<?php echo $awards_listing[$i]->id; ?>" >
                           <div class="all_info" id="hoverOut_<?php echo $awards_listing[$i]->id; ?>">
                                 <img src="<?php echo $award_image; ?>" id="user_profile_img" width="80" class="img-circle"  />
    							 <br/><strong>Title: </strong><?php echo $awards_listing[$i]->title ?> <br />
                           </div>
                           <div class="awarddesc" id="hoverIn_<?php echo $awards_listing[$i]->id; ?>" style="display: none;">
                                <?php echo $awards_listing[$i]->description; ?> 
                           </div>

                            <div class="col-md-12 mt10 mb10" >
                            <?php
                            //Yii::app()->createUrl('/site/shareprofile',array('id'=>base64_encode(Yii::app()->user->id));
                             ?>
                                     <a href="<?php echo Yii::app()->createUrl('/supplier/profile',array('aid'=>base64_encode($awards_listing[$i]->id),'page'=>4)); ?>">Edit</a> &nbsp;| <a class="delete" href="<?php echo Yii::app()->createUrl('/supplier/deleteaward',array('aid'=>base64_encode($awards_listing[$i]->id),'page'=>4)); ?>">Delete</a>
                            </div>		
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

<script>
    $(document).ready(function(){
        $(".awardcerification").hover(function(){
            var id = this.id;
            id = id.split("_");
            $("#hoverOut_" + id[1]).hide();
            $("#hoverIn_" + id[1]).show();
         },function(){
            var id = this.id;
            id = id.split("_");
            $("#hoverOut_" + id[1]).show();
            $("#hoverIn_" + id[1]).hide();
         });
    });
</script>
						
						   
                        
