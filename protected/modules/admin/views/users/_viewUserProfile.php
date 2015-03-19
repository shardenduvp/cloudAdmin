<div class="box">
  <div class="panel-body">
    <div class="row">

      <!-- Profile Image -->
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-2" align="center">
            <img alt="User Pic"
              class="img-circle"
              style="width:100px;height:100px;"
              src="<?php if($model->image==null){
                      echo Yii::app()->theme->baseUrl."/adminPanel/img/user.png";
                    }else{
                      echo $model->image;
                    }
                    ?>"
            />
          </div>
          <div class="col-md-8">
            <!-- Show basic information -->
            <?php
              $name = ucfirst($model->first_name) ." ". ucfirst($model->last_name);
              if(empty($name)) $name = "Not Provided";
            ?>
            <div class="profileInfo">
              <h3><?php echo $name; ?></h3>
              <p>
                &nbsp;<span class="fa fa-envelope"></span>
                &nbsp;<?php echo ($model->username)? strtolower($model->username):"Not Provided"; ?>
                &nbsp;&middot;&nbsp;
                &nbsp;<span class="fa fa-building-o"></span>
                &nbsp;<?php echo ($model->company_name)? ucwords($model->company_name):"Not Provided"; ?>
                &nbsp;&middot;&nbsp;
                &nbsp;<span class="fa fa-linkedin-square"></span>
                &nbsp;<?php echo ($model->linkedin)? ucwords($model->linkedin):"Not Provided"; ?>
              </p>
              
            </div>
          </div>
          <div class="col-md-2">
            <?php echo CHtml::link('Edit User Details', array('/admin/users/update/', 'id'=>$model->id), array('class'=>'btn btn-info vpblue mt30')); ?>
          </div>
        </div>
      </div>
    </div>

    <br/><hr class="separator"/>

    <div class="row">
      <div class="col-md-offset-1 col-md-10">

        <div class="row infoDiv">
          <div class="col-md-12">
            <div class="row fieldRow">
              <div class="col-md-5 infoLabel taRight">
                <strong>First Name</strong>
              </div>
              <div class="col-md-5 col-md-offset-1 infoValue">
                <?php echo (!empty($model->first_name)) ? $model->first_name : "Not Provided"; ?>
              </div>
            </div>

            <div class="row fieldRow">
              <div class="col-md-5 infoLabel taRight">
                <strong>Last Name</strong>
              </div>
              <div class="col-md-5 col-md-offset-1 infoValue">
                <?php echo (!empty($model->last_name)) ? $model->last_name : "Not Provided"; ?>
              </div>
            </div>

            <div class="row fieldRow">
              <div class="col-md-5 infoLabel taRight">
                <strong>Company Name</strong>
              </div>
              <div class="col-md-5 col-md-offset-1 infoValue">
                <?php echo (!empty($model->company_name)) ? $model->company_name : "Not Provided"; ?>
              </div>
            </div>

            <div class="row fieldRow">
              <div class="col-md-5 infoLabel taRight">
                <strong>Username / Email</strong>
              </div>
              <div class="col-md-5 col-md-offset-1 infoValue">
                <?php echo (!empty($model->username)) ? $model->username : "Not Provided"; ?>
              </div>
            </div>

            <div class="row fieldRow">
              <div class="col-md-5 infoLabel taRight">
                <strong>Linked in</strong>
              </div>
              <div class="col-md-5 col-md-offset-1 infoValue">
                <?php echo (!empty($model->linkedin)) ? $model->linkedin : "Not Provided"; ?>
              </div>
            </div>

            <div class="row fieldRow">
              <div class="col-md-5 infoLabel taRight">
                <strong>Profile Status</strong>
              </div>
              <div class="col-md-5 col-md-offset-1 infoValue">
                <?php echo ($model->status == 1) ? "Verified" : "Not Verified"; ?>
              </div>
            </div>

            <div class="row fieldRow">
              <div class="col-md-5 infoLabel taRight">
                <strong>Role</strong>
              </div>
              <div class="col-md-5 col-md-offset-1 infoValue">
                <?php
                  switch ($model->role_id){
                    case 1:
                      $value='Admin';
                      break;
                    case 2:
                      $value='Client';
                      break;
                    default:
                      $value='Supplier';
                  }
                  echo $value;
                ?>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>

