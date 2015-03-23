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
			<?php if(Yii::app()->user->hasFlash('record')){?>
				<div class="alert alert-success" id="repsoneRest2">
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
					<p id="messageResponse2">
					<strong><?php echo Yii::app()->user->getFlash('record'); ?></strong></p>
				</div>
			<?php } ?>
			<div class="col-sm-2">
				
				<?php
                	$check = 0;
					if(isset($_POST) && !empty($_POST))
					{
						$check = 1;
					}
					$profile_img = Yii::app()->theme->baseUrl."/style/images/avatar.png";
					if(!empty($team->image))
					{
						$profile_img = $team->image;
					}
				?>
				 <img src="<?php echo $profile_img; ?>" id="profile_img" style="border-radius:100px" width="150" height="115" />
				 <div style="width: 88%;text-align: center;">
					<a href="#" style="text-align: center;" id="openBrow">Edit Image</a>
				 </div>
             </div>
			<div class="col-sm-6 ">         
				<?php $form=$this->beginWidget('CActiveForm', array('enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('class'=>"forms",'data-parsley-validate'=>'data-parsley-validate','onsubmit'=>'return validate();'))); ?>
					
					<div class="form-group col-md-12 pa0 mt10">
							<label for="name1">Name</label>
							<?php echo $form->textField($team,'first_name',array('placeholder'=>"First Name (Required)",'required'=>'required','title'=>"First Name (Required)",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText required alphanum minlength','length'=>"2",'tabindex'=>'1'));?>
							<?php if($check == 1)echo $form->error($team,'first_name'); ?>
					</div>
                    
                    <div class="form-group">
						<label for="exampleInputEmail1">Email </label>
						<?php echo $form->emailField($team,'email',array('placeholder'=>"Email (Required)",'required'=>'required','data-parsley-type'=>"email",'title'=>"Email (Required)",'class'=>'form-control text-input defaultText required email','tabindex'=>'3')); ?>
						<?php if($check == 1)echo $form->error($team,'email'); ?>
					</div>
                    <?php
                    if(false)
                    {
                     ?>
                    <div class="form-group">
						<label for="exampleInputEmail1">Role </label>
                        <?php
                        $role = array("4"=>"Admin","5"=>"Manager");
                         ?>
						<?php echo $form->dropDownList($team,'status', $role,array("empty"=>"Select Role","class"=>"form-control text-input required",'required'=>'required')); ?>
						<?php if($check == 1)echo $form->error($team,'email'); ?>
					</div>
                    <?php
                    }
                     ?>
                    
                    <?php
                         echo $form->hiddenField($team,'image',array('id'=>"profilePicUser"));
                     ?>
					<?php echo CHtml::submitButton('Add',array('id'=>'signup','class'=>'btn btn-primary bm0 pull-left','tabindex'=>'5')); ?>
				<?php $this->endWidget(); ?>
			</div>
            <div class="col-sm-4"></div>
            <?php
            
            if(count($user_listing) > 0)
            {
                ?>
                <div class="col-md-12"> 
                    <div class="col-md-2"></div>
                    <div class="col-md-10 mt15">
                    <?php
                    for($i=0;$i<count($user_listing);$i++)
                    {
                         $user_profile_img =  Yii::app()->theme->baseUrl."/style/images/avatar.png";
                         if($user_listing[$i]->image!="")
                         {
                            $user_profile_img = $user_listing[$i]->image; 
                         }          
                        ?>
                        <div class="col-md-3" style="border: 1px solid #e2e2e2;height: 150px;text-align: center;padding:4px;margin: 2px;">
                          <img src="<?php echo $user_profile_img; ?>" id="user_profile_img" style="border-radius:100px" width="100"  />
                          <br/><?php echo $user_listing[$i]->first_name; ?> <br />
                          Role here
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
<!-- /.container --> 
</div>
<script>
    $(document).ready(function(){
	    $('#openBrow').click(function(){
    	filepicker.setKey("AlqJxqOBnROGcRhBT1jPFz");
    	filepicker.pickMultiple({mimetypes: ['image/*'],container: 'window'},
    		function(InkBlob){
    			for(i in InkBlob){
    				$('#profilePicUser').val(InkBlob[i].url);
                    $("#profile_img").attr("src",InkBlob[i].url+'/convert?w=150&h=115&fit=crop');
    				//$('#ClientProjects_mockup').html('<li><img src="'+InkBlob[i].url+'/convert?w=150&h=115&fit=crop" /></li>');
    			}
    		},
    		function(FPError){
    			console.log(FPError.toString());
    		}
    	);});
       
    });
</script>