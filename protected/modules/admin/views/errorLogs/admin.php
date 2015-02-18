<?php
/* @var $this ErrorLogsController */
/* @var $model ErrorLogs */

$this->breadcrumbs=array(
	'Error Logs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ErrorLogs', 'url'=>array('index')),
	array('label'=>'Create ErrorLogs', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#error-logs-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Error Logs</h1>

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
	'id'=>'error-logs-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'user_type',
		'user_name',
		'error_code',
		'message',
		'request_url',
		/*
		'query_string',
		'file_name',
		'line_number',
		'error_type',
		'time',
		'reference_url',
		'ipaddress',
		'browser',
		'user_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
