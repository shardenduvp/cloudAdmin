<div class="modal-dialog">
        <div class="modal-content">
            <!-- AJAX Loader -->
            <div class="ajax-loader loader-hidden"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/loaders/12.gif"></div>
            
            <div id="approve-data-ajax">

              <!-- Starts here -->

<div id="approve-popup">

    <?php $form=$this->beginWidget('CActiveForm', array(
      'id'=>'approve-form',
      'action'=>Yii::app()->createUrl("/admin/default/approveProject&id=" . $project->id),
    )); ?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Approve Project</h4>
    </div>
    <div class="modal-body">
        <div class="box-body">
          <div class="tabbable header-tabs">

            <ul class="nav nav-tabs">
             <li class="active"><a href="#approve_tab1" data-toggle="tab"><span class="hidden-inline-mobile">Project Details</span></a></li>
             <li><a href="#approve_tab2" data-toggle="tab"><span class="hidden-inline-mobile">Client Details</span></a></li>
             <li><a href="#approve_tab3" data-toggle="tab"><span class="hidden-inline-mobile">Supplier Selection</span></a></li>
            </ul>

            <div class="tab-content">

             <div class="tab-pane active" id="approve_tab1">
              <h4>Project Details provided by the Client</h4>
              <div class="tab-form">
                <div class="form-group">
                  <label for="projectName">Project Name</label>
                  <?php echo CHtml::textField('Project[name]', $project->name, array(
                    'disabled'=>'disabled',
                    'class'=>'form-control',
                    'id'=>'projectName',
                    'placeholder'=>'Enter project name',
                  )); ?>
                </div>
                <div class="form-group">
                  <label>Skills</label>
                  <p>
                    <?php
                    $project_skills = $project->clientProjectsHasSkills;
                    foreach ($project_skills as $project_skill) {
                      ?>
                      <span class="label label-primary fn12"><?php echo $project_skill->skills->name; ?></span>
                      <?php
                    }
                    ?>
                  </p>
                </div>
                <div class="form-group">
                  <label>Industry Name</label>
                  <p>
                    <?php
                    $client_industries = $project->clientProjectsHasIndustries;
                    foreach ($client_industries as $client_industry) {
                      ?>
                      <span class="label label-primary fn12"><?php echo $client_industry->industries->name; ?></span>
                      <?php
                    }
                    ?>
                  </p>
                </div>
                <div class="form-group">
                  <label>Services</label>
                  <p>
                    <?php
                    $project_services = $project->clientProjectsHasServices;
                    foreach ($project_services as $project_service) {
                      ?>
                      <span class="label label-primary fn12">Add Later</span>
                      <?php
                    }
                    ?>
                  </p>
                </div>
                <div class="form-group">
                  <label for="projectStage">Project Stage</label>
                  <?php echo CHtml::textField('Project[stage]', $project->currentStatus->name, array(
                    'disabled'=>'disabled',
                    'class'=>'form-control',
                    'id'=>'projectStage',
                    'placeholder'=>'Enter project stage',
                  )); ?>
                </div>
                <div class="form-group">
                  <label for="projectExpectedStart">Expected Start Date</label>
                  <?php echo CHtml::textField('Project[expected_start]', (!empty($project->project_start_preference)) ? $project->project_start_preference: "Not Provided.", array(
                    'disabled'=>'disabled',
                    'class'=>'form-control',
                    'id'=>'projectExpectedStart',
                    'placeholder'=>'Enter project start date',
                  )); ?>
                </div>
                <div class="form-group">
                  <label for="projectSummary">Project Summary</label>
                  <?php echo CHtml::textArea('Project[summary]', (!empty($project->description)) ? $project->description: "Not Provided.", array(
                    'disabled'=>'disabled',
                    'class'=>'form-control',
                    'id'=>'projectSummary',
                    'placeholder'=>'Enter project summary',
                  )); ?>
                  </div>
                <div class="form-group">
                  <label>Uploaded Files</label>
                  <p>
                    <?php
                    $files = $project->clientProjectDocuments;
                    if(!empty($files)) {
                      foreach ($files as $file) {
                        echo CHtml::link((!empty($file->name)) ? $file->name: "Not Provided.", $file->path, array(
                          'target'=>'_blank',
                          'class'=>'label label-primary fn12',
                        )) . " ";
                      }
                    } else {
                      ?>
                      <span>Not Provided</span>
                      <?php
                    }
                    ?>
                  </p>
                </div>
                <div class="form-group">
                  <label for="preferredData">Preferred Rate and Region</label>
                  <p>Rate : 
                    <?php
                      if(!empty($project->custom_budget_range)) {
                        echo $project->custom_budget_range;
                      }
                      else if(!empty($project->min_budget) && !empty($project->max_budget)) {
                        echo "<strong>&nbsp;$" . $project->min_budget . " - $" . $project->max_budget . "</strong>";
                      }
                      else {
                        echo "Not Provided.";
                      }
                    ?>
                  </p>
                  <p>Region :
                    <?php
                      if(!empty($project->regions)) {
                        $regions = explode(",", $project->regions);
                        foreach ($regions as $region) {
                          $reg = Regions::model()->findByPk($region);
                          ?>
                          <span class="label label-primary fn12"><?php echo $reg->name; ?></span>
                          <?php
                        }
                      } else {
                        echo "Not Provided.";
                      }
                    ?>
                  </p>
                </div>

              </div>
             </div>

             <div class="tab-pane" id="approve_tab2">
              <h4>Client's Company Details</h4>
              <div class="tab-form">
                <div class="form-group">
                  <label for="companyName">Company Name</label>
                  <?php echo CHtml::textField('Client[company_name]', (!empty($project->clientProfiles->company_name)) ? $project->clientProfiles->company_name : 'Not Provided.', array(
                    'disabled'=>'disabled',
                    'class'=>'form-control',
                    'id'=>'companyName',
                    'placeholder'=>'Enter company name',
                  )); ?>
                </div>
                <div class="form-group">
                  <label for="teamSize">Team Size</label>
                  <?php echo CHtml::textField('Client[team_size]', (!empty($project->clientProfiles->team_size)) ? $project->clientProfiles->team_size : 'Not Provided.', array(
                    'disabled'=>'disabled',
                    'class'=>'form-control',
                    'id'=>'teamSize',
                    'placeholder'=>'Enter team size',
                  )); ?>
                </div>
                <div class="form-group">
                  <label for="clientLocation">Location</label>
                  <?php echo CHtml::textField('Client[location]', (!empty($project->clientProfiles->address1)) ? $project->clientProfiles->address1 : 'Not Provided.', array(
                    'disabled'=>'disabled',
                    'class'=>'form-control',
                    'id'=>'clientLocation',
                    'placeholder'=>'Enter location',
                  )); ?>
                </div>
                <div class="form-group">
                  <label for="companyLink">Company Link</label>
                  <?php echo CHtml::textField('Client[company_link]', (!empty($project->clientProfiles->company_link)) ? $project->clientProfiles->company_link : 'Not Provided.', array(
                    'disabled'=>'disabled',
                    'class'=>'form-control',
                    'id'=>'companyLink',
                    'placeholder'=>'Enter company link',
                  )); ?>
                </div>
              </div>
             </div>
             <div class="tab-pane" id="approve_tab3">
              <h4>Approve the suppliers selected by the client</h4>
              <div class="tab-form">
                <?php
                  $supplier_projects = $project->suppliersProjects;
                  if(!empty($supplier_projects)) {
                    foreach ($supplier_projects as $project) {
                      $supplier = $project->suppliers;
                      ?>
                        <div class="row mtb30">
                          <div class="col-md-8">
                            <div class="row">
                              <div class="col-md-4">
                              <img width="80px" height="80px" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/user.png" class="img-responsive img-circle" alt="Responsive image">
                              </div>
                              <div class="col-md-8 suppDataBox">
                                <p><strong><?php echo (!empty($supplier->name))? ucwords($supplier->name): "Not Provided."; ?></strong></p>
                                <p>
                                  <?php
                                    $supp_skills = $supplier->suppliersHasSkills;
                                    if(!empty($supp_skills)) {
                                      foreach ($supp_skills as $supp_skill) {
                                        ?>
                                        <span class="label label-primary fn12"><?php echo $supp_skill->skills->name; ?></span>&nbsp;
                                        <?php
                                      }
                                    } else {
                                      echo "Not Provided.";
                                    }
                                  ?>
                                </p>
                                <p><?php echo (!empty($supplier->location))? ucwords($supplier->location): "Not Provided."; ?></p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <!-- Suppliers list that need to be send to the server -->
                            <!-- Slide THREE -->
                            <div class="slideThree">
                            <?php
                              echo CHtml::checkbox("Suppliers[selected][$supplier->id]", true, array(
                                            'value'=>'1',
                                            'id'=>"supplier".$supplier->id,
                                          ));
                              echo CHtml::label("", "supplier".$supplier->id);
                            ?>
                            </div>
                          </div>
                        </div>
                        <hr/>
                      <?php
                    }
                  } else {
                    echo "<p>No suppliers are available</p>";
                  }
                ?>
              </div>
             </div>
            </div>
           </div>
        </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      <?php
      if(!empty($supplier_projects)) {
        echo CHtml::submitButton("Approve Project", array(
                'class'=>'btn btn-primary',
              )); 
      } else {
        echo CHtml::submitButton("Approve Project", array(
                'class'=>'btn btn-primary',
                'disabled'=>'disabled',
              )); 
      }
      ?>
    </div>
    <?php $this->endWidget(); ?>
</div>


<!-- Ends Here -->
</div>
        </div>
    </div>
</div>