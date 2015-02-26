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
         	<h1>Manage Client Projects</h1>
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
	<div class="col-md-12">
		<!-- BOX -->
		<div class="box border blue">

			<div class="box-title">
				<h4><i class="fa fa-table"></i>List of all Client Projects</h4>
			</div>
									

			<div class="box-body">
			<?php $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'datatables1',
                'itemsCssClass'=>'datatable table table-striped table-bordered table-hover',
                'pagerCssClass'=>'box-body',
                'template'=>'{items}{summary}{pager}',
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
				'dataProvider'=>$model->projectSearch(),
				'filter'=>$model,
				'columns'=>array(
					array(
                        'name'=>'name',
                        'type'=>'html',
                        'value'=>'CHtml::link($data->name, array("/admin/clientProjects/view", "id"=>$data->id))'
                    ), /*
					array(
					    'name'=>'description',
						'value'=>'(empty($data->description))?"Not Provided":trim(substr($data->description, 0, 30))."..."',
					), */
					array(
					    'name'=>'client_name',
					    'type'=>'html',
						'value'=>'CHtml::link($data->clientProfiles->users->first_name, array("/admin/clientProfiles/view", "id"=>$data->clientProfiles->id))',
					),
					array(
					    'name'=>'min_budget',
						'value'=>'(empty($data->min_budget))?"Not Provided":$data->min_budget',
					),
					array(
					    'name'=>'max_budget',
						'value'=>'(empty($data->max_budget))?"Not Provided":$data->max_budget',
					),
					array(
					    'name'=>'custom_budget_range',
						'value'=>'(empty($data->custom_budget_range))?"Not Provided":$data->custom_budget_range',
					),
					array(
					    'name'=>'start_date',
						'value'=>'(empty($data->start_date))?"Not Provided":$data->start_date',
					),
					array(
					    'name'=>'project_start_preference',
						'value'=>'(empty($data->project_start_preference))?"Not Provided":$data->project_start_preference',
					),
					array(
					    'name'=>'regions',
						'value'=>array($this, 'getRegion'),
					),
					array(
					    'name'=>'tier',
						'value'=>array($this, 'getTier'),
					),
					array(
					    'name'=>'add_date',
						'value'=>'(empty($data->add_date)) ? "Not Provided" : $data->add_date',
					),
					array(
					    'name'=>'modify_date',
						'value'=>'(empty($data->modify_date)) ? "Not Provided" : $data->modify_date',
					),
					array(
            			'name'=>'status',
            			'header'=>'Status', 
            			'filter'=>CHtml::activeDropDownList($model, 'status',
                     		array('1'=>"Verified",'0'=>'Not Verified'),
                      		array('empty'=>'Select Status',"")), 
            			'value'=>'($data->status==1)?"Verified":"Not Verified"',            
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