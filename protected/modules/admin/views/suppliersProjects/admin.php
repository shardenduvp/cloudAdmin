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
         	<h1>Manage Suppliers Projects</h1>
       	</div>
    </div>
</div>

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


<div class="row">
	<div class="col-md-12 full-width">
		<!-- BOX -->
		<div class="box border custom-table">
			<div class="box-title">
				<h4><i class="fa fa-table"></i>List of all Suppliers Projects</h4>
			</div>
		<div class="box-body">
			<?php
			$this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'datatables1',
                'itemsCssClass'=>'datatable table table-striped table-bordered table-hover',
                'pagerCssClass'=>'box-body',
                'template'=>'{items}{summary}{pager}',
				'dataProvider'=>$model->adminSearch(),
				'filter'=>$model,
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
                    ),
                ),
				'columns'=>array(
					array(
						'name'=>'supplier_name',
						'type'=>'html',
						'value'=>'CHtml::link($data->suppliers->name, array("/admin/suppliers/view", "id"=>$data->suppliers->id))',
					),
					array(
						'name'=>'project_name',
						'type'=>'html',
						'value'=>'CHtml::link($data->clientProjects->name, array("/admin/suppliers/view", "id"=>$data->clientProjects->id))',
					),	
					array(
						'name'=>'about_project',
						'value'=>'(empty($data->about_project))?"Not Provided":$data->about_project',
					),/*
					array(
						'name'=>'pitch',
						'value'=>'(empty($data->pitch))?"Not Provided":$data->pitch',
					),*/
					array(
						'name'=>'estimated_cost',
						'value'=>'(empty($data->estimated_cost))?"Not Provided":$data->estimated_cost',
					),
					array(
						'name'=>'estimated_time',
						'value'=>'(empty($data->estimated_time))?"Not Provided":$data->estimated_time',
					),
					array(
						'name'=>'trial_period',
						'value'=>'(empty($data->trial_period))?"Not Provided":$data->trial_period',
					),/*
					array(
						'name'=>'chat_room_id',
						'value'=>'(empty($data->chat_room_id))?"Not Provided":$data->chat_room_id',
					),
					array(
						'name'=>'comments',
						'value'=>'(empty($data->comments))?"Not Provided":$data->comments',
					),*/
					array(
						'name'=>'min_price',
						'value'=>'(empty($data->min_price))?"Not Provided":$data->min_price',
					),
					array(
						'name'=>'max_price',
						'value'=>'(empty($data->pitch))?"Not Provided":$data->pitch',
					),
					array(
						'name'=>'billing_schedule',
						'value'=>'(empty($data->billing_schedule))?"Not Provided":$data->billing_schedule',
					),
					array(
						'name'=>'start_date',
						'value'=>'(empty($data->start_date))?"Not Provided":$data->start_date',
					),
					array(
		            	'name'=>'status',
		            	'header'=>'Status', 
		            	'filter'=>CHtml::activeDropDownList($model, 'status',
			                array('1'=>"Waiting Approval",'2'=>'Information Sent'),
			                array('empty'=>'Select Status',"")
			            ), 
		            	'value'=>'($data->status==1)?"Waiting Approval":"Information Sent"',            
		        	),
					array(
						'class'=>'CButtonColumn',
						'header'=>'Operations',
						'buttons'=>array(
                            'update'=>array(
                                'visible'=>'true',
                            ),
                            'view'=>array(
                                'visible'=>'true',
                            ),
                            'delete'=>array(
                                'visible'=>'false',
                            ),
                       	),
					),
				),
			)); ?>

			</div>
		</div>
	<!-- /BOX -->
	</div>
</div>
