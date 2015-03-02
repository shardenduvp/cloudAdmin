<?php
/* @var $this ClientProjectFlowsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Client Project Flows',
);

$this->menu=array(
	array('label'=>'Create ClientProjectFlows', 'url'=>array('create')),
	array('label'=>'Manage ClientProjectFlows', 'url'=>array('admin')),
);
?>

<h1>Client Project Flows</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
