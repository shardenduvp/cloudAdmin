<?php
/* @var $this MilestonesHasOrderStatusController */
/* @var $model MilestonesHasOrderStatus */

$this->breadcrumbs=array(
	'Milestones Has Order Statuses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MilestonesHasOrderStatus', 'url'=>array('index')),
	array('label'=>'Create MilestonesHasOrderStatus', 'url'=>array('create')),
	array('label'=>'View MilestonesHasOrderStatus', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MilestonesHasOrderStatus', 'url'=>array('admin')),
);
?>

<h1>Update MilestonesHasOrderStatus <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>