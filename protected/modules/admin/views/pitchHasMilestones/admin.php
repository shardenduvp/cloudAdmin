<?php
/* @var $this PitchHasMilestonesController */
/* @var $model PitchHasMilestones */

$this->breadcrumbs=array(
	'Pitch Has Milestones'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PitchHasMilestones', 'url'=>array('index')),
	array('label'=>'Create PitchHasMilestones', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pitch-has-milestones-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Pitch Has Milestones</h1>

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
	'id'=>'pitch-has-milestones-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'overview',
		'start_date',
		'end_date',
		'due_date',
		/*
		'amount',
		'note',
		'is_schedule_payment',
		'transaction',
		'add_date',
		'status',
		'proposal_pitches_id',
		'users_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
