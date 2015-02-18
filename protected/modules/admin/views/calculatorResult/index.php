<?php
/* @var $this CalculatorResultController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Calculator Results',
);

$this->menu=array(
	array('label'=>'Create CalculatorResult', 'url'=>array('create')),
	array('label'=>'Manage CalculatorResult', 'url'=>array('admin')),
);
?>

<h1>Calculator Results</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
