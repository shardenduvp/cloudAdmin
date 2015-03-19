<link href="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/rating-slider/bootstrap-slider.css" rel="stylesheet" />
<!-- Start: Header -->
<header class="navbar navbar-fixed-top bg-light np header-left">
	<ol class="breadcrumb p20">
		<li class="crumb-active">
			<?php echo CHtml::link('Review Supplier',array('/client/profile'));?>
		</li>
		<li class="crumb-link">
			<?php echo CHtml::link('<span class="fa fa-user"></span> My Profile',array('/client/profile'));?>
		</li>
		<li class="crumb-trail">Review Supplier</li>
	</ol>
</header>
<!-- End: Header -->
<!-- Begin: Content -->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 np light_bg layout-left">
<!-- left section -->
	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pull-left left_gray_section " >
		<?php
		$default_logo 	= 	Yii::app()->theme->baseUrl."/style/images/avatar.png";
		$storyCount = 0;
		$catRating	= array();
		$categories = ReviewCategory::model()->findAll();
		foreach ($categories as $cat)
			$catRating[$cat->id]=0;
		foreach($model->suppliers->suppliersHasPortfolios as $pcount)
			if($pcount->status != 1)
				$storyCount++;
		$refCount = count($model->suppliers->suppliersHasReferences);
		$totalOfRating=0;
		if($refCount>0)
		{
			foreach($model->suppliers->suppliersHasReferences as $rating)
				foreach($rating->suppliersHasCategoryRatings as $rate){
					$totalOfRating	+=	$rate->rating;
					$catRating[$rate->review_category_id] += $rate->rating;
				}
			$avgRating = number_format((float)((((int)$totalOfRating))/($refCount*4)),1);
		}
		else
			$avgRating=0;
		$city="";
		foreach($model->suppliers->users->usersOffices as $office)
		{
			if($office->dep_id == 1)
			{
				$city	=	$office->city->name.", ".$office->city->countries->name;
				break;
			}
		}
		?>
		<div class="col-md-12 col-sm-12 col-xs-12 np mt20 ml15  " >
			<div class="col-md-3 col-sm-3 col-xs-3 np" >
				<img src="<?php echo !empty($model->suppliers->image)?$model->suppliers->image:$default_logo ?>" class="img-circle" height="70" width="70" alt="" />
			</div>
			 <div class="col-md-9 col-sm-9 col-xs-9 np ">
				<h2 class="mt5 dark_text"><?php echo $company; ?></h2>
				<small class="fs13"><i class="fa fa-map-marker"></i> <?php echo $city; ?></small>
			 </div>
		</div>
		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 pt20 ml25  mt30 bg_white" >
			<div class="col-md-3 col-sm-3 col-xs-3 np text-center mr20 ml5">
				<span class="label label-danger border_radius circle_padding"><span aria-hidden="true" class="fa fa-user fs14 "></span></span>
				<p class="mt10 mb0 fs15"><?php echo $storyCount; ?></p>
				<p class="fs12 light_grey">Clients</p>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-3 np text-center mr20">
				<span class="label label-primary border_radius circle_padding_dollar"><span aria-hidden="true" class="fa fa-dollar fs14"></span></span>
				<p class="mt10 fs15 mb0"><?php echo $model->suppliers->per_hour_rate; ?></p>
				<p class="fs12 light_grey">$ Per Hr</p>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-3 np text-center ">
				<span class="label label-warning border_radius circle_padding"><span aria-hidden="true" class="fa fa-refresh fs14"></span></span>
				<p class="mt10 mb0 fs15 ">7 hrs</p>
				<p class="fs12 light_grey">Response</p>
			</div>
		</div>
		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 ml25 np mt30 " >
			<input type="button" class="btn btn-default btn-lg btn-block pt15 pb15 fs13 btn_text" value="View Profile" />
		</div>
		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 ml25 np mt30 text-center " >
			<div id="myCircleDiv">
				<div class="innerWrapper">
					 <div><span class="fs24 font_bold"><?php echo $avgRating; ?> </span> <br/><span class="fs16">Good</span></div>
				</div>
			</div>
			<div class="col-md-12 fs13 text-center">Overall Rating </div>
		</div>
		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 ml25 np mt30 " >
			<div class="col-md-12 np">
				<h4 class="mt0 mb0 fs14 g_light">Technical Skills</h4>
				<div class="col-md-10 np pt10">
					<div class="progress progress-bar-xs">
						<div style="width: 60%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-system">
							<span class="sr-only">60%</span>
						</div>
					</div>
				</div>
				<div class="col-md-2 np text-center font_bold fs13">4.0</div>
			</div>
			<div class="col-md-12 np">
				<h4 class="mt0 mb0 fs14 g_light">Communication</h4>
				<div class="col-md-10 np pt10">
					<div class="progress progress-bar-xs">
						<div style="width: 60%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-system">
							<span class="sr-only">60%</span>
						</div>
					</div>
				</div>
				<div class="col-md-2 np text-center font_bold fs13">4.0</div>
			</div>
			<div class="col-md-12 np">
				<h4 class="mt0 mb0 fs14 g_light">Timeliness </h4>
				<div class="col-md-10 np pt10">
					<div class="progress progress-bar-xs">
						<div style="width: 60%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-system">
							<span class="sr-only">60%</span>
						</div>
					</div>
				</div>
				<div class="col-md-2 np text-center font_bold fs13">4.0</div>
			</div>
			<div class="col-md-12 np">
				<h4 class="mt0 mb0 fs14 g_light">Design Thinking</h4>
				<div class="col-md-10 np pt10">
					<div class="progress progress-bar-xs">
						<div style="width: 60%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-system">
							<span class="sr-only">60%</span>
						</div>
					</div>
				</div>
				<div class="col-md-2 np text-center font_bold fs13">4.0</div>
			</div>
		</div>
	</div>
<!-- left section end -->
<!--right section  -->
	<div class="col-lg-9 np col-md-9 pull-left " >
		<div class="col-md-12 np pr5 mb30">
			<div class="tab-block mb25">
				<ul class="nav nav-tabs tabs-border nav-justified">
					<li class="active ">
						<a data-toggle="tab" href="#tab15_1" aria-expanded="true" class="fs14"> Technical Skills <span class="label label-sm bg-gray font_light ">0/4</span></a>
					</li>
					<li class="">
						<a data-toggle="tab" href="#tab15_2" aria-expanded="false" class="fs14"> Communication <span class="label label-sm bg-gray font_light ">0/4</span></a>
					</li>
					 <li class="">
						<a data-toggle="tab" href="#tab15_3" aria-expanded="false" class="fs14"> Timeliness <span class="label label-sm bg-gray font_light ">0/4</span></a>
					</li>
					 <li class="">
						<a data-toggle="tab" href="#tab15_4" aria-expanded="false" class="fs14"> Design Thinking <span class="label label-sm bg-gray font_light ">0/4</span></a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="tab15_1">
						<div class="row">
							<div class="col-md-10 col-md-offset-1 mt30 admin-grid admin-form theme-primary">	
								<form>
									<div class="col-md-12 mb25 mt25 fs14 "> 								   
										<label >Q1. What are your technical skills like?</label> 										
										<label class="field prepend-icon mt10">
											<textarea placeholder="Text area" name="comment" id="comment" class="gui-textarea form-control"></textarea>
											<label class="field-icon" for="comment"><i class="fa fa-comments"></i> </label>
										</label>
									</div>
									<div class="col-md-12 mb25 mt25 fs14">                                        
										<label>Q2. What are your technical skills like?</label>
										<label class="field prepend-icon mt10">
											<textarea placeholder="Text area" name="comment" id="comment" class="gui-textarea form-control"></textarea>
											<label class="field-icon" for="comment"><i class="fa fa-comments"></i> </label>
										</label>
									</div>
									<div class="col-md-12 mb25 mt25 fs14 ">                                        
										<label>Q3. What are your technical skills like?</label>
										<label class="field prepend-icon mt10">
											<textarea placeholder="Text area" name="comment" id="comment" class="gui-textarea form-control"></textarea>
											<label class="field-icon" for="comment"><i class="fa fa-comments"></i> </label>
										</label>
									</div>
									<div class="col-md-12 mb25 mt25 fs14 ">                                        
										<label>Q4. What are your technical skills like?</label>
										<label class="field prepend-icon mt10">
											<textarea placeholder="Text area" name="comment" id="comment" class="gui-textarea form-control"></textarea>
											<label class="field-icon" for="comment"><i class="fa fa-comments"></i> </label>
										</label>
									</div>
									<div class="col-md-12 mb25 mt25 pa20 text-center s1">       
										<input id="ex1" type="text" data-slider-min="1" data-slider-max="5" data-slider-step="1" data-slider-value="3"/>
										<h2 class=" fs22">Rate Supplier Technically</h2>
									</div>  
								</form>  
							</div>
							<div class="col-md-12  mt25 pt20 pb5 text-left s1 border-top">  	 
								<div class="col-md-5 text-left np col-md-offset-1">
									<h4 class="fs13"> <a href="#" ><i class="fa fa-angle-left fs18 mr5"></i> Technical Skills (3/4)</a></h4>
								</div>
								<div class="col-md-5 text-right np">
									<h4 class="fs13"> <a href="#">Communication (0/3) <i class="fa fa-angle-right fs18 ml5"></i> </a></h4>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="tab15_2">
						<div class="row">
							<div class="col-md-10 col-md-offset-1 mt30 admin-grid admin-form theme-primary">	
								<form>
									<div class="col-md-12 mb25 mt25 fs14 ">
										<label >Q1. What are your technical skills like?</label>
										<label class="field prepend-icon mt10">
											<textarea placeholder="Text area" name="comment" id="comment" class="gui-textarea form-control"></textarea>
											<label class="field-icon" for="comment"><i class="fa fa-comments"></i> </label>
										</label>
									</div>
									<div class="col-md-12 mb25 mt25 fs14 ">
										<label >Q1. What are your technical skills like?</label>
										<label class="field prepend-icon mt10">
											<textarea placeholder="Text area" name="comment" id="comment" class="gui-textarea form-control"></textarea>
											<label class="field-icon" for="comment"><i class="fa fa-comments"></i> </label>
										</label>
									</div>
									<div class="col-md-12 mb25 mt25 fs14 ">
										<label >Q1. What are your technical skills like?</label>
										<label class="field prepend-icon mt10">
											<textarea placeholder="Text area" name="comment" id="comment" class="gui-textarea form-control"></textarea>
											<label class="field-icon" for="comment"><i class="fa fa-comments"></i> </label>
										</label>
									</div>
									<div class="col-md-12 mb25 mt25 fs14 ">
										<label >Q1. What are your technical skills like?</label>
										<label class="field prepend-icon mt10">
											<textarea placeholder="Text area" name="comment" id="comment" class="gui-textarea form-control"></textarea>
											<label class="field-icon" for="comment"><i class="fa fa-comments"></i> </label>
										</label>
									</div>
									<div class="col-md-12 mb25 mt25 pa20 text-center s1">       
										<input id="ex2" type="text" data-slider-min="1" data-slider-max="5" data-slider-step="1" data-slider-value="3"/>
										<h2>Rate Supplier </h2>
									</div>				
								</form>  
							</div>
							<div class="col-md-12  mt25 pt20 pb5 text-left s1 border-top">   
								<div class="col-md-5 text-left np col-md-offset-1">
									<h4 class="fs13"> <a href="#" ><i class="fa fa-angle-left fs18 mr5"></i> Technical Skills (3/4)</a></h4>
								</div>
								<div class="col-md-5 text-right np">
									<h4 class="fs13"> <a href="#">Timliness (0/3) <i class="fa fa-angle-right fs18 ml5"></i> </a></h4>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="tab15_3">
						<div class="row">
							<div class="col-md-10 col-md-offset-1 mt30 admin-grid admin-form theme-primary">	
								<form >
									<div class="col-md-12 mb25 mt25 fs14 ">					   
										<label >Q1. What are your technical skills like?</label> 									
										<label class="field prepend-icon mt10">
											<textarea placeholder="Text area" name="comment" id="comment" class="gui-textarea form-control"></textarea>
											<label class="field-icon" for="comment"><i class="fa fa-comments"></i> </label>
										</label>
									</div>
									<div class="col-md-12 mb25 mt25 fs14 ">					   
										<label >Q1. What are your technical skills like?</label> 									
										<label class="field prepend-icon mt10">
											<textarea placeholder="Text area" name="comment" id="comment" class="gui-textarea form-control"></textarea>
											<label class="field-icon" for="comment"><i class="fa fa-comments"></i> </label>
										</label>
									</div>
									<div class="col-md-12 mb25 mt25 fs14 ">					   
										<label >Q1. What are your technical skills like?</label> 									
										<label class="field prepend-icon mt10">
											<textarea placeholder="Text area" name="comment" id="comment" class="gui-textarea form-control"></textarea>
											<label class="field-icon" for="comment"><i class="fa fa-comments"></i> </label>
										</label>
									</div>
									<div class="col-md-12 mb25 mt25 fs14 ">					   
										<label >Q1. What are your technical skills like?</label> 									
										<label class="field prepend-icon mt10">
											<textarea placeholder="Text area" name="comment" id="comment" class="gui-textarea form-control"></textarea>
											<label class="field-icon" for="comment"><i class="fa fa-comments"></i> </label>
										</label>
									</div>
									<div class="col-md-12 mb25 mt25 pa20 text-center s1">       
										<input id="ex3" type="text" data-slider-min="1" data-slider-max="5" data-slider-step="1" data-slider-value="3"/>
										<h2>Rate Supplier </h2>
									</div>
								</form>  
							</div>
							<div class="col-md-12  mt25 pt20 pb5 text-left s1 border-top">  
								<div class="col-md-5 text-left np col-md-offset-1">
									<h4 class="fs13"> <a href="#" ><i class="fa fa-angle-left fs18 mr5"></i> Communication (3/4)</a></h4>
								</div>
								<div class="col-md-5 text-right np">
									<h4 class="fs13"> <a href="#">Design Thinking (0/4) <i class="fa fa-angle-right fs18 ml5"></i> </a></h4>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="tab15_4">
						<div class="row">
							<div class="col-md-10 col-md-offset-1 mt30 admin-grid admin-form theme-primary">	
								<form >
									<div class="col-md-12 mb25 mt25 fs14 "> 
										<label >Q1. What are your technical skills like?</label> 
										<label class="field prepend-icon mt10">
											<textarea placeholder="Text area" name="comment" id="comment" class="gui-textarea form-control"></textarea>
											<label class="field-icon" for="comment"><i class="fa fa-comments"></i> </label>
										</label>
									</div>
									<div class="col-md-12 mb25 mt25 fs14 "> 
										<label >Q1. What are your technical skills like?</label> 
										<label class="field prepend-icon mt10">
											<textarea placeholder="Text area" name="comment" id="comment" class="gui-textarea form-control"></textarea>
											<label class="field-icon" for="comment"><i class="fa fa-comments"></i> </label>
										</label>
									</div>
									<div class="col-md-12 mb25 mt25 fs14 "> 
										<label >Q1. What are your technical skills like?</label> 
										<label class="field prepend-icon mt10">
											<textarea placeholder="Text area" name="comment" id="comment" class="gui-textarea form-control"></textarea>
											<label class="field-icon" for="comment"><i class="fa fa-comments"></i> </label>
										</label>
									</div>
									<div class="col-md-12 mb25 mt25 fs14 "> 
										<label >Q1. What are your technical skills like?</label> 
										<label class="field prepend-icon mt10">
											<textarea placeholder="Text area" name="comment" id="comment" class="gui-textarea form-control"></textarea>
											<label class="field-icon" for="comment"><i class="fa fa-comments"></i> </label>
										</label>
									</div>
									<div class="col-md-12 mb25 mt25 pa20 text-center s1">       
										<input id="ex4" type="text" data-slider-min="1" data-slider-max="5" data-slider-step="1" data-slider-value="3"/>
										<h2>Rate Supplier </h2>
									</div>  
								</form>  
							</div>
							<div class="col-md-12  mt25 pt20 pb5 text-left s1 border-top">  	 
								<div class="col-md-5 text-left np col-md-offset-1">
									<h4 class="fs13"> <a href="#" ><i class="fa fa-angle-left fs18 mr5"></i> Timliness (0/3)</a></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	 
		<div class="col-md-11 bg-white as_t ml40 np border-all">
			<div class="col-md-4 border-right white_active t_set">
				<div  class=" col-md-12 checkbox custom-checkbox custom-checkbox-primary ">
					<input type="checkbox" id="customcheckbox1" name="customcheckbox1" checked>
					<label class=" fs15 grey " for="customcheckbox1">&nbsp;&nbsp; Follow VenturePact
						<p class="small_heading pl10 fs12">I would like to follow VenturePact</p>
					</label>
				</div>
			</div>
			<div class="col-md-4 border-right white1 t_set">
				<div  class=" col-md-12 checkbox custom-checkbox custom-checkbox-primary ">
					<input type="checkbox" id="customcheckbox2" name="customcheckbox1">
					<label class="fs15 grey " for="customcheckbox2">&nbsp;&nbsp; Appear Unattributed
						<p class="small_heading pl10 fs12">Do not show my name and picture to the VenturePact community</p>
					</label>
				</div>
			</div>
			<div class="col-md-4 white1 t_set">
				<div  class=" col-md-12 checkbox custom-checkbox custom-checkbox-primary ">
					<input type="checkbox" id="customcheckbox3" name="customcheckbox1" >
					<label class="fs15 grey " for="customcheckbox3">&nbsp;&nbsp; Get Connected
						<p class="small_heading pl10 fs12">Allow future clients of Techkraft to connect with me via VenturePact. Your email will not be disclosed</p>
					</label>
				</div>
			</div>														   
		</div>
		<div class="col-md-11  white_active ml40 border-all mt30">
			<div  class=" col-md-12 checkbox custom-checkbox custom-checkbox-primary ">
				<input type="checkbox" id="customcheckbox4" name="customcheckbox1" checked>
				<label class=" fs15 " for="customcheckbox4">&nbsp;&nbsp; I certify that this review is based on my own experience and is my genuine opinion of the supplier submitted <br/><span class="pl10">in accordance with the Terms of Use. I am not an employee of this vendor or one of its direct competitors.</span></label>
			</div>        
		</div>
		<div class="col-md-11 ml40 mt30 mb20 text-center">
			<input type="button" value="Submit Feedback" class="btn btn-lg fs18 font_bold btn-teal ">
		</div>
	</div>
<!--right section end -->
</div>
<!-- End: Content -->
<script type="text/javascript">
$(document).ready(function() {
	$("#ex1").slider();
		$("#ex1").on('slide', function(slideEvt) {
		$("#ex1SliderVal").text(slideEvt.value);
	});
	$("#ex2").slider();
		$("#ex2").on('slide', function(slideEvt) {
		$("#ex2SliderVal").text(slideEvt.value);
	});
	$("#ex3").slider();
		$("#ex3").on('slide', function(slideEvt) {
		$("#ex3SliderVal").text(slideEvt.value);
	});
	$("#ex4").slider();
		$("#ex4").on('slide', function(slideEvt) {
		$("#ex4SliderVal").text(slideEvt.value);
	});
});
</script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/rating-slider/bootstrap-slider.js"></script>