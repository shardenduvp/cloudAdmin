<br>
<br><div class="box panelColor ">
	<div class="panel borderleft">
            	<div class="panel-heading panelBackgrnd paneltext">
            	 <h3 class="panel-title"><b>Project Name:</b><?php echo $model_client->name; ?></h3> 
			            	
			     </div>
                  
                  <?php foreach($model as $projSupp) { ?>
                  <div class="row">
	                  <div class="col-xs-1 col-xs-offset-1 align">
	                  	<div class="row">
	                  	<h1></h1>
	                  		<i class="fa fa-users fntsize  "></i>
	                  		</div>
	                  		<div class="row align">
	                  		Introduction Sent
	                  		</div>
	                  	</div>
	                
	                  <div class="col-xs-5 verticalLine"> 

	                  	<h3><b><?php echo $projSupp->suppliers->name; ?></b></h3>
	                  	<div class="row">
		                  	<div class="col-xs-5">
		                  		<i class="fa fa-map-marker "></i> 
		                  		<?php if($projSupp->suppliers->location)
		                  		 {
		                  		   echo $projSupp->suppliers->location; 
		                  		 } else
		                  		  { ?>
		                  		   Not Provided
		                  		  <?php } ?>
		                  		
		                  	</div>
		                  	<div class="col-xs-5">
			                  	<i class="fa fa-calendar"></i>
			                  	<?php  if($projSupp->suppliers->foundation_year)
			                  	{ 
			                  		?>
									Founded in 
			                  	<?php echo $projSupp->suppliers->foundation_year; ?>
			                 <?php
			                  	} else { ?>
                                Not Provided
                                <?php } ?>
			                 </div>
		                 </div>
		                 <div class="row">
		                  	<div class="col-xs-5 ">
		                  		<i class="fa fa-users"></i>
		                  		<?php if($projSupp->suppliers->number_of_employee)
		                  		{ 
								 echo $projSupp->suppliers->number_of_employee; ?> Employees		
		                  		<?php } else { ?> Not Provided 
		                  		<?php } ?>
		                  		
		                  	</div>
		                  	<div class="col-xs-5">
			                  	<i class="fa fa-refresh"></i>
			                  	<?php if($projSupp->suppliers->response_time) { ?>
			                  		Responds withing 
			                  	<?php echo $projSupp->suppliers->response_time; ?> hrs
			                  <?php	} else { ?> 
			                  Not Provided
			                  <?php } ?>
			                 </div>
		                 </div>
		                </div>


		                <div class="col-xs-1 verticalLine">

		               			 <?php $count = count($projSupp->suppliers->suppliersHasPortfolios); ?>
				                <div class="row align">
				                <h3><?php echo $count; ?></h3>
				                </div>	
				                <div class="row align">
				                Client Stories
				                </div>	
		                </div>
		                <div class="col-xs-2 verticalLine">
				                <div class="row align">
					                <?php foreach ($projSupp->suppliers->suppliersHasPortfolios as $key => $value) {
					                
					                }{ ?>
					                <h3>$<?php echo $value->per_hour_rate; }?>
					                 
					                </h3>
				                </div>	
				                <div class="row align">
				               Average Per Hour <br> (in USD)
				                </div>	
		                </div>
		                <div class="col-xs-1">
				                <div class="row align col-xs-offset-1">
				                <h2></h2>
				                	<div class="box1 boxcolor align">
								<?php
								$refCount	=	count($projSupp->suppliers->suppliersHasReferences);
								$totalOfRating	=	0;
								if($refCount>0)
								{
								foreach($projSupp->suppliers->suppliersHasReferences as $rating)
								foreach($rating->suppliersHasCategoryRatings as $rate)
								$totalOfRating	+=	$rate->rating;
								$avgRating = number_format((float)((((int)$totalOfRating))/($refCount*4)),1);
								}
								else
								$avgRating=0;
							echo $avgRating;
								?>

				                	</div>
				                </div>	
				                <div class="row align">
				                <?php echo  $refCount ?> Reviews
				                </div>	
		                </div>
	                 </div>
	                 <hr>
						<?php } ?>

            	
    </div>
</div>