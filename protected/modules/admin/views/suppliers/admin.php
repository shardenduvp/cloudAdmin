<?php
/* @var $this SuppliersController */
/* @var $model Suppliers */

$status = array(
    '0' => 'Deactivated',
    '1' => 'Profile Submitted',
    '2' => 'Approved',
    '3' => 'Verified',
);

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
</div>

<div class="row">
	<div class="col-md-12 full-width">
		<!-- BOX -->
		<div class="box border custom-table">

			<div class="box-title">
				<h4><i class="fa fa-table"></i>List of all Suppliers</h4>
			</div>
									

			<div class="box-body" >
<?php $this->widget('zii.widgets.grid.CGridView', array(
	//'id'=>'suppliers-grid',
	'id'=>'datatables1',
	'itemsCssClass'=>'datatable table table-striped table-bordered table-hover',
	'dataProvider'=>$model->adminSearch(),
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
            'name'=>'user_company',
            'header'=>'Company Name',
            'value'=>'(!empty($data->users->company_name))?ucfirst($data->users->company_name):"Not Provided"',
        ),
		array(
            'name'=>'first_name',
			'header'=>'Supplier Name',
			'type' =>'raw',
            'value'=>'CHtml::link(ucwords($data->users->first_name.\' \'.$data->users->last_name), array("/admin/users/view", "id"=>$data->users->id, "view"=>"supplier"))',
        ),
		array(
            'name'=>'add_date',
			'header'=>'Created On',
            'value'=>'(!empty($data->add_date))?ucfirst($data->add_date):"Not Provided"',
        ),
        array(
            'name' => 'skype_id',
            'type' => 'raw',
            'value' => '(empty($data->skype_id)) ? "Not Provided." : CHtml::link($data->skype_id, "skype:" . $data->skype_id . "?userinfo")',
        ),
        array(
            'name'=>'user_email',
            'header'=>'Email',
            'value'=>'(!empty($data->users->username))?$data->users->username:"Not Provided"',
        ),
        array(
            'name'=>'location',
            'value' => '(!empty($data->location))?$data->location:"Not Provided"',
        ),
        array(
            'name'=>'status',
            'filter'=>CHtml::activeDropDownList($model, 'status',
                            $status,
                            array('empty'=>'Select Status',"")),
            'value' => '($data->status === "0") ? "Deactivated" : (($data->status === "1") ? "Profile Submitted" : (($data->status === "2") ? "Approved" : (($data->status === "3") ? "Verified" : "Not Provided")))',
        ),
		array(
			'class'=>'CButtonColumn',
			'header'=>'Operations',
			'buttons'=>array(
                'update'=>array(
                    'visible'=>'true',
                    'url'=>'Yii::app()->createUrl("/admin/users/update", array("id"=>$data->users->id, "update"=>"supplier"))'
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
