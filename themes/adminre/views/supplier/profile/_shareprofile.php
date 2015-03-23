<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">Share Profile</h4>
</div>
<div class="modal-body" style="padding: 0px;" >
   
    <?php $this->beginWidget('CActiveForm', array('id'=>'shareprofile','enableClientValidation'=>true,'action'=>$this->createUrl('supplier/shareprofile'),'enableAjaxValidation' => true,'clientOptions'=>array('validateOnSubmit'=>true,'afterValidate'=>'js:$.yii.fix.ajaxSubmit.afterValidate',),'htmlOptions'=>array('class'=>"forms",'data-parsley-validate'=>'data-parsley-validate'))); ?>
    <div id="share_div_append">
        <div class="col-md-6 mtl0">
    		<label for="name1">Name</label>
    	    <?php echo CHtml::textField('name[]','',array('placeholder'=>"Name (Required)",'required'=>'required','title'=>"Name (Required)",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText required  minlength','length'=>"2",'tabindex'=>'21'));?>
        </div>
    	<div class="col-md-6 mtl0">
    		<label for="name2">Email</label>
    		<?php echo CHtml::textField('email[]','',array('placeholder'=>"Email (Required)",'required'=>'required','data-parsley-type'=>"email",'title'=>"Email (Required)",'class'=>'form-control text-input defaultText required email','tabindex'=>'22')); ?>
            
    	</div>
    </div>
    <div class="col-md-12 mtl0">
        <span class="pull-right" id="add_share"> <a>+Add</a> </span>
    </div>
    <div class="col-md-12 mtl0">
        	<?php echo CHtml::textArea('description','',array('placeholder'=>"Description (Required)",'required'=>'required','title'=>"Description (Required)",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText required alphanum minlength','length'=>"2",'tabindex'=>'6'));?>
    </div>
    
    <input type="hidden" name="otherProfile" value="<?php if(isset($_REQUEST['id'])){ echo $_REQUEST['id']; }else{ echo "0"; } ?>" />
    
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <?php echo CHtml::submitButton( "Send",array( 'id'=>'share_profile','class'=>'btn btn-primary bm0','tabindex'=>'23')); ?>
</div>
 <?php $this->endWidget(); ?>
 <input type="hidden" id="share_hidden" value="1" />
 <script>
  
  $(document).ready(function(){
    $("#add_share").click(function(){
       var hidden_val = $("#share_hidden").val();
       hidden_val = parseInt(hidden_val) + 1;
       $("#share_hidden").val(hidden_val);
       
       var htm = '<div id="share_hidden_' + hidden_val +'"><div class="col-md-6 mtl0"><label for="name1">Name</label><input type="text" id="name" name="name[]" value="" tabindex="21" length="2" class="form-control text-input defaultText required minlength" data-parsley-minlength="2" title="Name (Required)" required="required" placeholder="Name (Required)" data-parsley-id="9229"><ul class="parsley-errors-list" id="parsley-id-9229"></ul></div><div class="col-md-6 mtl0"><label for="name2">Email</label><input type="text" id="email" name="email[]" value="" tabindex="22" class="form-control text-input defaultText required email" title="Email (Required)" data-parsley-type="email" required="required" placeholder="Email (Required)" data-parsley-id="9640"><a class="delete_web pull-right" onclick="remove_share(' + hidden_val + ')"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></a></div></div>';
       $("#share_div_append").append(htm);
    });
  });
  
  function remove_share(id)
  {
     $("#share_hidden_" + id).hide();
     $("#share_hidden_" + id).remove();
  }

 </script>
