<?php
/* @var $this ClientMilestonesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Client Milestones',
);

$this->menu=array(
	array('label'=>'Create ClientMilestones', 'url'=>array('create')),
	array('label'=>'Manage ClientMilestones', 'url'=>array('admin')),
);
?>

<h1>Client Milestones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
