<?php
/* @var $this SuppliersHasPortfolioController */
/* @var $model SuppliersHasPortfolio */

$this->breadcrumbs=array(
	'Suppliers Has Portfolios'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SuppliersHasPortfolio', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasPortfolio', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#suppliers-has-portfolio-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Suppliers Has Portfolios</h1>

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
				<h4><i class="fa fa-table"></i>List of all Suppliers Has Portfolio</h4>
			</div>
			<div class="box-body">
					<?php $this->widget('zii.widgets.grid.CGridView', array(
					//	'id'=>'suppliers-has-portfolio-grid',
						'id'=>'datatables1',
						'itemsCssClass'=>'datatable table table-striped table-bordered table-hover',
						'dataProvider'=>$model->search(),
						'filter'=>$model,
						'columns'=>array(
							'id',
							'suppliers_id',
							'project_name',
							'project_link',
							'description',
							'industry_id',
							'service_id',
							'client_name',
							'year_done',
							'estimate_price',
							'start_date',
							'estimate_timeline',
							'language_used',
							'cover',
							'add_date',
							array(
            				'name'=>'status',
            				'header'=>'Status', 
            				'filter'=>CHtml::activeDropDownList($model, 'status',
                     		 array('1'=>"Verified",'0'=>'Un-Verified'),
                      		array('empty'=>'Select Status',"")), 
            				'value'=>'($data->status==1)?"Verified":"Not Verified"',            
        				),
							'portfolio_type',
							'one_line_pitch',
							'who_can',
							'markets',
							'portfolio_status',
							'no_of_customers',
							'launched_in',
							'no_of_users',
							'deployment',
							'is_free_trial',
							'project_size',
							'per_hour_rate',
							'platform',
							'company_name',
							'is_discreet',
							'discreet_desc',
							'location',
							'image',
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
