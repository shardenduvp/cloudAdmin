<?php
/* @var $this SuppliersHasReferencesController */
/* @var $model SuppliersHasReferences */

$this->breadcrumbs=array(
	'Suppliers Has References'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SuppliersHasReferences', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasReferences', 'url'=>array('create')),
	array('label'=>'Update SuppliersHasReferences', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SuppliersHasReferences', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SuppliersHasReferences', 'url'=>array('admin')),
);
?>


<br/><br/>
<div class="box inverse">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   			<div class="panel panel-info">
            	<div class="panel-heading ">
              		<h3 class="panel-title">View SuppliersHasReferences #<?php echo $model->id; ?></h3>
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
													'project_name',
													'project_description',
													'company_name',
													'client_email',
													'year_engagement',
													'communication_rating',
													'skill_rating',
													'timeline_rating',
													'independence_rating',
													'provide_do_well',
													'provider_improve',
													'tag_line',
													'add_date',
													'modified',
													'suppliers_id',
													'client_profiles_id',
													'suppliers_has_portfolio_id',
													'client_first_name',
													'client_last_name',
													'follow_venturepact',
													'is_unattributed',
													'email_hide',
													'review_type',
													'status',
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


// <?php //$this->widget('zii.widgets.CDetailView', array(
// 	'data'=>$model,
// 	'attributes'=>array(
// 		'id',
// 		'project_name',
// 		'project_description',
// 		'company_name',
// 		'client_email',
// 		'year_engagement',
// 		'communication_rating',
// 		'skill_rating',
// 		'timeline_rating',
// 		'independence_rating',
// 		'provide_do_well',
// 		'provider_improve',
// 		'tag_line',
// 		'add_date',
// 		'modified',
// 		'suppliers_id',
// 		'client_profiles_id',
// 		'suppliers_has_portfolio_id',
// 		'client_first_name',
// 		'client_last_name',
// 		'follow_venturepact',
// 		'is_unattributed',
// 		'email_hide',
// 		'review_type',
// 		'status',
// 	),
// )); ?>
