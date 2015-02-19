<?php
/* @var $this ClientProjectsController */
/* @var $model ClientProjects */

$this->breadcrumbs=array(
	'Client Projects'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ClientProjects', 'url'=>array('index')),
	array('label'=>'Create ClientProjects', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#client-projects-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Client Projects</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'client-projects-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'description',
		'tag_line',
		'business_problem',
		'about_company',
		/*
		'team_size',
		'summary',
		'unique_features',
		'min_budget',
		'max_budget',
		'custom_budget_range',
		'start_date',
		'project_start_preference',
		'preferences',*/
		'regions',
		'tier',
		/*'absolute_necessary_language',
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
