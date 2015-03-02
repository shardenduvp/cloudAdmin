<?php
/* @var $this SuppliersHasSkillsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Suppliers Has Skills',
);

$this->menu=array(
	array('label'=>'Create SuppliersHasSkills', 'url'=>array('create')),
	array('label'=>'Manage SuppliersHasSkills', 'url'=>array('admin')),
);
?>

<h1>Suppliers Has Skills</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
