<?php
/* @var $this SuppliersPortfolioHasTeamController */
/* @var $model SuppliersPortfolioHasTeam */

$this->breadcrumbs=array(
	'Suppliers Portfolio Has Teams'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SuppliersPortfolioHasTeam', 'url'=>array('index')),
	array('label'=>'Manage SuppliersPortfolioHasTeam', 'url'=>array('admin')),
);
?>

<h1>Create SuppliersPortfolioHasTeam</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>