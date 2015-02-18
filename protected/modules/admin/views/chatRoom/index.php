<?php
/* @var $this ChatRoomController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Chat Rooms',
);

$this->menu=array(
	array('label'=>'Create ChatRoom', 'url'=>array('create')),
	array('label'=>'Manage ChatRoom', 'url'=>array('admin')),
);
?>

<h1>Chat Rooms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
