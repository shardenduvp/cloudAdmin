<?php
/* @var $this LinkedinConnectionsController */
/* @var $model LinkedinConnections */

$this->breadcrumbs=array(
	'Linkedin Connections'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LinkedinConnections', 'url'=>array('index')),
	array('label'=>'Manage LinkedinConnections', 'url'=>array('admin')),
);
?>

<h1>Create LinkedinConnections</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>