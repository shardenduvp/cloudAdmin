<?php
/* @var $this SuppliersHasCitiesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Suppliers Has Cities',
);

$this->menu=array(
	array('label'=>'Create SuppliersHasCities', 'url'=>array('create')),
	array('label'=>'Manage SuppliersHasCities', 'url'=>array('admin')),
);
?>

<h1>Suppliers Has Cities</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
