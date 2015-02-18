<?php
/* @var $this SuppliersHasPortfolioHasSkillsController */
/* @var $model SuppliersHasPortfolioHasSkills */

$this->breadcrumbs=array(
	'Suppliers Has Portfolio Has Skills'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SuppliersHasPortfolioHasSkills', 'url'=>array('index')),
	array('label'=>'Manage SuppliersHasPortfolioHasSkills', 'url'=>array('admin')),
);
?>

<h1>Create SuppliersHasPortfolioHasSkills</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>