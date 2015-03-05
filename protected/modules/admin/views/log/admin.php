<?php
/* @var $this LogController */
/* @var $model Log */

$this->breadcrumbs=array(
	'Logs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Log', 'url'=>array('index')),
	array('label'=>'Create Log', 'url'=>array('create')),
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

<div class="row">
    <div class="col-sm-12">
        <div class="page-header">
         	<h1>Logs</h1>
       	</div>
    </div>
</div>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<div class="search-form">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'log-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'project_status',
            'header'=>'Project status', 
            'filter'=>CHtml::activeDropDownList($model, 'status',
                   	array('2'=>"Introduction sent",'1'=>"Waiting approval"),
                    array('empty'=>'Select Status',"")), 
            'value'=>'($data->status==1)?"Waiting approval":"Introduction sent"',  
			),
		array(
			'name'=>'title',
			'value'=>'(empty($data->title))?"Not Provided":$data->title',
			),
		array(
			'name'=>'description',
			'value'=>'(empty($data->description))?"Not Provided":$data->description',
			),
		array(
			'name'=>'proposal_id',
			'value'=>'(empty($data->proposal_id))?"Not Provided":$data->proposal_id',
			),
		array(
			'name'=>'is_active',
			'value'=>'(empty($data->is_active))?"Not Provided":"Not Active"',
			),
		array(
			'name'=>'status',
            'header'=>'Status', 
            'filter'=>CHtml::activeDropDownList($model, 'status',
                   	array('1'=>"Verified",'0'=>'Not Verified'),
                    array('empty'=>'Select Status',"")), 
            'value'=>'($data->status==1)?"Verified":"Not Verified"',  
			),		
		/*
		'is_checked',
		'add_date',
		'update_date',
		'for_user',
		'notification',
		'is_read',
		'login_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
