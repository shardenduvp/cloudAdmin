<?php
/* @var $this ChatRoomController */
/* @var $model ChatRoom */

$this->breadcrumbs=array(
	'Chat Rooms'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ChatRoom', 'url'=>array('index')),
	array('label'=>'Manage ChatRoom', 'url'=>array('admin')),
);
?>

<h1>Create ChatRoom</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>