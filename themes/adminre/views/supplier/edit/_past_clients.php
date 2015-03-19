<?php
	$SupplierReferences = new SuppliersHasReferences;
	$ratingAbbr = array("Bad","Average","Good","Excellent","Outstanding",'Extremely Outstanding');
    //CVarDumper::dump(Yii::app()->controller->action->id,10,1 );die;
    $diplayButton =1;
    $allreference =array();
    $criteria = new CDbCriteria();
    $criteria->join ='LEFT JOIN suppliers_has_portfolio ON suppliers_has_portfolio.id = t.suppliers_has_portfolio_id';
    
    if(Yii::app()->controller->action->id=='profile'){
        $criteria->condition = 'suppliers_has_portfolio.status = :status and t.suppliers_id = :supplierid and t.status in (:statusref)';
        $criteria->params = array(":status" => "1",":supplierid"=>Yii::app()->user->supplierProfileId,':statusref'=>"2,3");
        //$allreference = SuppliersHasReferences::model()->findAllByAttributes(array('suppliers_id'=>yii::app()->user->supplierProfileId,"status"=>array('1','2')));
        $diplayButton =0;
    }
    else{
        $criteria->condition = 'suppliers_has_portfolio.status = :status and t.suppliers_id = :supplierid ';
        $criteria->params = array(":status" => "1",":supplierid"=>Yii::app()->user->supplierProfileId);
    }
    //CVarDumper::dump($criteria,10,1);die;
    $allreference = SuppliersHasReferences::model()->findAll($criteria);
    //CVarDumper::dump($allreference,10,1);die;

?>



<div class="modal fade" id="bs-view-review" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">View Review</h4>
        </div>
		 <div class="panel-body" >
			 <!--Review will come through AJAX-->

		</div>
	</div>
</div>

</div>


<div class="modal fade" id="bs-request-review" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Request a Review</h4>
            </div>

        <?php $form=$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/supplier/editprofile'),'id'=>'past-client-supplier', 'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('class'=>"panel panel-default form-horizontal form-bordered",'data-parsley-validate'=>'data-parsley-validate'))); ?>

        <!-- panel body -->
        <div class="panel-body">
            <div class="form-group hideselfreview">
                <label class="col-sm-4 control-label">Client Name
                    <span class="text-danger">*</span>
                </label>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-6">

                            <?php echo $form->textField($SupplierReferences,'client_first_name',array('placeholder'=>"First Name",'class'=>'form-control','required'=>'required','data-parsley-minlength'=>'2')); ?>
                            <?php echo CHtml::hiddenField('ajax' ,'false');  ?>

                        </div>
                        <div class="col-sm-6">
						<?php echo $form->textField($SupplierReferences,'client_last_name',array('placeholder'=>"Last Name",'class'=>'form-control','required'=>'required')); ?>
						</div>
                    </div>
                </div>
            </div>
            <div class="form-group hideselfreview">
                <label class="col-sm-4 control-label">Email
                    <span class="text-danger">*</span>
                </label>
                <div class="col-sm-8">
                    <?php echo $form->textField($SupplierReferences,'client_email',array('placeholder'=>"Client Email",'class'=>'form-control','required'=>'required')); ?>
                </div>
            </div>
			 <div class="form-group">
                <label class="col-sm-4 control-label">Project
                    <span class="text-danger">*</span>
                </label>
                <div class="col-sm-8">
                    <?php
                    $allActivePortfolio = SuppliersHasPortfolio::model()->findAllByAttributes(array('status' =>'1'  ));
					$projectList = CHtml::ListData($allActivePortfolio,'id','project_name');
					$htmlOption = array('size'=>'1','prompt'=>'Select Project...',"class"=>'required');
					 echo $form->dropDownList($SupplierReferences, 'suppliers_has_portfolio_id', $projectList, $htmlOption);

					?>
                </div>

            </div>
			 <div class="panel-footer">
                        <div class="form-group no-border pt0 pb0">

                            <div class="col-sm-12  ">
								<button type="button" class="btn btn-default pull-right mr10 ml10" data-dismiss="modal">Cancel</button>
			<?php echo CHtml::submitButton( 'Request Review',array( 'class'=>'btn btn-primary bm0 pull-right','tabindex'=>'5')); ?>
							</div>
				 </div>
			</div>

        </div>
         </div>
    </div>
    <?php $this->endWidget(); ?>
</div>

<div class="col-md-12 border_style_div mt15">
    <?php if($diplayButton){ ?>

    <a href= "javascript:void(0)" aria-expanded="false" class="btn btn-default highlight pa10 pl20 pr20"  data-write = "public" onclick="writereview('public')">
        <span class="fa fa-plus-circle fa-lg"></span>Request Review
    </a>
    <a href= "javascript:void(0)" aria-expanded="false" href="" class="btn btn-default highlight pa10 pl20 pr20 ml15"  onclick="writereview('self')">
        <span class="fa fa-pencil-square-o fa-lg"></span> Write Self Review
    </a>
    <?php } ?>
    <div class="hide" id="hidden_past_client">
        <div>
                <li class="panel-white col-md-12 pl0 pr20 mt15" style="position: relative;border:1px solid grey;">
                    <div class="panel-heading ui-sortable-handle"><span class="fa fa-bars"></span>
                    </div>
                    <div class="col-sm-12 bgwhite col-md-12 user-details pa10 pt0 ">
                        <div class="col-md-3 text-center">
                            <img src="<?php echo $this->res['avtar']; ?>" class="img-circle" height="50" width="50">
                            <h3 class="mb5 mt15 dummy_client_first_name"></h3>
                    
                        </div>
                        <div class="col-md-8 pb15 mb10 progress-border pl25">
                            <h2 class="col-sm-12 np nm mt10 mb10 display_inline dummy_project_name">  </h2>
                           <span class=" label-teal pt0 pb0 font_light "> <small class="font_11 dummy_project_date">Status: <?php echo $this->reviewStatus[0]; ?></small></span>
                           <br/>
                            <a aria-expanded="false" class="btn btn-default highlight pa10 pl20 pr20" href="<?php echo CController::createUrl('/supplier/sendReviewFollowup',array('referenceId'=>'','action'=>'follow')); ?>">
                                <span class="fa fa-plus-circle fa-lg dummy_remider">Send Reminder to</span> 
                            </a>            
                        </div>
                    </div>
                </li>
        </div>
    </div>
    <ul id="draggablePanelList4" class="list-unstyled mt30 ui-sortable">
        

        <!-- ///////// -->
        <?php if(!empty($allreference)){ ?>
			<?php foreach($allreference as $review){ ?>
        	<li class="panel-white col-md-12 pl0 pr20 mt15" style="position: relative;border:1px solid grey;">
            <div class="panel-heading ui-sortable-handle"><span class="fa fa-bars"></span>
            </div>
            <div class="col-sm-12 bgwhite col-md-12 user-details pa10 pt0 ">
                <div class="col-md-3 text-center">
                    <?php
                    $imageurl = "";
                    if($review->is_unattributed==1){
                        $imageurl = $this->res['avtar'];
                    }else
                    {
                        if($review->review_type == 1){
                            $imageurl=(empty($review->suppliers->image)?$this->res['avtar']:$review->suppliers->image);
                        }
                        else
                            $imageurl=(empty($review->clientProfiles->image)?$this->res['avtar']:$review->clientProfiles->image);

                    }

                     ?>
                    <img src="<?php echo (empty($imageurl)?$this->res['avtar']:$imageurl); ?>" class="img-circle" height="50" width="50">
                    <h3 class="mb5 mt15"><?php echo ($review->is_unattributed==1 ?"Unattributed":$review->client_first_name); ?></h3>
                    <p class="profile_text mb5"><?php echo ($review->is_unattributed==1?$review->tag_line:(empty($review->clientProfiles->users->company_name)?"":$review->clientProfiles->users->company_name)); ?>
                        <br>
                    </p>
                    <span class=" label-teal pt0 pb0 font_light"><?php echo $review->review_type==1?CHtml::link('Edit | ', array('supplier/selfReview','id'=>$review->id)):""; ?></span> 
                    <span class=" label-teal pt0 pb0 font_light"><?php echo $review->review_type==1?"Self Reviewd":""; ?></span>
					</p>
                    <?php if($review->status >0 && $review->review_type==0){?>

                    <p id="reportissue_<?php echo $review->id; ?>"><a href="javascript:void(0)" onclick="reportissue('<?php echo base64_encode($review->id); ?>','<?php echo $review->id; ?>')">Report Issue</a></p>


                    <?php } ?>
				

                </div>
                <div class="col-md-8 pb15 mb10 progress-border pl25">
                    <h2 class="col-sm-12 np nm mt10 mb10 display_inline">  For <b><?php echo $review->suppliersHasPortfolio->project_name; ?></b></h2>
                   <span class=" label-teal pt0 pb0 font_light"> <small class="font_11">Status: <?php echo ($review->status==0?$this->reviewStatus[$review->status]." on ".(date("Y-m-d",strtotime($review->add_date))):( $this->reviewStatus[$review->status].", Last Updated ".(date("Y-m-d",strtotime($review->modified))))); ?></small></span>
                   <br/>



                   <?php
						$overall = array();
						if(!empty($review->suppliersHasCategoryRatings)){
                            foreach($review->suppliersHasCategoryRatings as $rating){
                                $overall[]=$rating->rating;	?>
					
                    <div class="col-sm-12 np mt15">
                        <div class="col-sm-3 progress-text np"><?php echo $rating->reviewCategory->name ?></div>
                        <div class="col-sm-9 np">
                            <div class="progress progress-height nm">
                                <div class="progress-bar progress-bar-primary font_bold" role="progressbar" aria-valuenow="<?php echo $rating->rating ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rating->rating*20; ?>%;"><?php echo $rating->rating;?></div>
                            </div>
                        </div>
                    </div>
					<?php } ?>
                    <br/>
					<a aria-expanded="false" class="btn btn-default highlight pa10 pl20 pr20" href="javascript:void(0)" onclick="viewreview('<?php echo base64_encode($review->id); ?>')">
        				<span class="fa fa-plus-circle fa-lg"></span>View Review
    				</a>
                    <?php if($review->status ==1 || $review->status==2){ ?>
                    <a aria-expanded="false" class="btn btn-default highlight pa10 pl20 pr20 hide" href="javascript:void(0)" onclick="publishreview('<?php echo base64_encode($review->id); ?>')">
                        <span class="fa fa-plus-circle fa-lg"></span>Publish
                    </a>
                    <?php } ?>
                   <?php }else{ ?>
					<a aria-expanded="false" class="btn btn-default highlight pa10 pl20 pr20" href="<?php echo CController::createUrl('/supplier/sendReviewFollowup',array('referenceId'=>base64_encode($review->id),'action'=>'follow')); ?>">
        				<span class="fa fa-plus-circle fa-lg"></span>Send Reminder to <?php echo $review->client_first_name; ?>
    				</a>
                   <?php } ?>


						 <?php if(!empty($overall)){ ?>
						<h4 class="display_inline ml5 mt0 light_grey mt15">
						<span class=" label-teal pa5 pl10 pr10"><?php  $totalRating =array_sum($overall)/count($overall);echo number_format($totalRating,1); ?></span>
							<?php echo $ratingAbbr[ceil($totalRating)]; ?>  </h4>
					<?php } ?>
                </div>
            </div>
        </li>
			<?php } ?>
        <?php } ?>
    </ul>
</div>


<script type="text/javascript">
$(document).ready(function(){
    $pastclientform = $("#past-client-supplier");
    var formparsley = $pastclientform.parsley();
    
    $pastclientform.find("input:submit").on('click ',function(e){
        //e.preventDefault();
        console.log('true',formparsley.isValid());
        if(formparsley.isValid())
        {
            console.log("ajax val ",$pastclientform.find("#ajax").val())
            if($pastclientform.find("#ajax").val() == 'true')
            {
                $pastclientform.find('input:submit').attr("disabled",'disabled');
                $.ajax({
                    type:'POST',
                    data:$pastclientform.serialize(),
                    url:"<?php echo CController::createUrl('/supplier/editprofile');?>",
                    success:function(data)
                    {     
                        if(data){                   
                            var htm = $("#hidden_past_client").html()  ;
                            console.log(data);
                            dummypastclient = $(htm);
                            var project_name =$pastclientform.find("#SuppliersHasReferences_suppliers_has_portfolio_id option:selected").text()
                            var client_name = $pastclientform.find("#SuppliersHasReferences_client_first_name").val();
                            var projectstatus = dummypastclient.find('.dummy_project_date').html();
                            var remindertext = dummypastclient.find('.dummy_remider').html();
                            dummypastclient.find('.dummy_project_name').html("For " +project_name);
                            dummypastclient.find('.dummy_client_first_name').html(client_name);
                            dummypastclient.find('.dummy_project_date').html(projectstatus + " " +moment().format("YYYY-MM-DD"));
                            dummypastclient.find('.dummy_remider').html(remindertext+ " " + client_name);
                            var anchor = dummypastclient.find('.dummy_remider').closest('a').attr('href');
                            anchor = anchor.replace('referenceId=','referenceId='+data);
                            dummypastclient.find('.dummy_remider').closest('a').attr('href',anchor);

                            console.log(dummypastclient.html());
                            $("#draggablePanelList4").append(dummypastclient.html());
                            $('#bs-request-review').modal('hide');
                            $pastclientform.find('input:submit').removeAttr("disabled");
                            $pastclientform.find('input:text').val('');
                        }
                        else{
                            alert('Something went wrong!');
                        }
                        
                    },
                    error: function(a,b,c){
                        console.log("Errors found : " +JSON.stringify(a) +" | " +b + " | " + c);
                    }
                });
                return false;

            }else{
                console.log("inside else" + $pastclientform.find("#ajax").val());
                return true;
                $pastclientform.submit();              

            }
        }

      
        
    });
/*$pastclientform.on('submit',function(e){
        e.preventDefault();
        
        if(formparsley.isValid())
        {
            console.log('submitting');
            if($pastclientform.find("#ajax").val() == 'true')
            {
               return false;
            }else{
                //return true;
            }

        }
       
        
    });*/


});
function viewreview(id){
	$.ajax({
			type:'POST',
			data:'id='+id,
			url:"<?php echo CController::createUrl('/supplier/references');?>",
			success:function(data)
			{
                console.log(data);
				$("#bs-view-review .panel-body").html(data);
				var options = {
					"backdrop" : "static"
				};
				$("#bs-view-review").modal(options);
				console.log("finsishes all tasks");
			},
			error: function(a,b,c){
				console.log("Errors found : " +JSON.stringify(a) +" | " +b + " | " + c);
			}
		});


}

function publishreview(id){
    $.ajax({
            type:'POST',
            data:'id='+id,
            url:"<?php echo CController::createUrl('/supplier/publishreview');?>",
            success:function(data)
            {
                console.log(data);
                $("#bs-view-review .panel-body").html(data);
                var options = {
                    "backdrop" : "static"
                };
                $("#bs-view-review").modal(options);
                console.log("finsishes all tasks");
            },
            error: function(a,b,c){
                console.log("Errors found : " +JSON.stringify(a) +" | " +b + " | " + c);
            }
        });

}
	function writereview(typereview)
	{
		if(typereview == "self")
		{
			$("#bs-request-review input:text").attr("disabled","disabled").removeClass('required').removeAttr("required");
            $(".hideselfreview").addClass("hide");
            $("#bs-request-review input:submit").val("Write a Self Review");
            $("#bs-request-review").find("#ajax").val("false");  
            $("#bs-request-review").find("#myModalLabel").html("Write a Self Review");
                    

		}else
        {
            $("#bs-request-review input:text").removeAttr("disabled").addClass('required');
            $("#bs-request-review input:submit").val("Request Review");
            $(".hideselfreview").removeClass("hide");
            $("#bs-request-review").find("#ajax").val("true");  
            $("#bs-request-review").find("#myModalLabel").html("Request a Review ");  
              
                     
            
        }
		var options = {
					"backdrop" : "hidden"
		};
		$("#bs-request-review").modal(options);
	}
	function reportissue(d,b)
	{
		$("#reportissue_"+b).html("Reported Issue");
		$.ajax({
			type:'POST',
			data:'id='+d,
			url:"<?php echo CController::createUrl('/supplier/reportIssue');?>",
			success:function(data)
			{
                console.log(data);

			},
			error: function(a,b,c){
				console.log("Errors found : " +JSON.stringify(a) +" | " +b + " | " + c);
			}
		});
	}

</script>




