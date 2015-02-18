<?php
/* @var $this ClientPortfolioController */
/* @var $model ClientPortfolio */

$this->breadcrumbs=array(
	'Client Portfolios'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClientPortfolio', 'url'=>array('index')),
	array('label'=>'Create ClientPortfolio', 'url'=>array('create')),
	array('label'=>'View ClientPortfolio', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ClientPortfolio', 'url'=>array('admin')),
);
?>

<h1>Update ClientPortfolio <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>