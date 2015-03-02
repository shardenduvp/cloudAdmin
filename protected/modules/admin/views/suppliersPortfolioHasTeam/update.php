<?php
/* @var $this SuppliersPortfolioHasTeamController */
/* @var $model SuppliersPortfolioHasTeam */

$this->breadcrumbs=array(
	'Suppliers Portfolio Has Teams'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SuppliersPortfolioHasTeam', 'url'=>array('index')),
	array('label'=>'Create SuppliersPortfolioHasTeam', 'url'=>array('create')),
	array('label'=>'View SuppliersPortfolioHasTeam', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SuppliersPortfolioHasTeam', 'url'=>array('admin')),
);
?>

<h1>Update SuppliersPortfolioHasTeam <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>