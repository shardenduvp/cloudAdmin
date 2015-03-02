<?php
/* @var $this SuppliersHasIndustriesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Suppliers Has Industries',
);

$this->menu=array(
	array('label'=>'Create SuppliersHasIndustries', 'url'=>array('create')),
	array('label'=>'Manage SuppliersHasIndustries', 'url'=>array('admin')),
);
?>

<h1>Suppliers Has Industries</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
