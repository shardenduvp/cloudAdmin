<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add Team Member</h4>
            </div>
            <div class="modal-body" style="padding: 0px;">
                <?php $form=$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/supplier/ajaxHandlerForAddingTeam'),'id'=>'team-user-supplier','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"panel-default form-horizontal",'data-parsley-validate'=>'data-parsley-validate')));?>

                <div class="col-md-4 mt10">


                    <img src="<?php echo (empty($data->image)?$this->res["avtar"]:$data->image); ?>" class="img-circle" id="team_img" width="150" height="115" />
                    <div style="width: 92%;text-align: center;">
                        <a href="#" style="text-align: center;" id="openBrow1">Edit Image</a>
                    </div>


                    <?php echo CHtml::hiddenField( 'action', 'edit'); ?>
					<?php echo $form->hiddenField( $data,'id' );?>
					<?php echo $form->hiddenField( $data,'image' );?>
                </div>

                <div class="col-md-8 mt10">
                    <div class="form-group">
                        <label for="name1">Name</label>
                        <?php echo $form->textField($data,'name',array( 'placeholder'=>"Name (Required)",'title'=>"Name (Required)",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText required  minlength','length'=>"2",'tabindex'=>'21'));?>
                    </div>

                    <div class="form-group">
                        <label for="name1">Designation</label>
                        <?php echo $form->textField( $data, 'designation',array( 'placeholder'=>"Designation (Required)",'required'=>'required','title'=>"Designation (Required)",'class'=>'form-control text-input defaultText required ','tabindex'=>'23')); ?>
                    </div>
                    <div class="form-group">
                        <label for="name1">Department</label>
                        <?php echo $form->textField(  $data,'dep',array( 'placeholder'=>"Department (Required)",'required'=>'required','title'=>"Department (Required)",'class'=>'form-control text-input defaultText required ','tabindex'=>'23')); ?>
                    </div>
                    <div class="form-group">
                        <label for="name1">Facebook URL</label>
                        <?php echo $form->textField( $data,'facebook',array( 'placeholder'=>"Facebook URL",'title'=>"Email (Required)",'class'=>'form-control text-input defaultText urld ','tabindex'=>'23',"data-type"=>"url")); ?>
                    </div>
                    <div class="form-group">
                        <label for="name1">Twitter URL</label>
                        <?php echo $form->textField($data,'twitter', array( 'placeholder'=>"Twitter URL",'title'=>"Email (Required)",'class'=>'form-control text-input defaultText urld','tabindex'=>'23')); ?>
                    </div>
                    <div class="form-group">
                        <label for="name1">LinkedIn URL</label>
                        <?php echo $form->textField($data,'linkedin',array( 'placeholder'=>"LinkedIn URL",'title'=>"Email (Required)",'class'=>'form-control text-input defaultText urld','tabindex'=>'23')); ?>
                    </div>
                    <div class="form-group">
                        <div class="alert alert-success" style="display: none;" id="message"></div>
                    </div>
                </div>
				 <div class="modal-footer">
                	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

					 <?php echo CHtml::submitButton( "Save",array( 'id'=>'add_team_members','class'=>'btn btn-primary bm0','tabindex'=>'5')); ?>
           		 </div>

            </div>

            <?php $this->endWidget(); ?>
        </div>
    </div>
<script type="text/javascript">
$(document).ready(function() {
	$(".urld").change(function(){
		var prefix = 'http';
		s = $(this).val();
		if (s.substr(0, prefix.length) !== prefix)
		{
			s = prefix+"://" + s;
		}
		console.log(s);
		$(this).val(s);

	});
	    var $form = $("#team-user-supplier");
        var team_user = $form.parsley();

        $('#openBrow1').click(function() {
            filepicker.setKey("<?php echo $this->filpickerKey; ?>");
            filepicker.pick({
                    mimetypes: ['image/*']
                },
                function(InkBlob) {
                    $('#UsersTeamMembers_image').val(InkBlob.url);
                    $("#team_img").attr("src", InkBlob.url + '/convert?w=150&h=115&fit=crop');
                },
                function(FPError) {
                    //alert("Error Uploading Files : " + FPError.toString());
                    console.log(FPError.toString());
                }
            );
        });





    });

</script>
