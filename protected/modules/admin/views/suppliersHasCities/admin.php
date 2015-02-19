<?php
/* @var $this SuppliersHasCitiesController */
/* @var $model SuppliersHasCities */

$this->breadcrumbs=array(
	'Suppliers Has Cities'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SuppliersHasCities', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasCities', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#suppliers-has-cities-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Suppliers Has Cities</h1>

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
				<h4><i class="fa fa-table"></i>List of Suppliers Has Cities</h4>
			</div>
									

			<div class="box-body">
								<?php $this->widget('zii.widgets.grid.CGridView', array(
									//'id'=>'suppliers-has-cities-grid',
									'id'=>'datatables1',
									'itemsCssClass'=>'datatable table table-striped table-bordered table-hover',
									'dataProvider'=>$model->search(),
									'filter'=>$model,
									'columns'=>array(
										'id',
										'suppliers_id',
										'cities_id',
										'is_main',
										'add_date',
										array(
            				'name'=>'status',
            				'header'=>'Status', 
            				'filter'=>CHtml::activeDropDownList($model, 'status',
                     		 array('1'=>"Verified",'0'=>'Un-Verified'),
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
								                       						 )
										),
									),
								)); ?>
				  </div>
		</div>
	<!-- /BOX -->
	</div>
</div>
