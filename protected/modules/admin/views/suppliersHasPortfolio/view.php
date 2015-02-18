<?php
/* @var $this SuppliersHasPortfolioController */
/* @var $model SuppliersHasPortfolio */

$this->breadcrumbs=array(
	'Suppliers Has Portfolios'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SuppliersHasPortfolio', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasPortfolio', 'url'=>array('create')),
	array('label'=>'Update SuppliersHasPortfolio', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SuppliersHasPortfolio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SuppliersHasPortfolio', 'url'=>array('admin')),
);
?>

<h1>View SuppliersHasPortfolio #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'suppliers_id',
		'project_name',
		'project_link',
		'description',
		'industry_id',
		'service_id',
		'client_name',
		'year_done',
		'estimate_price',
		'start_date',
		'estimate_timeline',
		'language_used',
		'cover',
		'add_date',
		'status',
		'portfolio_type',
		'one_line_pitch',
		'who_can',
		'markets',
		'portfolio_status',
		'no_of_customers',
		'launched_in',
		'no_of_users',
		'deployment',
		'is_free_trial',
		'project_size',
		'per_hour_rate',
		'platform',
		'company_name',
		'is_discreet',
		'discreet_desc',
		'location',
		'image',
	),
)); ?>
