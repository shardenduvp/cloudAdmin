<?php
/* @var $this ZonesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Zones',
);

$this->menu=array(
	array('label'=>'Create Zones', 'url'=>array('create')),
	array('label'=>'Manage Zones', 'url'=>array('admin')),
);
?>

<h1>Zones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
