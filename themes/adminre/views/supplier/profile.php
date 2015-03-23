<?php
// wrote to find location please add this to controller
$location = UsersOffices::model()->findByAttributes(array(
	"user_id"=>yii::app()->user->id,
	"dep_id"=>1
	),
	array(
    'order' => 'id asc',
    'limit' => 1

));
    $criteria = new CDbCriteria();
    $criteria->join ='LEFT JOIN suppliers_has_portfolio ON suppliers_has_portfolio.id = t.suppliers_has_portfolio_id';
    $criteria->condition = 'suppliers_has_portfolio.status = :status and t.suppliers_id = :supplierid and t.status in (:statusref)';
        $criteria->params = array(":status" => "1",":supplierid"=>Yii::app()->user->supplierProfileId,':statusref'=>"2,3");
    $allreferenceactive = SuppliersHasReferences::model()->findAll($criteria);

?>

<div class="modal fade" id="share_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <?php echo $this->renderPartial("profile/_shareprofile"); ?>
        </div>
    </div>
</div>


<div class="white_outer">
	<div class="container">
		<div class="row">
       			<div class="col-md-12 "><h3>My Profile</h3>

            </div>
		</div>
	</div>
</div>   




<div class="dark-wrapper">
    
	<div class="container ">

          <div class="col-md-12">

        	<?php if(Yii::app()->user->hasFlash('record')){?>
				<div class="alert alert-success" id="repsoneRest2">
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">X</button>
					<p id="messageResponse2">
					<strong><?php echo Yii::app()->user->getFlash('record'); ?></strong></p>
				</div>
			<?php } ?>
        	<?php if(Yii::app()->user->hasFlash('success')){?>
				<div class="alert alert-success" id="repsoneRest2">
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">X</button>
					<p id="messageResponse2">
					<strong><?php echo Yii::app()->user->getFlash('success'); ?></strong></p>
				</div>
			<?php } ?>
           </div>

        <div class="col-md-12 pa0 pt10 pb10" style="min-height: 120px;">
             <?php 
        if($suppliers->offers!="")
        {
            ?>
                <div class="col-md-12 ">

                    <div class="position_set_offer text-center pa10  bg-default"><?php echo $suppliers->offers; ?></div>
                </div>


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


            <div class=" position_set" >
                <div class="pull-right">
                     <?php echo CHtml::link('<button type="button" class="btn btn-primary  text-center model_text" >Edit Profile</button>', array('/supplier/editprofile'));?>
                     <a class="btn btn-primary" data-toggle="modal" data-target="#share_modal">Share Profile </a>
                </div>
            </div>

        </div>

        <div class="clearfix"></div>
		<div class="row">
            

        <div class="col-md-3 border_style_div" >
            
            <div class="col-md-12 border_b pa0 pb15 ">
                <h4 class="mb15"><?php echo $users->company_name; ?></h4>
                <div class="col-md-4 text-left">
                    <?php

						$profile_img = $this->res["avtar"];
						if(!empty($suppliers->image))
						{
							$profile_img = $suppliers->image;
						}
					?>
                    <img src="<?php echo $profile_img; ?>" alt="" class="img-circle mt10" width="60" />
                </div>
                <div class="col-md-8">
                    <h5 class="font_size10"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <?php echo (empty($location)?"----":$location->city->name.", ".$location->city->countries->name); ?></h5>
                    <h5 class="font_size10"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $suppliers->number_of_employee; ?> Employees</h5>
                    <h5 class="font_size10"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Founded in <?php echo $suppliers->foundation_year; ?></h5>
                    <h5 class="font_size10"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> ----</h5>
                </div>
            </div>
            
            <div class="col-md-12 border_b pa0 pb15 pt15 ">
                <div class="col-md-4 border-r text-center pa10"><h4 class="pb0">0</h4><small>Rating</small></div>
                <div class="col-md-4 border-r text-center pa10"><h4 class="pb0">$<?php echo $suppliers->project_size; ?></h4><small>Avg. Project Size (in USD)</small></div>
                <div class="col-md-4 text-center pa10"><h4 class="pb0">$<?php echo $suppliers->per_hour_rate; ?></h4><small>Avg. Per Hour Rate (in USD)</small></div>
            </div>
            <div class="col-md-12 pa15 border_b text-left">
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
                    <li role="presentation" class="active"><a href="#projectStories" aria-controls="profile" role="tab" data-toggle="tab">Project/Stories (<?php echo count($stories); ?>)</a></li>
    				<!--li role="presentation" ><a href="index.php?r=supplier/profile" <?php if(false){ ?>href="#home" aria-controls="home" role="tab" data-toggle="tab" <?php } ?>>People (<span id="people_count"><?php echo $peopleCount; ?></span>)</a></li-->
                    <li role="presentation" ><a href="#home" aria-controls="home" role="tab" data-toggle="tab" >People (<?php echo $peopleCount; ?>)</a></li>
    				<li role="presentation"><a href="#projectReviews" aria-controls="profile" role="tab" data-toggle="tab">Reviews (<?php echo count($allreferenceactive); ?>)</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Awards & Certifications (<?php echo count($awards_listing); ?>)</a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="projectStories">
						<div class="row"><br />
                            <?php echo $this->renderPartial("profile/_viewprojectstories",array("stories"=>$stories)); ?>
					    </div>
				    </div>
					<div role="tabpanel" class="tab-pane" id="home">
						<div class="row">

                            <?php echo $this->renderPartial("edit/_team_member"); ?>
						</div>
					</div>				
					<div role="tabpanel" class="tab-pane" id="projectReviews">
						<div class="row"><br />
                           <?php echo $this->renderPartial("edit/_past_clients",array("suppliers"=>$suppliers)); ?>
					    </div>
				    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">
						<div class="row"><br />
                            <?php echo $this->renderPartial("profile/_awards",array("awards"=>$awards,"awards_listing"=>$awards_listing)); ?>
					    </div>
				    </div>

			     </div>
            </div>			
		</div>
	</div>
<!-- /.container --> 
</div>
<?php
	if(isset($_REQUEST['page']) && $_REQUEST['page'] == 4)
	{
		echo "
			<script>
				$(document).ready(function(){
					$('.nav-tabs a[href=#profile]').tab('show') ;
				});
			</script>
		";
	}
?>
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
	
		$(".delete").click(function(e){
			var conf = confirm("Are you sure you want to delete this?");
			if(!conf)
			{
				e.preventDefault();
			}
	   });
	  
      $('#openBrowUser').click(function(){
    	filepicker.setKey("<?php echo $this->filpickerKey; ?>");
    	filepicker.pickMultiple({mimetypes: ['image/*'],container: 'window'},
    		function(InkBlob){
    			for(i in InkBlob){
    				$('#profilePicUser1').val(InkBlob[i].url);
                    $("#profile_img1").attr("src",InkBlob[i].url+'/convert?w=150&h=115&fit=crop');
    			}
    		},
    		function(FPError){
    			console.log(FPError.toString());
    		}
    	);});
	   
	  
    });
</script>
