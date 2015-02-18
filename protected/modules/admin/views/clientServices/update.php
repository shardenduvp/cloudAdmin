<?php
/* @var $this ClientServicesController */
/* @var $model ClientServices */

$this->breadcrumbs=array(
	'Client Services'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClientServices', 'url'=>array('index')),
	array('label'=>'Create ClientServices', 'url'=>array('create')),
	array('label'=>'View ClientServices', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ClientServices', 'url'=>array('admin')),
);
?>

<h1>Update ClientServices <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>