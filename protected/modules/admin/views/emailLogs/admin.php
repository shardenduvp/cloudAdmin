<?php
/* @var $this EmailLogsController */
/* @var $model EmailLogs */

$this->breadcrumbs=array(
	'Email Logs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List EmailLogs', 'url'=>array('index')),
	array('label'=>'Create EmailLogs', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "

$('.search-form form').submit(function(){
	
	var operator=$('.operatorID').val();
	var val=$('.IDUser').val();
	if (val!='') {
		if(val.indexOf('<')!=-1 || val.indexOf('>')!=-1){
		val=$('.IDUser').val().substr(1);
		}
		if(val.indexOf('<')!=-1 || val.indexOf('=')!=-1 ||val.indexOf('>')!=-1){
			val=val.substr(1);
		}
		$('.IDUser').val(operator+val);
	}
	

	var operatorDate=$('.operatorIDforDate').val();
	var val1=$('.add_dateUSER').val();

	if(val1.indexOf('<')!=-1 || val1.indexOf('>')!=-1){
		val1=$('.add_dateUSER').val().substr(1);
	}
	if(val1.indexOf('<')!=-1 || val1.indexOf('=')!=-1 ||val1.indexOf('>')!=-1){
		val1=val1.substr(1);
	}
	
	$('.add_dateUSER').val(operatorDate+val1);


	$('#datatables1').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!-- PAGE HEADER-->
<div class="row">
    <div class="col-sm-12">
        <div class="page-header">
         	<h1>Manage Email Logs</h1>

	       	</div>
    </div>
</div>
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<div class="search-form">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<div class="row">
	<div class="col-md-12 full-width">
		<!-- BOX -->
		<div class="box border custom-table">

			<div class="box-title">
				<h4><i class="fa fa-table"></i>List of all Email Logs</h4>
			</div>
									

			<div class="box-body">

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
		'reciver',
		'templete',
		'esubject',
		'body',
		'time',
		/*
		'status',
		'other_info',
		'user_id',
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
		</div>
		</div>
	<!-- /BOX -->
	</div>
</div>
