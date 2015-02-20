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
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   			<div class="panel panel-info">
            	<div class="panel-heading ">
              		<h3 class="panel-title"><b>User ID #<?php echo $model->id; ?></b></h3>
              	</div>
        <div class="panel-body">
            <div class="row">
              	<div class="col-md-3 col-lg-3 " align="center"> 
              		<img alt="User Pic" class="img-circle img-size" src="<?php 
              									if($model->image==null){
													echo Yii::app()->theme->baseUrl."/img/user.png";
              									}
              									else{
              										echo $model->image;
              									}
					?>" > 
              	</div>
                <div class=" col-md-9 col-lg-9 "> 
                  	<table class="table table-user-information">
                    	<tbody>
							
							<?php
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
                    					$value=str_repeat("*",strlen($model->$attr));
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
                    				}
         					?>    
       
         					<tr>
         						<td><b><?php echo ucfirst($attr); ?></b></td>
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

<?php 
//$this->widget('zii.widgets.CDetailView', array(
// 	'data'=>$model,
// 	'attributes'=>array(
// 		'id',
// 		'last_name',
// 		'first_name',
// 		'image',
// 		'company_name',
// 		'display_name',
// 		'username',
// 		'phone_number',
// 		'password',
// 		'linkedin',
// 		'role',
// 		'add_date',
// 		'last_login',
// 		'status',
// 		'role_id',
// 	),
// ));
 ?>
