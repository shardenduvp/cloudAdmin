<?php
/* @var $this AdminLogsController */
/* @var $model AdminLogs */

$this->breadcrumbs=array(
	'Admin Logs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List AdminLogs', 'url'=>array('index')),
	array('label'=>'Create AdminLogs', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#admin-logs-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Admin Logs</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<div class="search-form">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'datatables1',
					'itemsCssClass'=>'datatable table table-striped table-bordered table-hover',
					'dataProvider'=>$model->search(),
					'filter'=>$model,'template'=>'{items}{summary}{pager}',
					'pagerCssClass'=>'box-body',
                	'pager'=>array(
                        'header'=>'',
                        'firstPageLabel'=>'&laquo;',
                        'lastPageLabel'=>'&raquo;',
                        'prevPageLabel'=>'<',
                        'nextPageLabel'=>'>',
                        'hiddenPageCssClass'=>'disabled',
                        'selectedPageCssClass'=>'active',
                        'htmlOptions'=>array(
                            'class'=>'pagination',
                        )
                    ),
	'columns'=>array(
		'id',
		'username',
		'ipaddress',
		'logtime',
		'controller',
		'action',
		/*
		'details',
		'action_param',
		'browser',
		'query_string',
		'refer_url',
		'user_id',
		'request_url',
		*/
		array(
								'class'=>'CButtonColumn',
								'header'=>'Operations',
								'buttons'=>array(
	                                        'update'=>array(
	                                                        'visible'=>'false',
	                                                ),
	                                        'view'=>array(
	                                                        'visible'=>'true',
	                                                ),
	                                        'delete'=>array(
	                                                        'visible'=>'true',
	                                                ),
	                       					)
								)
	),
)); ?>
