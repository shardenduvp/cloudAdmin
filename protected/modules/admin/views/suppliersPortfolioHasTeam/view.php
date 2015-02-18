<?php
/* @var $this SuppliersPortfolioHasTeamController */
/* @var $model SuppliersPortfolioHasTeam */

$this->breadcrumbs=array(
	'Suppliers Portfolio Has Teams'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List SuppliersPortfolioHasTeam', 'url'=>array('index')),
	array('label'=>'Create SuppliersPortfolioHasTeam', 'url'=>array('create')),
	array('label'=>'Update SuppliersPortfolioHasTeam', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SuppliersPortfolioHasTeam', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SuppliersPortfolioHasTeam', 'url'=>array('admin')),
);
?>

<h1>View SuppliersPortfolioHasTeam #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'suppliers_has_portfolio_id',
		'name',
		'designation',
		'dep',
		'image',
		'linkedin',
		'facebook',
		'twitter',
		'add_date',
		'status',
	),
)); ?>
