<?php
/* @var $this ChatMessagesController */
/* @var $model ChatMessages */

$this->breadcrumbs=array(
	'Chat Messages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ChatMessages', 'url'=>array('index')),
	array('label'=>'Manage ChatMessages', 'url'=>array('admin')),
);
?>

<h1>Create ChatMessages</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>