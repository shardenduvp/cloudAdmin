<?php
/* @var $this ClientProjectProgressController */
/* @var $model ClientProjectProgress */

$this->breadcrumbs=array(
	'Client Project Progresses'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClientProjectProgress', 'url'=>array('index')),
	array('label'=>'Create ClientProjectProgress', 'url'=>array('create')),
	array('label'=>'View ClientProjectProgress', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ClientProjectProgress', 'url'=>array('admin')),
);
?>

<h1>Update ClientProjectProgress <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>