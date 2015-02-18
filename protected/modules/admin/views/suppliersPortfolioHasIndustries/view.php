<?php
/* @var $this SuppliersPortfolioHasIndustriesController */
/* @var $model SuppliersPortfolioHasIndustries */

$this->breadcrumbs=array(
	'Suppliers Portfolio Has Industries'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SuppliersPortfolioHasIndustries', 'url'=>array('index')),
	array('label'=>'Create SuppliersPortfolioHasIndustries', 'url'=>array('create')),
	array('label'=>'Update SuppliersPortfolioHasIndustries', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SuppliersPortfolioHasIndustries', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SuppliersPortfolioHasIndustries', 'url'=>array('admin')),
);
?>

<h1>View SuppliersPortfolioHasIndustries #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'suppliers_has_portfolio_id',
		'industries_id',
		'add_date',
		'status',
	),
)); ?>
