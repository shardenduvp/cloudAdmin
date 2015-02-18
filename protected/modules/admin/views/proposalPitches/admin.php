<?php
/* @var $this ProposalPitchesController */
/* @var $model ProposalPitches */

$this->breadcrumbs=array(
	'Proposal Pitches'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ProposalPitches', 'url'=>array('index')),
	array('label'=>'Create ProposalPitches', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#proposal-pitches-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Proposal Pitches</h1>

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
	'id'=>'proposal-pitches-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'trial_period',
		'estimated_cost',
		'estimated_time',
		'min_price',
		'max_price',
		/*
		'time_material',
		'billing_schedule',
		'status',
		'add_date',
		'remarks',
		'added_by',
		'users_id',
		'suppliers_projects_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
