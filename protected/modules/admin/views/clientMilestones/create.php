<?php
/* @var $this ClientMilestonesController */
/* @var $model ClientMilestones */

$this->breadcrumbs=array(
	'Client Milestones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClientMilestones', 'url'=>array('index')),
	array('label'=>'Manage ClientMilestones', 'url'=>array('admin')),
);
?>

<h1>Create ClientMilestones</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>