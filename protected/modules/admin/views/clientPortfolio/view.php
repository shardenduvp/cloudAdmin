<?php
/* @var $this ClientPortfolioController */
/* @var $model ClientPortfolio */

$this->breadcrumbs=array(
	'Client Portfolios'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ClientPortfolio', 'url'=>array('index')),
	array('label'=>'Create ClientPortfolio', 'url'=>array('create')),
	array('label'=>'Update ClientPortfolio', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClientPortfolio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClientPortfolio', 'url'=>array('admin')),
);
?>

<h1>View ClientPortfolio #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'client_id',
		'project_id',
		'type',
		'service',
		'skill',
		'add_date',
		'status',
	),
)); ?>
