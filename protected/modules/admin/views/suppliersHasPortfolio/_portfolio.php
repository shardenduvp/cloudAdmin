<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"> 
<?php if(Yii::app()->user->hasFlash('record')){?>
<div class="alert alert-success" id="repsoneRest2">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
    <p id="messageResponse2">
        <strong><?php echo Yii::app()->user->getFlash('record'); ?></strong>
    </p>
</div>
<?php } ?>
<?php $form=$this->beginWidget('CActiveForm', array('enableClientValidation'=>true,'id'=>"client-form",'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('class'=>"forms",'data-parsley-validate'=>'data-parsley-validate'))); ?>
<div class="classsegments col-md-12">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="row">
            <div align="center">
                <?php   if($model->image==null)
                            $avtar_img = Yii::app()->theme->baseUrl."/adminPanel/img/user.png";
                        else
                            $avtar_img =  $model->image;
                        $profile_img = $avtar_img; 
                 ?>
                <img src="<?php echo $profile_img; ?>" class="img-circle" id="profile_img1" width="150" height="150" />
            </div>
        </div>
        <br>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="name1">Company Name</label>
                <?php echo $form->textField($model,'company_name',array('value'=>$model->company_name,'title'=>"Company Name",'data-parsley-minlength'=>"2",'data-parsley-pattern'=>"^[a-zA-Z0-9,.@&!#'_*+\- ]+$",'class'=>'form-control text-input defaultText minlength','length'=>"2",'tabindex'=>'1','disabled'=>'true'));?>
            </div>
            <div class="form-group col-md-6" id="lang-client">
                <label for="name1">Client Name</label>
                <?php echo $form->textField($model,'client_name',array('value'=>$model->client_name,'disabled'=>'true','title'=>"Project Size",'class'=>'form-control text-input defaultText','tabindex'=>'9'));?>
            </div>
            <div class="form-group col-md-12">
                <label for="name1">Description</label>
                <?php echo $form->textArea($model,'description',array('value'=>$model->description,'disabled'=>'true','title'=>"Description",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText alphanum minlength','length'=>"2",'tabindex'=>'4'));?>
            </div>
            <div class="form-group col-md-4" id="par-loc">
                <label for="name1">Location</label>
                    
                    <?php 
                        $city = Cities::model()->findByAttributes(array('id'=>$model->location));
                        if(!empty($city)){
                            $country = Countries::model()->findBYAttributes(array('id'=>$city->countries_id));
                            if(!empty($country)){
                                $region = Regions::model()->findBYAttributes(array('id'=>$country->regions_id));
                                echo $form->textField($model,'location',array('disabled'=>'true','name'=>'location','value'=>$city->name.', '.$country->name.', '.$region->name,'title'=>"Location (Required)",'class'=>'form-control text-input defaultText','length'=>"1",'tabindex'=>'2','id'=>"citySelect",'spellcheck'=>"true"));
                            }
                        }
                        else
                            echo $form->textField($model,'location',array('disabled'=>'true','name'=>'location','value'=>'Not Provided','title'=>"Location (Required)",'class'=>'form-control text-input defaultText','length'=>"1",'tabindex'=>'2','id'=>"citySelect",'spellcheck'=>"true"));?>
                                       
            </div>
            <div class="form-group col-md-4">
                 <label for="name1">Project Size</label>
                 <?php echo $form->textField($model,'project_size',array('value'=>$model->project_size,'disabled'=>'true','title'=>"Project Size",'class'=>'form-control text-input defaultText','tabindex'=>'6'));?>
            </div>
            <div class="form-group col-md-4">
                <label for="name1">Per Hour Rate ( $ )</label>
                <?php echo $form->textField($model,'per_hour_rate',array('valuer'=>$model->per_hour_rate,'disabled'=>'true','title'=>"Per Hour Rate",'data-parsley-type'=>"number",'class'=>'form-control text-input defaultText minlength','aria-describedby'=>'basic-addon1','length'=>"2",'tabindex'=>'7'));?>
            </div>
            <div class="form-group col-md-12" id="lang-client">
                <label for="name1">One Line Pitch</label>
                <?php echo $form->textField($model,'one_line_pitch',array('value'=>$model->one_line_pitch,'disabled'=>'true','title'=>"Project Size",'class'=>'form-control text-input defaultText','tabindex'=>'9'));?>
            </div>
            <div class="form-group col-md-4">
                <label for="name1">Project URL/Demo Link</label>
                <?php echo $form->textField($model,'project_link',array('value'=>$model->project_link,'disabled'=>'true','title'=>"Project URL/Demo Link ","data-parsley-type"=>"url",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText alphanum minlength','length'=>"2",'tabindex'=>'5'));?>
            </div>
            <div class="form-group col-md-4" id="par-date">
                <label for="name1">Project Start Date</label>
                <?php echo $form->textField($model,'start_date',array('autocomplete'=>'off','maxlength'=>'10','value'=>$model->start_date,'disabled'=>'true','title'=>"11/11/1111",'class'=>'form-control date text-input defaultText datepicker','length'=>"2",'tabindex'=>'8'));?>
            </div>
            <div class="form-group col-md-4">
                <label for="name1">Project Duration</label>
                <?php echo $form->textField($model,'estimate_timeline',array('value'=>$model->estimate_timeline,'disabled'=>'true','title'=>"Project Size",'class'=>'form-control text-input defaultText','tabindex'=>'9'));?>
            </div>
            <?php if(!empty($model->suppliersPortfolioImages)){?>
            <div class="form-group col-md-12">
                <div><p><b>Images</b></p></div>
            <?php foreach($model->suppliersPortfolioImages as $image){?>
                <div class="pull-left" style="margin-left:10px;">
                    <?php   if($image->image==null)
                                $avtar_img = Yii::app()->theme->baseUrl."/adminPanel/img/user.png";
                            else
                                $avtar_img =  $image->image;
                            $profile_img = $avtar_img; 
                     ?>
                    <img src="<?php echo $profile_img; ?>" id="profile_img1" width="50" height="50" />
                </div>
            <?php }?>
            </div> 
            <?php
            }?>
            
            <div class="form-group col-md-12" id="lang-client">
                <label for="name1">Skills</label>
                <?php
                    $skills = ''; 
                    if(!empty($model->suppliersHasPortfolioHasSkills)){
                        foreach($model->suppliersHasPortfolioHasSkills as $portfolioSkill){
                            $skills = $portfolioSkill->skills->name.', '.$skills;
                        }
                    }
                    else
                        $skills = 'Not Provided';
                ?>
                <?php echo $form->textField($model,'language_used',array('value'=>$skills,'disabled'=>'true','title'=>"Project Size",'class'=>'form-control text-input defaultText','tabindex'=>'9'));?>
                
            </div>
            
             <div class="form-group col-md-12" id="plat-client">
                <label for="name1">Services</label>
                <?php
                    $services = ''; 
                    if(!empty($model->suppliersHasPortfolioHasServices)){
                        foreach($model->suppliersHasPortfolioHasServices as $portfolioServices){
                            $services = $portfolioServices->services->name.', '.$services;
                        }
                    }
                    else
                        $services = 'Not Provided';
                ?>
                <?php echo $form->textField($model,'platform',array('value'=>$services,'disabled'=>'true','title'=>"Project Size",'class'=>'form-control text-input defaultText','tabindex'=>'9'));?>    
            </div>
            
            
            <div class="form-group col-md-12" id="ind-client">
                <label for="name1">Industries</label><?php 
                        $industries = ''; 
                    if(!empty($model->suppliersPortfolioHasIndustries)){
                        foreach($model->suppliersPortfolioHasIndustries as $portfolioIndustries){
                            $industries = $portfolioIndustries->industries->name.', '.$industries;
                        }
                    }
                    else
                        $industries = 'Not Provided';
                        echo $form->textField($model,'markets',array('value'=>$industries,
                                                                        'disabled'=>'true',
                                                                        'title'=>"Project Size",
                                                                        'class'=>'form-control text-input defaultText',
                                                                        'tabindex'=>'9')
                                                                    );?>
                
  
            </div>
            <div class="col-md-12">
                <div class="col-md-2 pull-left"><?php echo CHtml::link('<button type="button" class="btn btn-primary  text-center model_text" >Edit Portfolio</button>', array('/admin/suppliersHasPortfolio/update','id'=>$model->id));?></div>
                <!--<div class="col-md-2 pull-left"><?php //echo CHtml::link('<button type="button" class="btn btn-primary  text-center model_text" >Create Portfolio</button>', array('/admin/suppliersHasPortfolio/create','id'=>$model->id));?></div>-->
                <br>
                <br>
                <br>

             
                    <div class="box-title">
                      <strong></strong><h3>Portfolio References</h3></strong>

                    <div class="box-title">
                      <h4>Portfolio References</h4>

                     </div>
                    <?php
                    $references='';
                    if(!empty($model->suppliersHasReferences)) {
                     foreach ($model->suppliersHasReferences as $suppliersReferences) { ?>
                     <div class="box border grey">
                        <div class="box-title">
                            <h4>Reference for </h4>
                            <?php echo '  '.$suppliersReferences->project_name ; ?>
                                 <div class="tools">

                                    <a href="#box-config" data-toggle="modal" data-target="#myModal" class="view" data-id="<?php echo $suppliersReferences->id;?>" onclick="fetchAnswers($(this))">

                                    <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="#box-config" data-toggle="modal"  data-target="#myModal1" class="edit">
                                    <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:;" class="remove">
                                    <i class="fa fa-times"></i>
                                     </a>
                                 </div>
                         </div>
                    </div>
                      
                        <?php
                            }
                        }
                        else
                        {
                            $references = 'Not Provided';
                        }
                    ?>

             </div>  
    </div>
    </div>


                        <!-- View Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">View</h4>
                              </div>
                              <div class="modal-body" id="answersBody">
                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--btn 1 -->


                        <!-- Modal -->
                        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                              </div>
                              <div class="modal-body">
                                ...
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
   </div>


<?php $this->endWidget(); ?>
