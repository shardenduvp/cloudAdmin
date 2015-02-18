<?php
/* @var $this ClientProjectsHasIndustriesController */
/* @var $model ClientProjectsHasIndustries */

$this->breadcrumbs=array(
	'Client Projects Has Industries'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClientProjectsHasIndustries', 'url'=>array('index')),
	array('label'=>'Create ClientProjectsHasIndustries', 'url'=>array('create')),
	array('label'=>'View ClientProjectsHasIndustries', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ClientProjectsHasIndustries', 'url'=>array('admin')),
);
?>

<h1>Update ClientProjectsHasIndustries <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>