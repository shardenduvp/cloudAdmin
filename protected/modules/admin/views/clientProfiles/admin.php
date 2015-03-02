<?php
/* @var $this ClientProfilesController */
/* @var $model ClientProfiles */

$this->breadcrumbs=array(
	'Client Profiles'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ClientProfiles', 'url'=>array('index')),
	array('label'=>'Create ClientProfiles', 'url'=>array('create')),
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

<h1>Manage Client Profiles</h1>

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
	<div class="col-md-12">
		<!-- BOX -->
		<div class="box border blue">

			<div class="box-title">
				<h4><i class="fa fa-table"></i>List of all Clients</h4>
			</div>
									

			<div class="box-body">
				<?php
					
					$this->widget('zii.widgets.grid.CGridView', array(
						'id'=>'datatables1',
						'itemsCssClass'=>'datatable table table-striped table-bordered table-hover',
						'dataProvider'=>$model->search(),
						'filter'=>$model,
						'columns'=>array(
							array('name'=>'id','htmlOptions'=>array('class'=>'center')),
							'last_name',
							'first_name',
							'company_name',
							'email',
							'phone_number',
							'address1',
							'category',
							array(
								'header'=>'No of Projects',
								'value'=>'count($data->clientProjects)'
							),
							array(
								'header'=>'Total Amount Paid',
								'value'=>array($this,'clientMilestones')
							),
							array(
								'name'=>'add_date',
								'header'=>'Created On'
							),
							'company_link',
							'skype_id',
							/*
							'username',
							'phone_number',
							'password',
							'linkedin',
							'role',
							'add_date',
							'last_login',
							'status',
							'role_id',
							*/
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
								)	
							)
						)
					);  
				?>
			</div>
		</div>
	<!-- /BOX -->
	</div>
</div>
