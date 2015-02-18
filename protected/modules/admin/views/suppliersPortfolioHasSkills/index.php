<?php
/* @var $this SuppliersPortfolioHasSkillsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Suppliers Portfolio Has Skills',
);

$this->menu=array(
	array('label'=>'Create SuppliersPortfolioHasSkills', 'url'=>array('create')),
	array('label'=>'Manage SuppliersPortfolioHasSkills', 'url'=>array('admin')),
);
?>

<h1>Suppliers Portfolio Has Skills</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
