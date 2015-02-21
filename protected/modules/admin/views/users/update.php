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

<h1>Update Users <?php echo $model->id; ?></h1>

<div class="container">
				<div class="row">
					<div id="content" class="col-lg-12">
						<!-- PAGE HEADER-->
						<div class="row">
							<div class="col-sm-12">
								<div class="page-header">
									<!-- STYLER -->
									
									<!-- /STYLER -->
									<!-- BREADCRUMBS -->
						
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
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">User Profile</h3>
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
										<h4><i class="fa fa-user"></i><span class="hidden-inline-mobile">Hello, Jennifer!</span></h4>
									</div>
									<div class="box-body">
										<div class="tabbable header-tabs user-profile">
											<ul class="nav nav-tabs">
											   
											   <li class="active"><a href="#pro_edit_user" data-toggle="tab"><i class="fa fa-edit"></i> <span class="hidden-inline-mobile">User Profiles</span></a></li>
											   <li ><a href="#pro_edit_client" data-toggle="tab"><i class="fa fa-edit"></i> <span class="hidden-inline-mobile">Client Profiles</span></a></li>
											   
											</ul>
											<div class="tab-content">
											   
											   <!-- EDIT ACCOUNT -->
											   <div class="tab-pane fade in  active" id="pro_edit_user">
											   <?php
													$this->renderPartial('_form', array('model'=>$model)); 
												?>
												 </div>
											  <!-- <div class="tab-pane fade in  active" id="pro_edit_user">
												  <form class="form-horizontal" action="#">
													<div class="row">
														 <div class="col-md-12">
															<div class="box border inverse">
																<div class="box-title">
																	<h4><i class="fa fa-bars"></i>General Information</h4>
																</div>
																<div class="box-body big">
																	<div class="row">
																	 <div class="col-md-12">
																		<h4>Basic Information</h4>
																		<div class="form-group">
																		   <label class="col-md-4 control-label">Name</label> 
																		   <div class="col-md-8"><input type="text" name="regular" class="form-control" value="Jennifer"></div>
																		</div>
																		<div class="form-group">
																		   <label class="col-md-4 control-label">Secure Browsing</label> 
																		   <div class="col-md-8">
																				<label class="checkbox-inline"> <input type="checkbox" class="uniform" value="" checked> Enable </label> 
																				<label class="checkbox-inline"> <input type="checkbox" class="uniform" value=""> Disable </label> 
																		   </div>
																		</div>
																		<div class="form-group">
																		   <label class="col-md-4 control-label">Birthday</label> 
																		   <div class="col-md-8"><input  class="form-control datepicker" type="text" name="regular" size="10"></div>
																		</div>
																		<div class="form-group">
																		   <label class="col-md-4 control-label">Gender</label> 
																		   <div class="col-md-8">
																			  <label class="radio"> <input type="radio" class="uniform" name="optionsRadios1" value="option1"> Male </label> 
																			 <label class="radio"> <input type="radio" class="uniform" name="optionsRadios1" value="option2" checked> Female </label>
																		   </div>
																		</div>
																		<h4>Contact Information</h4>
																		<div class="form-group">
																		   <label class="col-md-4 control-label">Phone</label> 
																		   <div class="col-md-8"><input type="number" name="regular" class="form-control" value="1002927323"></div>
																		</div>
																		
																		<div class="form-group">
																		   <label class="col-md-4 control-label">Address</label> 
																		   <div class="col-md-8"><textarea name="regular" class="form-control"></textarea></div>
																		</div>
																		<div class="form-group">
																		   <label class="col-md-4 control-label">Website</label> 
																		   <div class="col-md-8">
																				<div class="input-group">
																				  <span class="input-group-addon">http://</span>
																				  <input type="text" class="form-control" placeholder="Website">
																				</div>																			
																		   </div>
																		</div>
																	 </div>
																  </div>
																</div>
															</div>
														 </div>
														
													 </div>
												  </form>
												  <div class="form-actions clearfix"> <input type="submit" value="Update Account" class="btn btn-primary pull-right"> </div>
											   </div>
											   <!-- /EDIT ACCOUNT -->

											   <!-- EDIT ACCOUNT -->
											   <div class="tab-pane fade in inverse" id="pro_edit_client">
											   <?php
												   foreach($modelClientProfiles as $mil){
												   		$this->renderPartial('_formEditUserProfile', array('model'=>$mil)); 
												   		break;
											   		}
												?>
												</div>
											   
											   <!--<div class="tab-pane fade in inverse" id="pro_edit_client">
												  <form class="form-horizontal" action="#">
													<div class="row">
														 
														 <div class="col-md-12">
															<div class="box border inverse">
																<div class="box-title">
																	<h4><i class="fa fa-bars"></i>General Information</h4>
																</div>
																<div class="box-body big">
																	<div class="row">
																	 <div class="col-md-12">
																		<h4>Basic Information</h4>
																		<div class="form-group">
																		   <label class="col-md-4 control-label">Name</label> 
																		   <div class="col-md-8"><input type="text" name="regular" class="form-control" value="Jennifer"></div>
																		</div>
																		<div class="form-group">
																		   <label class="col-md-4 control-label">Secure Browsing</label> 
																		   <div class="col-md-8">
																				<label class="checkbox-inline"> <input type="checkbox" class="uniform" value="" checked> Enable </label> 
																				<label class="checkbox-inline"> <input type="checkbox" class="uniform" value=""> Disable </label> 
																		   </div>
																		</div>
																		<div class="form-group">
																		   <label class="col-md-4 control-label">Birthday</label> 
																		   <div class="col-md-8"><input  class="form-control datepicker" type="text" name="regular" size="10"></div>
																		</div>
																		<div class="form-group">
																		   <label class="col-md-4 control-label">Gender</label> 
																		   <div class="col-md-8">
																			  <label class="radio"> <input type="radio" class="uniform" name="optionsRadios1" value="option1"> Male </label> 
																			 <label class="radio"> <input type="radio" class="uniform" name="optionsRadios1" value="option2" checked> Female </label>
																		   </div>
																		</div>
																		<h4>Contact Information</h4>
																		<div class="form-group">
																		   <label class="col-md-4 control-label">Phone</label> 
																		   <div class="col-md-8"><input type="number" name="regular" class="form-control" value="1002927323"></div>
																		</div>
																		
																		<div class="form-group">
																		   <label class="col-md-4 control-label">Address</label> 
																		   <div class="col-md-8"><textarea name="regular" class="form-control"></textarea></div>
																		</div>
																		<div class="form-group">
																		   <label class="col-md-4 control-label">Website</label> 
																		   <div class="col-md-8">
																				<div class="input-group">
																				  <span class="input-group-addon">http://</span>
																				  <input type="text" class="form-control" placeholder="Website">
																				</div>																			
																		   </div>
																		</div>
																	 </div>
																  </div>
																</div>
															</div>
														 </div>
													 </div>
												  </form>
												  <div class="form-actions clearfix"> 
												  	<input type="submit" value="Update Account" class="btn btn-primary pull-right"> 
												  </div>
											   </div>
											   <!-- /EDIT ACCOUNT -->
											   
											 
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