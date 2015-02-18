<?php
/* @var $this SuppliersPortfolioHasSkillsController */
/* @var $model SuppliersPortfolioHasSkills */

$this->breadcrumbs=array(
	'Suppliers Portfolio Has Skills'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SuppliersPortfolioHasSkills', 'url'=>array('index')),
	array('label'=>'Manage SuppliersPortfolioHasSkills', 'url'=>array('admin')),
);
?>

<h1>Create SuppliersPortfolioHasSkills</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>