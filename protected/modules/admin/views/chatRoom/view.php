<?php
/* @var $this ChatRoomController */
/* @var $model ChatRoom */

$this->breadcrumbs=array(
	'Chat Rooms'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ChatRoom', 'url'=>array('index')),
	array('label'=>'Create ChatRoom', 'url'=>array('create')),
	array('label'=>'Update ChatRoom', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ChatRoom', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ChatRoom', 'url'=>array('admin')),
);
?>

<h1>View ChatRoom #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'users_id',
		'room_type',
		'proposal_id',
		'room_name',
		'add_date',
		'status',
	),
)); ?>
