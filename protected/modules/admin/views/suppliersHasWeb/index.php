<?php
/* @var $this SuppliersHasWebController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Suppliers Has Webs',
);

$this->menu=array(
	array('label'=>'Create SuppliersHasWeb', 'url'=>array('create')),
	array('label'=>'Manage SuppliersHasWeb', 'url'=>array('admin')),
);
?>

<h1>Suppliers Has Webs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
