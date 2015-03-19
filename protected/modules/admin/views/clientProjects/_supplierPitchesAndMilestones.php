<div class="row">
      <div class="col-md-12">
        <div class="row">
            <div class="col-sm-12">
                <h4>Milestones</h4>
            </div>
        </div>
        <br/>
        <div class="row">
          <?php
          if(!empty($milestones)) {
          $form=$this->beginWidget('CActiveForm',  array(
                        'method'=>'post',
                        'action'=>Yii::app()->createUrl('admin/pitchHasPortfolios/myUpdate'),
                      'htmlOptions'=>array(
                        'class'=>'form-horizontal'
                        )
                  ));
			$count	=	0;
            foreach ($milestones as $milestone) {
			$count++;
              $id="milestones[".$milestone->id."]";
            ?>
              <div class="col-md-6">
                <div class="well well-sm ">
                  <!-- Section title -->
                  <div class="subDivTitle">
                    <div class="row">
                      <div class="col-md-7">
                        
                        <h4>Title: #Milestone-<?php 
                            echo $count;//$milestone->title;  ?></h4>
                      </div>
                      <div class="col-md-5">
                        <span class="label label-primary  pull-right">
                          <strong>
                            <?php
                            echo "id: #".$milestone->id;
                            ?>
                          </strong>
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="subDivContent">

                    <?php
                        echo $form->hiddenField($milestone,'id',array('name'=>$id."[id]"));
                     ?>

					         <div class="row fieldRow form-group">
                      <div class="col-md-2"><strong>Overview :</strong></div>
                      <div class="col-md-10">
                        <?php
                           echo $form->textField($milestone,'overview',array('class'=>'form-control','name'=>$id."[overview]"));
                          ?>
                      </div>
                    </div>
					
                    <div class="row fieldRow form-group">
                      <div class="col-md-2"><strong>Due Date :</strong></div>
                      <div class="col-md-10">
                        <?php
                           echo $form->textField($milestone,'due_date',array('class'=>'form-control','name'=>$id."[due_date]"));
                          ?>
                      </div>
                    </div>


                    <div class="row fieldRow form-group">
                      <div class="col-md-2"><strong>Status :</strong></div>
                      <div class="col-md-10">
                        <?php
                           $list=CHtml::listdata(MilestoneStatus::model()->findAll(),'id','title');
                           echo $form->dropDownList($milestone,'status',$list,array('class'=>'form-control','name'=>$id."[status]"));
                          ?>
                      </div>
                    </div>
                    <br/>
                    <div class="row fieldRow form-group">
                      <div class="col-md-12">
                                 
                      </div>
                    </div>
                   
                  </div>
                </div>
              </div>
            <?php
            }
            $this->endWidget(); ?>
 <div class="subDivContent">
  <div class="row">
    <div class="col-md-12">

                       <center>
          <?php


                                        echo CHtml::ajaxSubmitButton('Update Milestones',CHtml::normalizeUrl(array('pitchHasMilestones/myUpdate')),
                                        array(
                                          'dataType'=>'json',
                                          'type'=>'post',
                                          'beforeSend'=>'function(){
                                            $("#updateBtnUser'.$milestone->id.'").button("loading");
                                          }',
                                          'success'=>'function(data) { 
                                            if(data.status == "success" ){
                                          
                                              $("#formResultDiv1").removeClass("alert-warning");
                                              $("#formResultDiv1").addClass("alert-success");
                                              $("#formResult1").html("<strong>Success! </strong>Milestones Info Updated Successfully .");
                                              $("#formResultDiv1").fadeIn("slow");
                                                        $("#updateBtnUser'.$milestone->id.'").button("reset");
                                                    } else{
                                             
                                              $("#formResultDiv1").removeClass("alert-success");
                                              $("#formResultDiv1").addClass("alert-warning");
                                                        $("#formResult1").html("Something Went Wrong .");
                                                        $("#formResultDiv1").fadeIn("slow");
                                                        $("#updateBtnUser'.$milestone->id.'").button("reset");
                                                    }       
                                          }',
                                          'error'=>'function(){
                                           
                                            $("#formResultDiv1").removeClass("alert-success");
                                            $("#formResultDiv1").addClass("alert-warning");
                                                    $("#formResult1").html("Something Went Wrong .");
                                                    $("#formResultDiv1").fadeIn("slow");
                                                    $("#updateBtnUser'.$milestone->id.'").button("reset");
                                                }'
                                        ),
                                            array('id'=>"updateBtnUser".$milestone->id,'class'=>'btn btn-primary', 'style'=>'width:150px',
                                                    'data-loading-text'=>'Updating ...','autocomplete'=>'off',
                                            )
                                    );
  ?>
  </center>             
   </div>
  </div>
</div>   
<br/>

        <?php }else {
          ?>
            <h5 class="noProfile-inner">This pitch does not have any Milestones.</h5>
          <?php
          }
          ?>
        </div>
      </div>
    </div>