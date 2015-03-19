<?php

/**
 * Get query string to set the current tab
 */
$tab = Yii::app()->getRequest()->getQuery('view');
if(empty($tab)) $tab = "user";

?>

<div class="row">
  <div id="content clearfix" class="col-lg-12">

    <!-- PAGE HEADER-->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header">
              <h1>Users Details <small><?php echo "#" . $tab ?></small></h1>
            </div>
        </div>
    </div>
    <!-- /PAGE HEADER -->

    <!-- USER PROFILE -->
    <div class="row"><br/>
        <!-- BOX -->
        <div class="box border custom-table mh400">
          <div class="box-body">
            <div class="tabbable header-tabs user-profile">

              <ul class="nav nav-tabs">
                <li class="<?php echo ($tab == 'user')? 'active':''; ?>"><a href="#pro_edit_user" data-toggle="tab"><i class="fa fa-edit"></i> <span class="hidden-inline-mobile">User Profile</span></a></li>
                <li class="<?php echo ($tab == 'client')? 'active':''; ?>"><a href="#pro_edit_client" data-toggle="tab"><i class="fa fa-edit"></i> <span class="hidden-inline-mobile">Client Profile</span></a></li>
                <li class="<?php echo ($tab == 'supplier')? 'active':''; ?>"><a href="#pro_edit_supplier" data-toggle="tab"><i class="fa fa-edit"></i> <span class="hidden-inline-mobile">Supplier Profile</span></a></li>
              </ul>

              <div class="tab-content">
                <div class="tab-pane fade in <?php echo ($tab == 'user')? 'active':''; ?>" id="pro_edit_user">
                <?php
                  $this->renderPartial('_viewUserProfile', array('model'=>$model)); 
                ?>
                </div>
               
                <div class="tab-pane fade in <?php echo ($tab == 'client')? 'active':''; ?>" id="pro_edit_client">
                <?php
                  if(!empty($modelClientProfile)){
                    foreach($modelClientProfile as $mil){
                      $this->renderPartial('_viewClientProfile', array('var'=>$mil)); 
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

                <div class="tab-pane fade in <?php echo ($tab == 'supplier')? 'active':''; ?>" id="pro_edit_supplier">
                <?php
                  if(!empty($modelSupplier)){
                    foreach($modelSupplier as $mil){
                      $this->renderPartial('_viewSupplierProfile', array('var'=>$mil));
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
            </div>
            <!-- /USER PROFILE -->
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