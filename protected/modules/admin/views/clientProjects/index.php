<?php
/* @var $this ClientProjectsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Client Projects',
);

$this->menu=array(
	array('label'=>'Create ClientProjects', 'url'=>array('create')),
	array('label'=>'Manage ClientProjects', 'url'=>array('admin')),
);
?>

<h1>Client Projects</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
