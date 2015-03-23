  <?php //$this->beginWidget('CActiveForm', array('id'=>'social_media_supplier','enableClientValidation'=>true,'action'=>$this->createUrl('supplier/socialMedia'),'enableAjaxValidation' => true,'clientOptions'=>array('validateOnSubmit'=>true,'afterValidate'=>'js:$.yii.fix.ajaxSubmit.afterValidate',),'htmlOptions'=>array('class'=>"forms",'data-parsley-validate'=>'data-parsley-validate'))); ?>


<div class="form-group col-md-12 pa0 mt10">
    <div id="social_div_append">
       <?php

       if(count($web) > 0)
       {

          for($j=0;$j<count($web);$j++)
          {
         ?>


             <div class="col-md-6 pl0">
				<label for="name1">Social Network</label>
			    <?php echo CHtml::textField('social[]',$web[$j]->social_site,array('placeholder'=>"Social Network",'title'=>"Social Network",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText minlength','length'=>"2",'tabindex'=>'21'));?>
		    </div>
			<div class="col-md-5 pl0">
				<label for="name2">Link</label>
				<?php echo CHtml::textField('link[]',$web[$j]->link,array('placeholder'=>"Link",'title'=>"Link ",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText minlength','length'=>"2",'tabindex'=>'22','data-parsley-type'=>'url'));?>



			</div>
            <div class="col-md-1 pl0 web_mt">
                <a  id="deleteweb_<?php echo $web[$j]->id ?>" class="delete_web" ><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></a>
            </div>

         <?php
          }
       }
       
       if(count($web)==0)
       {
        ?>
            <div class="col-md-6 pl0">
    			<label for="name1">Social Network</label>
    		    <?php echo CHtml::textField('social[]','',array('placeholder'=>"Social Network",'title'=>"Social Network",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText minlength','length'=>"2",'tabindex'=>'21'));?>
    	    </div>
    		<div class="col-md-5 pl0">
    			<label for="name2">Link</label>
    			<?php echo CHtml::textField('link[]','',array('placeholder'=>"Link",'title'=>"Link",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText minlength','length'=>"2",'tabindex'=>'22','data-parsley-type'=>'url'));?>
    		</div>
       <?php
       }
        ?> 
    </div>
    <input type="hidden" id="social_hidden" value="1" />
</div>
 
<span class="pull-right" id="add_social"> <a>+Add</a> </span>


<div class="form-group">
    <?php //echo CHtml::submitButton('Update',array('id'=>'social_media','class'=>'btn btn-primary bm0 pull-left','tabindex'=>'5')); ?>
</div>
<?php //$this->endWidget(); ?>


 <script>

    $("#add_social").click(function(){
       var hidden_val = $("#social_hidden").val();
       hidden_val = parseInt(hidden_val) + 1;
       $("#social_hidden").val(hidden_val);

       var htm = '<div id="social_hidden_' + hidden_val +'"><div class="col-md-6 pl0"><label for="name1">Social Network</label><input type="text" id="social" name="social[]" value="" tabindex="21" length="2" class="form-control text-input defaultText minlength" data-parsley-minlength="2" title="Social Network" placeholder="Social Network" data-parsley-id="9259"></div><div class="col-md-5 pl0"><label for="name2">Link</label><input type="text" id="link" name="link[]" value="" tabindex="22" length="2" class="form-control text-input defaultText"  data-parsley-type="url"  title="Link "  placeholder="Link "></div><div class="col-md-1 pl0 web_mt"><a class="delete_web" onclick="remove_social(' + hidden_val + ')"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></a></div></div>';
       $("#social_div_append").append(htm);
        validateUrl($);


    });



    function remove_social(id)
    {
       $("#social_hidden_" + id).hide();
       $("#social_hidden_" + id).remove();
    }

    $(".delete_web").click(function(){
       var id = this.id;
       id = id.split("_");
       var cnfrm = confirm("Are you sure you want to delete this record?");
       if(cnfrm)
       {
            if(id[1] > 0)
            {
                $.post("<?php echo CController::createUrl('/supplier/delete_social_media');?>",{id:id[1]},function(response){
                  location.reload();
                }) ;



            }
       }
    });
    
    function validateUrl($)
    {
        $(":input").focusout(function(){
        	$(this).parsley().validate();
        });
    }
    
 </script>
