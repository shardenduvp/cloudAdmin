<?php
/* @var $this ChatMessagesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Chat Messages',
);

$this->menu=array(
	array('label'=>'Create ChatMessages', 'url'=>array('create')),
	array('label'=>'Manage ChatMessages', 'url'=>array('admin')),
);
?>

<h1>Chat Messages</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
