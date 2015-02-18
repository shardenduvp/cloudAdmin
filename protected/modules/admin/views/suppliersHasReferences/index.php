<?php
/* @var $this SuppliersHasReferencesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Suppliers Has References',
);

$this->menu=array(
	array('label'=>'Create SuppliersHasReferences', 'url'=>array('create')),
	array('label'=>'Manage SuppliersHasReferences', 'url'=>array('admin')),
);
?>

<h1>Suppliers Has References</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
