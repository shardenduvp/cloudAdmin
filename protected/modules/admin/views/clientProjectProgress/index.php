<?php
/* @var $this ClientProjectProgressController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Client Project Progresses',
);

$this->menu=array(
	array('label'=>'Create ClientProjectProgress', 'url'=>array('create')),
	array('label'=>'Manage ClientProjectProgress', 'url'=>array('admin')),
);
?>

<h1>Client Project Progresses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
