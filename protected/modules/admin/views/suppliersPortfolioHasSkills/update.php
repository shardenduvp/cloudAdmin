<?php
/* @var $this SuppliersPortfolioHasSkillsController */
/* @var $model SuppliersPortfolioHasSkills */

$this->breadcrumbs=array(
	'Suppliers Portfolio Has Skills'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SuppliersPortfolioHasSkills', 'url'=>array('index')),
	array('label'=>'Create SuppliersPortfolioHasSkills', 'url'=>array('create')),
	array('label'=>'View SuppliersPortfolioHasSkills', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SuppliersPortfolioHasSkills', 'url'=>array('admin')),
);
?>

<h1>Update SuppliersPortfolioHasSkills <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>