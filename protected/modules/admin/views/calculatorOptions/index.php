<?php
/* @var $this CalculatorOptionsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Calculator Options',
);

$this->menu=array(
	array('label'=>'Create CalculatorOptions', 'url'=>array('create')),
	array('label'=>'Manage CalculatorOptions', 'url'=>array('admin')),
);
?>

<h1>Calculator Options</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
