<div class="white_outer">
	<div class="container">
		<div class="row">
			<div class="col-md-12"><h3>Client Team</h3></div>
		</div>
	</div>
</div>

<div class="dark-wrapper">
	<div class="container inner">
		<div class="row">                   
            <?php $form=$this->beginWidget('CActiveForm', array('enableClientValidation'=>true,'id'=>"client-team-form",'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('class'=>"forms",'data-parsley-validate'=>'data-parsley-validate'))); ?>            
            <?php
            $proImg = Yii::app()->theme->baseUrl."/style/images/avatar.png";
        	if(!empty($clientTeam->image))
    		{
    			$proImg = $clientTeam->image;
    		}
            $button_value = "Add";
            if(isset($_REQUEST['pid']))
            {
                $button_value = "Save";    
            }
             ?>
            <div class="col-md-3"></div>
            <div class="col-md-9">
                <div class="col-md-4 mt10">
                    <img src="<?php echo $proImg; ?>" class="img-circle" id="team_img" width="150" height="115" />
                    <div style="width: 60%;text-align: center;">
                        <a href="#" style="text-align: center;" id="openBrow1">Edit Image</a>
                    </div>
                    <?php echo $form->hiddenField($clientTeam,'image',array('id'=>"profilePicUser")); ?>
            	
                </div>
            
                <div class="col-md-8 mt10">
                    <div class="form-group">
                        <label for="name1">Name</label>
                        <?php echo $form->textField($clientTeam,'name',array( 'placeholder'=>"Name (Required)",'title'=>"Name (Required)",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText required  minlength','length'=>"2",'tabindex'=>'21'));?>
                    </div>
            
                    <div class="form-group">
                        <label for="name1">Designation</label>
                        <?php echo $form->textField( $clientTeam, 'designation',array( 'placeholder'=>"Designation (Required)",'required'=>'required','title'=>"Designation (Required)",'class'=>'form-control text-input defaultText required ','tabindex'=>'23')); ?>
                    </div>
                    <div class="form-group">
                        <label for="name1">Department</label>
                        <?php echo $form->textField(  $clientTeam,'dep',array( 'placeholder'=>"Department (Required)",'required'=>'required','title'=>"Department (Required)",'class'=>'form-control text-input defaultText required ','tabindex'=>'23')); ?>
                    </div>
                    <div class="form-group">
                        <label for="name1">Facebook URL</label>
                        <?php echo $form->textField( $clientTeam,'facebook',array( 'placeholder'=>"Facebook URL",'title'=>"Email (Required)",'class'=>'form-control text-input defaultText urld ','tabindex'=>'23',"data-type"=>"url")); ?>
                    </div>
                    <div class="form-group">
                        <label for="name1">Twitter URL</label>
                        <?php echo $form->textField($clientTeam,'twitter', array( 'placeholder'=>"Twitter URL",'title'=>"Email (Required)",'class'=>'form-control text-input defaultText urld','tabindex'=>'23')); ?>
                    </div>
                    <div class="form-group">
                        <label for="name1">LinkedIn URL</label>
                        <?php echo $form->textField($clientTeam,'linkedin',array( 'placeholder'=>"LinkedIn URL",'title'=>"Email (Required)",'class'=>'form-control text-input defaultText urld','tabindex'=>'23')); ?>
                    </div>
                    <div class="form-group">
                        <div class="alert alert-success" style="display: none;" id="message"></div>
                    </div>
                </div>
            	 <div class="modal-footer">
                	 <?php echo CHtml::submitButton( $button_value,array( 'id'=>'add_team_members','class'=>'btn btn-primary bm0','tabindex'=>'5')); ?>
                     
                 	<?php
                	if(isset($_REQUEST['id']))
                	{
                		echo CHtml::link('<button type="button" class="btn btn-primary  text-center model_text" >Cancel</button>', array('/supplier/stories','page'=>0,'id'=>$_REQUEST['pid']));
                	}
                	?>
                     
            	 </div>
            </div>
        
         <?php $this->endWidget(); ?>
		</div>
	</div>
<!-- /.container -->
</div>

<script>
    $(document).ready(function(){
        $('#openBrow1').click(function() {
            filepicker.setKey("<?php echo $this->filpickerKey; ?>");
            filepicker.pick({
                    mimetypes: ['image/*'],
                    container: 'window'
                },
                function(InkBlob) {
                    $('#profilePicUser').val(InkBlob.url);
                    $("#team_img").attr("src", InkBlob.url + '/convert?w=150&h=115&fit=crop');
                   
                },
                function(FPError) {
                    console.log(FPError.toString());
                }
            );
        });  
    });
</script>













