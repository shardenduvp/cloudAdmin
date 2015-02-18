<?php
/* @var $this SuppliersHasSkillsController */
/* @var $model SuppliersHasSkills */

$this->breadcrumbs=array(
	'Suppliers Has Skills'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SuppliersHasSkills', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasSkills', 'url'=>array('create')),
	array('label'=>'View SuppliersHasSkills', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SuppliersHasSkills', 'url'=>array('admin')),
);
?>

<h1>Update SuppliersHasSkills <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>