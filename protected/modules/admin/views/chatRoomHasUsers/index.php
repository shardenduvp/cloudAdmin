<?php
/* @var $this ChatRoomHasUsersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Chat Room Has Users',
);

$this->menu=array(
	array('label'=>'Create ChatRoomHasUsers', 'url'=>array('create')),
	array('label'=>'Manage ChatRoomHasUsers', 'url'=>array('admin')),
);
?>

<h1>Chat Room Has Users</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
