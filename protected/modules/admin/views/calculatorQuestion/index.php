<?php
/* @var $this CalculatorQuestionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Calculator Questions',
);

$this->menu=array(
	array('label'=>'Create CalculatorQuestion', 'url'=>array('create')),
	array('label'=>'Manage CalculatorQuestion', 'url'=>array('admin')),
);
?>

<h1>Calculator Questions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
