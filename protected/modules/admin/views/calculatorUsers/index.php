<?php
/* @var $this CalculatorUsersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Calculator Users',
);

$this->menu=array(
	array('label'=>'Create CalculatorUsers', 'url'=>array('create')),
	array('label'=>'Manage CalculatorUsers', 'url'=>array('admin')),
);
?>

<h1>Calculator Users</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
