<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'View Users', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);

$tab = Yii::app()->getRequest()->getQuery('update');
if(empty($tab)) $tab = "user";
?>
<div class="row">
	<div id="content" class="col-lg-12">
	
		<!-- PAGE HEADER-->
		<div class="row">
		    <div class="col-sm-12">
		        <div class="page-header">
		          <h1>Update Details <small><?php echo "#" . $tab ?></small></h1>
		        </div>
		    </div>
		</div>
		<!-- /PAGE HEADER -->

		<!-- USER PROFILE -->
		<div class="row">
	        <!-- BOX -->
	        <div class="box border custom-table mh400">
	          	<div class="box-body">
	            	<div class="tabbable header-tabs user-profile">
				
						<ul class="nav nav-tabs">
						<li class="<?php echo ($tab == 'user')? 'active':''; ?>"><a href="#pro_edit_user" data-toggle="tab"><i class="fa fa-edit"></i> <span class="hidden-inline-mobile">User Profile</span></a></li>
						<li class="<?php echo ($tab == 'client')? 'active':''; ?>"><a href="#pro_edit_client" data-toggle="tab"><i class="fa fa-users"></i> <span class="hidden-inline-mobile">Client Profile</span></a></li>
						<li class="<?php echo ($tab == 'supplier')? 'active':''; ?>"><a href="#pro_edit_supplier" data-toggle="tab"><i class="fa fa-suitcase"></i> <span class="hidden-inline-mobile">Supplier Profile</span></a></li>
						</ul>
											
						<div class="tab-content">
							   
						   <!-- EDIT ACCOUNT -->
						   <div class="tab-pane fade in <?php echo ($tab == 'user')? 'active':''; ?>" id="pro_edit_user">
							   <?php
									$this->renderPartial('_formEditUser', array('model'=>$model)); 
								?>
							</div>
							 
							<!-- EDIT ACCOUNT -->
							 <div class="tab-pane fade in <?php echo ($tab == 'client')? 'active':''; ?>" id="pro_edit_client">
							   	<?php
								   	if(!empty($modelClientProfiles)){
								   		foreach($modelClientProfiles as $mil){
									   		$this->renderPartial('_formEditUserProfile', array('model'=>$mil)); 
									   		break;
								   		}
								   	}
								   	else {
					                ?>
				                	<h4 class="noProfile">This user does not have any Client Profile.</h4>
				                	<?php
				                	}
								?>
							</div>

							<!-- EDIT ACCOUNT -->
							<div class="tab-pane fade in <?php echo ($tab == 'supplier')? 'active':''; ?>" id="pro_edit_supplier">
							   <?php
								   	if(!empty($modelSuppliers)){
								   		foreach($modelSuppliers as $mil){
									   		$this->renderPartial('_formEditUserAsSupplier', array('model'=>$mil, 'user'=>$model)); 
									   		break;
								   		}
								   	}
								   	else {
					                ?>
					                	<h4 class="noProfile">This user does not have any Supplier Profile.</h4>
					                <?php
					                }	
								?>
							</div>
						</div>
						<!-- /USER PROFILE -->
				</div>
			</div>
		</div>
	</div>
	
	<div class="box">
		<div class="footer-tools col-sm-1">
				<span class="go-top">
					<i class="fa fa-chevron-up"></i> Top
				</span>
		</div>
	</div>

</div><!-- /CONTENT-->
</div>
