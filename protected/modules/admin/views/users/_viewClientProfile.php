    <div class="box">

          <div class="panel-body">

            <div class="row">
              <div class="col-lg-2 " align="center"> 
                <img alt="User Pic"
                  class="img-circle"
                  style="width:100px;height:100px;"
                  src="<?php if($var->image==null){
                          echo Yii::app()->theme->baseUrl."/adminPanel/img/user.png";
                        }else{
                          echo $var->image;
                        }
                        ?>"
                />
              </div>

              <div class="col-lg-10">
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-4">
                        <strong>Client Id</strong>
                      </div>
                      <div class="col-md-8">
                        <p><?php echo $var->id; ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-4">
                        <strong>Company Name</strong>
                      </div>
                      <div class="col-md-8">
                        <p><?php echo (!empty($var->users->company_name)) ? $var->users->company_name: "Not Provided"; ?></p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-4">
                        <strong>Skype Id</strong>
                      </div>
                      <div class="col-md-8">
                        <p><?php echo (empty($var->skype_id)) ? "Not Provided" : CHtml::link($var->skype_id, "skype:" . $var->skype_id . "?userinfo"); ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-4">
                        <strong>Company Link</strong>
                      </div>
                      <div class="col-md-8">
                        <p><?php echo (!empty($var->company_link)) ? $var->company_link: "Not Provided"; ?></p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-4">
                        <strong>Foundation Year</strong>
                      </div>
                      <div class="col-md-8">
                        <p><?php echo (!empty($var->foundation_year)) ? $var->foundation_year: "Not Provided"; ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-4">
                        <strong>Team Size</strong>
                      </div>
                      <div class="col-md-8">
                        <p><?php echo (!empty($var->team_size)) ? $var->team_size: "Not Provided"; ?></p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-4">
                        <strong>Category</strong>
                      </div>
                      <div class="col-md-8">
                        <p><?php echo (!empty($var->category)) ? $var->category: "Not Provided"; ?></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-4">
                        <strong>City</strong>
                      </div>
                      <div class="col-md-8">
                        <?php
                        $clientCities = $var->cities;
                        $location = "";
                        foreach ($clientCities as $clientCity) {
                          if($clientCity->is_main == 1) {
                            $location .= $clientCity->cities->name . ", " . $clientCity->cities->countries->name;
                          }
                        }
                        ?>
                        <p><?php echo (!empty($location)) ? $location: "Not Provided"; ?></p>
                      </div>
                    </div>
                  </div>
                </div>  
              </div>

            </div>

            <!-- <div class="row">
              <div class="col-md-5"></div>
              <div class="col-md-2">
                <?php // echo CHtml::link('Edit Client Details', array('/admin/users/update/', 'id'=>$var->id), array('class'=>'btn btn-info vpblue mt30')); ?>
              </div>
              <div class="col-md-5"></div>
            </div> -->

            <hr/>

            <div class="row">
              <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-12 mt10i">
                        <h4>Projects Details</h4>
                    </div>
                </div>
                <br/>
                <div class="row">
                  <?php
                    if(!empty($var->clientProjects)) {
                    foreach ($var->clientProjects as $project) {
                  ?>
                    <div class="col-md-6">
                      <div class="well well-sm fix175">
                        <!-- Section title -->
                        <div class="subDivTitle">
                          <div class="row">
                            <div class="col-md-10">
                              <?php $name = (strlen($project->name) > 30)? substr($project->name, 0,30)."...": $project->name; ?>
                              <h4>Project: <?php echo CHtml::link(ucfirst($name),Yii::app()->createUrl('/admin/clientProjects/view',array('id'=>$project->id)),array('class'=>'link')); ?></h4>
                            </div>
                            <div class="col-md-2">
                              <span class="label label-primary">
                                <strong>
                                  <?php
                                  switch($project->status){
                                    case 0: $value = 'New'; break;
                                    case 1: $value = 'Verified'; break;
                                    case 2: $value = 'Active'; break;
                                    case 3: $value = 'Archive'; break;
                                    default: $value = 'Inactive'; break;
                                  }
                                  echo $value;
                                  ?>
                                </strong>
                              </span>
                            </div>
                          </div>
                        </div>
                        <!-- <hr/> -->
                        <div class="subDivContent">
                          <div class="row fieldRow">
                            <div class="col-md-2"><strong>Tier</strong></div>
                            <div class="col-md-10">
                              <?php
                              if(!empty($project->tier)){
                                $tiers = explode(",", $project->tier);
                                $value = "";
                                foreach ($tiers as $id) {
                                  $tier = PriceTier::model()->findByAttributes(array('id'=>$id));
                                  $value .= "$".$tier->min_price . "-$" . $tier->max_price . ", ";
                                }
                                $value = rtrim($value, ", ");
                                if(strlen($value) > 60)
                                  $value = substr($value,0,60).'...';
                                echo $value;
                              }else echo "Not Set";
                              ?>
                            </div>
                          </div>

                          <div class="row fieldRow">
                            <div class="col-md-2"><strong>Skills</strong></div>
                            <div class="col-md-10">
                              <?php
                                  $skills = $project->clientProjectsHasSkills;
                                  $value = "";
                                  if(!empty($skills)) {
                                    foreach($skills as $skill){
                                      $value .= $skill->skills->name.", ";
                                    }
                                    $value = rtrim($value, ", ");
                                  } else $value = "Not Provided";
                                  if(strlen($value) > 60)
                                    $value = substr($value,0,60).'...';
                                  echo $value;
                                  ?>
                            </div>
                          </div>

                          <div class="row fieldRow">
                            <div class="col-md-2"><strong>Services</strong></div>
                            <div class="col-md-10">
                              <?php
                                  $services = $project->clientProjectsHasServices;
                                  $value = "";
                                  if(!empty($services)) {
                                    foreach($services as $service){
                                      $value .= $service->services->name.", ";
                                    }
                                    $value = rtrim($value, ", ");
                                  } else $value = "Not Provided";
                                  if(strlen($value) > 60)
                                    $value = substr($value,0,60).'...';
                                  echo $value;
                                  ?>
                            </div>
                          </div>

                          <div class="row fieldRow">
                            <div class="col-md-2"><strong>Industries</strong></div>
                            <div class="col-md-10">
                              <?php
                                  $industries = $project->clientProjectsHasIndustries;
                                  $value = "";
                                  if(!empty($industries)) {
                                    foreach($industries as $industry){
                                      $value .= $industry->industries->name.", ";
                                    }
                                    $value = rtrim($value, ", ");
                                  } else $value = "Not Provided";
                                  if(strlen($value) > 60)
                                    $value = substr($value,0,60).'...';
                                  echo $value;
                                  ?>
                            </div>
                          </div>

                          <div class="row fieldRow">
                            <div class="col-md-6">
                              <div class="row">
                                <div class="col-md-4">
                                  <strong><?php echo (!empty($project->modify_date)) ? "Modified":"Added"; ?></strong>
                                </div>
                                <div class="col-md-8">
                                  <?php echo (!empty($project->modify_date))?$project->modify_date:((!empty($add_date))?$project->add_date:"Not Provided"); ?>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="row">
                                <div class="col-md-5">
                                  <strong>Budget</strong>
                                </div>
                                <div class="col-md-7">
                                  <?php echo (!empty($project->min_budget))?"$".$project->min_budget:"Not Provided"; ?>
                                  -
                                  <?php echo (!empty($project->max_budget))?"$".$project->max_budget:"Not Provided"; ?>
                                </div>
                              </div>
                            </div>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  <?php
                    }
                  } else {
                    ?>
                    <h5 class="noProfile-inner">This client does not have any Projects.</h5>
                    <?php
                  }
                  ?>
                </div>
              </div>
            </div>
  </div>
</div>