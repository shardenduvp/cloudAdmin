<?php
/* @var $this ClientProjectsHasIndustriesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Client Projects Has Industries',
);

$this->menu=array(
	array('label'=>'Create ClientProjectsHasIndustries', 'url'=>array('create')),
	array('label'=>'Manage ClientProjectsHasIndustries', 'url'=>array('admin')),
);
?>

<h1>Client Projects Has Industries</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
