<?php
/* @var $this ChatRoomHasUsersController */
/* @var $model ChatRoomHasUsers */

$this->breadcrumbs=array(
	'Chat Room Has Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ChatRoomHasUsers', 'url'=>array('index')),
	array('label'=>'Create ChatRoomHasUsers', 'url'=>array('create')),
	array('label'=>'Update ChatRoomHasUsers', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ChatRoomHasUsers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ChatRoomHasUsers', 'url'=>array('admin')),
);
?>

<h1>View ChatRoomHasUsers #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'chat_room_id',
		'users_id',
		'added_by',
		'add_date',
		'note',
		'status',
	),
)); ?>
