<?php if(!empty($var)){?>
    <div class="box">
      <div>
        <div class="panel panel-info">
          <div class="panel-heading ">
            <h3 class="panel-title"><b>Client Details For User Id #<?php echo $var->users_id; ?></b></h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class=" col-md-9 col-lg-12 "> 
                <table class="table table-user-information">
                  <tbody>   
                    <tr>
                      <td><b>Id</b></td>
                      <td><?php echo $var->id; ?></td> 
                    </tr>
                    <tr>
                      <td><b>First Name</b></td>
                      <td><?php echo $var->first_name; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Last Name</b></td>
                      <td><?php echo $var->last_name; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Company Link</b></td>
                      <td><?php echo $var->company_link; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Skype Id</b></td>
                      <td><?php echo $var->skype_id; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Email</b></td>
                      <td><?php echo $var->email; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Address</b></td>
                      <td><?php echo $var->address1; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Team Size</b></td>
                      <td><?php echo $var->team_size; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Category</b></td>
                      <td><?php echo $var->category; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Foundation Year</b></td>
                      <td><?php echo $var->foundation_year; ?></td> 
                    </tr>  
                    <tr>
                      <td><b>Add Date</b></td>
                      <td><?php echo $var->add_date; ?></td> 
                    </tr> 
                  </tbody>
                </table>
              </div>
            </div>
            <?php if(!empty($var->clientProjects)){
                    $count = 1;
                        foreach ($var->clientProjects as $project) {?>
            <div class="panel panel-info"> 
            <div class="panel-heading ">
              <h3 class="panel-title"><b>Project #<?php echo $count;?></b></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class=" col-md-9 col-lg-12 "> 
                  <div class="box">
                    <table class="table table-user-information">
                      <tbody>   
                        <tr>
                          <td><b>Name</b></td>
                          <td><?php echo CHtml::link($project->name,Yii::app()->createUrl('/admin/clientProjects/view',array('id'=>$project->id)));  ?></td> 
                        </tr>
                        <tr>
                          <td><b>Tier</b></td>
                          <td><?php echo $project->tier;  ?></td> 
                        </tr>
                        <tr>
                          <td><b>Maximum Budget</b></td>
                          <td><?php echo $project->max_budget;  ?></td> 
                        </tr>
                        <tr>
                          <td><b>Minimum Budget</b></td>
                          <td><?php echo $project->min_budget;  ?></td> 
                        </tr>
                        <tr>
                          <td><b>Add Date</b></td>
                          <td><?php echo $project->add_date;  ?></td> 
                        </tr>
                        <tr>
                          <td><b>Last Update:</b></td>
                          <td><?php echo $project->modify_date;  ?></td> 
                        </tr>
                        <tr>
                          <td><b>State</b></td>
                          <td><?php echo $project->state;  ?></td> 
                        </tr>   
                      </tbody>
                    </table>
                  </div>
                  <?php
                    $count++;
                    }
                  }
                  ?>
                </div>
              </div>
            </div> 
          </div>
        </div>
      </div>
    </div>
  </div>
<?php 
  }
  else
  	echo "NOT A CLIENT YET";?>