<?php
/* @var $this SuppliersController */
/* @var $model Suppliers */

$this->breadcrumbs=array(
	'Suppliers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Suppliers', 'url'=>array('index')),
	array('label'=>'Create Suppliers', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#suppliers-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="row">
    <div class="col-sm-12">
        <div class="page-header">
         	<h1>Manage Suppliers</h1>
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
				<h4><i class="fa fa-table"></i>List of all Suppliers</h4>
			</div>
									

			<div class="box-body box-scroll-horizontal" >
<?php $this->widget('zii.widgets.grid.CGridView', array(
	//'id'=>'suppliers-grid',
	'id'=>'datatables1',
	'itemsCssClass'=>'datatable table table-striped table-bordered table-hover ',
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
		'name',
		array('name'=>'first_name',
				'header'=>'Supplier Name'),
		array('name'=>'add_date',
				'header'=>'Created On'),
		'email',
		'skype_id',
		'website',
		'location',
		'number_of_employee',
		array(
			'header'=>'Skills',
			'type'=>'raw',
			'value'=>array($this,'fetchSkills'),
		),
		'profile_status',
		array('name'=>'modification_date',
				'header'=>'Updated On'),
		'per_hour_rate',
		'project_size',
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
                       						 )
		),
		
	),
)); ?>
</div>
		</div>
	<!-- /BOX -->
	</div>
</div>
