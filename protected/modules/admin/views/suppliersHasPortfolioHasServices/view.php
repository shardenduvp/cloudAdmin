<?php
/* @var $this SuppliersHasPortfolioHasServicesController */
/* @var $model SuppliersHasPortfolioHasServices */

$this->breadcrumbs=array(
	'Suppliers Has Portfolio Has Services'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SuppliersHasPortfolioHasServices', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasPortfolioHasServices', 'url'=>array('create')),
	array('label'=>'Update SuppliersHasPortfolioHasServices', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SuppliersHasPortfolioHasServices', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SuppliersHasPortfolioHasServices', 'url'=>array('admin')),
);
?>

<h1>View SuppliersHasPortfolioHasServices #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'suppliers_has_portfolio_id',
		'services_id',
		'add_date',
		'status',
	),
)); ?>
