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
<center>

<!--Company name-->
<div class="page-header">
<b>  <h1><?php echo $model->name;?></h1></b>
</div>

<!--Details-->
<div class="well well-lg">
<img alt="User Pic" class="img-circle" style="max-width:100px;" src="
  <?php 
    if($model->clientProfiles->users->image==null)
    { echo Yii::app()->theme->baseUrl."/img/2.jpg"; }
    else
    { echo $model->clientProfiles->users->image; }
  ?>" 
>
<?php echo $model->clientProfiles->company_name; ?><br>
<?php echo $model->clientProfiles->company_link; ?><br>
<?php echo $model->clientProfiles->address1; ?><br>
<?php $teams = $model->clientProfiles->users->teams;
	foreach ($teams as $team) 
{
	echo $team->linkedin;
}
?>
</div>

<!--skills -->
<b>Requirements:</b>
<div class="well well-lg">
<button class="btn btn-primary" type="button">
<?php  $hasSkills = $model->clientProjectsHasSkills;
foreach ($hasSkills as $skill) {
echo $skill->skills->name." ";
}
?></button>
</div>

<!--summary-->
<b>Project Summary:</b>
<div class="well well-lg"><?php echo $model->summary; ?></div>

<!--Reference files-->
<b>Reference Files:</b>
<div class="well well-lg"><?/*php echo */ ?></div>

<!--Team-->
<b>Team:</b>
<div class="well well-lg">
<?php $teams = $model->clientProfiles->users->teams;
	foreach ($teams as $team) 
	{
	echo $team->first_name;
	echo $team->last_name;
	echo $team->experiance;
	echo $team->image;
	}
?>
</div>
</center>

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