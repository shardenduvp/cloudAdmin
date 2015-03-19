<div class="row">
                              <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4></h4>
                                    </div>
                                </div>
                                <br/>

                            <?php
                                if(!empty($pitches)) {
                            ?>
                                    <div class="row" style="margin:0px;">
                                    <div class="col col-md-12 clearfix"   style="background:#fff;">
                                          <!-- Section title -->
                                            <div class="subDivTitle">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        
                                                       <h4>Pitch Id: <?php echo "#".$pitches->id; ?></h4>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="subDivContent">

                                                <div class="row fieldRow form-group">
                                                    <div class="col-md-2"></div>
                                                    <div class="col-md-2"><strong>Pitch Status :</strong></div>
                                                    <div class="col-md-6">
                                                    <?php
                                                      echo CHtml::dropDownlist('pitchId',$pitches->status,array('1'=>'Request for Introduction','2'=>'New Message','3'=>'Pitch Submitted','4'=>'Pitch Viewed','5'=>'Offer Made','6'=>'Offer Accepted','7'=>'Offer Declined','8'=>'Declined'),array('class'=>'form-control','onchange'=>'updateStatus($(this))'));
                                                      ?>
                                                    </div>
                                                    <div class="col-md-2"></div>
                                                </div>

                                                <?php
                                                    $milestones=$pitches->pitchHasMilestones;
                                                   // var_dump($pitches);
                                                   $this->renderPartial('_supplierPitchesAndMilestones',array('milestones'=>$milestones));
                                                ?>
                                            </div>
                                            
                                    </div>
                                    
                                    
                                </div>
                            <?php
                                //$this->endWidget();
                                }else {
                            ?>
                                <h5 class="noProfile-inner">This supplier does not have any Pitches.</h5>
                            <?php
                                }
                            ?>

                        </div>
                        </div>