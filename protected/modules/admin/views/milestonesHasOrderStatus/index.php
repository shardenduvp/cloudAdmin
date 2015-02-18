<?php
/* @var $this MilestonesHasOrderStatusController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Milestones Has Order Statuses',
);

$this->menu=array(
	array('label'=>'Create MilestonesHasOrderStatus', 'url'=>array('create')),
	array('label'=>'Manage MilestonesHasOrderStatus', 'url'=>array('admin')),
);
?>

<h1>Milestones Has Order Statuses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
