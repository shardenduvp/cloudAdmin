<?php
/* @var $this CalculatorCategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Calculator Categories',
);

$this->menu=array(
	array('label'=>'Create CalculatorCategory', 'url'=>array('create')),
	array('label'=>'Manage CalculatorCategory', 'url'=>array('admin')),
);
?>

<h1>Calculator Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
