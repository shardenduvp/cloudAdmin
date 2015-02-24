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
                      <td><b>Description</b></td>
                      <td><?php echo $var->description; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Add Date</b></td>
                      <td><?php echo $var->add_date; ?></td> 
                    </tr> 
                    <?php 
                    
                    if(!empty($var->clientProjects)){
                      $count = 1;
                      foreach($var->clientProjects as $project){?> 
                        <tr>
                          <td><b><?php echo "Project #".$count." Name"?></b></td>
                          <td><?php echo $project->name; ?></td> 
                        </tr> 
                        <?php $count++; 
                      }
                    }
                    if(!empty($var->clientMilestones)){
                      $count = 1;
                      foreach($var->clientMilestones as $milestone){?> 
                        <tr>
                          <td><b><?php echo "Milestone #".$count." Name"?></b></td>
                          <td><?php echo $milestone->name; ?></td> 
                        </tr>
                        <tr>
                          <td><b><?php echo "Milestone #".$count." Payment"?></b></td>
                          <td><?php echo $milestone->payment; ?></td> 
                        </tr>
                        <tr>
                          <td><b><?php echo "Milestone #".$count." Payment Date"?></b></td>
                          <td><?php echo $milestone->payment_date; ?></td> 
                        </tr>   
                        <tr>
                          <td><b><?php echo "Milestone #".$count." Add Date"?></b></td>
                          <td><?php echo $milestone->add_date; ?></td> 
                        </tr> 
                        <?php $count++; 
                      }
                    }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>    
        </div>
      </div>
    </div>
<?php 
    }
  }
  else
  	echo "NOT A CLIENT YET";?>