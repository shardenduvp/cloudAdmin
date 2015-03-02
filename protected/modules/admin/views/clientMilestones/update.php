<?php
/* @var $this ClientMilestonesController */
/* @var $model ClientMilestones */

$this->breadcrumbs=array(
	'Client Milestones'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClientMilestones', 'url'=>array('index')),
	array('label'=>'Create ClientMilestones', 'url'=>array('create')),
	array('label'=>'View ClientMilestones', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ClientMilestones', 'url'=>array('admin')),
);
?>

<h1>Update ClientMilestones <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>