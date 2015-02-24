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