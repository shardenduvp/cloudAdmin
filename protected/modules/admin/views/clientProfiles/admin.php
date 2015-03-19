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
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	// add date operator
	var add_date = $('#ClientProfiles_add_date').val()
	if(add_date.length > 10) add_date = add_date.substring(add_date.length - 10);
	var add_date_op = $('#add_date_op').val();
	$('#ClientProfiles_add_date').val(add_date_op + add_date);

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

	$('#datatables1').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="row">
    <div class="col-sm-12">
        <div class="page-header">
            <h1>Manage Client Profiles</h1>
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
                <h4><i class="fa fa-table"></i>List of Client Profiles</h4>
            </div>
                                    

            <div class="box-body">
				<?php
					
					$this->widget('zii.widgets.grid.CGridView', array(
						'id'=>'datatables1',
						'itemsCssClass'=>'datatable table table-striped table-bordered table-hover',
						'dataProvider'=>$model->profileSearch(),
						'filter'=>$model,
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
						'columns'=>array(
							array(
							    'name'=>'id',
							    'value' => '$data->id',
							),
							array(
								'name'=>'user_firstname',
								'value'=>'$data->users->first_name',
							),
							array(
								'name'=>'user_lastname',
								'value'=>'$data->users->last_name',
							),
							array(
								'name'=>'user_company',
								'value'=>'$data->users->company_name',
							),
							array(
								'name'=>'user_email',
								'value'=>'$data->users->username',
							),
							array(
							    'name' => 'skype_id',
							    'type' => 'raw',
							    'value' => '(empty($data->skype_id)) ? "Not Provided." : CHtml::link($data->skype_id, "skype:" . $data->skype_id . "?userinfo")',
							),
							array(
								'name'=>'add_date',
								'header'=>'Registered On'
							),
							array(
								'class'=>'CButtonColumn',
								'header'=>'Operations',
								'buttons'=>array(
	                                        'update'=>array(
	                                                        'visible'=>'true',
	                                                         'url'=>'Yii::app()->createUrl("/admin/users/update", array("id"=>$data->users->id, "update"=>"client"))'
	                                                ),
	                                        'view'=>array(
	                                                        'visible'=>'true',
	                                                        'url'=>'Yii::app()->createUrl("/admin/users/view", array("id"=>$data->users->id, "view"=>"client"))'
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
