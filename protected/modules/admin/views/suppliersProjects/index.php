<?php
/* @var $this SuppliersProjectsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Suppliers Projects',
);

$this->menu=array(
	array('label'=>'Create SuppliersProjects', 'url'=>array('create')),
	array('label'=>'Manage SuppliersProjects', 'url'=>array('admin')),
);
?>

<h1>Suppliers Projects</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
