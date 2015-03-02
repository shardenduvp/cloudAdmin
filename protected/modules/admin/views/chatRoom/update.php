<?php
/* @var $this ChatRoomController */
/* @var $model ChatRoom */

$this->breadcrumbs=array(
	'Chat Rooms'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ChatRoom', 'url'=>array('index')),
	array('label'=>'Create ChatRoom', 'url'=>array('create')),
	array('label'=>'View ChatRoom', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ChatRoom', 'url'=>array('admin')),
);
?>

<h1>Update ChatRoom <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>