<?php
/* @var $this ClientProjectsHasSkillsController */
/* @var $model ClientProjectsHasSkills */

$this->breadcrumbs=array(
	'Client Projects Has Skills'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClientProjectsHasSkills', 'url'=>array('index')),
	array('label'=>'Create ClientProjectsHasSkills', 'url'=>array('create')),
	array('label'=>'View ClientProjectsHasSkills', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ClientProjectsHasSkills', 'url'=>array('admin')),
);
?>

<h1>Update ClientProjectsHasSkills <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>