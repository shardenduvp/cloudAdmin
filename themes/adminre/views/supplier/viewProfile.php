<!DOCTYPE html>
<html>
<head>
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<title>VenturePact :: View Profile</title>
<meta name="keywords" content="" />
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Favicon -->
<link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl;?>/style/favicon.ico">
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/css/main_style.css" >
<!-- Theme CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/assets/skin/default_skin/css/theme.css" >
<!-- Admin Forms CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/assets/admin-tools/admin-forms/css/admin-forms.css" >
</head>

<body class="admin-panels-page sb-l-m" data-spy="scroll" data-target="#nav-spy" data-offset="300">
<!-- Start: Main -->

    <!-- Start: Content-Wrapper -->
   
        <div class="col-md-12 col-sm-12 col-xs-12 np">
            <div class="col-md-12 np">
                <div class="col-md-12 light_bg np profile-top">
                    <div class="col-md-10 col-md-offset-1 np text-center pt30">
                        <div id="owl-demo" class="owl-carousel owl-theme posr">
                            <?php 
                            $imgId = 1;
                            foreach ($stories as $story) { 
                                $image=null;  
                                ?>
                                    <?php 
                                    if(!empty($story->suppliersPortfolioImages))
                                    {
                                        foreach ($story->suppliersPortfolioImages as $portImage)
                                        {
                                            $image=$portImage->image;
                                        ?>
                                            <div class="item">
                                            <h3 class="font_newbold"><?php echo strtoupper($story->project_name); ?></h3>
                                            <img src="<?php echo $image;?>" class="cursor" alt="portfolio" data-toggle="modal" data-target="#view-project" style="border:none!important; max-width:1049px; max-height:381px;">
                                            </div>
                                       <?php
                                        break; 
                                        } 
                                    } else 
                                    {?>
                                    <div class="item"><h3 class="font_newbold"><?php echo strtoupper($story->project_name); ?></h3><img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/view-profile.png" class="cursor" alt="portfolio" data-toggle="modal" data-target="#view-project" style="border:none!important; max-width:1049px; max-height:381px;"></div>
                                    <?php
                                    }
                                }
                                ?>
                            
                        </div>
                        <?php if(!empty($suppliers->offers)){?>
                        <div class="img-offer">
                            <?php echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/style/images/special-offer.png" width="80px" height="80px" alt="Special Offer" >', array(''));?>
            
                            <h5 class="display_block font_newregular mt10 blue-new bg-b-o"><?php echo $suppliers->offers;?></h5>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-12 np profile-fix" data-spy="affix" data-offset-top="485" id="header-shadow">
                    <div class="col-md-12 pa20 pl30">
                    <div class="col-md-5">
                        <div class="col-md-2 np">
                                <?php
                                    $profile_img = $this->res["avtar"];
                                    if(!empty($suppliers->image))
                                    {
                                       $profile_img = $suppliers->image;
                                    }
                                 ?>
                                <a href=""><img src="<?php echo $profile_img; ?>/convert?w=75&h=80" width="75px" height="80px" class="mobile-img" alt="Company Logo"/></a>
                        </div>
                        <div class="col-md-10 np">
                            <h1 class="font_newlight nm blue-new"><?php echo $users->company_name; ?></h1>
                            <div class="col-md-12 np">
                                <span class="mr10"><img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/map-icon.png" alt="Location" /> 
                                <?php 
                                    if(!empty($headquater)){
                                        echo $headquater->city->name.','.$headquater->city->countries->name;
                                    }
                                    else{
                                            echo ' --';
                                    }
                                ?> </span>
                                <span class=""><img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/reload-icon.png" alt="Location" />--  </span>
                            </div>
                            <div class="col-md-12 np mt10">
                                <?php 
                                    foreach($suppliers->suppliersHasPortfolios as $port){
                                        foreach ($port->suppliersHasPortfolioHasSkills as $skill){
                                    
                                ?>
                                <span href="" class="btn-sm mr5 mb5"><?php echo $skill->skills->name;?></span>
                                <?php }} ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <span class="circle-new ml20"><h4 class="font_newregular orange-new fs18 mb0"><?php echo $rating; ?></h4><span class="grey-text fs10">Rating</span></span>
                        <span class="circle-new ml20"><h4 class="font_newregular orange-new fs18 mb0"><?php echo count($stories); ?></h4><span class="grey-text fs10">Clients</span></span>
                        <span class="circle-new ml20"><h4 class="font_newregular orange-new fs18 mb0"><?php echo (empty($suppliers->per_hour_rate)?"0":$suppliers->per_hour_rate); ?></h4><span class="grey-text fs10">PerHr($)</span></span>
                    </div>
                    <div class="col-md-3 mt15">
                        <button class="btn-lg font_newregular" type="submit">Edit Profile</button>
                    </div>
                </div>
                    <div class="col-md-12 bgwhite np">
                    <ul class="scroll-nav nav nav-pills nav-border pl30 pb0 pa10 animated-delay" data-animate='["100","fadeIn"]'>
                        <li class="active">
                            <a href="#p1" class="view-nav">
                                <div class="col-sm-2 np"><!--<span class="fa fa-home fa-2x mt5"></span><img src="images/about-icon-hover.png" alt="About Icon" />--><span class="about-icon"></span></div>
                                <div class="col-sm-10">
                                    <h3 class="nm font_newregular fs14 display_inline">About Company</h3>
                                    <span class="grey-text fs10 display_inline"><?php echo count($users->usersOffices); ?> locations</span>
                                </div>
                            </a>                                
                        </li>
                        <li class="">
                            <a href="#p2" class="view-nav">
                                <div class="col-sm-2 np"><!--<span class="fa fa-user fa-2x mt5"></span><img src="images/cs-icon.png" alt="About Icon" />--><span class="stories-icon"></span></div>
                                <div class="col-sm-9">
                                    <h3 class="nm font_newregular fs14 display_inline"> &nbsp; Projects</h3>
                                    <span class="grey-text fs10 display_inline"> &nbsp; <?php echo count($stories); ?> Projects</span>
                                </div>
                            </a>                                
                        </li>
                        <li class="">
                            <a href="#p3" class="view-nav">
                                <div class="col-sm-2 np"><!--<span class="fa fa-comments-o fa-2x mt5"></span><img src="images/testimonial-icon.png" alt="About Icon" />--><span class="testimonial-icon"></span></div>
                                <div class="col-sm-9">
                                    <h3 class="nm font_newregular fs14 display_inline">Testimonials</h3>
                                    <span class="grey-text fs10 display_inline"><?php echo count($suppliers->suppliersHasReferences); ?> reviews</span>
                                </div>
                            </a>                                
                        </li>
                        <li class="">
                            <a href="#p4" class="view-nav">
                                <div class="col-sm-2 np"><!--<span class="fa fa-trophy fa-2x mt5"></span><img src="images/awards-icon.png" alt="About Icon" />--><span class="award-icon"></span></div>
                                <div class="col-sm-10 pl0">
                                    <h3 class="nm font_newregular fs14 display_inline">Awards & Certificates</h3>
                                    <span class="grey-text fs10 display_inline"><?php echo count($awards_listing);?> awards</span>
                                </div>
                            </a>                                
                        </li>
                    </ul>
                </div>
                </div>
                <div class="admin-panels" id="affix-next">
                <div class="col-md-12 pl30 mid-sec animated-waypoint" data-animate="fadeIn" id="p1">
                    <div class="col-md-8 ">
                        <div class="col-md-12">
                            <h1 class="fs24 mb20">Welcome to Our Company</h1>
                            <p class="fs16 wlcm-text">
                                <?php
                                if(!empty($suppliers->about_company))
                                {
                                    echo $suppliers->about_company; 
                                }
                                else
                                {
                                ?> 
                                    --
                                <?php
                                }
                                ?>
                            </p>
                        </div>
                        <div class="col-md-12 mb30 mt30">
                            <h4 class="font_newregular fs14 orange-new">Details</h4>
                            <div class="col-md-12 bt pt10 pb10">
                                <div class="col-md-12 np">
                                    <div class="col-md-5 pa10">
                                        <img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/icon-response-rate.png" alt="employee icon" />
                                        <span class="fs14 ml15"> Response Rate: <span class="blue-new"><?php echo (!empty($suppliers->response_time)) ? $suppliers->response_time : "0"; ?> hrs</span></span> 
                                    </div>
                                    <div class="col-md-5 pa10">
                                        <img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/icon-skype.png" alt="employee icon" />
                                        <span class="fs14 ml15">Skype ID: 
                                            <span class="blue-new">
                                              <?php echo (empty($suppliers->skype_id)) ? "--" : CHtml::link($suppliers->skype_id, "skype:" . $suppliers->skype_id . "?userinfo"); ?> 
                                                    
                                            </span>
                                         </span> 
                                    </div>
                                </div>
                                <div class="col-md-12 np">
                                    <div class="col-md-5 pa10">
                                        <img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/dollar-icon.png" alt="dollar icon" />
                                        <span class="fs14 ml15">Avg. Project Size: 
                                            <span class="blue-new">
                                                <?php echo (!empty($suppliers->project_size)) ? $suppliers->project_size : "--"; ?>
                                             </span>
                                         </span>
                                    </div>
                                    <div class="col-md-5 pa10">
                                        <img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/dollar-icon.png" alt="dollar icon" />
                                        <span class="fs14 ml15">Avg Per Hr. Rate: 
                                            <span class="blue-new">
                                                <?php echo (!empty($suppliers->per_hour_rate)) ? $suppliers->per_hour_rate : "--"; ?>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12 np">
                                    <div class="col-md-5 pa10">
                                        <img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/cal-icon.png" alt="calendar icon" />
                                        <span class="fs14 ml15">Founded In:
                                            <span class="blue-new"> 
                                            <?php echo (!empty($suppliers->foundation_year)) ? $suppliers->foundation_year :"--"; ?>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="col-md-5 pa10">
                                        <img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/emp-icon.png" alt="employee icon" />
                                        <span class="fs14 ml15">No. of Employees:
                                        <span class="blue-new">
                                         <?php echo (!empty($suppliers->number_of_employee)) ? $suppliers->number_of_employee : "--"; ?> Employees
                                         </span>
                                         </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb30">
                            <h4 class="font_newregular fs14 orange-new">Location</h4>
                            <div class="col-md-12 bt pt10 pb10">
                                <div class="col-md-12 np">
                                    <?php
                                    foreach($users->usersOffices as $office)
                                    {
                                    ?>
                                    <div class="col-md-5 pa10">
                                        <img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/location-icon.png" alt="location icon" />
                                        <span class="fs14 ml15"><?php echo $office->dep->name; ?>:</span>
                                        <span>
                                            <span class="blue-new col-offset-xs-1">
                                            <?php echo $office->city->name.', '.$office->city->countries->name; ?> 
                                            </span>
                                            
                                        </span>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb30">
                            <h4 class="font_newregular fs14 orange-new">Team</h4>
                            <div class="col-md-12 bt pt10 pb10 posr">
                                <?php
                                   
                                    $displayCount=4;
                                    $activateToggle=0;
                                    $totalMembers=1;
                                    $startShowing=false;

                                    if(empty($team)) echo "Teams not selected yet.";
                                    foreach ($team as $teamMember) { 
                                    if($startShowing==true){
                                        echo '<div style="display:none;" class="col-md-12 pt10 pb10 team-member-toggle-show'.($activateToggle-1).'">';
                                         $startShowing=false;
                                    }      
                                                                          
                                ?>
                                    <div class="col-md-2 pa10 text-center mr30">
                                        <a href="<?php echo $teamMember->linkedin;?>" class="tm-hover">
                                            <div class="tm-show2"><span class="fa fa-linkedin-square fa-lg mt5"></span></div>

                                            <img class="img img-circle" src="<?php if(empty($teamMember->image))echo Yii::app()->theme->baseUrl.'/style/images/team.png'; else echo $teamMember->image . '/convert?w=80&h=80'; ?>" alt="Team Member" width="70px" height="70px" />
                                            <h5 class="fs12 display_block font_newregular mb5 team-text-blue"><?php echo $teamMember->name; ?></h5>
                                            <h6 class="fs10 display_block nm"><?php echo $teamMember->designation;?></h6>
                                        </a>
                                    </div>
                                <?php 
                                    if((($totalMembers%$displayCount)==0 || $totalMembers==count($team)) && count($team) > 3 ){
                                ?>
                                    <div class="col-md-2 pa10 text-center" id="team-member-toggle<?php echo $activateToggle;?>" data-toggle="<?php /*if($totalMembers==count($team))echo 'end';else*/ echo $activateToggle; ?>" data-end="<?php if($totalMembers==count($team))echo 'true';else echo 'false'; ?>"  >
                                        <a href="javascript:void(0);" class="tm-hover">
                                            <img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/team.png" alt="Team Member" />
                                            <?php if($totalMembers==count($team)){ ?>
                                                <div class="tm-show"><i class="fa fa-chevron-up"></i>Less</div>
                                            <?php }else{ ?>
                                                 <div class="tm-show"><i class="fa fa-chevron-down"></i>More</div>
                                            <?php }?>

                                        </a>
                                    </div>
                           <?php  $activateToggle++;
                                  $startShowing=true;
                                  }
                                
                                if($startShowing==true && $activateToggle!=1){
                                            echo '</div>';
                                }
                               $totalMembers++; 
                            }
                           ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-12 pa10 text-center mb20">
                                <?php
                                    $profile_img = $this->res["avtar"];
                                    if(!empty($suppliers->image))
                                    {
                                       $profile_img = $suppliers->image;
                                    }
                                 ?>
                            <a href="">
                                <img src="<?php echo $profile_img; ?>/convert?w=150&h=150" width="120" height="120" alt="Team Member" class="img-circle border_grey" />
                                <h3 class="display_block font_newregular mb5 team-text-blue"><?php echo $users->company_name; ?></h3>
                                <h6 class="fs12 display_block nm">Founder and CEO</h6>
                            </a>
                            <!--<div class="mt30 mb30">
                                <a href="">
                                    <img src="images/special-offer.png" alt="Special Offer" />
                                </a>
                                <h3 class="display_block font_newregular mt25 blue-new">Enjoy 20 Days Free Trial!</h3>
                            </div>-->
                        </div>
                        <div class="col-md-12 text-center mb50 bb"></div>
                        <div class="col-md-8 col-md-offset-3 mb15">
                            <span class="btn-sm active active-all mr5 mb5" id="all_skills">All</span>
                            <span class="btn-sm active mr5 mb5" id="all_skills_skills">Skills</span>
                            <span class="btn-sm active mr5 mb5" id="all_skills_services">Services</span>
                            <span class="btn-sm active mr5 mb5" id="all_skills_industry">Industry</span>
                        </div>
                        <!-- <div class="col-md-8 col-md-offset-3 mb15">
                            <div class="btn-sm active active-all mr5 mb5"  id="all_skills">All</div>
                            <div class="btn-sm active mr5 mb5"  id="all_skills_skills">Skills</div>
                            <div class="btn-sm active mr5 mb5"  id="all_skills_services">Services</div>
                            <div class="btn-sm active mr5 mb5"   id="all_skills_industry">Industry</div>
                        </div> -->
                        <div class="col-md-8 col-md-offset-3 mb20" id="_skills">
                            <?php 
                                    foreach($suppliers->suppliersHasPortfolios as $port){
                                        foreach ($port->suppliersHasPortfolioHasSkills as $skill){
                                    
                                ?>
                                <a href="" class="btn-sm mr5 mb5"><?php echo $skill->skills->name;?></a>
                                <?php }} ?>
                                <?php 
                                    foreach($suppliers->suppliersHasPortfolios as $port){
                                        foreach ($port->suppliersHasPortfolioHasServices as $service){
                                    
                                ?>
                                <a href="" class="btn-sm mr5 mb5"><?php echo $service->services->name;?></a>
                                <?php }} ?>
                                <?php 
                                    foreach($suppliers->suppliersHasPortfolios as $port){
                                        foreach ($port->suppliersPortfolioHasIndustries as $industry){?>
                                      <a href="" class="btn-sm mr5 mb5"><?php echo $industry->industries->name;?></a>
                                <?php }} ?>

                        </div>

                        <div class="col-md-8 col-md-offset-3 mb20" id="skills_skills" style="display:none;">
                             <?php 
                                    foreach($suppliers->suppliersHasPortfolios as $port){
                                        foreach ($port->suppliersHasPortfolioHasSkills as $skill){
                                    
                                ?>
                                <a href="" class="btn-sm mr5 mb5"><?php echo $skill->skills->name;?></a>
                                <?php }} ?>
                        </div>

                        <div class="col-md-8 col-md-offset-3 mb20" id="services_skills" style="display:none;">
                            <?php 
                                foreach($suppliers->suppliersHasPortfolios as $port){
                                   foreach ($port->suppliersHasPortfolioHasServices as $service){?>
                                    <a href="" class="btn-sm mr5 mb5"><?php echo $service->services->name;?></a>
                            <?php }} ?>
                        </div>

                        <div class="col-md-8 col-md-offset-3 mb20" id="industry_skills" style="display:none;">
                            <?php 
                             foreach($suppliers->suppliersHasPortfolios as $port){
                                foreach ($port->suppliersPortfolioHasIndustries as $industry){?>
                                   <a href="" class="btn-sm mr5 mb5"><?php echo $industry->industries->name;?></a>
                                <?php }} ?>
                        </div>

                        
                    </div>
                </div>
                <div class="col-md-12 show-pro animated-waypoint" data-animate="fadeIn" id="p2">
                    <div class="col-md-12 np">
                        <h1 class="fs24 mb20">Showcasing Our Projects</h1>
                        <div class="col-md-12 np">
                            <?php 
                            $imgId = 1;
                            foreach ($stories as $story) { 
                                $image=null;  
                            ?>
                            <div class="col-md-6 mb30">
                                <div class="rating-outr">
                                    <div id="owl-demo-<?php echo $imgId; ?>" class="owl-carousel">
                                        <?php 
                                        if(!empty($story->suppliersPortfolioImages))
                                        {
                                            foreach ($story->suppliersPortfolioImages as $portImage)
                                            {
                                                $image=$portImage->image . "/convert?w=0&h=150";
                                            ?>
                                                <div class="item">
                                                <img src="<?php echo $image;?>" class="cursor" alt="portfolio" data-toggle="modal" data-target="#view-project" width="376px" height="249px" style="border:none!important">
                                                </div>
                                           <?php 
                                            } 
                                        } else 
                                        {?>
                                        <img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/project1.png" class="cursor" alt="portfolio" data-toggle="modal" data-target="#view-project">
                                        <?php } ?>
                                     </div>
                                    <div class="pr-show">
                                        <h4 class="fs18 nm font_newregular">
                                            <?php
                                                    $avgRating="";
                                                    $refCount   =   count($story->suppliersHasReferences);
                                                    $totalOfRating  =   0;
                                                    if($refCount>0){
                                                        foreach($story->suppliersHasReferences as $rating)
                                                            foreach($rating->suppliersHasCategoryRatings as $rate)
                                                                $totalOfRating  +=  $rate->rating;
                                                        $avgRating = number_format((float)((((int)$totalOfRating))/($refCount*4)),1);
                                                    }
                                                    else{
                                                        $avgRating=0;
                                                        }
                                                    echo $avgRating;
                                            ?>  
                                        </h4>
                                        <span class="fs10">Rating</span>
                                    </div>
                                    <h3 class="display_block font_newregular mb5 team-text-blue"><?php if(!empty($story->project_name)){echo $story->project_name; }else{ echo "Project Title Not Provided";} ?></h3>
                                    <h6 class="fs12 display_inline font_newregular nm text-color-navy"><?php if(!empty($users->company_name)){ echo $users->company_name;}else{ echo "Company Name Not Provided";} ?></h6>
                                    <h6 class="fs12 display_inline font_newregular nm text-color-navy">&nbsp; . &nbsp;Review <?php echo $refCount;?></h6>
                                    <div class="col-md-12 np mt10">
                                    <?php foreach ($story->suppliersHasPortfolioHasSkills as $skill) { ?>
                                          <a class="btn-sm" href=""><?php echo $skill->skills->name; ?></a>
                                    <?php }?>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $imgId++;
                             }?>

                            <?php if($stories==null){ echo "No Project Provided.";} ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 comny-sec animated-waypoint" data-animate="fadeIn">
                    <div id="owl-demo-multiple" class="owl-carousel owl-theme">
                        <div class="item"><?php echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/style/images/dell.png" alt="Dell" >', array(''));?></div>
                        <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/volkswagen.png" alt="Volkswagen"></div>
                        <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/lg.png" alt="Dell"></div>
                        <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/adidas.png" alt="Dell"></div>
                        <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/nbc.png" alt="Dell"></div>
                        <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/fedex.png" alt="Dell"></div>
                        <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/dell.png" alt="Dell"></div>
                        <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/volkswagen.png" alt="Volkswagen"></div>
                        <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/lg.png" alt="Dell"></div>
                        <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/adidas.png" alt="Dell"></div>
                        <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/nbc.png" alt="Dell"></div>
                        <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/fedex.png" alt="Dell"></div>
                        <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/dell.png" alt="Dell"></div>
                        <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/volkswagen.png" alt="Volkswagen"></div>
                        <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/lg.png" alt="Dell"></div>
                        <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/adidas.png" alt="Dell"></div>
                        <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/nbc.png" alt="Dell"></div>
                        <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/fedex.png" alt="Dell"></div>
                    </div>
                </div>
                <div class="col-md-12 pl30 testimonial-sec animated-waypoint" data-animate="fadeIn" id="p3">
                    <div class="col-md-8 mb30">
                        <div class="col-md-12">
                            <h1 class="fs24 mb20">Presenting Testimonials</h1>
                        </div>
                        <div class="col-md-12 mb30 mt10">
                        <?php foreach ($suppliers->suppliersHasReferences as $reference) 
                        { ?>
                            <div class="col-md-12 bt bb pt10 pb10">
                                <div class="col-md-3 pa10 text-center pl0">
                                    <a href="" class="tm-hover">
                                        <div class="tm-show2"><span class="fa fa-linkedin-square fa-lg mt5"></span></div>
                                       <?php if(!empty($reference->clientProfiles->users->image))
                                       { ?>
                                        <img src="<?php echo $reference->clientProfiles->users->image;?>" class="img img-circle"alt="Team Member" width="70px" height="70px" />
                                       <?php } else { ?>
                                       <img class="img img-circle" src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/avatar.png;" alt="Team Member" width="70px" height="70px" />
                                        <?php } ?>
                                        <h5 class="fs14 display_block font_newregular mb5 team-text-blue"><?php echo $reference->clientProfiles->users->first_name." ".$reference->clientProfiles->users->last_name; ?></h5>
                                        <h6 class="fs12 display_block nm text-color-navy mt5"><?php echo $reference->company_name ?></h6>
                                        <label class="label-sm mt5 mb5">Verified</label>
                                    </a>
                                </div>
                                <div class="col-md-9 pa10">
                                    <h3 class="mt0 display_inline mr5 font_newregular"><?php echo $reference->project_name; ?></h3>
                                    <span class="grey-text display_inline fs12">5 days ago</span>
                                    <p class="tsm-text fs14 mb15">
                                        <?php echo $reference->project_description; ?>   
                                    </p>
                                    <a href="" data-toggle="modal" data-target="#view-review" class="orange-new fs14 font_newregular mt5">More</a>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-12 pa10 text-center mb20">
                            <div class="rating-testimonial">
                                <h1 class="fs30 nm font_newregular"><?php echo $totalAvgRating; ?></h1>
                                <span class="fs14">Rating</span>
                            </div>
                            <h3 class="font_newregular mb5 team-text-blue fs14">Overall Summary</h3>
                        </div>
                        <div class="col-md-8 col-md-offset-2 mb15">
                                    <div class="col-sm-12 np mt10 mb10">
                                        <div class="col-sm-12 blue-new np fs14 font_newregular">Skill:</div>
                                        <div class="col-sm-9 np">
                                            <div class="progress progress-bar-sm nm mt5">
                                                <div class="progress-bar progress-bar-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($avgSkill*100)/5; ?>%;">
                                                    <span class="sr-only"><?php echo $avgSkill; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 np text-center font_newregular fs14 blue-new"><?php echo $avgSkill; ?></div>
                                    </div>
                                    <div class="col-sm-12 np mt10 mb10">
                                        <div class="col-sm-12 blue-new np fs14 font_newregular">Timeliness:</div>
                                        <div class="col-sm-9 np">
                                            <div class="progress progress-bar-sm nm mt5">
                                                <div class="progress-bar progress-bar-orange" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo ($avgTimeline*100)/5; ?>%;">
                                                    <span class="sr-only"><?php echo $avgTimeline; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 np text-center font_newregular fs14 blue-new"><?php echo $avgTimeline; ?></div>
                                    </div>
                                    <div class="col-sm-12 np mt10 mb10">
                                        <div class="col-sm-12 blue-new np fs14 font_newregular">Independence:</div>
                                        <div class="col-sm-9 np">
                                            <div class="progress progress-bar-sm nm mt5">
                                                <div class="progress-bar progress-bar-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($avgIndependence*100)/5; ?>%;">
                                                    <span class="sr-only"><?php echo $avgIndependence; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 np text-center font_newregular fs14 blue-new"><?php echo $avgIndependence; ?></div>
                                    </div>
                                </div>
                            </div>
                    </div>
                <div class="col-md-12 tag-sec animated-waypoint" data-animate="fadeIn" id="p4">
                    <div class="tag-section pa10 text-center">
                        <a class="tm-hover" href="">
                            <img alt="Team Member" src="images/vp-tag.png" class="" />
                            <h5 class="fs18 display_block font_newregular mb5">5 YEARS</h5>
                            <h6 class="fs14 display_block nm text-color-navy">with venture pact</h6>
                        </a>
                    </div>
                </div>
                </div>
            </div>
        </div>

<!-- End: Main -->
    <!-- Modal -->
<div class="modal fade" id="view-project" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xlg ">
    <div class="modal-content col-md-12 np">
      <div class="modal-header pa20 new-modal-bg">
        <h2 class="modal-title fs28 text-center" id="myModalLabel">Mobile Wallete</h2>
      </div>
      <div class="modal-body col-md-12 np new-modal-bg slimscroll" >
        <div class="col-md-8">
            <div class="col-md-12 mb30 mt10 np">
                <div class="col-md-12">
                    <div class="view-outr">
                        <div id="owl-demo-6" class="owl-carousel-popup">
                            <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/p1.png" alt="portfolio"></div> 
                            <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/p1.png" alt="portfolio"></div>
                            <div class="item"><img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/p1.png" alt="portfolio"></div>
                        </div>
                        <div class="view-demo col-md-12"><button type="submit" class="font_newregular">View Demo</button></a></div>
                        <p class="tsm-text fs14 mb20">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis feugiat tortor. Sed ornare turpis libero, vel cursus enim vulputate nec. Etiam ut eros massa. Maecenas dictum condimentum justo, non pulvinar lorem congue ut. Nullam aliquet varius ultricies. Cum sociis natoque penatibus et
                        </p>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <h4 class="fs14 font_newregular mb5">Testimonials</h4>
                </div>
                <div class="col-md-12 mb30 mt10">
                    <div class="col-md-12 bt bb pt10 pb10">
                        <div class="col-md-3 pa10 text-center pl0">
                            <a href="" class="tm-hover">
                                <div class="tm-show2"><span class="fa fa-linkedin-square fa-lg mt5"></span></div>
                                <?php echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/style/images/team.png" alt="Team Member" >', array(''));?>
                                <h5 class="fs14 display_block font_newregular mb5 team-text-blue">Pratham Mittal</h5>
                                <h6 class="fs12 display_block nm text-color-navy mt5">CTO, Teckraft Pvt. Ltd.</h6>
                                <label class="label-sm mt5 mb5">Verified</label>
                            </a>
                        </div>
                        <div class="col-md-9 pa10">
                            <h3 class="mt0 display_inline mr5 font_newregular">For Mobile Wallete</h3>
                            <span class="grey-text display_inline fs12">5 days ago</span>
                            <p class="tsm-text fs14 mb15">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis feugiat tortor. Sed ornare turpis libero, vel cursus enim vulputate nec. Etiam ut eros massa. Maecenas dictum condimentum justo, non pulvinar lorem congue ut. Nullam aliquet varius ultricies. Cum sociis natoque penatibus et
                            </p>
                            <a href="" class="orange-new fs14 font_newregular mt5">More</a>
                        </div>
                    </div>
                    <div class="col-md-12 bb pt10 pb10">
                        <div class="col-md-3 pa10 text-center pl0">
                            <a href="" class="tm-hover">
                                <div class="tm-show2"><span class="fa fa-linkedin-square fa-lg mt5"></span></div>
                                <?php echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/style/images/team.png" alt="Team Member" >', array(''));?>
                                <h5 class="fs14 display_block font_newregular mb5 team-text-blue">Pratham Mittal</h5>
                                <h6 class="fs12 display_block nm text-color-navy mt5">CTO, Teckraft Pvt. Ltd.</h6>
                                <label class="label-sm-blue mt5 mb5">Non Verified</label>
                            </a>
                        </div>
                        <div class="col-md-9 pa10">
                            <h3 class="mt0 display_inline mr5 font_newregular">For Mobile Wallete</h3>
                            <span class="grey-text display_inline fs12">5 days ago</span>
                            <p class="tsm-text fs14 mb15">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis feugiat tortor. Sed ornare turpis libero, vel cursus enim vulputate nec. Etiam ut eros massa. Maecenas dictum condimentum justo, non pulvinar lorem congue ut. Nullam aliquet varius ultricies. 
                            </p>
                            <a href="" class="orange-new fs14 font_newregular mt5">More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="col-md-12 mt20 pa10 text-center mb20">
                <div class="rating-testimonial-small">
                    <h1 class="fs24 nm font_newregular">4.0</h1>
                    <span class="fs12">Rating</span>
                </div>
                <h3 class="font_newregular mb5 team-text-blue fs14">Overall Summary</h3>
            </div>
            <div class="col-md-11 col-md-offset-1 mb15 np">
                <div class="col-sm-12 np mt10 mb10">
                    <div class="col-sm-12 blue-new np font_newregular fs14">Technical:</div>
                    <div class="col-sm-9 np">
                        <div class="progress progress-bar-sm nm mt5">
                            <div class="progress-bar progress-bar-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
                                <span class="sr-only">4.0</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 np text-center font_newregular fs14 blue-new">4.0</div>
                </div>
                <div class="col-sm-12 np mt10 mb10">
                    <div class="col-sm-12 blue-new np font_newregular fs14 ">Communication:</div>
                    <div class="col-sm-9 np">
                        <div class="progress progress-bar-sm nm mt5">
                            <div class="progress-bar progress-bar-orange" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:75%;">
                                <span class="sr-only">3.8</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 np text-center font_newregular fs14 blue-new">3.8</div>
                </div>
                <div class="col-sm-12 np mt10 mb10">
                    <div class="col-sm-12 blue-new np font_newregular fs14 ">Timeliness:</div>
                    <div class="col-sm-9 np">
                        <div class="progress progress-bar-sm nm mt5">
                            <div class="progress-bar progress-bar-orange" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                                <span class="sr-only">4.2</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 np text-center font_newregular fs14 blue-new">4.2</div>
                </div>
                <div class="col-sm-12 np mt10 mb10">
                    <div class="col-sm-12 blue-new np font_newregular fs14 ">Design Thinking:</div>
                    <div class="col-sm-9 np">
                        <div class="progress progress-bar-sm nm mt5">
                            <div class="progress-bar progress-bar-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
                                <span class="sr-only">4.0</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 np text-center font_newregular fs14 blue-new">4.0</div>
                </div>
            </div>
            <div class="col-md-12 bt bb pt10 pb10">
                <div class="col-md-4">
                    <img alt="dell" src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/dell-color.png">
                </div>
                <div class="col-md-8 pt15 np">
                    <a href="" class="fs14 font_newregular display_block">Dell Computers</a>
                    <span class="fs14 display_block">New York, USA</span>
                </div>
            </div>
            <div class="col-md-12 bt bb pt10 pb10">
                <div class="col-md-12 pa10">
                    <img alt="dollar icon" src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/dollar-icon.png">
                    <span class="fs14 ml15">Project Size: <span class="blue-new"> $3000</span></span>
                </div>
                <div class="col-md-12 pa10">
                    <img alt="dollar icon" src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/dollar-icon.png">
                    <span class="fs14 ml15">Per Hr. Rate: <span class="blue-new"> $100</span></span>
                </div>
            </div>
            <div class="col-md-12 bt bb pt10 pb10">
                <div class="col-md-12 np">
                    <div class="col-md-12 pa10">
                        <img alt="calendar icon" src="images/cal-icon.png">
                        <span class="fs14 ml15">Founded In: <span class="blue-new"> 20 May 2014</span></span>
                    </div>
                    <div class="col-md-12 pa10">
                        <img alt="employee icon" src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/duration-icon.png">
                        <span class="fs14 ml15">Duration: <span class="blue-new"> 150</span></span>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt30 pl20 pr20 mb20">
                <a class="btn-sm active mr5 mb5" href="">All</a>
                <a class="btn-sm active mr5 mb5" href="">Skills</a>
                <a class="btn-sm active mr5 mb5" href="">Services</a>
                <a class="btn-sm active mr5 mb5" href="">Industry</a>
            </div>
            <div class="col-md-12 pl20 pr20 mb20">
                <a class="btn-sm mr5 mb5" href="">ASP.Net</a>
                <a class="btn-sm mr5 mb5" href="">Open Java</a>
                <a class="btn-sm mr5 mb5" href="">Java Script</a>
                <a class="btn-sm mr5 mb5" href="">ASP</a>
                <a class="btn-sm mr5 mb5" href="">Java</a>
                <a class="btn-sm mr5 mb5" href="">Java Script</a>
                <a class="btn-sm mr5 mb5" href="">Java</a>
                <a class="btn-sm mr5 mb5" href="">ASP.Net</a>
                <a class="btn-sm mr5 mb5" href="">Open Java</a>
                <a class="btn-sm mr5 mb5" href="">Java Script</a>
                <a class="btn-sm mr5 mb5" href="">ASP</a>
                <a class="btn-sm mr5 mb5" href="">Java</a>
                <a class="btn-sm mr5 mb5" href="">Java Script</a>
                <a class="btn-sm mr5 mb5" href="">Java</a>
                <a class="btn-sm mr5 mb5" href="">Java</a>
                <a class="btn-sm mr5 mb5" href="">Java Script</a>
                <a class="btn-sm mr5 mb5" href="">Java</a>
            </div>
        </div>
                 
      </div>
      <!-- <div class="modal-footer col-md-12">
        <button type="button" class="btn btn-primary small-btn">Done</button>
        <button type="button" class="btn btn-default small-btn" data-dismiss="modal">Cancel</button>
      </div>-->
    </div>
  </div>
</div>
<!-- Modal End-->
<!-- Modal End-->
<div class="modal fade" id="view-review" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xlg ">
    <div class="modal-content col-md-12 np">
      <div class="modal-header pa20 new-modal-bg ">
        <h2 class="modal-title fs28 text-center" id="myModalLabel">Mobile Wallete - Testimonial</h2>
        <h5 class="fs12 text-center grey-light mt5 mb5">5 days ago</h5>
      </div>
      <div class="modal-body col-md-12 np new-modal-bg slimscroll" >
        <div class="col-md-8">
            <div class="col-md-12  mt10 np">
                
                <div class="col-md-12 pb30 mt10">
                    <div class="col-md-12 pt10 pb10">
                        <div class="col-md-3 pa10 text-center pl0">
                            <a href="" class="tm-hover">
                                <div class="tm-show2"><span class="fa fa-linkedin-square fa-lg mt5"></span></div>
                                <img src="<?php echo Yii::app()->theme->baseUrl;?>/style/images/team.png" alt="Team Member" />
                                <h5 class="fs14 display_block font_newregular mb5 team-text-blue">Pratham Mittal</h5>
                                <h6 class="fs12 display_block nm text-color-navy mt5">CTO, Teckraft Pvt. Ltd.</h6>
                                <label class="label-sm mt5 mb5">Verified</label>
                            </a>
                        </div>
                        <div class="col-md-9">
                            <div class="col-md-12 mt10 np">
                            <h3 class="mt0 display_inline mr5 fs18 blue-new font_newregular">What did the service provider do well?</h3>
                            <p class="tsm-text fs14 mb15">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis feugiat tortor. Sed ornare turpis libero, vel cursus enim vulputate nec. Etiam ut eros massa. Maecenas dictum condimentum justo, non pulvinar lorem congue ut. Nullam aliquet varius ultricies. Cum sociis natoque penatibus et
                            </p>
                            </div>
                            <div class="col-md-12 mt20 np">
                            <h3 class="mt0 display_inline mr5 fs18 blue-new font_newregular">What did the service provider do well?</h3>
                            <p class="tsm-text fs14 mb15">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis feugiat tortor. Sed ornare turpis libero, vel cursus enim vulputate nec. Etiam ut eros massa. Maecenas dictum condimentum justo, non pulvinar lorem congue ut. Nullam aliquet varius ultricies. Cum sociis natoque penatibus et
                            </p>
                            </div>
                            <div class="col-md-12 mt20 np">
                            <h3 class="mt0 display_inline mr5 fs18 blue-new font_newregular">What did the service provider do well?</h3>
                            <p class="tsm-text fs14 mb15">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis feugiat tortor. Sed ornare turpis libero, vel cursus enim vulputate nec. Etiam ut eros massa. Maecenas dictum condimentum justo, non pulvinar lorem congue ut. Nullam aliquet varius ultricies. Cum sociis natoque penatibus et
                            </p>
                            </div>
                            <div class="col-md-12 mt20 np">
                            <h3 class="mt0 display_inline mr5 fs18 blue-new font_newregular">What did the service provider do well?</h3>
                            <p class="tsm-text fs14 mb15">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis feugiat tortor. Sed ornare turpis libero, vel cursus enim vulputate nec. Etiam ut eros massa. Maecenas dictum condimentum justo, non pulvinar lorem congue ut. Nullam aliquet varius ultricies. Cum sociis natoque penatibus et
                            </p>
                            </div>
                            
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="col-md-12 mt20 pa10 text-center mb20">
                <div class="rating-testimonial-small">
                    <h1 class="fs24 nm font_newregular">4.0</h1>
                    <span class="fs12">Rating</span>
                </div>
                <h3 class="font_newregular mb5 team-text-blue fs14">Overall Summary</h3>
            </div>
            <div class="col-md-11 col-md-offset-1 mb15 np">
                <div class="col-sm-12 np mt10 mb10">
                    <div class="col-sm-12 blue-new np font_newregular fs14">Technical:</div>
                    <div class="col-sm-9 np">
                        <div class="progress progress-bar-sm nm mt5">
                            <div class="progress-bar progress-bar-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
                                <span class="sr-only">4.0</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 np text-center font_newregular fs14 blue-new">4.0</div>
                </div>
                <div class="col-sm-12 np mt10 mb10">
                    <div class="col-sm-12 blue-new np font_newregular fs14 ">Communication:</div>
                    <div class="col-sm-9 np">
                        <div class="progress progress-bar-sm nm mt5">
                            <div class="progress-bar progress-bar-orange" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:75%;">
                                <span class="sr-only">3.8</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 np text-center font_newregular fs14 blue-new">3.8</div>
                </div>
                <div class="col-sm-12 np mt10 mb10">
                    <div class="col-sm-12 blue-new np font_newregular fs14 ">Timeliness:</div>
                    <div class="col-sm-9 np">
                        <div class="progress progress-bar-sm nm mt5">
                            <div class="progress-bar progress-bar-orange" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                                <span class="sr-only">4.2</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 np text-center font_newregular fs14 blue-new">4.2</div>
                </div>
                <div class="col-sm-12 np mt10 mb10">
                    <div class="col-sm-12 blue-new np font_newregular fs14 ">Design Thinking:</div>
                    <div class="col-sm-9 np">
                        <div class="progress progress-bar-sm nm mt5">
                            <div class="progress-bar progress-bar-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
                                <span class="sr-only">4.0</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 np text-center font_newregular fs14 blue-new">4.0</div>
                </div>
            </div>
        
        </div>
                 
      </div>
      <!-- <div class="modal-footer col-md-12">
        <button type="button" class="btn btn-primary small-btn">Done</button>
        <button type="button" class="btn btn-default small-btn" data-dismiss="modal">Cancel</button>
      </div>-->
    </div>
  </div>
</div>
<!-- Modal End-->
<style>
     <style>
    /* page demo styles */
    body {
        min-height: 2500px;
    }   
    .custom-nav-animation li {
        display: none;
    }
    .custom-nav-animation li.animated {
        display: block;
    }
    
    /* nav tray fixed settings */
    ul.tray-nav.affix {
        width: 319px;
        top: 59px;
    }

    #p13 .panel-colorbox .bg-primary,
    #p13 .panel-colorbox .bg-info,
    #p13 .panel-colorbox .bg-danger,
    #p13 .panel-colorbox .bg-alert,
    #p13 .panel-colorbox .bg-dark    {
        display: none;
    }
    /*.modal-open{height:600px;overflow-y:scroll;}*/
    .owl-theme .owl-controls .owl-buttons {text-align:left;}
    .owl-prev{ color: #2c333b !important;}
    .owl-next{ color: #2c333b !important;}
    
    </style>

<!-- BEGIN: PAGE SCRIPTS --> 
<!-- jQuery -->

<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/style/vendor/jquery/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/style/vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

<!-- Bootstrap -->


<!-- Page Plugins -->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/style/vendor/plugins/magnific/jquery.magnific-popup.js"></script>

<!-- Admin Widgets  -->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/style/assets/admin-tools/admin-plugins/admin-panels/json2.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/style/assets/admin-tools/admin-plugins/admin-panels/jquery.ui.touch-punch.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/style/assets/admin-tools/admin-plugins/admin-panels/adminpanels.js"></script>

<!-- Theme Javascript -->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/style/assets/js/utility/utility.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/style/assets/js/main.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/style/assets/js/demo.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/style/js/owl.carousel.js"></script> 
<script src="<?php echo Yii::app()->theme->baseUrl;?>/style/js/bootstrap-select.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/style/js/jquery.slimscroll.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        
        $('[data-toggle="tooltip"]').tooltip()

        "use strict";

        // Init Theme Core
        Core.init();

        // Init Theme Core    
        Demo.init();

        // Init custom navigation animation
        setTimeout(function() {
            $('.custom-nav-animation li').each(function(i, e) {
                var This = $(this);
                var timer = setTimeout(function() {
                    This.addClass('animated animated-short zoomIn');
                }, 50 * i);
            });
        }, 500);
        
        $('.admin-panels').adminpanel({
            grid: '.admin-grid',
            draggable: true,
            mobile: true,
            callback: function() {
                bootbox.confirm('<h3>A Custom Callback!</h3>', function() {});
            },
            onFinish: function() {
                $('.admin-panels').addClass('animated fadeIn').removeClass('fade-onload');

                // Init Demo smoothscroll
                $('.scroll-nav a').smoothScroll({
                    offset: -155
                });

            },
            onSave: function() {
                $(window).trigger('resize');
            }
        });
        
        
        
    });


    $(document).ready(function() {
    
    $('.view-nav').click(function(){
        $(this).parent().siblings().removeClass('active');
        $(this).parent().addClass('active');
    });
    $(window).scroll(function(){
        var sticky = $('#affix-next'),
        scroll = $(window).scrollTop();

        if (scroll >= 485) sticky.addClass('affix-next');
        else sticky.removeClass('affix-next');
    });

    
    
    var time = 7; // time in seconds     
    var $progressBar,
    $bar,
    $elem,
    isPause,
    tick,
    percentTime;     
    //Init the carousel
    $("#owl-demo").owlCarousel({
    slideSpeed : 2000,
    paginationSpeed :2000,
    singleItem : true,
    pagination : false,
    responsive : true,
    autoPlay: true,
    transitionStyle : "fade",
    //afterInit : progressBar,
    //afterMove : moved,
    startDragging : pauseOnDragging
    });
    
     
    //Init progressBar where elem is $("#owl-demo")
    function progressBar(elem){
    $elem = elem;
    //build progress bar elements
    buildProgressBar();
    //start counting
    start();
    }
     
    //create div#progressBar and div#bar then prepend to $("#owl-demo")
    function buildProgressBar(){
    $progressBar = $("<div>",{
    id:"progressBar"
    });
    $bar = $("<div>",{
    id:"bar"
    });
    $progressBar.append($bar).prependTo($elem);
    }
     
    function start() {
    //reset timer
    percentTime = 0;
    isPause = false;
    //run interval every 0.01 second
    tick = setInterval(interval, 10);
    };
     
    function interval() {
    if(isPause === false){
    percentTime += 1 / time;
    $bar.css({
    width: percentTime+"%"
    });
    //if percentTime is equal or greater than 100
    if(percentTime >= 100){
    //slide to next item
    $elem.trigger('owl.next')
    }
    }
    }
     
    //pause while dragging
    function pauseOnDragging(){
    isPause = true;
    }
     
    //moved callback
    function moved(){
    //clear interval
    clearTimeout(tick);
    //start again
    start();
    }
    
    <?php 
        for($screen=1;$screen<=count($stories);$screen++)
        {
            ?>
             $("#owl-demo-<?php echo $screen; ?>").owlCarousel({
                  navigation : true,
                  pagination : false,
                  singleItem : true,
                  transitionStyle : "fade",
                  slideSpeed : 800,
                  paginationSpeed : 2100,
                  //autoPlay: 3600,
                  navigationText: [
                  "<i class='fa fa-angle-left'></i>",
                  "<i class='fa fa-angle-right'></i>"
                  ],
                });
            <?php
        }
    ?>
    
   
    
    var owl = $("#owl-demo-multiple");
 
    owl.owlCarousel({
    items : 8, //10 items above 1000px browser width
    itemsDesktop : [1000,5], //5 items between 1000px and 901px
    itemsDesktopSmall : [900,4], // betweem 900px and 601px
    itemsTablet: [600,3], //2 items between 600 and 0
    itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
    pagination : false,
    });
    // Custom Navigation Events
    owl.trigger('owl.play',2500); 
    
    
    
    $('.slimscroll').slimscroll();
        
    });
    $("#notification-toggle").hover(function(){
        $.each($('div.progress-bar'),function(){
            $(this).css('width', $(this).attr('aria-valuetransitiongoal')+'%');             
        });
    });
    $(window).scroll(function() {
            if ($(this).scrollTop() == 0) {
                $('#header-shadow').css({
                        'box-shadow': 'none',
                        '-moz-box-shadow' : 'none',
                        '-webkit-box-shadow' : 'none' });
            }
            else {
                $('#header-shadow').css({
                        'box-shadow': '0 3px 6px rgba(0, 0, 0, 0.1)',
                        '-moz-box-shadow' : '0 3px 6px rgba(0, 0, 0, 0.1)',
                        '-webkit-box-shadow' : '0 3px 6px rgba(0, 0, 0, 0.1)' });
            }
        });
        
        $(".slimscroll-long").scroll(function() {
        console.log("scrolling");
            if ($(this).scrollTop() == 0) {
                $('#header-shadow').css({
                        'box-shadow': 'none',
                        '-moz-box-shadow' : 'none',
                        '-webkit-box-shadow' : 'none' });
            }
            else {
                $('#header-shadow').css({
                        'box-shadow': '0 3px 6px rgba(0, 0, 0, 0.1)',
                        '-moz-box-shadow' : '0 3px 6px rgba(0, 0, 0, 0.1)',
                        '-webkit-box-shadow' : '0 3px 6px rgba(0, 0, 0, 0.1)' });
            }
        });

        $( "[id^='team-member-toggle']" ).click(function() {
            if($(this).attr('data-end')=='true'){
                $("[class*='team-member-toggle-show']").fadeOut( "slow" );
                $("[id^='team-member-toggle']").fadeIn('slow');
            }else{
                $( ".team-member-toggle-show"+$(this).attr('data-toggle')).fadeIn( "slow" );
                $( this ).fadeOut( "slow" );
            }
        });

        //handle skills display

        $("[id^='all_skills']").click(function(){
            var id=$(this).attr('id').substr(11);
            $("#"+id+"_skills").fadeIn('fast');
            var arr=['','skills','services','industry'];
            for(i=0;i<4;i++){
                if(id!=arr[i]){
                    $("#"+arr[i]+"_skills").fadeOut('fast');
                }
            }
            //alert(id);

        });

        // $("[data-toggle=end]").click({
        //     $( ".team-member-toggle-show-end").fadeOut( "slow" );
        //     $()
        // });
        // $( "#team-member-toggle" ).click(function() {
        //     $( ".new-add-tm" ).fadeIn( "slow" );
        // });
        // $( "#team-member-toggle1" ).click(function() {
        //     $( ".team-member-toggle-show" ).fadeOut( "hide" );
        //     $( ".new-add-tm" ).fadeOut( "hide" );
        // });
    
</script>

<!-- Theme Javascript --> 
</body>
</html>