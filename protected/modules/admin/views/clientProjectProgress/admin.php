<?php
/* @var $this ClientProjectProgressController */
/* @var $model ClientProjectProgress */

$this->breadcrumbs=array(
	'Client Project Progresses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ClientProjectProgress', 'url'=>array('index')),
	array('label'=>'Create ClientProjectProgress', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#client-project-progress-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Client Project Progresses</h1>

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
	'id'=>'client-project-progress-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'details',
		'status',
		'client_projects_id',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
