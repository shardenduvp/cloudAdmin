<?php
/* @var $this SuppliersProjectTeamController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Suppliers Project Teams',
);

$this->menu=array(
	array('label'=>'Create SuppliersProjectTeam', 'url'=>array('create')),
	array('label'=>'Manage SuppliersProjectTeam', 'url'=>array('admin')),
);
?>

<h1>Suppliers Project Teams</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
