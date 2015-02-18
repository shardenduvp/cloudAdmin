<?php
/* @var $this SuppliersPortfolioImagesController */
/* @var $model SuppliersPortfolioImages */

$this->breadcrumbs=array(
	'Suppliers Portfolio Images'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List SuppliersPortfolioImages', 'url'=>array('index')),
	array('label'=>'Create SuppliersPortfolioImages', 'url'=>array('create')),
	array('label'=>'Update SuppliersPortfolioImages', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SuppliersPortfolioImages', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SuppliersPortfolioImages', 'url'=>array('admin')),
);
?>

<h1>View SuppliersPortfolioImages #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'suppliers_has_portfolio_id',
		'title',
		'image',
		'description',
		'add_date',
		'status',
	),
)); ?>
