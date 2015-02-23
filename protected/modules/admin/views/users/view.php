<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'Update Users', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Users', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>

<br/><br/>
<div class="box">
  <div>
   	<div class="panel panel-info">
      <div class="panel-heading ">
        <h3 class="panel-title"><b>User Details For Id #<?php echo $model->id; ?></b></h3>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-2 " align="center"> 
            <img alt="User Pic" class="img-circle" style="max-width:100px;" src="<?php if($model->image==null){
                                                                                        echo Yii::app()->theme->baseUrl."/img/user.png";
              									                                                       }
              									                                                       else{
                                                                                        echo $model->image;
              									                                                       }
					                                                                       ?>" > 
          </div>
          <div class=" col-md-9 col-lg-10 "> 
            <table class="table table-user-information">
              <tbody><?php
                    		$attributes=array(
												                    'last_name',
											                      'first_name',
													                  'company_name',
													                  'display_name',
													                  'username',
													                  'phone_number',
													                  'password',
													                  'linkedin',
													                  'add_date',
													                  'last_login',
													                  'status',
													                  'role_id',
												            );
                    	 	foreach($attributes as $attr) {
                    			$value=$model->$attr;
                    			//if password display same number of stars instead
                    			if($attr=='password'){
                    				$value=base64_decode($model->$attr);
                    			}
                    			//according to role_id display role_name
                    			else if($attr=='role_id'){
                    				switch ($model->$attr)
                    				{
                    					case 1:
                    						$value='Admin';
                    						break;
                    					case 2:
                    						$value='Client';
                    						break;
                    					default:
                    						$value='Supplier';
                    				}
                    				$attr='Role';
                    			}
                    			//according to status value display status code
                    			else if($attr=='status'){
                    				if($model->$attr==1)
                    					$value='Verified';
                    				else
                    					$value='Not-Verified';
                    				$attr='Verification-Status';
                    			}?>    
       
         				<tr>
         					<td><b><?php echo ucfirst($attr); ?></b></td>
         					<td><?php echo $value; ?></td>	
         				</tr> 
         				<?php }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>        
    </div>
  </div>
</div>

<?php if(!empty($model->clientProfiles)){?>
    <?php foreach($model->clientProfiles as $var){?>
    <div class="box">
      <div>
        <div class="panel panel-info">
          <div class="panel-heading ">
            <h3 class="panel-title"><b>Client Details For User Id #<?php echo $var->users_id; ?></b></h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class=" col-md-9 col-lg-10 "> 
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
                      <td><b>Last Name?></b></td>
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
  if(!empty($model->suppliers)){
    foreach($model->suppliers as $var){?>
    <div class="box">
      <div>
        <div class="panel panel-info">
          <div class="panel-heading ">
            <h3 class="panel-title"><b>Supplier Details For User Id #<?php echo $var->users_id; ?></b></h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class=" col-md-9 col-lg-10 "> 
                <table class="table table-user-information">
                  <tbody>  
                    <tr>
                      <td><b>Id</b></td>
                      <td><?php echo $var->id; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Name</b></td>
                      <td><?php echo $var->name; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Cover</b></td>
                      <td><?php echo $var->cover; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Website</b></td>
                      <td><?php echo $var->website; ?></td> 
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
                      <td><b>Tagline</b></td>
                      <td><?php echo $var->tagline; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>About Company</b></td>
                      <td><?php echo $var->about_company; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Short Desc</b></td>
                      <td><?php echo $var->short_description; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Details</b></td>
                      <td><?php echo $var->details; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Foundation Year</b></td>
                      <td><?php echo $var->foundation_year; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Location</b></td>
                      <td><?php echo $var->location; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Pricing Details</b></td>
                      <td><?php echo $var->pricing_details; ?></td> 
                    </tr>
                    <tr>
                      <td><b>Minimum Price</b></td>
                      <td><?php echo $var->min_price; ?></td> 
                    </tr>
                    <tr>
                      <td><b>Number Of Employee</b></td>
                      <td><?php echo $var->number_of_employee; ?></td> 
                    </tr>
                    <tr>
                      <td><b>Total Available Employee</b></td>
                      <td><?php echo $var->total_available_employee; ?></td> 
                    </tr>
                    <tr>
                      <td><b>Consultation Description</b></td>
                      <td><?php echo $var->consultation_description; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Standard Pitch</b></td>
                      <td><?php echo $var->standard_pitch; ?></td> 
                    </tr>     
                    <tr>
                      <td><b>Standard Service Agreement</b></td>
                      <td><?php echo $var->standard_service_agreement; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Profile Status</b></td>
                      <td><?php echo $var->profile_status; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Add Date</b></td>
                      <td><?php echo $var->add_date; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Modification Date</b></td>
                      <td><?php echo $var->modification_date; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Rough Estimate</b></td>
                      <td><?php echo $var->rough_estimate; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Linked In</b></td>
                      <td><?php echo $var->linkedin; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Facebook</b></td>
                      <td><?php echo $var->facebook; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Google</b></td>
                      <td><?php echo $var->google; ?></td> 
                    </tr>
                    <tr>
                      <td><b>Twitter</b></td>
                      <td><?php echo $var->twitter; ?></td> 
                    </tr>  
                    <tr>
                      <td><b>Youtube</b></td>
                      <td><?php echo $var->you_tube; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Per Hour Rate</b></td>
                      <td><?php echo $var->per_hour_rate; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Project Size</b></td>
                      <td><?php echo $var->project_size; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Web References</b></td>
                      <td><?php echo $var->web_references; ?></td> 
                    </tr>
                    <tr>
                      <td><b>Development Location</b></td>
                      <td><?php echo $var->development_location; ?></td> 
                    </tr>  
                    <tr>
                      <td><b>Sales Location</b></td>
                      <td><?php echo $var->sales_location; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Response Time</b></td>
                      <td><?php echo $var->response_time; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Status</b></td>
                      <td><?php echo $var->status; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Accept New Project Date</b></td>
                      <td><?php echo $var->accept_new_project_date; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Link Status</b></td>
                      <td><?php echo $var->link_status; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Is Profile Complete</b></td>
                      <td><?php echo $var->is_profile_complete; ?></td> 
                    </tr> 
                    <tr>
                      <td><b>Offers</b></td>
                      <td><?php echo $var->offers; ?></td> 
                    </tr> 
                  </tbody>
                </table>
              </div>
            </div>
          </div>      
        </div>
      </div>
    </div>
<?php   }
    }
    if(empty($model->clientProfiles) && empty($model->suppliers)){?>
        <div class="box">
          <div>
            <div class="panel panel-info">
              <div class="panel-heading ">
                  <h3 class="panel-title">Neither a client nor a supplier</b></h3>
              </div>
            </div>
          </div>
        </div>
 <?php   }?>

