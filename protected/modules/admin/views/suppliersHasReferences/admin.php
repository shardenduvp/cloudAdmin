<?php
/* @var $this SuppliersHasReferencesController */
/* @var $model SuppliersHasReferences */

$this->breadcrumbs=array(
	'Suppliers Has References'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SuppliersHasReferences', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasReferences', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#suppliers-has-references-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="row">
    <div class="col-sm-12">
        <div class="page-header">
         	<h1>Manage References</h1>
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
</div>

<div class="row">
	<div class="col-md-12 full-width">
		<!-- BOX -->
		<div class="box border custom-table">

			<div class="box-title">
				<h4><i class="fa fa-table"></i>List of all References</h4>
			</div>
									

			<div class="box-body" >
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'suppliers-grid',
	'id'=>'datatables1',
	'itemsCssClass'=>'datatable table table-striped table-bordered table-hover',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
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
                    )
                ),
	'columns'=>array(
		'id',
		array(
            'name'=>'supplier',
            'header'=>'Suppliers',
            'type'=>'raw',
            'value'=>'CHtml::link(ucwords($data->suppliers->users->first_name), array("/admin/suppliers/view", "id"=>$data->suppliers->id, "view"=>"suppliers"))',
        ),
        array(
            'name'=>'company_name',
            'header'=>'Company Name',
            'value'=>'(!empty($data->company_name))?ucfirst($data->company_name):"Not Provided"',
        ),
		array(
            'name'=>'client_profiles_id',
			'header'=>'Client Id',
			'type' =>'raw',
            'value'=>'CHtml::link(ucwords($data->client_profiles_id), array("/admin/clientProfiles/view", "id"=>$data->client_profiles_id, "view"=>"client"))',
        ),
		array(
            'name'=>'client_first_name',
			'header'=>'Client First Name',
            'value'=>'(!empty($data->client_first_name))?ucfirst($data->client_first_name):"Not Provided"',
        ),
        array(
            'name' => 'client_email',
            'type' => 'email',
            'value'=>'(!empty($data->client_email))?ucfirst($data->client_email):"Not Provided"',
        ),
        array(
            'name'=>'project_name',
            'header'=>'Project Name',
            'value' => '(!empty($data->project_name))?$data->project_name:"Not Provided"',
        ),
        array(
            'name'=>'status',
            'filter'=>CHtml::activeDropDownList($model, 'status',
                            array('empty'=>'Select Status',"")),
            'value' => '($data->status === "0") ? "Requested" : (($data->status === "1") ? "Not Verified" : (($data->status === "2") ? "Verified" : (($data->status === "3") ? "Delete" : (($data->status === "4") ? "Reported Issue" : "Not Provided"))))'
        ),
		array(
			'class'=>'CButtonColumn',
			'header'=>'Operations',
			'buttons'=>array(
                'update'=>array(
                    'visible'=>'true',
                    'url'=>'Yii::app()->createUrl("/admin/suppliersHasReferences/update", array("id"=>$data->id, "update"=>"suppliersHasReferences"))'
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
