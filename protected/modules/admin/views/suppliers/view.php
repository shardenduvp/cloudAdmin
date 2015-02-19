<?php
/* @var $this SuppliersController */
/* @var $model Suppliers */

$this->breadcrumbs=array(
	'Suppliers'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Suppliers', 'url'=>array('index')),
	array('label'=>'Create Suppliers', 'url'=>array('create')),
	array('label'=>'Update Suppliers', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Suppliers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Suppliers', 'url'=>array('admin')),
);
?>
<br/><br/>
<div class="box inverse">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   			<div class="panel panel-info">
            	<div class="panel-heading ">
              		<h3 class="panel-title">Supplier ID #<?php echo $model->id; ?></h3>
              	</div>
        <div class="panel-body">
            <div class="row">
              	<div class="col-md-3 col-lg-3 " align="center"> 
              		<img alt="User Pic" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/user.png" class="img-circle"> 
              	</div>
                <div class=" col-md-9 col-lg-9 "> 
                  	<table class="table table-user-information">
                    	<tbody>
							<?php
                    			$attributes=array(
												  'id',
												'first_name',
												'last_name',
												'cover',
												'name',
												'image',
												'email',
												'skype_id',
												'website',
												'phone_number',
												'tagline',
												'about_company',
												'foundation_year',
												'short_description',
												'details',
												'location',
												'pricing_details',
												'min_price',
												'number_of_employee',
												'total_available_employee',
												'consultation_description',
												'standard_pitch',
												'standard_service_agreement',
												'profile_status',
												'add_date',
												'modification_date',
												'rough_estimate',
												'linkedin',
												'facebook',
												'google',
												'twitter',
												'you_tube',
												'per_hour_rate',
												'project_size',
												'web_references',
												'development_location',
												'sales_location',
												'response_time',
												'is_faq_completed',
												'is_application_submit',
												'status',
												'users_id',
												'logo',
												'default_q3_ans',
												'default_q2_ans',
												'default_q1_ans',
												'default_q4_ans',
												'accept_new_project_date',
												'is_profile_complete',
												'price_tier_id',
												'payoneer_payee',
												'payoneer_token',
												'link_status',
												'offers',
												);
                    			foreach($attributes as $attr) {
                    				$value=$model->$attr;
                    				//if password display same number of stars instead
                    				
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


 <?php// $this->widget('zii.widgets.CDetailView', array(
// 	'data'=>$model,
// 	'attributes'=>array(
// 		'id',
// 		'first_name',
// 		'last_name',
// 		'cover',
// 		'name',
// 		'image',
// 		'email',
// 		'skype_id',
// 		'website',
// 		'phone_number',
// 		'tagline',
// 		'about_company',
// 		'foundation_year',
// 		'short_description',
// 		'details',
// 		'location',
// 		'pricing_details',
// 		'min_price',
// 		'number_of_employee',
// 		'total_available_employee',
// 		'consultation_description',
// 		'standard_pitch',
// 		'standard_service_agreement',
// 		'profile_status',
// 		'add_date',
// 		'modification_date',
// 		'rough_estimate',
// 		'linkedin',
// 		'facebook',
// 		'google',
// 		'twitter',
// 		'you_tube',
// 		'per_hour_rate',
// 		'project_size',
// 		'web_references',
// 		'development_location',
// 		'sales_location',
// 		'response_time',
// 		'is_faq_completed',
// 		'is_application_submit',
// 		'status',
// 		'users_id',
// 		'logo',
// 		'default_q3_ans',
// 		'default_q2_ans',
// 		'default_q1_ans',
// 		'default_q4_ans',
// 		'accept_new_project_date',
// 		'is_profile_complete',
// 		'price_tier_id',
// 		'payoneer_payee',
// 		'payoneer_token',
// 		'link_status',
// 		'offers',
// 	),
// )); ?>
