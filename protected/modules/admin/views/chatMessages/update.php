<?php
/* @var $this ChatMessagesController */
/* @var $model ChatMessages */

$this->breadcrumbs=array(
	'Chat Messages'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ChatMessages', 'url'=>array('index')),
	array('label'=>'Create ChatMessages', 'url'=>array('create')),
	array('label'=>'View ChatMessages', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ChatMessages', 'url'=>array('admin')),
);
?>

<h1>Update ChatMessages <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>