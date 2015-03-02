<?php
/* @var $this ChatRoomHasUsersController */
/* @var $model ChatRoomHasUsers */

$this->breadcrumbs=array(
	'Chat Room Has Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ChatRoomHasUsers', 'url'=>array('index')),
	array('label'=>'Manage ChatRoomHasUsers', 'url'=>array('admin')),
);
?>

<h1>Create ChatRoomHasUsers</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>