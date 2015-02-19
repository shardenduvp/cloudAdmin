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

<h1>Manage Suppliers</h1>

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
				<h4><i class="fa fa-table"></i>List of all Suppliers</h4>
			</div>
									

			<div class="box-body">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	//'id'=>'suppliers-grid',
	'id'=>'datatables1',
	'itemsCssClass'=>'datatable table table-striped table-bordered table-hover',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'first_name',
		'last_name',
		'cover',
		'name',
		'image',
		'email',
		'skype_id',
		'website',
		'phone_number',
		'tagline',
		'about_company',
		'foundation_year',
		'short_description',
		'details',
		'location',
		'pricing_details',
		'min_price',
		'number_of_employee',
		'total_available_employee',
		'consultation_description',
		'standard_pitch',
		'standard_service_agreement',
		'profile_status',
		'add_date',
		'modification_date',
		'rough_estimate',
		'linkedin',
		'facebook',
		'google',
		'twitter',
		'you_tube',
		'per_hour_rate',
		'project_size',
		'web_references',
		'development_location',
		'sales_location',
		'response_time',
		'is_faq_completed',
		'is_application_submit',
		array(
            				'name'=>'status',
            				'header'=>'Status', 
            				'filter'=>CHtml::activeDropDownList($model, 'status',
                     		 array('1'=>"Verified",'0'=>'Un-Verified'),
                      		array('empty'=>'Select Status',"")), 
            				'value'=>'($data->status==1)?"Verified":"Not Verified"',            
        				),
		'users_id',
		'logo',
		'default_q3_ans',
		'default_q2_ans',
		'default_q1_ans',
		'default_q4_ans',
		'accept_new_project_date',
		'is_profile_complete',
		'price_tier_id',
		'payoneer_payee',
		'payoneer_token',
		'link_status',
		'offers',
		
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
