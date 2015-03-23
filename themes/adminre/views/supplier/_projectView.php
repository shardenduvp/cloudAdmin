<style>
    #verifiedDiv
    {
        padding: 2px;
        background-color: #8CC6DC;
        color: #fff;
        border-radius:5px;
        width: 60px;
        text-align: center;
        font-size: 10px;
    }
    .insideClasses
    {
        border-top: 1px solid #e2e2e2;
        margin-top: 3px;
        font-size: 10px;
        text-align: justify;
    }
    
</style>
<div class="white_outer">
	<div class="container">
		<div class="row">
			<div class="col-md-12 "><h3><?php echo $project->clientProjects->name; ?></h3></div>
		</div>
	</div>
</div>

<div class="dark-wrapper">
	<div class="container inner">
		<div class="row">
            <div class="col-md-3" style="border: 1px solid #e2e2e2;">
                <div class="col-md-12">                
                    <div class="col-md-3 mt10">
                        <?php 
                            $avtar_img=Yii::app()->theme->baseUrl."/style/images/avatar.png";
                            if($project->clientProjects->clientProfiles->image!="")
                            {
                                $avtar_img = $project->clientProjects->clientProfiles->image;
                            } 
                        ?>
                        <img src="<?php echo $avtar_img; ?>" class="img-circle" id="profile_img" width="80"  />
                    </div>
                    <div class="col-md-9">
                        <h5 class="font_size10"><?php echo $project->clientProjects->clientProfiles->users->company_name; ?></h5>
                        <h5 class="font_size10"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> 
                            <?php 
                                foreach($project->clientProjects->clientProfiles->cities as $city)
    					        {
                				    if($city->is_main == 1)
                					   echo $city->cities->name; 
                					   break;
                				} 
            				?>
                        </h5>
                        <div id="verifiedDiv"><?php echo ($project->clientProjects->clientProfiles->users->status == 1)?" Verified":" Not-Verified" ?></div>
                    </div>
                </div>
                <div class="col-md-12 font_size10 insideClasses">
                   <h5><b>Client Info</b></h5>
                   <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Founded in <?php echo $project->clientProjects->clientProfiles->foundation_year; ?><br />
                   <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> ???? <br/>
                   <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <?php echo $project->clientProjects->clientProfiles->team_size; ?> Employees ?? <br/>
                   <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> ????
                </div>
                <div class="col-md-12 font_size10 insideClasses">
                    <h5><b>Venturepact View</b></h5>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. ???????
                </div>
                <div class="col-md-12 font_size10 insideClasses">
                    <h5><b>Project Info</b></h5>
                    <?php echo $project->clientProjects->name; ?> <br />
                    <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <?php echo $project->clientProjects->currentStatus->name; ?> <br />
                    <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <?php echo $project->clientProjects->preferences; ?> 
                </div>
                <div class="col-md-12 font_size10 insideClasses">
                    <h5><b>Requirements</b></h5>
                     <?php foreach($project->clientProjects->clientProjectsHasSkills  as $skill)echo $skill->skills->name.', '; ?>
				     <?php foreach($project->clientProjects->clientProjectsHasServices  as $service)echo $service->services->name.', '; ?>
					 <?php foreach($project->clientProjects->clientProjectsHasIndustries  as $industry)echo $industry->industries->name.', '; ?>
                </div>
                <div class="col-md-12 font_size10 insideClasses">
                    <h5><b>Summary</b></h5>
                    <?php echo $project->clientProjects->description; ?> 
                </div>
                <div class="col-md-12 font_size10 insideClasses">
                    <h5><b>Reference Files</b></h5>
                    <?php 
                        foreach($project->clientProjects->clientProjectDocuments  as $ref)
                        {
                            echo '<a target="_blank" href="'.$ref->path.'">'.$ref->name.'</a><br/>';        
                        }
                    ?>
                    <br />
                </div>
            </div>
            <div class="col-md-9" style="border: 1px solid #e2e2e2;min-height: 550px ;">
                <?php 
                    //CVarDumper::dump($project,10,1);
                ?>
            </div>
		</div>
	</div>
</div>
 <?php $this->Widget('WidgetChatController'); ?>
