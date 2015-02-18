<?php
/* @var $this MilestonesHasOrderStatusController */
/* @var $model MilestonesHasOrderStatus */

$this->breadcrumbs=array(
	'Milestones Has Order Statuses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MilestonesHasOrderStatus', 'url'=>array('index')),
	array('label'=>'Manage MilestonesHasOrderStatus', 'url'=>array('admin')),
);
?>

<h1>Create MilestonesHasOrderStatus</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>