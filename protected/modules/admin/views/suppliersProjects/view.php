<?php
/* @var $this SuppliersProjectsController */
/* @var $model SuppliersProjects */

$this->breadcrumbs=array(
	'Suppliers Projects'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SuppliersProjects', 'url'=>array('index')),
	array('label'=>'Create SuppliersProjects', 'url'=>array('create')),
	array('label'=>'Update SuppliersProjects', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SuppliersProjects', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SuppliersProjects', 'url'=>array('admin')),
);
?>

<h1>View SuppliersProjects #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'pitch',
		'about_project',
		'why_you',
		'estimated_cost',
		'estimated_time',
		'trial_period',
		'chat_room_id',
		'comments',
		'min_price',
		'max_price',
		'time_material',
		'billing_schedule',
		'start_date',
		'note',
		'is_escrow',
		'others',
		'add_date',
		'status',
		'client_projects_id',
		'suppliers_id',
		'default_q1_ans',
		'default_q2_ans',
		'default_q3_ans',
		'default_q4_ans',
		'default_q5_ans',
		'default_q6_ans',
	),
)); ?>
