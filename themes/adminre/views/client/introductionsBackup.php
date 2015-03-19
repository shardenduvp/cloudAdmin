<?php $count=0; ?>
<div class="white_outer">
	<div class="container">
		<div class="row">
			<div class="col-md-12 "><h3>Introductions</h3></div>
		</div>
	</div>
</div>

<div class="dark-wrapper">
	<div class="container inner">
		<div class="row">
			<div role="tabpanel">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist" id="master">
					<?php foreach($client_projects as $project){ ?>
					<li role="presentation" class=""><a href="#<?php echo ++$count; ?>" aria-controls="<?php echo $count; ?>" role="tab" data-toggle="tab"><?php echo $project->name." (".count($project->suppliersProjects)." Introductions) "; ?></a></li>
					<?php } ?>
				</ul>
				<?php $count=0; $iCount=0;?>
				<!-- Tab panes -->
				<div class="tab-content">
					<?php foreach($client_projects as $project){ ?>
					<div role="tabpanel" class="tab-pane" id="<?php echo ++$count; ?>">
						<div class="row"><br />
							<?php $supplier_projects	=	SuppliersProjects::model()->findAllByAttributes(array('client_projects_id'=>$project->id));
							foreach($supplier_projects as $sProject)
							{
								//$storyCount = count($sProject->suppliers->suppliersHasPortfolios);
								$storyCount = 0;
								foreach($sProject->suppliers->suppliersHasPortfolios as $pcount)
									if($pcount->status != 1)
										$storyCount++;
								$refCount = count($sProject->suppliers->suppliersHasReferences);
								$totalOfRating=0;
								if($refCount>0)
								{
									foreach($sProject->suppliers->suppliersHasReferences as $rating)
										foreach($rating->suppliersHasCategoryRatings as $rate)
											$totalOfRating	+=	$rate->rating;
									
									$avgRating = number_format((float)((((int)$totalOfRating))/($refCount*4)),1);
								}
								else
									$avgRating=0;
								$city="";
								foreach($sProject->suppliers->users->usersOffices as $office)
								{
									if($office->dep_id == 1)
									{
										$city	=	$office->city->name." ,".$office->city->countries->name;
										break;
									}
								}
							?>
								<a href="<?php echo Yii::app()->createUrl("/client/introdetail",array("projectId"=>$sProject->client_projects_id,"iCount"=>++$iCount,'pId'=>$sProject->id)); ?>"><div class="col-md-12 outline mt10">
									<div class="col-md-2">
										Introduction Sent
										<span class="pull-left mb10 ml0 "><?php echo date('d M Y',strtotime((isset($sProject->add_date))?$project->modify_date:$project->add_date));?></span>
									</div>
									<div class="col-md-4">
										<div class="row">
											<div class="col-md-12"><h4><?php echo $sProject->suppliers->users->company_name; ?></h4></div>
											<div class="col-md-12">
												<div class="col-md-6"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <?php echo $city; ?></div>
												<div class="col-md-6"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> <?php echo "Founded in ".$sProject->suppliers->foundation_year;?></div>
											
											</div>
											<div class="col-md-12">
												<div class="col-md-6"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $sProject->suppliers->number_of_employee." Employees"; ?></div>
												<div class="col-md-6"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> <?php echo (isset($sProject->suppliers->response_time))?$sProject->suppliers->response_time:"Not Set";?></div>
											</div>
										</div>
									</div>
									<div class="col-md-2">
										<?php echo $storyCount; ?> Client Stories
									</div>
									<div class="col-md-2">
										$ <?php echo (!empty($sProject->suppliers->per_hour_rate))?$sProject->suppliers->per_hour_rate:"Not Set";?>
										<br />Avg. Per Hour Rate(in USD)
									</div>
									<div class="col-md-2">
										<?php echo $refCount.'  '.$avgRating;?>
									</div>
								</div></a>
							<?php } 
								$iCount=0;
							?>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$("#1").addClass("active");
	$("#master > :first-child").addClass("active");
</script>