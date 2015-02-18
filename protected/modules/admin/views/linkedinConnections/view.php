<?php
/* @var $this LinkedinConnectionsController */
/* @var $model LinkedinConnections */

$this->breadcrumbs=array(
	'Linkedin Connections'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List LinkedinConnections', 'url'=>array('index')),
	array('label'=>'Create LinkedinConnections', 'url'=>array('create')),
	array('label'=>'Update LinkedinConnections', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LinkedinConnections', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LinkedinConnections', 'url'=>array('admin')),
);
?>

<h1>View LinkedinConnections #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'linkedin_Id',
		'first_name',
		'last_name',
		'headline',
		'image',
		'industry',
		'location',
		'url',
		'add_date',
		'status',
		'cities_id',
		'users_id',
	),
)); ?>
