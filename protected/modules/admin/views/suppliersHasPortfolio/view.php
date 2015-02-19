<?php
/* @var $this SuppliersHasPortfolioController */
/* @var $model SuppliersHasPortfolio */

$this->breadcrumbs=array(
	'Suppliers Has Portfolios'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SuppliersHasPortfolio', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasPortfolio', 'url'=>array('create')),
	array('label'=>'Update SuppliersHasPortfolio', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SuppliersHasPortfolio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SuppliersHasPortfolio', 'url'=>array('admin')),
);
?>


<br/><br/>
<div class="box inverse">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   			<div class="panel panel-info">
            	<div class="panel-heading ">
              		<h3 class="panel-title">View SuppliersHasPortfolio #<?php echo $model->id; ?></h3>
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
													'suppliers_id',
													'project_name',
													'project_link',
													'description',
													'industry_id',
													'service_id',
													'client_name',
													'year_done',
													'estimate_price',
													'start_date',
													'estimate_timeline',
													'language_used',
													'cover',
													'add_date',
													'status',
													'portfolio_type',
													'one_line_pitch',
													'who_can',
													'markets',
													'portfolio_status',
													'no_of_customers',
													'launched_in',
													'no_of_users',
													'deployment',
													'is_free_trial',
													'project_size',
													'per_hour_rate',
													'platform',
													'company_name',
													'is_discreet',
													'discreet_desc',
													'location',
													'image',
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


 <?php //$this->widget('zii.widgets.CDetailView', array(
// 	'data'=>$model,
// 	'attributes'=>array(
// 		'id',
// 		'suppliers_id',
// 		'project_name',
// 		'project_link',
// 		'description',
// 		'industry_id',
// 		'service_id',
// 		'client_name',
// 		'year_done',
// 		'estimate_price',
// 		'start_date',
// 		'estimate_timeline',
// 		'language_used',
// 		'cover',
// 		'add_date',
// 		'status',
// 		'portfolio_type',
// 		'one_line_pitch',
// 		'who_can',
// 		'markets',
// 		'portfolio_status',
// 		'no_of_customers',
// 		'launched_in',
// 		'no_of_users',
// 		'deployment',
// 		'is_free_trial',
// 		'project_size',
// 		'per_hour_rate',
// 		'platform',
// 		'company_name',
// 		'is_discreet',
// 		'discreet_desc',
// 		'location',
// 		'image',
// 	),
// )); ?>
