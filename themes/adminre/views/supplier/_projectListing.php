<header class="navbar navbar-fixed-top bg-light np header-left">
	<ol class="breadcrumb p20">
		<li class="crumb-active">
			<a class="fs24 font_newlight" href="dashboard.html">Introductions</a>
		</li>				
	</ol>
</header>
<?php
$pitchIcons = array("1"=>'<span class="icon-users fs30 display_block mb8 dark-blue-new " aria-hidden="true"></span>',"2"=>'<span style="" class="icon-envelope fs30 display_block mb8 dark-blue-new" aria-hidden="true"></span>',"3"=>'<span class="icon-circle-tag"><span aria-hidden="true" class="icon-check fs11"></span></span><span style="" class="icon-doc fs30 display_block mb8 dark-blue-new" aria-hidden="true"></span>',"4"=>'<span class="icon-circle-tag"><span aria-hidden="true" class="icon-eye fs11"></span></span><span style="" class="icon-doc fs30 display_block mb8 dark-blue-new" aria-hidden="true"></span>',"5"=>'<span class="icon-doc fs30 display_block mb8 dark-blue-new" aria-hidden="true"></span>',"6"=>'<span class="icon-circle-tag"><span aria-hidden="true" class="icon-check fs11"></span></span><span style="" class="icon-doc fs30 display_block mb8 dark-blue-new" aria-hidden="true"></span>',"7"=>'<span class="icon-circle-tag"><span aria-hidden="true" class="icon-close fs11"></span></span><span style="" class="icon-doc fs30 display_block mb8 dark-blue-new" aria-hidden="true"></span>',"8"=>'<span class="icon-close fs30 display_block mb8 dark-blue-new" aria-hidden="true"></span>',"9"=>'<span class="icon-users fs30 display_block mb8 dark-blue-new " aria-hidden="true"></span>');
 ?>

<div class="col-md-10 col-md-offset-1 pl25 pr25  mt50">
    <div class="col-md-12  mb30 mt40 pa10">
    	<div class="col-md-6 pr0 pl0 pt15"> <h4 class="fs24 font_newlight mt0">View by status: <span id="searchStatus">All</span></h4></div>
		<div class="col-md-6">
			<div class="demo">
				<div class="control-group mb30">
					<select id="select-beast" class="demo-default" placeholder="Select a person...">
						<option value="">Select a person...</option>
						<option value="4">Thomas Edison</option>
						<option value="1">Nikola</option>
						<option value="3">Nikola Tesla</option>
						<option value="5">Arnold Schwarzenegger</option>
					</select>
				</div>
			</div>
			<select data-live-search="false" class="show-tick btn-default3" id="selectIntroduction">
				<option value="0">View All</option>
				<?php
				for($i=1;$i<8;$i++)
				{
					?>
					<option value="<?php echo $i; ?>"><?php echo $this->pitchStatus[$i]; ?></option>
					<?php
				}
				 ?>
			</select>
		</div>
    </div>

	       <?php
           
				foreach($projects as $project)
				{
					$pitchCount = 0;
				    $anchor = Yii::app()->createUrl('/supplier/conversation',array('pid'=>base64_encode($project->id)));
				    $contactCount = SuppliersProjects::model()->countByAttributes(array('client_projects_id'=> $project->client_projects_id));
					$pitches	 = SuppliersProjects::model()->findAllByAttributes(array('client_projects_id'=> $project->client_projects_id));
					$Pcount = 0;
					foreach($pitches as $pitch)
					{
						$pitchesCount = ProposalPitches::model()->countByAttributes(array('suppliers_projects_id'=> $pitch->id,'status'=>1));
						$Pcount = $Pcount + $pitchesCount;
					}
					$pitchesCount = $Pcount;
					
					$Ocount = 0;
					foreach($pitches as $pitch)
					{
						$offersCount = ProposalPitches::model()->countByAttributes(array('suppliers_projects_id'=> $pitch->id,'status'=>2));
						$Ocount = $Ocount + $offersCount;
					}
					$offersCount = $Ocount;
					
			?>  
            <a href="<?php echo $anchor; ?>">
                <div class="col-md-12 mb30 white np border-all statusClass status_<?php echo $project->status; ?>" >
                    
                		<div class="col-md-12 pl0 pr0 pt25 pb15 tab-top-heading1 " data-animate="fadeIn">
                		<div class="col-md-3 pl0 text-center">
                			
                			<div class="w230">
                				<!--span class="icon-users fs30 display_block mb8 dark-blue-new " aria-hidden="true"></span-->
                                <?php echo $pitchIcons[$project->status]; ?>
                			</div>
                			<span class="fs14 display_block dark-blue-new "><?php echo $this->pitchStatus[$project->status]; ?></span>
                			<span class="fs10 display_block font_newlight tab-color mt2 hide">14 Feb 2015</span>
                			
                		</div>
                		<div class="col-md-4">
                			<h4 class="nm font_newregular fs20 mb5"><?php echo $project->clientProjects->name; ?></h4>
                			<div class="col-md-12 np mt3">
                                <?php foreach($project->clientProjects->clientProjectsHasSkills  as $skill){
                                    ?>
                                    <span class="btn-sm mr5 mb5"><?php echo $skill->skills->name; ?></span>
                                    <?php
                                }?>
                                <?php foreach($project->clientProjects->clientProjectsHasServices  as $service){
                                    ?>
                                    <span class="btn-sm mr5 mb5"><?php echo $service->services->name; ?></span>
                                    <?php
                                }?>
                                <?php foreach($project->clientProjects->clientProjectsHasIndustries  as $industry){
                                    ?>
                                    <span class="btn-sm mr5 mb5"><?php echo $industry->industries->name; ?></span>
                                    <?php
                                }?>
                			</div>
                			
                			
                		</div>
                		<div class="col-md-3">
                			<h4 class="nm font_newlight fs20 mb5"><?php echo $project->clientProjects->clientProfiles->users->company_name; ?></h4>
                			<div class="col-md-12  np">
                			<span class="mr10 np mt10 fs12  loc-gray"><span class="icon-pointer loc-gray icon-grey-color" aria-hidden="true"></span> 
                            	<?php foreach($project->clientProjects->clientProfiles->cities as $city)
            					{
            						if($city->is_main == 1)
            							echo $city->cities->name.", ".$city->cities->countries->name;  
            							break;
            					} 
            					?>
                            </span>
                			<div class="col-md-12 mt10 np">
                			<label class="label-sm mb5"><?php echo ($project->clientProjects->clientProfiles->users->linkedin != "")?" Verified":" Not-Verified" ?></label>
                			</div>
                			
                			</div>
                			
                			
                		</div>
                		<div class="col-md-2 mb10">
                			<span class="vp-circle-new ml20"><h4 class="font_newregular fs18 mb0 white-text mt15">-</h4><span class="fs11 white-text">Score</span></span>
                			
                		</div>
                	</div>
                    
                    <div class="col-md-12 np gray-bg">
                        <div class="col-md-6  pl40">
                        	<h4 class="font_newregular fs14 mb0">Your average response rate with this client is - hrs.</h4>
                        	<h5 class="grey-text fs12 mt5">This may affect your chances of winning.</h5>
                        </div>
                        <div class="col-md-2 np text-center border-left">
                        	<h5 class="fs18 font_newregular team-text-blue"><?php echo $contactCount; ?></h5>
                        	<h6 class="fs10 font_newregular">Suppliers Contacted</h6>
                        </div>
                        <div class="col-md-2 np text-center border-left ">
                        	<h5 class="fs18 font_newregular team-text-blue"><?php echo $pitchesCount; ?></h5>
                        	<h6 class="fs10 font_newregular">Pitches Submitted</h6>
                        </div>
                        <div class="col-md-2 np text-center border-left ">
                        	<h5 class="fs18 font_newregular team-text-blue"><?php echo $offersCount; ?></h5>
                        	<h6 class="fs10 font_newregular">Offers Made</h6>
                        </div>
                    
                    </div>
                   
                </div>
            </a>
        <?php
        }
         ?>
		 
		 <div class="col-md-12 mt30 np">
			<button type="submit" class=" pa10 btn-default3 font_newregular mb30">View All Archived Introductions</button>
		</div>
		 
</div>
<script>
    $(document).ready(function(){
       $("#selectIntroduction").change(function(){
            var statusId = $("#selectIntroduction").val();
			var statusArray = ["All","Request for Introduction", "New Message", "Pitch Submitted","Pitch Viewed","Offer Made","Offer Accepted","Offer Declined","Declined"];
			$("#searchStatus").html(statusArray[statusId]);
            if(statusId > 0)
            {
                $(".statusClass").hide();
                $(".status_" + statusId).show();   
            }else{
                $(".statusClass").show();
            }
       }); 
	   
	   $('#select-beast').selectize({
			create: true,
			sortField: {
				field: 'text',
				direction: 'asc'
			},
			dropdownParent: 'body'
		});
	   
	   
    });
	
</script>
