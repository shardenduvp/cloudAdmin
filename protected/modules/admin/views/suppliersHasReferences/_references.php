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
            <div class="form-group col-md-4">
                <label for="name1">Client Name</label>
                <?php echo $form->textField($model,'client_name',array('value'=>$model->clientProfiles->first_name.' '.$model->clientProfiles->last_name,'title'=>"Company Name",'data-parsley-minlength'=>"2",'data-parsley-pattern'=>"^[a-zA-Z0-9,.@&!#'_*+\- ]+$",'class'=>'form-control text-input defaultText minlength','length'=>"2",'tabindex'=>'1','disabled'=>'true'));?>
            </div>
            <div class="form-group col-md-4">
                <label for="name1">Client Email</label>
                <?php echo $form->textField($model,'client_email',array('valuer'=>$model->client_email,'disabled'=>'true','title'=>"Per Hour Rate",'data-parsley-type'=>"number",'class'=>'form-control text-input defaultText minlength','aria-describedby'=>'basic-addon1','length'=>"2",'tabindex'=>'7'));?>
            </div>
            <div class="form-group col-md-4" id="lang-client">
                <label for="name1">Supplier</label>
                <?php echo $form->textField($model,'supplier',array('value'=>$model->suppliers->users->first_name.' '.$model->suppliers->users->last_name,'disabled'=>'true','title'=>"Project Size",'class'=>'form-control text-input defaultText','tabindex'=>'9'));?>
            </div>
            <div class="form-group col-md-6">
                 <label for="name1">Project Name</label>
                 <?php echo $form->textField($model,'project_name',array('value'=>$model->project_name,'disabled'=>'true','title'=>"Project Size",'class'=>'form-control text-input defaultText','tabindex'=>'6'));?>
            </div>
            <div class="form-group col-md-6" id="lang-client">
                <label for="name1">Company Name</label>
                <?php echo $form->textField($model,'company_name',array('value'=>$model->company_name,'disabled'=>'true','title'=>"Project Size",'class'=>'form-control text-input defaultText','tabindex'=>'9'));?>
            </div>
            <div class="form-group col-md-12">
                <label for="name1">Project Description</label>
                <?php echo $form->textArea($model,'project_description',array('value'=>$model->project_description,'disabled'=>'true','title'=>"Description",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText alphanum minlength','length'=>"2",'tabindex'=>'4'));?>
            </div>
            <div class="form-group col-md-12">
                <label for="name1">Provider Do well</label>
                <?php echo $form->textArea($model,'provide_do_well',array('value'=>$model->provide_do_well,'disabled'=>'true','title'=>"Description",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText alphanum minlength','length'=>"2",'tabindex'=>'4'));?>
            </div>
            <div class="form-group col-md-12">
                <label for="name1">Provider Improve</label>
                <?php echo $form->textArea($model,'provider_improve',array('value'=>$model->provider_improve,'disabled'=>'true','title'=>"Description",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText alphanum minlength','length'=>"2",'tabindex'=>'4'));?>
            </div>
            <div class="form-group col-md-4" id="par-date">
                <label for="name1">Year Of Engagement</label>
                <?php echo $form->textField($model,'year_engagement',array('autocomplete'=>'off','maxlength'=>'10','value'=>$model->year_engagement,'disabled'=>'true','title'=>"11/11/1111",'class'=>'form-control date text-input defaultText datepicker','length'=>"2",'tabindex'=>'8'));?>
            </div>
            <div class="form-group col-md-4" id="par-date">
                <label for="name1">Created On</label>
                <?php echo $form->textField($model,'add_date',array('autocomplete'=>'off','maxlength'=>'10','value'=>$model->add_date,'disabled'=>'true','title'=>"11/11/1111",'class'=>'form-control date text-input defaultText datepicker','length'=>"2",'tabindex'=>'8'));?>
            </div>
            <div class="form-group col-md-4">
                <label for="name1">Modified On</label>
                <?php echo $form->textField($model,'modified',array('value'=>$model->modified,'disabled'=>'true','title'=>"Project Size",'class'=>'form-control text-input defaultText','tabindex'=>'9'));?>
            </div>   
            <div class="col-md-12">
                <div class="col-md-2 pull-right"><?php echo CHtml::link('<button type="button" class="btn btn-primary  text-center model_text" >Edit Portfolio</button>', array('/admin/suppliersHasReferences/update','id'=>$model->id));?></div>
            </div>
        </div>
    </div>
</div>

 <?php $this->endWidget(); ?>