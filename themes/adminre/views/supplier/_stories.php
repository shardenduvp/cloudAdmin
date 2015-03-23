<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/selectize/css/selectize.css" />
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/selectize/js/selectize.min.js"></script>
<div class="white_outer">
	<div class="container">
		<div class="row">
			<div class="col-md-12"><h3>Portfolio</h3></div>
		</div>
	</div>
</div>

<div class="dark-wrapper">
	<div class="container inner">
		<div class="row">
            <div class="col-md-3"></div>
           
            <div class="col-md-9">
            <div class="col-md-12">
                <div class="col-md-10"></div>
                <div class="col-md-2"><?php echo CHtml::link('<button type="button" class="btn btn-primary  text-center model_text" >Edit Profile</button>', array('/supplier/editprofile'));?></div>
            </div>

                <div role="tabpanel">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" id="clientStory_id" class="active"><a href="#clientStory" aria-controls="home" role="tab" data-toggle="tab">Client Story</a></li>
                        <li role="presentation" id="off_id"><a href="#off" aria-controls="profile" role="tab" data-toggle="tab">Off the Shelf Product</a></li>
                        <li role="presentation" id="openSource_id"><a href="#openSource" aria-controls="messages" role="tab" data-toggle="tab">Open Source Project</a></li>
                     </ul>
                     <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="clientStory">
                                
                                <?php echo $this->renderPartial("stories/_clientstories",array("stories"=>$stories,"industries"=>$industries,'selecetedIndustries'=>$selecetedIndustries,'selecetedSkills'=>$selecetedSkills,'skills'=>$skills,'services'=>$services,'selectedServices'=>$selectedServices)); ?>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="off">
                                
                                <?php echo $this->renderPartial("stories/_storiesrender",array("stories"=>$stories,"isOff"=>false,"industries"=>$industries,'selecetedIndustries'=>$selecetedIndustries,'selecetedSkills'=>$selecetedSkills,'skills'=>$skills,'services'=>$services,'selectedServices'=>$selectedServices)); ?>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="openSource">
                               
                                <?php echo $this->renderPartial("stories/_storiesrender",array("stories"=>$stories,"isOff"=>true,"industries"=>$industries,'selecetedIndustries'=>$selecetedIndustries,'selecetedSkills'=>$selecetedSkills,'skills'=>$skills,'services'=>$services,'selectedServices'=>$selectedServices)); ?>
                            </div>
                     </div>
                
                </div>
                
            </div>
            
            

		</div>
	</div>
<!-- /.container -->
</div>


<?php
	if(isset($_REQUEST['page']))
	{
	   if($_REQUEST['page'] == 1)
       {
            echo "
			<script>
				$(document).ready(function(){
					$('.nav-tabs a[href=#off]').tab('show') ;
                    $('#openSource_id').hide();
                    $('#clientStory_id').hide();
				});
			</script>
	       	";
       }elseif($_REQUEST['page'] == 2)
       {
             echo "
			<script>
				$(document).ready(function(){
					$('.nav-tabs a[href=#openSource]').tab('show') ;
                    $('#off_id').hide();
                    $('#clientStory_id').hide();

				});
			</script>
	       	";
       }else{
             echo "
			<script>
				$(document).ready(function(){
					$('.nav-tabs a[href=#clientStory]').tab('show') ;
                    $('#off_id').hide();
                    $('#openSource_id').hide();
				});
			</script>
	       	";
       }
		
	}
?>
<script>


function lodaFilepicker($)
{
     deleteImgs("docs-client");
     deleteImgs("docs-open-form");
     deleteImgs("docs-off-form");
}

function deleteImgs(hiddenId)
{
    $(".deleteScreen").click(function(){
        var id = this.id;
        id = id.split("##");
        var selectedImages = $("#" + hiddenId).val();
        selectedImages = selectedImages.replace(id[0],"");
        $("#" + hiddenId).val(selectedImages);
        $("#delImg_" + id[1]).hide();
     }); 
}


function skillsSelectize(id)
{
     $("#" + id).selectize({
    	delimiter: ",",
    	persist: false,
    	create: function (input) {
    		$.ajax({
    			type:'POST',
    			url:"<?php echo CController::createUrl("/supplier/createSkill");?>",
    			data : 'name='+input,
    			success: function(id){		}
    		});
    		return {
    			value: input,
    			text: input
    		}
    	}
    });
}

function allscreenshots(id,doc,screenshots)
{
    $('#' + id).click(function(){
        filepicker.setKey("<?php echo $this->filpickerKey; ?>");
    	filepicker.pickMultiple({mimetypes: ['image/*', 'text/plain', 'application/pdf'],},
    	function(InkBlob){
    		for(i in InkBlob){
    		  
    			var docs = $('#' + doc).val();
                var delDoc = InkBlob[i].mimetype+"|"+InkBlob[i].filename+"|"+InkBlob[i].size+"|"+InkBlob[i].url;
    			docs = docs+InkBlob[i].mimetype+"|"+InkBlob[i].filename+"|"+InkBlob[i].size+"|"+InkBlob[i].url+",";
        		$('#' + doc).val(docs);
    			var data = '<tr id="delImg_'+ i +'"><td><span class="label label-success">'+InkBlob[i].mimetype+'</span>'+InkBlob[i].filename+'('+Math.round(((InkBlob[i].size)/1024),2)+' KB)</td><td><a href="'+InkBlob[i].url+'" target="_blank">View</a></td><td>&nbsp;&nbsp;<a id="'+ delDoc + "##" + i +'" class="deleteScreen">Delete</a></td></tr>';
    			$('#' + screenshots).append(data);
                lodaFilepicker($);
                autoSaveClient("client-form");
    		}
    		console.log($('#' + doc).val());
    	},
    	function(FPError){
    		console.log(FPError.toString());
      	}
    	);
    });
}

function dropdownValidation(id,dropId)
{
    $("#" +id).change(function(){
        var dropVal = $("#" + id).val();
        if(dropVal!="")
        {
            $('#' + dropId + ' ul.parsley-errors-list').html('');
        }
    });
}


 $(":input").focusout(function(){
	$(this).parsley().validate();
 });
 
 
 function validateTextbox($)
 {
    $(":input").focusout(function(){
        if($(this).parsley().validate()==true){
             autoSaveClient("client-form");
        }
    });
 }
 
 function allSelectizeSave(id)
 {
   $("#" + id).change(function(){
         autoSaveClient("client-form");
    });
 }
 
 function autoSaveClient(formName)
 {
    <?php
    if(false)
    {
     ?>
    var $form = $("#" + formName);
    var supplier_has_portfolio = $form.parsley();
    if(supplier_has_portfolio.isValid())
    {
        $.ajax({
            type: 'POST',
            data: $form.serialize(),
            url: "<?php echo CController::createUrl('/supplier/stories/'); ?>",
            datatype: "json",
            success: function(data) {
                $("#SuppliersHasPortfolio_id").val(data);
               
            },
            error: function(a, b, c) {
                console.log("Errors : " + JSON.stringify(a) + " | " + JSON.stringify(b) + " | " + JSON.stringify(c));
            }
        });
        
         var dt = new Date();
         var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();$("#auto").html("&nbsp Last Save :" + time);
        
    } 
    <?php
    }
     ?>
 }
    

</script>
<?php
if(false)
{
 ?>
<script>
    $(document).ready(function(){
               
        $("#off-form" ).submit(function(  ) {
            var $form = $("#off-form");
            var supplier_has_portfolio = $form.parsley();
            if(supplier_has_portfolio.isValid())
            {
                $.ajax({
                    type: 'POST',
                    data: $form.serialize(),
                    url: "<?php echo CController::createUrl('/supplier/stories/'); ?>",
                    datatype: "json",
                    success: function(data) {
                        alert("data saved");
                    },
                    error: function(a, b, c) {
                        console.log("Errors : " + JSON.stringify(a) + " | " + JSON.stringify(b) + " | " + JSON.stringify(c));
                    }
                });
            } 
            return false;
        });



    });
 </script>
 <?php
 }
  ?>

