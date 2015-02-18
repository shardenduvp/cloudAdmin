<?php
/* @var $this SuppliersProjectsController */
/* @var $model SuppliersProjects */

$this->breadcrumbs=array(
	'Suppliers Projects'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SuppliersProjects', 'url'=>array('index')),
	array('label'=>'Create SuppliersProjects', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#suppliers-projects-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Suppliers Projects</h1>

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
	'id'=>'suppliers-projects-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'pitch',
		'about_project',
		'why_you',
		'estimated_cost',
		'estimated_time',
		/*
		'trial_period',
		'chat_room_id',
		'comments',
		'min_price',
		'max_price',
		'time_material',
		'billing_schedule',
		'start_date',
		'note',
		'is_escrow',
		'others',
		'add_date',
		'status',
		'client_projects_id',
		'suppliers_id',
		'default_q1_ans',
		'default_q2_ans',
		'default_q3_ans',
		'default_q4_ans',
		'default_q5_ans',
		'default_q6_ans',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
