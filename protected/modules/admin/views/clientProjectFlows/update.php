<?php
/* @var $this ClientProjectFlowsController */
/* @var $model ClientProjectFlows */

$this->breadcrumbs=array(
	'Client Project Flows'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClientProjectFlows', 'url'=>array('index')),
	array('label'=>'Create ClientProjectFlows', 'url'=>array('create')),
	array('label'=>'View ClientProjectFlows', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ClientProjectFlows', 'url'=>array('admin')),
);
?>

<h1>Update ClientProjectFlows <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>