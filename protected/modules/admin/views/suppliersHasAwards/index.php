<?php
/* @var $this SuppliersHasAwardsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Suppliers Has Awards',
);

$this->menu=array(
	array('label'=>'Create SuppliersHasAwards', 'url'=>array('create')),
	array('label'=>'Manage SuppliersHasAwards', 'url'=>array('admin')),
);
?>

<h1>Suppliers Has Awards</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
