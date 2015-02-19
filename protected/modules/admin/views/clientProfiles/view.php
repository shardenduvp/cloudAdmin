<?php
/* @var $this ClientProfilesController */
/* @var $model ClientProfiles */

$this->breadcrumbs=array(
	'Client Profiles'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ClientProfiles', 'url'=>array('index')),
	array('label'=>'Create ClientProfiles', 'url'=>array('create')),
	array('label'=>'Update ClientProfiles', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClientProfiles', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClientProfiles', 'url'=>array('admin')),
);
?>

<div class="box inverse">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   			<div class="panel panel-info">
            	<div class="panel-heading ">
              		<h3 class="panel-title">Users ID #<?php echo $model->id; ?></h3>
              	</div>
        <div class="panel-body">
            <div class="row">
              	<div class="col-md-3 col-lg-3 " align="center"> 
              		<img alt="User Pic" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100" class="img-circle"> 
              	</div>
                <div class=" col-md-9 col-lg-9 "> 
                  	<table class="table table-user-information">
                    	<tbody>
							<?php
                    			$attributes=array(
												'id',
												'users_id',
												'first_name',
												'last_name',
												'company_name',
												'company_link',
												'skype_id',
												'email',
												'phone_number',
												'address1',
												'team_size',
												'category',
												'foundation_year',
												'image',
												'description',
												'add_date',
												'status',
											);
                    			foreach($attributes as $attr) {
                    				$value=$model->$attr;
                    				//if password display same number of stars instead
                    				if($attr=='password'){
                    					$value=str_repeat("*",strlen($model->$attr));
                    				}
                    				else if($attr=='role_id'){
                    					switch ($attr)
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
                    				else if($attr=='status'){
                    					if($attr=1)
                    							$value='Verified';
                    					else
                    							$value='Not-Verified';
                    					
                    					$attr='Verification-Status';
                    				}
         					?>    
         					<tr>
         						<td><?php echo ucfirst($attr); ?></td>
         						<td><?php echo $value; ?></td>
         					</tr>     
         					<?php }?>    		
                        		  </tbody>
                  	</table>
                </div>
            </div>
        </div>
              
          </div>
        </div>
      </div>
    </div>

 <!--<?php //$this->widget('zii.widgets.CDetailView', array(
// 	'data'=>$model,
// 	'attributes'=>array(
// 		'id',
// 		'users_id',
// 		'first_name',
// 		'last_name',
// 		'company_name',
// 		'company_link',
// 		'skype_id',
// 		'email',
// 		'phone_number',
// 		'address1',
// 		'team_size',
// 		'category',
// 		'foundation_year',
// 		'image',
// 		'description',
// 		'add_date',
// 		'status',
// 	),
// )); ?>-->
