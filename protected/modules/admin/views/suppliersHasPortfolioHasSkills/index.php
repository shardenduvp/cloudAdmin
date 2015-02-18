<?php
/* @var $this SuppliersHasPortfolioHasSkillsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Suppliers Has Portfolio Has Skills',
);

$this->menu=array(
	array('label'=>'Create SuppliersHasPortfolioHasSkills', 'url'=>array('create')),
	array('label'=>'Manage SuppliersHasPortfolioHasSkills', 'url'=>array('admin')),
);
?>

<h1>Suppliers Has Portfolio Has Skills</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
