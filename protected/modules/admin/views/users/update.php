


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
?>


<div class="container">
				<div class="row">
					<div id="content" class="col-lg-12">
						<!-- PAGE HEADER-->
						<div class="row">
							<div class="col-sm-12">
								<div class="page-header">
									<!-- STYLER -->
									
									<!-- /STYLER -->
									<!-- BREADCRUMBS 
						
									<ul class="breadcrumb">
										<li>
											<i class="fa fa-home"></i>
											<a href="index.html">Home</a>
										</li>
										<li>
											<a href="#">More Pages</a>
										</li>
										<li>User Profile</li>
									</ul>
									BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Update Profiles</h3>
									</div>
									<div class="description">User Profile, Skills, Activities and other Statistics</div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						<!-- USER PROFILE -->
						<div class="row">
							<div class="col-md-12">
								<!-- BOX -->
								<div class="box border">
									<div class="box-title">
										<h4><i class="fa fa-user"></i><span class="hidden-inline-mobile">User ID <?php echo $model->id;?></span></h4>
									</div>
									<div class="box-body">
										<div class="tabbable header-tabs user-profile">
											<ul class="nav nav-tabs">
											   
											   <li class="active"><a href="#pro_edit_user" data-toggle="tab"><i class="fa fa-edit"></i> <span class="hidden-inline-mobile">User Profile</span></a></li>
											 <?php  if(!empty($modelClientProfiles)){ ?>  
											 <li ><a href="#pro_edit_client" data-toggle="tab"><i class="fa fa-users"></i> <span class="hidden-inline-mobile">Client Profile</span></a></li>
											 <?php }if(!empty($modelSuppliers)){  ?>
											    <li ><a href="#pro_edit_supplier" data-toggle="tab"><i class="fa fa-suitcase"></i> <span class="hidden-inline-mobile">Supplier Profile</span></a></li>
											  <?php }?> 
											</ul>
											<div class="tab-content">
											   
											   <!-- EDIT ACCOUNT -->
											   <div class="tab-pane fade in  active" id="pro_edit_user">
											   <?php
													$this->renderPartial('_formEditUser', array('model'=>$model)); 
												?>
												 </div>
											 
											   <!-- EDIT ACCOUNT -->
											   <div class="tab-pane fade in" id="pro_edit_client">
											   <?php
											   foreach($modelClientProfiles as $mil){
												   		$this->renderPartial('_formEditUserProfile', array('model'=>$mil)); 
												   		break;
											   		}
												?>
												</div>

												<!-- EDIT ACCOUNT -->
												<div class="tab-pane fade in" id="pro_edit_supplier">
											   <?php
											   		foreach($modelSuppliers as $mil){
												   		$this->renderPartial('_formEditUserAsSupplier', array('model'=>$mil)); 
												   		break;
											   		}
													
												?>
												 </div>
											
											 
											</div>
										</div>
										<!-- /USER PROFILE -->
									</div>
								</div>
							</div>
						</div>
						
						<div class="footer-tools">
							<span class="go-top">
								<i class="fa fa-chevron-up"></i> Top
							</span>
						</div>
					</div><!-- /CONTENT-->
				</div>
			</div>

<?php
// $this->renderPartial('_form', array('model'=>$model)); 
?>