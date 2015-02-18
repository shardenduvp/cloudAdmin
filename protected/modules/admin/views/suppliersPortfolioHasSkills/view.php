<?php
/* @var $this SuppliersPortfolioHasSkillsController */
/* @var $model SuppliersPortfolioHasSkills */

$this->breadcrumbs=array(
	'Suppliers Portfolio Has Skills'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SuppliersPortfolioHasSkills', 'url'=>array('index')),
	array('label'=>'Create SuppliersPortfolioHasSkills', 'url'=>array('create')),
	array('label'=>'Update SuppliersPortfolioHasSkills', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SuppliersPortfolioHasSkills', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SuppliersPortfolioHasSkills', 'url'=>array('admin')),
);
?>

<h1>View SuppliersPortfolioHasSkills #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'portfolio_id',
		'skills_id',
		'status',
		'add_date',
	),
)); ?>
