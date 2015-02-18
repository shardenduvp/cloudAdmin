<?php
/* @var $this ClientPortfolioController */
/* @var $model ClientPortfolio */

$this->breadcrumbs=array(
	'Client Portfolios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClientPortfolio', 'url'=>array('index')),
	array('label'=>'Manage ClientPortfolio', 'url'=>array('admin')),
);
?>

<h1>Create ClientPortfolio</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>