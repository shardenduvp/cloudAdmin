<?php foreach($suppliers as $supplier1){
	$supplier	=	$supplier1['list'];
	$details	=	$supplier1['supplier'];
			$listOfCompany	=	array();
			$skills			=	array();
			$skillSort		=	array();
			$listCount		=	0;
			
			$clientStories	=	0;
			foreach($details->suppliersHasPortfolios as $portfolio1){
				if($portfolio1->status==1){
					if(!empty($portfolio1->company_name)){
						if($portfolio1->is_discreet!=1 && $listCount <3){
							$listOfCompany[]	=	$portfolio1->company_name;
							$listCount++;
						}
					}
					if(!empty($portfolio1->suppliersHasPortfolioHasSkills))
						foreach($portfolio1->suppliersHasPortfolioHasSkills as $skill)
							$skillSort[$skill->skills->name]	=	((isset($skillSort[$skill->skills->name]))?$skillSort[$skill->skills->name]:0)+1;
					$clientStories++;		
				}
			}
			arsort($skillSort);
			$counter	=	0;
			foreach($skillSort as $key=>$val){
				$skills[]	=	$key;
				$counter++;
				if($counter>4)
					break;
			}?>
			<div class="col-lg-12 col-md-12 np">
				<div class="col-lg-12 col-md-12 bggrey mb20">
					<input type="checkbox" name="supplierList[]" id="customcheckbox<?php echo $supplier->id;?>" class="selectedSupplier" value="<?php echo $supplier->id;?>" />&nbsp;&nbsp;Select Team
				</div>
				<div class="col-lg-12 col-md-12 pr0 mb20">
					<div class="col-lg-1 np text-center">
						<img width="65" class="img-circle border_grey" src="<?php echo $supplier->image;?>">
					</div>
                    <div class="col-md-11 np">
						<div class="col-lg-4">
							<h3 class="mt0 mb5">
							<?php echo CHtml::link($supplier->users->company_name,array('/'.$supplier->users->display_name));?>
							</h3>
                            <div class="col-lg-12 col-md-12 np mb5">
								<?php 
								$cityName	=	'NA';
								foreach($supplier->users->usersOffices as $office)
									if($office->dep_id == 1){
										$cityName	=	$office->city->name.', '.$office->city->countries->name;
										break;
									}
								?>
                                <span class="mr10"><span aria-hidden="true" class="fa fa-map-marker"></span> <?php echo $cityName;?> </span>
                                <span class=""><span aria-hidden="true" class="fa fa-user"></span>
								<?php echo implode(',',$listOfCompany).(($clientStories>=3)?'...':'');?></span>
                            </div>
                            <div class="col-lg-12 np mb10">
								<?php
								$refCount		=	count($details->suppliersHasReferences);
								$totalOfRating	=	0;
								if($refCount>0)
								{
									foreach($details->suppliersHasReferences as $rating)
										foreach($rating->suppliersHasCategoryRatings as $rate)
											$totalOfRating	+=	$rate->rating;
									
									$avgRating = number_format((float)((((int)$totalOfRating))/($refCount*4)),1);
								}
								else
									$avgRating=0;
								?>
                                <span class="text-teal"><?php echo implode(', ',$skills);?></span>
                            </div>
                            <div class="col-lg-12 col-md-12 col-xs-12 np mt20">
                                <div class="col-sm-2 col-xs-2 np text-center mr15">
                                    <span class="label label-teal border_radius circle_padding_rating"><?php echo $avgRating;?></span>
                                    <p class="mt10 mb0"><?php echo ($avgRating>=4)?'Good':(($avgRating>=2)?'Average':'Bad');?></p>
                                    <p class="font_11 light_grey">Rating</p>
                                </div>
                                <div class="col-sm-2 col-xs-2 np text-center mr15">
                                    <span class="label label-danger border_radius circle_padding"><span aria-hidden="true" class="fa fa-user fa-lg"></span></span>
                                    <p class="mt10 mb0"><?php echo $clientStories;?></p>
                                    <p class="font_11 light_grey">Client Stories</p>
                                </div>
                                <div class="col-sm-2 col-xs-2 np text-center mr15">
                                    <span class="label label-primary border_radius circle_padding_dollar"><span aria-hidden="true" class="fa fa-dollar fa-lg"></span></span>
                                    <p class="mt10 mb0"><?php echo $supplier->per_hour_rate;?></p>
                                    <p class="font_11 light_grey">$ Per Hour Rate</p>
                                </div>
                                <div class="col-sm-2 col-xs-2 np text-center mr15">
                                    <span class="label label-warning border_radius circle_padding"><span aria-hidden="true" class="fa fa-refresh fa-lg"></span></span>
                                    <p class="mt10 mb0 font"><?php echo $supplier->response_time;?> hrs</p>
                                    <p class="font_11 light_grey">Response</p>
                                </div>
                            </div>
                        </div>
						<div class="col-lg-8 col-xs-12 col-md-8  np mb20 pb20">
                            <div class="col-md-12 np">
                                <div class="slider autoplay nm">
								<?php
								$matched	=	array();
								if(!empty($supplier->suppliersHasPortfolios)){
									foreach($supplier->suppliersHasPortfolios as $portfolio)
										if($portfolio->status ==1){
										$matched[] = $portfolio->id;
										$portfolioImg	=	Yii::app()->theme->baseUrl."/style/images/no-image.png";
										foreach($portfolio->suppliersPortfolioImages as $portImg){
											$portfolioImg = $portImg->image;
											break;
										}?>
									<div class="ih-item square effect13 left_to_right">
										<a href="<?php echo $portfolio->project_link;?>" id="<?php echo $portfolio->id;?>">
											<div class="img">
												<h3 class="nm"><img src="<?php echo $portfolioImg;?>" alt="Image" width="100%"></h3>
												<div class="date cut-off">
													<p>
														<span class="day">Matched</span>
													</p>
												</div>
                                            </div>
                                            <div class="info">
                                                <h5 class="nm mt10"><?php echo $portfolio->project_name;?></h5>
                                                <p class="pa5 mb0"><?php echo substr($portfolio->description,0,50);?>...</p>
                                            </div>
                                        </a>
                                    </div>
									<?php }
									}		
									if(!empty($details->suppliersHasPortfolios))
										foreach($details->suppliersHasPortfolios as $portfolio)
											if(!in_array($portfolio->id,$matched) && $portfolio->status ==1){
												$portfolioImg	=	Yii::app()->theme->baseUrl."/style/images/no-image.png";
												foreach($portfolio->suppliersPortfolioImages as $portImg){
													$portfolioImg = $portImg->image;
													break;
												}
									
									?>
									<div class="ih-item square effect13 left_to_right">
                                        <a href="<?php echo $portfolio->project_link;?>">
                                            <div class="img">
                                                <h3 class="nm"><img src="<?php echo $portfolioImg;?>" alt="Image" width="100%"></h3>
											</div>
                                            <div class="info">
                                                <h5 class="nm mt10"><?php echo $portfolio->project_name;?></h5>
                                                <p class="pa5 mb0"><?php echo $portfolio->description;?></p>
                                            </div>
                                        </a>
                                    </div>
									<?php }?>
								</div>
                            </div>
                        </div>
						<div class="col-lg-12 col-md-12 mt10 display_inline">
							<div class="col-lg-10 np display_inline">
								<span class=""><?php echo $supplier->about_company;?></span>
							</div>
							
						</div>
                    </div>
				</div>
			</div>
		<?php }?>