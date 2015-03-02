<?php
/* @var $this LinkedinConnectionsController */
/* @var $model LinkedinConnections */

$this->breadcrumbs=array(
	'Linkedin Connections'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LinkedinConnections', 'url'=>array('index')),
	array('label'=>'Create LinkedinConnections', 'url'=>array('create')),
	array('label'=>'View LinkedinConnections', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LinkedinConnections', 'url'=>array('admin')),
);
?>

<h1>Update LinkedinConnections <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>