<?php
/* @var $this SuppliersHasPortfolioHasSkillsController */
/* @var $model SuppliersHasPortfolioHasSkills */

$this->breadcrumbs=array(
	'Suppliers Has Portfolio Has Skills'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SuppliersHasPortfolioHasSkills', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasPortfolioHasSkills', 'url'=>array('create')),
	array('label'=>'View SuppliersHasPortfolioHasSkills', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SuppliersHasPortfolioHasSkills', 'url'=>array('admin')),
);
?>

<h1>Update SuppliersHasPortfolioHasSkills <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>