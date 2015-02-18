<?php
/* @var $this ChatRoomHasUsersController */
/* @var $model ChatRoomHasUsers */

$this->breadcrumbs=array(
	'Chat Room Has Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ChatRoomHasUsers', 'url'=>array('index')),
	array('label'=>'Create ChatRoomHasUsers', 'url'=>array('create')),
	array('label'=>'View ChatRoomHasUsers', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ChatRoomHasUsers', 'url'=>array('admin')),
);
?>

<h1>Update ChatRoomHasUsers <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>