<br>
<br><div class="box">
	<div class="panel panel-info">
            	<div class="panel-heading ">
            	 <h3 class="panel-title"><b>Project Name:</b><?php echo $model_client->name; ?></h3> 
			            	
			     </div>
                  
                  <?php foreach($model as $projSupp) { ?>
                  <div class="row">
	                  <div class="col-xs-1 col-xs-offset-1">
	                  	<div class="row">
	                  		<i class="fa fa-users fntsize  "></i>
	                  		</div>
	                  		<div class="row">
	                  		Introduction Sent
	                  		</div>
	                  	</div>
	                
	                  <div class="col-xs-5"> 

	                  	<h3><?php echo $projSupp->suppliers->name; ?></h3>
	                  	<div class="row">
		                  	<div class="col-xs-5">
		                  		<i class="fa fa-map-marker "></i> 
		                  		<?php echo $projSupp->suppliers->location; ?>
		                  	</div>
		                  	<div class="col-xs-5">
			                  	<i class="fa fa-calendar"></i>
			                  	Founded in 
			                  	<?php echo $projSupp->start_date; ?>
		                  	</div>
		                 </div>
		                 <div class="row">
		                  	<div class="col-xs-5 ">
		                  		<i class="fa fa-users"></i>
		                  		<?php echo $projSupp->suppliers->number_of_employee; ?> Employees
		                  	</div>
		                  	<div class="col-xs-5">
			                  	<i class="fa fa-refresh"></i>
			                  	Responds withing 
			                  	<?php echo $projSupp->suppliers->response_time; ?> hrs
		                  	</div>
		                 </div>
		                </div>
		                <div class="col-xs-2">
				                <div class="row col-xs-offset-1">
				                <h3>3/5</h3>
				                </div>	
				                <div class="row">
				                Relevant Client Stories
				                </div>	
		                </div>
		                <div class="col-xs-2">
				                <div class="row col-xs-offset-1">
				                <h3>$<?php echo $projSupp->min_price; ?>-<?php echo $projSupp->max_price; ?></h3>
				                </div>	
				                <div class="row">
				                Average Per Hour (in USD)
				                </div>	
		                </div>
		                <div class="col-xs-1">
				                <div class="row">
				                <h3></h3>
				                </div>	
				                <div class="row">
				                27 Reviews
				                </div>	
		                </div>
	                 </div>
	                 <hr>
						<?php } ?>

            	
    </div>
</div>