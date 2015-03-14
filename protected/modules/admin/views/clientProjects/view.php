<?php
/* @var $this ClientProjectsController */
/* @var $model ClientProjects */

$this->breadcrumbs=array(
	'Client Projects'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ClientProjects', 'url'=>array('index')),
	array('label'=>'Create ClientProjects', 'url'=>array('create')),
	array('label'=>'Update ClientProjects', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClientProjects', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClientProjects', 'url'=>array('admin')),
);
?>

<?php 
$form=$this->beginWidget('CActiveForm', array('id'=>'login-form', 'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('id'=>'project-form','enctype' => 'multipart/form-data','onsubmit'=>'return validate();')));
?>


<section id="main" class="row">
	<div class="page-header" style="border:none;"> <!-- For Top Margin --> </div>
 	<!-- Get Started Form Start -->
    <div  id="project">
    	<!-- Basic Form-->
         <div class="row">
       		 <div class="col-md-12">
             <!-- panel body  BASIC FORM START -->
				<div class="panel-body pb0" id="basicProject"> 
						
                       <!--Title -->
                       	<div class="form-group pa10">
							<label class="col-sm-4 control-label">Q. Please give your job a title.<span class="text-danger">*</span></label>
                            <div class="col-sm-8" id="pss">
                            <?php echo $form->textField($model,'name',array('required'=>'required','placeholder'=>"Ex: e-Commerce app for fashion brand",'class'=>'form-control required','data-parsley-minlength'=>"2",'data-parsley-pattern'=>"^[a-zA-Z ]+$",'data-parsley-id'=>'123')); ?>
                            	<ul class="parsley-errors-list" id="parsley-id-123"></ul>
                            </div>
                        </div>
                       




<!--
<?php
/*
$attributes=array(
	'description',
		'tag_line',
		'business_problem',
		'about_company',
		'team_size',
		'summary',
		'unique_features',
		'min_budget',
		'max_budget',
		'custom_budget_range',
		'start_date',
		'project_start_preference',
		'preferences',
		'regions',
		'tier',
		'absolute_necessary_language',
		'good_know_language',
		'which_one_is_inportant',
		'questions_for_supplier',
		'requirement_change_scale',
		'add_date',
		'modify_date',
		'is_call_scheduled',
		'other_status',
		'current_status',
		'status',
		'client_profiles_id',
		'current_status_id',
		'other_current_status',
		'state',
); */
?>
-->