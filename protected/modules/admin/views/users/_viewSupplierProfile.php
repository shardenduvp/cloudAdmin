<?php
Yii::app()->clientScript->registerScript('search', "
  $('.seeMoreInfo').click(function(e) {
    e.preventDefault();
    var element = $(this);
    $('.extraInfo').slideToggle();
  });
");

// get offices of suppliers
$offices = UsersOffices::model()->findAllByAttributes(array('user_id'=>$var->users->id));
$location = array();
if(!empty($offices)) {
  foreach($offices as $office) {
    if($office->dep_id == 1) {
      $location['head']['city']= $office->city->name;
      $location['head']['country']= $office->city->countries->name;
      $location['head']['region']= $office->city->countries->regions->name;
      $location['head']['text'] = $location['head']['city'] . ", " . $location['head']['country'] . ", " . $location['head']['region'];
    }
    if($office->dep_id == 2) {
      $location['sale']['city']= $office->city->name;
      $location['sale']['country']= $office->city->countries->name;
      $location['sale']['region']= $office->city->countries->regions->name;
      $location['sale']['text'] = $location['sale']['city'] . ", " . $location['sale']['country'] . ", " . $location['sale']['region'];
    }
    if($office->dep_id == 3) {
      $location['dev']['city']= $office->city->name;
      $location['dev']['country']= $office->city->countries->name;
      $location['dev']['region']= $office->city->countries->regions->name;
      $location['dev']['text'] = $location['dev']['city'] . ", " . $location['dev']['country'] . ", " . $location['dev']['region'];
    }
    if($office->dep_id == 4) {
      $location['mang']['city']= $office->city->name;
      $location['mang']['country']= $office->city->countries->name;
      $location['mang']['region']= $office->city->countries->regions->name;
      $location['mang']['text'] = $location['mang']['city'] . ", " . $location['mang']['country'] . ", " . $location['mang']['region'];
    }
    if($office->dep_id == 5) {
      $location['design']['city']= $office->city->name;
      $location['design']['country']= $office->city->countries->name;
      $location['design']['region']= $office->city->countries->regions->name;
      $location['design']['text'] = $location['design']['city'] . ", " . $location['design']['country'] . ", " . $location['design']['region'];
    }
  }
}
?>

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

      <div class=" col-lg-10">
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-4">
                <strong>Supplier Id</strong>
              </div>
              <div class="col-md-8">
                <p><?php echo $var->id; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-4">
                <strong>Supplier Name</strong>
              </div>
              <div class="col-md-8">
                <p><?php echo (!empty($var->name)) ? $var->name: "Not Provided"; ?></p>
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
                <strong>Website</strong>
              </div>
              <div class="col-md-8">
                <p><?php echo (!empty($var->website)) ? $var->website: "Not Provided"; ?></p>
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
                <strong>No of Employee</strong>
              </div>
              <div class="col-md-8">
                <p><?php echo (!empty($var->no_of_employee)) ? $var->no_of_employee: "Not Provided"; ?></p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-4">
                <strong>Location</strong>
              </div>
              <div class="col-md-8">
                <p>
                <?php echo (isset($location['head']['text']) && !empty($location['head']['text'])) ? $location['head']['text'] : "Not Provided"; ?>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-4">
                <strong>Linked in</strong>
              </div>
              <div class="col-md-8">
                <p><?php echo (!empty($var->linkedin)) ? $var->linkedin: "Not Provided"; ?></p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="row">
      <div class="col-md-5"></div>
      <div class="col-md-2">
        <?php echo CHtml::link("See more", "#", array('class'=>'seeMoreInfo')); ?>
      </div>
      <div class="col-md-5"></div>
    </div>

    <hr class="separator mt0 mb10"/>

    <div class="row extraInfo separate" style="display:none;">
      <div class="col-md-offset-1 col-md-10">
        <div class="row infoDiv">
          <div class="col-md-10">
            <!-- Field Start -->
            <div class="row fieldRow">
              <div class="col-md-6 infoLabel taRight">
                <strong>Full Name</strong>
              </div>
              <div class="col-md-5 col-md-offset-1 infoValue">
                <?php
                $name = ucfirst($var->users->first_name) ." ". ucfirst($var->users->last_name);
                if(empty($name)) $name = "Not Provided";
                echo $name;
                ?>
              </div>
            </div>
            <!-- Field Start -->
            <div class="row fieldRow">
              <div class="col-md-6 infoLabel taRight">
                <strong>Username/Email</strong>
              </div>
              <div class="col-md-5 col-md-offset-1 infoValue">
                <?php echo (!empty($var->users->username)) ? $var->users->username : "Not Provided"; ?>
              </div>
            </div>
            <!-- Field Start -->
            <div class="row fieldRow">
              <div class="col-md-6 infoLabel taRight">
                <strong>Alternate Email</strong>
              </div>
              <div class="col-md-5 col-md-offset-1 infoValue">
                <?php echo (!empty($var->email)) ? $var->email : "Not Provided"; ?>
              </div>
            </div>
            <!-- Field Start -->
            <?php
            $supPortfolios = $var->suppliersHasPortfolios;
            $skills = array();
            $services = array();
            $industries = array();
            foreach ($supPortfolios as $supFolio) {
              $folioSkills = $supFolio->suppliersHasPortfolioHasSkills;
              $folioServices = $supFolio->suppliersHasPortfolioHasServices;
              $folioIndustries = $supFolio->suppliersPortfolioHasIndustries;
              foreach ($folioSkills as $skill)
                if(!in_array($skill->skills->name, $skills))
                  $skills[] = $skill->skills->name;
              foreach ($folioServices as $service)
                if(!in_array($service->services->name, $services))
                  $services[] = $service->services->name;
              foreach ($folioIndustries as $industry)
                if(!in_array($industry->industries->name, $industries))
                  $industries[] = $industry->industries->name;
            }
            ?>
            <div class="row fieldRow">
              <div class="col-md-6 infoLabel taRight">
                <strong>Skills</strong>
              </div>
              <div class="col-md-5 col-md-offset-1 infoValue">
                <?php
                  $value = "";
                  foreach ($skills as $skill) {
                    $value .= $skill . ", ";
                  }
                  $value = rtrim($value, ", ");
                  echo (!empty($value))?$value:"Not Provided";
                ?>
              </div>
            </div>
            <!-- Field Start -->
            <div class="row fieldRow">
              <div class="col-md-6 infoLabel taRight">
                <strong>Services</strong>
              </div>
              <div class="col-md-5 col-md-offset-1 infoValue">
                <?php
                  $value = "";
                  foreach ($services as $service) {
                    $value .= $service . ", ";
                  }
                  $value = rtrim($value, ", ");
                  echo (!empty($value))?$value:"Not Provided";
                ?>
              </div>
            </div>
            <!-- Field Start -->
            <div class="row fieldRow">
              <div class="col-md-6 infoLabel taRight">
                <strong>Industries</strong>
              </div>
              <div class="col-md-5 col-md-offset-1 infoValue">
                <?php
                  $value = "";
                  foreach ($industries as $industry) {
                    $value .= $industry . ", ";
                  }
                  $value = rtrim($value, ", ");
                  echo (!empty($value))?$value:"Not Provided";
                ?>
              </div>
            </div>
            <!-- Field Start -->
            <div class="row fieldRow">
              <div class="col-md-6 infoLabel taRight">
                <strong>Headquarter Location</strong>
              </div>
              <div class="col-md-5 col-md-offset-1 infoValue">
                <?php echo (isset($location['head']['text']) && !empty($location['head']['text'])) ? $location['head']['text'] : "Not Provided"; ?>
              </div>
            </div>
            <!-- Field Start -->
            <div class="row fieldRow">
              <div class="col-md-6 infoLabel taRight">
                <strong>Sales Location</strong>
              </div>
              <div class="col-md-5 col-md-offset-1 infoValue">
                <?php echo (isset($location['sale']['text']) && !empty($location['sale']['text'])) ? $location['sale']['text'] : "Not Provided"; ?>
              </div>
            </div>
            <!-- Field Start -->
            <div class="row fieldRow">
              <div class="col-md-6 infoLabel taRight">
                <strong>Developers Location</strong>
              </div>
              <div class="col-md-5 col-md-offset-1 infoValue">
                <?php echo (isset($location['dev']['text']) && !empty($location['dev']['text'])) ? $location['dev']['text'] : "Not Provided"; ?>
              </div>
            </div>
            <!-- Field Start -->
            <div class="row fieldRow">
              <div class="col-md-6 infoLabel taRight">
                <strong>Project Managers Location</strong>
              </div>
              <div class="col-md-5 col-md-offset-1 infoValue">
                <?php echo (isset($location['mang']['text']) && !empty($location['mang']['text'])) ? $location['mang']['text'] : "Not Provided"; ?>
              </div>
            </div>
            <!-- Field Start -->
            <div class="row fieldRow">
              <div class="col-md-6 infoLabel taRight">
                <strong>Design Department Location</strong>
              </div>
              <div class="col-md-5 col-md-offset-1 infoValue">
                <?php echo (isset($location['design']['text']) && !empty($location['design']['text'])) ? $location['design']['text'] : "Not Provided"; ?>
              </div>
            </div>
            

            <!-- <div class="row fieldRow">
              <div class="col-md-6 infoLabel taRight">
                <strong>Price Tier</strong>
              </div>
              <div class="col-md-5 col-md-offset-1 infoValue">
                <?php
                // if(!empty($var->price_tier_id)) {
                //   $tier = PriceTier::model()->findByPk($var->price_tier_id);
                //   echo "$".$tier->min_price . "-$" . $tier->max_price;
                // } else echo "Not Provided";
                ?>
              </div>
            </div>
            <div class="row fieldRow">
              <div class="col-md-6 infoLabel taRight">
                <strong>Minimum Price</strong>
              </div>
              <div class="col-md-5 col-md-offset-1 infoValue">
                <?php // echo (!empty($var->min_price))?"$".$var->min_price:"Not Provided"; ?>
              </div>
            </div> -->
            <!-- Field Start -->
            
            <!-- <div class="row fieldRow">
              <div class="col-md-6 infoLabel taRight">
                <strong>City</strong>
              </div>
              <div class="col-md-5 col-md-offset-1 infoValue">
                
              </div>
            </div>
            <div class="row fieldRow">
              <div class="col-md-6 infoLabel taRight">
                <strong>Countries</strong>
              </div>
              <div class="col-md-5 col-md-offset-1 infoValue">
                
              </div>
            </div>
            <div class="row fieldRow">
              <div class="col-md-6 infoLabel taRight">
                <strong>Regions</strong>
              </div>
              <div class="col-md-5 col-md-offset-1 infoValue">

              </div>
            </div> -->
          </div>
          <div class="col-md-2">
            <?php echo CHtml::link('Edit Supplier Details', array('/admin/users/update/', 'id'=>$var->users->id, 'update'=>'supplier'), array('class'=>'btn btn-info vpblue mt6')); ?>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="row">
            <div class="col-sm-12">
                <h4>Portfolios Details</h4>
            </div>
        </div>
        <br/>
        <div class="row">
          <?php
          if(!empty($var->suppliersHasPortfolios)) {
            foreach ($var->suppliersHasPortfolios as $portfolio) {
            ?>
              <div class="col-md-6">
                <div class="well well-sm fix175">
                  <!-- Section title -->
                  <div class="subDivTitle">
                    <div class="row">
                      <div class="col-md-9">
                        <?php
                        $name = (!empty($portfolio->project_name)) ? ucfirst($portfolio->project_name) : "Not Provided";
                        $name = (strlen($name) > 30)? substr($name, 0,30)."...": $name;
                        ?>
                        <h4>Portfolio: <?php echo CHtml::link($name,Yii::app()->createUrl('/admin/suppliersHasPortfolio/view',array('id'=>$portfolio->id)),array('class'=>'link')); ?></h4>
                      </div>
                      <div class="col-md-3">
                        <span class="label label-primary">
                          <strong>
                            <?php
                            switch($portfolio->status){
                              case 0: $value = 'Deleted Story'; break;
                              case 1: $value = 'Active Story'; break;
                              default: $value = 'Not Verified'; break;
                            }
                            echo $value;
                            ?>
                          </strong>
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="subDivContent">

                    <div class="row fieldRow">
                      <div class="col-md-2"><strong>Skills</strong></div>
                      <div class="col-md-10">
                        <?php
                            $skills = $portfolio->suppliersHasPortfolioHasSkills;
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
                            $services = $portfolio->suppliersHasPortfolioHasServices;
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
                            $industries = $portfolio->suppliersPortfolioHasIndustries;
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
                            <strong>Client</strong>
                          </div>
                          <div class="col-md-8">
                            <?php echo (!empty($portfolio->client_name))?$portfolio->client_name:"Not Provided"; ?>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-5">
                            <strong>Year</strong>
                          </div>
                          <div class="col-md-7">
                            <?php echo (!empty($portfolio->year_done)) ? $portfolio->year_done : "Not Provided"; ?>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row fieldRow">
                      <div class="col-md-2"><strong>Type</strong></div>
                      <div class="col-md-10">
                        <?php
                          switch($portfolio->portfolio_type){
                            case 0: $value = 'Client Project'; break;
                            case 1: $value = 'Off the Shelf Project'; break;
                            case 2: $value = 'Open Source Project'; break;
                            default: $value = 'Not Verified'; break;
                          }
                          echo $value;
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php
            }
          }else {
          ?>
            <h5 class="noProfile-inner">This supplier does not have any Portfolios.</h5>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>