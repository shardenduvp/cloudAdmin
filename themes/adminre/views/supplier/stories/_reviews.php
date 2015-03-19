
<?php
$ratingAbbr = array("Bad","Average","Good","Excellent","Outstanding",'Extremely Outstanding');
$allreference = SuppliersHasReferences::model()->findAllByAttributes(array('suppliers_id'=>yii::app()->user->supplierProfileId,'suppliers_has_portfolio_id'=>base64_decode(Yii::app()->request->getParam('sid'))));
 ?>
   <ul id="draggablePanelList4" class="list-unstyled mt30 ui-sortable">
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
                    <span class=" label-teal pt0 pb0 font_light"><?php //echo $this->reviewStatus[$review->status] ?></span>
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
					<a style="display: none;" aria-expanded="false" class="btn btn-default highlight pa10 pl20 pr20" href="javascript:void(0)" onclick="viewreview('<?php echo base64_encode($review->id); ?>')">
        				<span class="fa fa-plus-circle fa-lg"></span>View Review
    				</a>
                    <?php if($review->status ==1 || $review->status==2){ ?>
                    <a style="display: none;" aria-expanded="false" class="btn btn-default highlight pa10 pl20 pr20 hide" href="javascript:void(0)" onclick="publishreview('<?php echo base64_encode($review->id); ?>')">
                        <span class="fa fa-plus-circle fa-lg"></span>Publish
                    </a>
                    <?php } ?>
                   <?php }else{ ?>
					<a style="display: none;" aria-expanded="false" class="btn btn-default highlight pa10 pl20 pr20" href="<?php echo CController::createUrl('/supplier/sendReviewFollowup',array('referenceId'=>base64_encode($review->id),'action'=>'follow')); ?>">
        				<span class="fa fa-plus-circle fa-lg"></span>Send Reminder to <?php echo $review->client_email; ?>
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