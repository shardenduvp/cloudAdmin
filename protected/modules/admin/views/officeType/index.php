<?php
/* @var $this OfficeTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Office Types',
);

$this->menu=array(
	array('label'=>'Create OfficeType', 'url'=>array('create')),
	array('label'=>'Manage OfficeType', 'url'=>array('admin')),
);
?>

<h1>Office Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
