<?php
/* @var $this SuppliersProjectAnswerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Suppliers Project Answers',
);

$this->menu=array(
	array('label'=>'Create SuppliersProjectAnswer', 'url'=>array('create')),
	array('label'=>'Manage SuppliersProjectAnswer', 'url'=>array('admin')),
);
?>

<h1>Suppliers Project Answers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
