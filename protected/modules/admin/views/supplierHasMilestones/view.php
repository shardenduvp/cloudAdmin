<?php
/* @var $this SupplierHasMilestonesController */
/* @var $model SupplierHasMilestones */

$this->breadcrumbs=array(
	'Supplier Has Milestones'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SupplierHasMilestones', 'url'=>array('index')),
	array('label'=>'Create SupplierHasMilestones', 'url'=>array('create')),
	array('label'=>'Update SupplierHasMilestones', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SupplierHasMilestones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SupplierHasMilestones', 'url'=>array('admin')),
);
?>
<br/><br/>
<div class="box inverse">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   			<div class="panel panel-info">
            	<div class="panel-heading ">
              		<h3 class="panel-title">View Supplier has Milostones #<?php echo $model->id; ?></h3>
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
                    			$attributes=array(  'id',
													'module',
													'start_date',
													'end_date',
													'amount',
													'date',
													'status',
													'transaction',
													'note',
													'reminder_date',
													'milestone_title',
													'overview',
													'due_date',
													'is_schedule_payment',
													'suppliers_id',
													'supplier_proposal_id',
												);
                    			foreach($attributes as $attr) {
                    				$value=$model->$attr;
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
// 		'module',
// 		'start_date',
// 		'end_date',
// 		'amount',
// 		'date',
// 		'status',
// 		'transaction',
// 		'note',
// 		'reminder_date',
// 		'milestone_title',
// 		'overview',
// 		'due_date',
// 		'is_schedule_payment',
// 		'suppliers_id',
// 		'supplier_proposal_id',
// 	),
// )); ?>
