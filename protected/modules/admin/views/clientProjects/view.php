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

<h1>View ClientProjects #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
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
	),
)); ?>
