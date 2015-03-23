<?php
$location = UsersOffices::model()->findByAttributes(array(
	"user_id"=>$suppliers->users->id,
	"dep_id"=>1
	),
	array(
    'order' => 'id asc',
    'limit' => 1

));

 ?>

<div class="modal fade" id="share_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <?php echo $this->renderPartial("../supplier/profile/_shareprofile"); ?>
        </div>
    </div>
</div>


<div class="white_outer">
	<div class="container">
		<div class="row">
			<div class="col-md-12 "><h3>My Profile</h3>
                <div class="pull-right">
                    <a class="btn btn-primary" data-toggle="modal" data-target="#share_modal">Share Profile </a>
                </div>
            </div>
		</div>
	</div>
</div>   




<div class="dark-wrapper">
	<div class="container inner">
    
      <div class="col-md-12 pa0 pt10 pb10" style="min-height: 120px;">
             <?php
        if($suppliers->offers!="")
        {
            ?>
                <div class="col-md-12 ">

                    <div class="position_set_offer text-center pa10  bg-default"><?php echo $suppliers->offers; ?></div>

                </div>
                <div class="clearfix"></div>
            <?php
        }
         ?>
    
            <?php
            $cover_img = $suppliers->cover;
            if($cover_img!="")
            {
                ?>
                <img src="<?php echo $cover_img; ?>" class="cover_img" alt="" height="267" />
                <?php
            }
             ?>



        </div>


		<div class="row">
        	<?php if(Yii::app()->user->hasFlash('record')){?>
				<div class="alert alert-success" id="repsoneRest2">
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">X</button>
					<p id="messageResponse2">
					<strong><?php echo Yii::app()->user->getFlash('record'); ?></strong></p>
				</div>
			<?php } ?>
            <div class="col-md-3 border_style_div" >
                <div class="col-md-12 border_b pa0 pb15 ">
                <h4 class="mb15"><?php echo $users->company_name; ?></h4>
                <div class="col-md-4 text-left">
                    <?php
                        $avtar_img = Yii::app()->theme->baseUrl."/style/images/avatar.png";
						$profile_img = $avtar_img;
						if(!empty($suppliers->image))
						{
							$profile_img = $suppliers->image;
						}
					?>
                    <img src="<?php echo $profile_img; ?>" alt="" class="img-circle mt10" width="60" />
                </div>
                <div class="col-md-8">
                    <h5 class="font_size10"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <?php echo (empty($location)?"----":$location->city->name.", ".$location->city->countries->name); ?></h5>
                    <h5 class="font_size10"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><?php echo $suppliers->number_of_employee; ?> Employees</h5>
                    <h5 class="font_size10"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Founded in <?php echo $suppliers->foundation_year; ?></h5>
                    <h5 class="font_size10"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>----</h5>
                </div>
            </div>
            
            <div class="col-md-12 border_b pa0 pb15 pt15 ">
                <div class="col-md-4 border-r text-center pa10"><h4 class="pb0">0</h4><small>Rating</small></div>
                <div class="col-md-4 border-r text-center pa10"><h4 class="pb0">$<?php echo $suppliers->project_size; ?></h4><small>Avg. Project Size (in USD)</small></div>
                <div class="col-md-4 text-center pa10"><h4 class="pb0">$<?php echo $suppliers->per_hour_rate; ?></h4><small>Avg. Per Hour Rate (in USD)</small></div>
            </div>
            <div class="col-md-12 pa15 text-left">
                <h4>ABOUT</h4>
                <p style="text-align: justify;font-size: 12px;">
                    <?php echo $suppliers->about_company; ?>
                </p>

            </div>
            
            <div class="col-md-12 pa15 border_b text-left">
                <h4>Focus</h4>
                <font class="font_size10">
                    <?php
                        echo $allSkills;
                     ?>
                 </font>
                 
           </div>
			<div class="col-md-12 pa15 text-left">
                <h4>Charts</h4>
                <div id="industries_chart" style="height:100%; width:100%"></div>
                <div id="skills_chart"></div>
                <div id="services_chart"></div>
                <div id="project_size_chart"></div>
            </div>
            
        </div>
        
        
            <div class="col-md-9" >
			<div role="tabpanel">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#stories" aria-controls="home" role="tab" data-toggle="tab">Project/Stories (<?php echo count($stories); ?>)</a></li>
    				<li role="presentation" ><a href="#home" aria-controls="home" role="tab" data-toggle="tab">People (<?php echo count($team_users); ?>)</a></li>
                    <li role="presentation"><a href="#projectReviews" aria-controls="projectReviews" role="tab" data-toggle="tab">Reviews (<?php echo count($allreferenceactive); ?>)</a></li>
    				<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Awards & Certifications (<?php echo count($awards_listing); ?>)</a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
                
                	<div role="tabpanel" class="tab-pane active" id="stories">
						<div class="row">
                            <div class="col-md-12">

                                  <?php if(count($stories) > 0){
                                        for($i=0;$i<count($stories);$i++)
                                        {
                                            
                                            $proImg = Yii::app()->theme->baseUrl."/style/images/avatar.png";
                                            if($stories[$i]->image!="")
                                            {
                                                $proImg = $stories[$i]->image;
                                            }
                                            
                                            $portfolioImg = Yii::app()->theme->baseUrl."/style/images/avatar.png";
            
                                            foreach($stories[$i]->suppliersPortfolioImages as $portImg)
                                            {
                                                $portfolioImg = $portImg->image;
                                                break;
                                            }
                                            
                                         
                                        ?>
                                            <div class="col-md-4 mt10" >
                                                <div class="storiesDetail" id="st_<?php echo $stories[$i]->id; ?>" style="border: 1px solid #e2e2e2;padding: 4px;">
                                                    <div id="portImg_<?php echo $stories[$i]->id; ?>">
                                                        <img src="<?php echo $portfolioImg; ?>" width="240" height="180" />
                                                    </div>
                                                    <div class="awarddesc" id="portDesc_<?php echo $stories[$i]->id; ?>" style="display: none;width: 100%;height: 180px;"> <?php echo $stories[$i]->description; ?></div>
                                                   
                                                    <div> 
                                                        <b> <?php echo ($stories[$i]->is_discreet==0)?$stories[$i]->project_name:"Undisclosed"; ?> </b>
                                                        
                                                        <?php
                                                        
                                                        if($stories[$i]->portfolio_type=="0")
                                                        {
                                                            $portImg = Yii::app()->theme->baseUrl."/style/images/avatar.png";
                                                            if($stories[$i]->image!="")
                                                            {
                                                                $portImg = $stories[$i]->image;     
                                                            }
                                                            
                                                            
                                                            ?>
                                                            <hr />
                                                            <img width="50" alt="" class="img-circle  ma5" src="<?php echo $portImg; ?>"/> <?php echo ($stories[$i]->is_discreet==1)?$stories[$i]->project_name:$stories[$i]->company_name; ?> , 
                                                            <?php
                                                            if(isset($stories[$i]->location))
                                                            {
                                                                $selectedCity = Cities::model()->findByAttributes(array("id"=>$stories[$i]->location));
                                                                echo $selectedCity->name;    
                                                            }
                                                            
                                                             ?>
                                                            
                                                            <?php
                                                        }
                                                         ?>
                                                       
                                                         <?php
                                                        $condition	    =	array('suppliers_has_portfolio_id'=>$stories[$i]->id);
                                                        $skillsList	    =	SuppliersHasPortfolioHasSkills::model()->findAllByAttributes($condition);
                                                        $industryList	=	SuppliersPortfolioHasIndustries::model()->findAllByAttributes($condition);
                                                        $servicesList	=	SuppliersHasPortfolioHasServices::model()->findAllByAttributes($condition);
                                                        $portSkills = "";
                                                        if(count($skillsList) > 0)
                                                        {
                                                            echo "<hr>";
                                                            for($j=0;$j<count($skillsList);$j++)
                                                            {
                                                                $portSkills .=", ".$skillsList[$j]->skills->name;        
                                                            }
                                                        }
                                                        
                                                        if(count($industryList) > 0)
                                                        {
                                                            echo "<hr>";
                                                            for($j=0;$j<count($industryList);$j++)
                                                            {
                                                                $portSkills .=", ".$industryList[$j]->industries->name;        
                                                            }
                                                        }
                                                        
                                                        if(count($servicesList) > 0)
                                                        {
                                                            echo "<hr>";
                                                            for($j=0;$j<count($servicesList);$j++)
                                                            {
                                                                $portSkills .=", ".$servicesList[$j]->services->name;        
                                                            }
                                                        }
                                                        
                                                        
                                                            echo "<font class='font_size10'>".substr($portSkills,1,strlen($portSkills))."</font>";
                                                        
                                                          ?>
                                                         
                                                    </div>
                                                </div>
                                            </div>
                                       <?php
                                       }
                                   }
                                    ?>     
                                  </div>
						</div>
					</div>
                
					<div role="tabpanel" class="tab-pane" id="home">
						<div class="row">
                            <?php foreach($team_users as $member) { ?>
                            <div class="col-md-3 pr0" id="<?php echo 'mem_'.$member->id; ?>">
                                <div class="team_class pt15">
                                <?php
                                $member_img = Yii::app()->theme->baseUrl."/style/images/avatar.png";
                                if($member->image!="")
                                {

                                    $member_img = $member->image;
                                }
                                ?>
                                    <img src="<?php echo $member_img; ?>" class="img-circle  ma5" alt="" width="50" />


                                    <span class="pull-right pa5">
                                        <?php echo $member->name; ?> <br/>
                                        <p><small> Designation : <?php echo $member->designation; ?></small><br>
                                        <small> Department : <?php echo $member->dep; ?></small></p>
                            			<?php echo (empty($member->facebook)?"":Chtml::link('FB',$member->facebook,array('target'=>'_blank'))); ?>
                            			<?php echo (empty($member->twitter)?"":Chtml::link('t',$member->twitter,array('target'=>'_blank'))); ?>
                            			<?php echo (empty($member->linkedin)?"":Chtml::link('Li',$member->linkedin,array('target'=>'_blank'))); ?>
                            			<span class="ico-facebook-sign"></span>
                                    </span>
                                </div>
                            </div>
                            <?php } ?>
						</div>
					</div>
                    <div role="tabpanel" class="tab-pane" id="projectReviews">
						<div class="row"><br />
                           <?php
                           $allreference = $allreferenceactive;
                           $ratingAbbr = array("Bad","Average","Good","Excellent","Outstanding",'Extremely Outstanding');
                           $allreference = SuppliersHasReferences::model()->findAllByAttributes(array('suppliers_id'=>$suppliers->id));
                          
                            ?>
                                    <?php if(!empty($allreference)){ ?>
                            			<?php foreach($allreference as $review){ 
                            			 //CVarDumper::Dump($review,10,1);die;
                                         ?>
                                    	<li class="panel-white col-md-12 pl0 pr20 mt15" style="position: relative;border:1px solid grey;">
                                        <div class="panel-heading ui-sortable-handle"><span class="fa fa-bars"></span>
                                        </div>
                                        <div class="col-sm-12 bgwhite col-md-12 user-details pa10 pt0 ">
                                            <div class="col-md-3 text-center">
                                                <?php
                                                $imageurl = "";
                                                $avtar_img=Yii::app()->theme->baseUrl."/style/images/avatar.png"; 
                                                if($review->is_unattributed==1){
                                                    $imageurl = $avtar_img;
                                                }else
                                                {
                                                    if($review->review_type == 1){
                                                        $imageurl=(empty($review->suppliers->image)?$avtar_img:$review->suppliers->image);
                                                    }
                                                    else
                                                        $imageurl=(empty($review->clientProfiles->image)?$avtar_img:$review->clientProfiles->image);
                            
                                                }
                            
                                                 ?>
                                                <img src="<?php echo (empty($imageurl)?$avtar_img:$imageurl); ?>" class="img-circle" height="50" width="50">
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
                                               <span class=" label-teal pt0 pb0 font_light"> <small class="font_11">Status: <?php //echo ($review->status==0?$this->reviewStatus[$review->status]." on ".(date("Y-m-d",strtotime($review->add_date))):( $this->reviewStatus[$review->status].", Last Updated ".(date("Y-m-d",strtotime($review->modified))))); ?></small></span>
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
					    </div>
				    </div>
					<div role="tabpanel" class="tab-pane" id="profile">
						<div class="row"><br />
                        
							<div class="col-md-12 ">
                                <?php
                                if(count($awards_listing) > 0)
								{
    							?>

        								<div class="col-md-12 pa0">

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

                                                                <?php echo $awards_listing[$i]->description; ?>

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
						
						   
                        
						</div>
					</div>
				</div>
			</div>
            </div>			
		</div>
	</div>
<!-- /.container --> 
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

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      
      
      <?php
      if($industriesJson!="")
      {
        echo "google.setOnLoadCallback(industries_chart);";  
      }
      if($serviceJson!="")
      {
        echo "google.setOnLoadCallback(services_chart);";  
      }
      if($skillsJson!="")
      {
        echo "google.setOnLoadCallback(project_size_chart);";
      }
       ?>
      

      function services_chart() {
		  var data = google.visualization.arrayToDataTable([
			 <?php echo $serviceJson; ?>
			]);
         
         
         
        var options = {
          title: 'Distribution : BY Services',
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('services_chart'));
        chart.draw(data, options);
      }
	 function project_size_chart() {
        var data = google.visualization.arrayToDataTable([
         <?php echo $skillsJson; ?>
        ]);

        var options = {
          title: 'Distribution : BY PROJECT SIZE (IN USD)',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('project_size_chart'));
        chart.draw(data, options);
      }
      function industries_chart() {
        var data = google.visualization.arrayToDataTable([
          <?php
          echo $industriesJson;
           ?>
        ]);

        var options = {
          title: 'Distribution : By Industires ',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('industries_chart'));
        chart.draw(data, options);
      }
    </script>

<script>
    $(document).ready(function(){
        $(".storiesDetail").hover(function(){
            var id = this.id;
            id = id.split("_");
            $("#portImg_" + id[1]).hide();
            $("#portDesc_" + id[1]).show();
         },function(){
            var id = this.id;
            id = id.split("_");
            $("#portDesc_" + id[1]).hide();
            $("#portImg_" + id[1]).show();
         });
    });
</script>
